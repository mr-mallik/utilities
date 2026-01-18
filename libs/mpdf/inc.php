<?php
function space_out($a=1, $char="&nbsp;", $col_span="1") {
	$str = '';
	if(is_numeric($a)) {
		for ($i=1; $i <=$a ; $i++) {
			if($char == 'tr') { 
				$str .= '<tr><td colspan="'.$col_span.'">&nbsp;</td></tr>';
			} 
			else 
				$str .= $char;
		}
	}

	return $str;
}