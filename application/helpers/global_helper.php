<?php
function hash_password($str){
    $ci =& get_instance();
    
    return md5($ci->config->item('encryption_key').$str.$ci->config->item('encryption_key'));
}

?>