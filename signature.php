<?php
require_once './config/email-config.php';
?>
<html>
   <head>
      <style>
         .signature-container {
            font-family: Calibri, sans-serif;
            margin: 0;
         }
         .name {
            font-size: 12pt;
            font-weight: bold;
            color: <?= $_COLOR; ?>;
            margin: 0cm;
            padding: 2px 0px;
            <?php if(isset($type) && $type == 'C'): ?>
               background: -webkit-linear-gradient(#fe952d, #860eae);
               -webkit-background-clip: text;
               -webkit-text-fill-color: transparent;
            <?php endif; ?>
         }
         .job-title {
            font-size: 11pt;
            font-weight: bold;
            color: #625454;
            line-height: 11.25pt;
            margin: 0cm;
         }
         .links {
            font-size: 15px;
            line-height: 11.25pt;
            margin: 0cm;
            padding: 3px 0px;
            color: #444444;
         }

         .disclaimer {
            font-size: 13px;
            color: #999999;
            line-height: 11.25pt;
            margin: 0cm;
         }

         .footnote {
            font-size: 10pt;
            color: #444444;
            line-height: 11.25pt;
            margin: 0cm;
            padding-top: 2px;
         }
      </style>
   </head>
   <body>
      <div dir="ltr">
         <div dir="ltr" class="signature-container">
            <p class="name"><?= nl2br($_NAME); ?></p>
            <p class="job-title"><?= $_DESIGNATION; ?></p>
            
            <?php if (isset($_LINKS) && count($_LINKS) > 0): ?>
            <p class="links">
               <?php foreach ($_LINKS as $link): ?>
                  <?= $link; ?><?php if (next($_LINKS)) echo ' | '; ?>
               <?php endforeach; ?>
            </p>
            <?php endif; ?>

            <?php if (isset($_FOOTNOTE) && count($_FOOTNOTE) > 0): ?>
               <p class="footnote">
                  <?php foreach ($_FOOTNOTE as $note): ?>
                     <?= $note; ?><br/>
                  <?php endforeach; ?>
               </p>
            <?php endif; ?>
            
            <br/>
            <p class="disclaimer">
               <?= $_DISCLAIMER ?>
            </p>
         </div>
      </div>
   </body>
</html>