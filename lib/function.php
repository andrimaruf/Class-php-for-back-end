<?php
if ( !defined('BASEPATH') ) exit('No direct script access allowed');

function redirect($url){
	ob_start();
	if ( headers_sent() ){
		die('<script type="text/javascript">window.location.href="' . $url . '";</script>');
	} else {
		header("Location: $url");
		exit;
	}
	ob_end_flush();
}

function enquee_script($script, $url, $position='header'){
	$scripts[$script] = array(
		'name' => $script,
		'html' => '<script type="text/javascript" src="' . $url . '"></script>',
		'position' => $position
	);
}

function add_footer(){
	if(!empty($scripts)){
		foreach ($scripts as $k => $v) {
			echo $v['html'];
		}
	}
}

function is_page($page){
	$curr = str_replace(".php", "", basename($_SERVER["SCRIPT_NAME"]));
	if( $page != $curr ){
		return false;
	} else {
		return true;
	}
}

function encrypt_nonce( $str ){
	$coo = (!empty($_COOKIE['AVADM'])) ? $_COOKIE['AVADM'] : '';
	if($coo != ''){
		$char = $coo;
		$enc = sha1(sha1($char) . $str); 
		return substr($enc, 10, 20);
	} else {
		return false;
	}
}

function create_nonce($str, $name = 'nonce_'){
	echo '<input type="hidden" name="' . $name . '" value="' . encrypt_nonce( $str ) . '">';
}

function verify_nonce($str, $nonce){
	if(!encrypt_nonce($str)){
		exit('You need verification code for make request to this page!');
	} else {
		if( encrypt_nonce($str) != $nonce ){
			exit('Your verification code is invalid!');
		} else {
			return true;
		}
	}
}

function alertMsg($msg, $type = 'danger', $icon = 'ban'){
	$html  = '<div class="alert alert-' . $type . ' alert-dismissable">';
	$html .= '<i class="fa fa-' . $icon . '"></i>';
	$html .= '<button class="close" aria-hidden="true" data-dismiss="alert" type="button">&times;</button>';
	$html .= $msg;
	$html .= '</div>';
	return $html;
}

function msglog($msg, $type=""){
	if($type == ""){
		$typ = 'danger alert-dismissable';
	} else {
		$typ = $type;
	}
	$error = '<div class="alert alert-' . $typ . '"><a href="#" data-dismiss="alert" class="close"><i class="icon-remove"></i></a> ' . $msg . '</div>';
	return $error;
}
