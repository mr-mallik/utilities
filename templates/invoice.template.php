<header>
	<table width="100%">
		<tr>
			<td align="left">
				<img width="100" id="logo" src="./images/mallik_logo.png">
			</td>
			<td align="right">
                <div id="company">
                    <h2>INVOICE</h2>
                    <h2 class="company-name">Gulger Mallik</h2>
                    <div><b>Email:</b> <a href="mailto:gulgermallik@gmail.com">gulgermallik@gmail.com</a></div>
                    <div><b>Website:</b> <a href="https://mrmallik.com">www.mrmallik.com</a></div>
				</div> 
			</td>
		</tr>
	</table>
</header>

<main>
	<div id="details" class="clearfix">
	    <div id="client">
	        <div class="to">Bill To,</div>
	        <h2 class="customer-name"><?php echo $customer_name; ?></h2>
	        <div class="address">
                <?php echo nl2br($customer_address); ?>
            </div>
	    </div>

	    <div id="invoice">
	        <div class="date"><b>Date:</b> <?php echo date("d M Y"); ?></div>
	    </div>
    </div>

	<table class="invoice-table" border="0" cellspacing="0" cellpadding="0">
	    <thead>
	        <tr>
                <th class="desc" width="53%">Particulars</th>
                <th class="qty" width="9%" align="right">Qty.</th>
                <th class="unit" width="18%" align="right">Price</th>
                <th class="total" align="right">Amount</th>
            </tr>
	    </thead>
	    <tbody>
            <?php 
            $total = 0;
            foreach($particulars as $particular) { 
                $total += $particular['tot_str'];
                ?>
                <tr>
                    <td class="desc"><h4><?php echo $particular['itm_name']; ?></h4>
                        <br/>
                        <span class="itm-desc"><?php echo $particular['desc_str']; ?></span></td>
                    <td class="qty"><?php echo $particular['qty_str']; ?></td>
                    <td class="unit">£<?php echo $particular['price_str']; ?></td>
                    <td class="total">£<?php echo $particular['tot_str']; ?></td>
                </tr>
            <?php } ?>
	    </tbody>
	    <tfoot>
	        <tr>
	            <td colspan="3" class="total-component"><b>TOTAL</b></td>
	            <td colspan="1" class="total-component">£<?php echo $total; ?></td>
	        </tr>
	    </tfoot>
	</table>
	
    <?php if(count($notes_arr) > 0) { ?>
        <div id="notices">
            <div><b>NOTES:</b></div>
            <ul class="notice">
                <?php foreach($notes_arr as $note) { ?>
                    <li><?php echo $note; ?></li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>

</main>

<br/>

<table class="closing-footer" width="100%">
	<tbody>
		<tr>
			<td colspan="3"><b>Account Details for Bank Transfer</b></td>
		</tr>
		<tr>
			<td width="20%">Name on Account:</td>
			<td width="60%" class="lbl">GULGER MALLIK</td>
			<td rowspan="4" align="center">
				<img src="./images/mr_mallik_signature.png" alt="Signature" height="100">
				<span class="authenticCheck"><br/>Gulger Mallik</span>
			</td>
		</tr>
		<tr>
			<td>Account No:</td>
			<td class="lbl">65388460</td>
		</tr>
		<tr>
			<td>Sort Code:</td>
			<td class="lbl">77-77-51</td>
		</tr>
        <tr>
			<td>IBAN:</td>
			<td class="lbl">GB09LOYD77775165388460</td>
		</tr>
        <tr>
			<td>BIC/SWIFT:</td>
			<td class="lbl">LOYDGB21F89</td>
		</tr>
	</tbody>
</table>