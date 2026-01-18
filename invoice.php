<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once "./libs/mpdf/inc.php";
require_once "./libs/mpdf/style.php";
require_once "./inc.php";

$mpdf = new \Mpdf\Mpdf();

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
	'fontDir' => array_merge($fontDirs, [
        __DIR__ . './libs/mpdf/fonts/Lora',
    ]),
    'fontdata' => $fontData + [
        'lora' => [
            'R' => 'Lora-Regular.ttf',
            'B' => 'Lora-Bold.ttf',
            'I' => 'Lora-Italic.ttf',
        ]
    ],
	'default_font_size' => '9',
	'default_font' => 'Lora-Regular',
]);

$stylesheet = file_get_contents('./css/invoice-style.css');

$header = $body = $footer = $footnote = "";

$data = [];

$notes_arr = [];
$notes_arr[] = "Payment is due within 15 days from date of invoice.";
$notes_arr[] = "Please make all cheques payable to Gulger Mallik";
$data['notes_arr'] = $notes_arr;

$data['customer_name'] = "Tierrasphere";
$data['customer_address'] = "
    50 St Mary’s Road,
    Hemel Hempstead,
    HP2 5HL
";

$particulars = [];
$particulars[] = array("itm_name" => "Landing Page design", 
                        "desc_str" => "Design and develop using SquareSpace, with multiple revisions and content updates", 
                        "qty_str" => 1,
                        "price_str" => 100,
                        "tot_str" => 100);

$particulars[] = array("itm_name" => "DNS Configuration", 
                        "desc_str" => "Configure DNS settings for the domain to point from IONOS to SquareSpace", 
                        "qty_str" => 1,
                        "price_str" => 50,
                        "tot_str" => 50);

$particulars[] = array("itm_name" => "Prototype design", 
                        "desc_str" => "Prototype design for the client interfacing using HTML, CSS and JS (on short notice)", 
                        "qty_str" => 1,
                        "price_str" => 100,
                        "tot_str" => 100);

$data['particulars'] = $particulars;

$body = get_pdf_template("./templates/invoice.template.php", $data);

$footer .= '
<footer>
	Thank you for your business | www.mrmallik.com | Page {PAGENO}/{nb}
</footer>
';

// echo $body;
// exit;

$invoice_name = "Invoice - Tierrasphere";

$mpdf->SetHTMLFooter($footer);
$mpdf->SetTitle($invoice_name);
$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($body,\Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output($invoice_name.'.pdf', 'I');