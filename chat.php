<?php
header('Content-Type: application/json');

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function save_log($name, $text) {
	$filename = 'user_data_log.txt';
	$somecontent = get_client_ip()."&#".$name."&#".$text."\r\n";
	if (is_writable($filename)) {
    if (!$handle = fopen($filename, 'a')) {
        // echo json_encode(array("time"=>0));
         exit;
    }
		// Write $somecontent to our opened file.
		if (fwrite($handle, $somecontent) === FALSE) {
		//	echo json_encode(array("time"=>0));
			exit;
		}

		//echo json_encode(array("time"=>$time));

		fclose($handle);

	} else {
		// echo json_encode(array("time"=>0));
	}
}

function save_ban($ip) {
	$filename = 'ban.txt';
	$somecontent = $ip."\r\n";
	if (is_writable($filename)) {
    if (!$handle = fopen($filename, 'a')) {
        // echo json_encode(array("time"=>0));
         exit;
    }
		// Write $somecontent to our opened file.
		if (fwrite($handle, $somecontent) === FALSE) {
		//	echo json_encode(array("time"=>0));
			exit;
		}

		//echo json_encode(array("time"=>$time));

		fclose($handle);

	} else {
		// echo json_encode(array("time"=>0));
	}
}

function list_log() {
	if ($file = fopen("user_data_log.txt", "r")) {
    while(!feof($file)) {
        $line = fgets($file);
		if($line){
        $data = explode("&#",$line);
			$id = $data[0];
			$name = $data[1];
			$mess = $data[2];
			echo $id." ".$name."\r\n";
		}
    }

    fclose($file);
	
	// file_put_contents("chat_data.txt", "");
}
}

if(isset($_GET['log'])) { 
	if($_GET['log'] == 1) list_log(); else file_put_contents("ban.txt", "");
}

if(isset($_GET['name']) && isset($_GET['text'])) {
	$name = $_GET['name'];
	$text = $_GET['text'];
	save_log($name,$text);
	$filename = 'chat_data.txt';
	$time = time();
	
	if($text == "/clear") {
		file_put_contents("chat_data.txt", "");
		$somecontent = "&#1&#ClearScreen&#{$time}\r\n";
	} else if($text == "/clearvc") {
		file_put_contents("voucher.txt", "");
		$somecontent = "&#1&#ClearVoucher&#{$time}\r\n";
	} else if($text == "/clearlog") {
		file_put_contents("user_data_log.txt", "");
		$somecontent = "&#1&#ClearLog&#{$time}\r\n";
	} else if(strpos($text,"/ban") !== false) {
		$sip = explode(" ",$text)[1];
		save_ban($sip);
		$somecontent = "&#{$time}&#Banned&#{$sip}\r\n";
	} else $somecontent = "&#{$time}&#{$name}&#{$text}\r\n";

if (is_writable($filename)) {
    if (!$handle = fopen($filename, 'a')) {
         echo json_encode(array("time"=>0));
         exit;
    }

    // Write $somecontent to our opened file.
    if (fwrite($handle, $somecontent) === FALSE) {
        echo json_encode(array("time"=>0));
        exit;
    }

    echo json_encode(array("time"=>$time));

    fclose($handle);

} else {
    echo json_encode(array("time"=>0));
}
}

if(isset($_GET['name']) && isset($_GET['login'])) {
	$name = $_GET['name'];
	$login = $_GET['login'];
	$filename = 'chat_data.txt';
	$time = time();
	$somecontent = "&#1&#{$name}&#{$time}\r\n";
	
	if (is_writable($filename)) {
    if (!$handle = fopen($filename, 'a')) {
         echo json_encode(array("time"=>0));
         exit;
    }

    // Write $somecontent to our opened file.
    if (fwrite($handle, $somecontent) === FALSE) {
        echo json_encode(array("time"=>0));
        exit;
    }
	
    if(($name != "Banned") && ($name != "Lazada") && ($name && "Admin")) echo json_encode(array("time"=>$time, "name"=>$name));

    fclose($handle);

} else {
    echo json_encode(array("time"=>0));
}
	
}

if(isset($_GET['voucherID']))
{
	$voucherID = $_GET['voucherID'];
	$nameVoucher = $_GET['nameVoucher'];
	$priceVoucher = $_GET['priceVoucher'];
	$descVoucher = $_GET['descVoucher'];
	$expVoucher = $_GET['expVoucher'];
	$linkVoucher = $_GET['linkVoucher'];
	$time = time();
	
	 // file_put_contents("voucher.txt", "");
	$filename = 'voucher.txt';
	$somecontent = "{$voucherID}&#{$nameVoucher}&#{$priceVoucher}&#{$descVoucher}&#{$expVoucher}&#{$linkVoucher}\r\n";
	
	if (is_writable($filename)) {
    if (!$handle = fopen($filename, 'a')) {
         echo json_encode(array("time"=>0));
         exit;
    }

    // Write $somecontent to our opened file.
    if (fwrite($handle, $somecontent) === FALSE) {
        echo json_encode(array("time"=>0));
        exit;
    }
	

    echo json_encode(array("time"=>1));

    fclose($handle);

	} else {
		echo json_encode(array("time"=>0));
	}
		
	
	
	
}

?>