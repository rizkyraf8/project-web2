<?php
function hash_password($str){
	$ci =& get_instance();
	
	return md5($ci->config->item('encryption_key').$str.$ci->config->item('encryption_key'));
}

if (!function_exists('getController')) {
	function getController()
	{
		$CI = get_instance();
		$query = $CI->router->fetch_class();
		return $query;
	}
}

if (!function_exists('getFunction')) {
	function getFunction()
	{
		$CI = get_instance();
		$query = $CI->router->fetch_method();
		return $query;
	}
}

if(!function_exists('encode'))
{
	function encode($data="",$pad = NULL)
	{
		$CI = get_instance();
		return urlencode(base64_encode($CI->encryption->encrypt($data)));
		
	}
}

if(!function_exists('decode'))
{
	function decode($data="")
	{
		$CI = get_instance();
		return $CI->encryption->decrypt(base64_decode(rawurldecode($data)));
	}
}

if (!function_exists('konversi_uang')) {
	function konversi_uang($angka="", $rp = false)
	{
		$rpVal = "";
		if ($rp) {
			$rpVal = "Rp ";
		}
		$nominal = $rpVal. number_format($angka,0,',','.');
		return $nominal;
	}
}

if(!function_exists('getListData'))
{
	function getListData($table="", $arr = "")
	{
		$CI = get_instance();
		if($arr != ""){
			$CI->db->where($arr);
		}
		$query = $CI->db->get($table)->result_array();
		return $query;
	}
}

if(!function_exists('getUserType'))
{
	function getUserType($type="")
	{
		$arrTipe = array("user" => "User", "admin" => "Admin");
		if($type == ""){
			return $arrTipe;
		}else{
			return $arrTipe[$type];
		}
	}
}

if(!function_exists('getStatusTransaksi'))
{
	function getStatusTransaksi($type="")
	{
		$arrTipe = array("f" => "Waiting", "p" => "Proses", "t" => "Done", "c" => "Cancel");
		if($type == ""){
			return $arrTipe;
		}else{
			return $arrTipe[$type];
		}
	}
}

if(!function_exists('getStatusBarang'))
{
	function getStatusBarang($type="")
	{
		$arrTipe = array("f" => "Waiting", "h" => "Half", "t" => "Ready", "c" => "Cancel");
		if($type == ""){
			return $arrTipe;
		}else{
			return $arrTipe[$type];
		}
	}
}


?>