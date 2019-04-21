<?php 
function check_file_uploaded_length ($filename) {
    return (bool) ((mb_strlen($filename,"UTF-8") > 225) ? true : false);
}

function check_file_uploaded_name ($filename) {
    (bool) ((preg_match("`^[-0-9A-Z_\.]+$`i",$filename)) ? true : false);
}



?>
