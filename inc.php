<?php
function get_pdf_template($filename, $data)
{
    if(file_exists($filename)) {
        ob_start();
        extract($data);
        require_once $filename;
        $content = ob_get_clean();
        return $content;
    } else {
        return "File not found";
    }
}

function verbose($numeric) {
    // convert numeric to verbose
    $numeric = (int)$numeric;
    $verbose = [
        0 => 'Zero',
        1 => 'One',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five',
        6 => 'Six',
        7 => 'Seven',
        8 => 'Eight',
        9 => 'Nine',
        10 => 'Ten',
        11 => 'Eleven',
        12 => 'Twelve',
        13 => 'Thirteen',
        14 => 'Fourteen',
        15 => 'Fifteen',
        16 => 'Sixteen',
        17 => 'Seventeen',
        18 => 'Eighteen',
        19 => 'Nineteen',
        20 => 'Twenty',
        30 => 'Thirty',
        40 => 'Forty',
        50 => 'Fifty',
        60 => 'Sixty',
        70 => 'Seventy',
        80 => 'Eighty',
        90 => 'Ninety',
        100 => 'Hundred',
        1000 => 'Thousand',
        100000 => 'Lakh',
        10000000 => 'Crore'
    ];
    $str = '';
    if($numeric < 20) {
        $str = $verbose[$numeric];
    } elseif($numeric < 100) {
        $str = $verbose[$numeric - $numeric % 10];
        if($numeric % 10) {
            $str .= ' ' . $verbose[$numeric % 10];
        }
    } elseif($numeric < 1000) {
        $str = $verbose[(int)($numeric / 100)] . ' ' . $verbose[100];
        if($numeric % 100) {
            $str .= ' ' . verbose($numeric % 100);
        }
    } else {
        $base = 1000;
        $str = verbose((int)($numeric / $base)) . ' ' . $verbose[$base];
        if($numeric % $base) {
            $str .= ' ' . verbose($numeric % $base);
        }
    }

    return $str;
}