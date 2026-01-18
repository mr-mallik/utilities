<?php

$type = $_GET['type'] ?? null;

$_COLOR = "#45818e";

$_EDUCATION = "MSc";
$_PRONOUNS = "(he/him/his)";
$_NAME = "Gulger Mallik, $_EDUCATION $_PRONOUNS";
$_DISCLAIMER = "IMPORTANT: The contents of this email and any attachments are confidential. They are intended for the named recipient(s) only.
                If you have received this email by mistake, please notify the sender immediately and do not disclose the contents to anyone or make copies thereof.";
$_DESIGNATION = "Software Engineer";    

// any footnote before disclaimer
$_FOOTNOTE = [];

// social links
$_LINKS = [];
$_LINKS[] = '<a href="http://www.linkedin.com/in/mrmallik" target="_blank">LinkedIn</a>';
$_LINKS[] = '<a href="http://www.github.com/mr-mallik" target="_blank">GitHub</a>';
$_LINKS[] = '<a href="http://www.mrmallik.com/" target="_blank">Website</a>';

if($type == 'U')
{
    // for university account signature
    $_COLOR = "rgb(0,57,118)";

    $_DESIGNATION = "Research Assitant in Applied Artificial Intelligence";

    $_FOOTNOTE[] = "Department of Computer Science, School of Computing and Engineering";
    $_FOOTNOTE[] = "University of Huddersfield | Queensgate | Huddersfield | HD1 3DH";
}

if($type == 'C')
{
    // for cosmokode
    $_COLOR = "";

    $_DESIGNATION = "Co-founder &amp; Principal Software Engineer";
    $_LINKS = [];
    $_LINKS[] = '<a href="http://www.linkedin.com/company/cosmokode" target="_blank">LinkedIn</a>';
    $_LINKS[] = '<a href="http://www.cosmokode.com/" target="_blank">Website</a>';
    $_LINKS[] = '<a href="http://www.instagram.com/cosmo.kode" target="_blank">Instagram</a>';

    $_FOOTNOTE[] = "CosmoKode Ltd | 128, City Road | London | EC1V 2NX";
    $_FOOTNOTE[] = "Company No: 16402669 | Registered in United Kingdom";
    $_FOOTNOTE[] = "<img src='https://cosmokode.com/assets/images/cosmokode-banner.png' alt='CosmoKode' style='width: 600; height: auto; margin-top: 10px;' />";

    $_DISCLAIMER = "
    IMPORTANT: This transmission is confidential and may be legally privileged. If you receive it in error, please notify us immediately by e-mail and remove it from your system. 
    If the content of this e-mail does not relate to the business of CosmoKode Ltd, then we do not endorse it and will accept no liability.";
}