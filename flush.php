<?php

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

if ($file = fopen("voucher.txt", "r")) {
    while(!feof($file)) {
        $line = fgets($file);
		if($line){
        $data = explode("&#",$line);
			$voucherid = $data[0];
			$name = $data[1];
			$priceValue = $data[2];
			$desc = $data[3];
			$exp = $data[4];
			$link = $data[5];
			$voucherData = json_encode(array("name"=> $name, "pricevalue" => $priceValue, "desc" => $desc, "exp" => $exp, "link" => $link));
			// $voucherData = trim(preg_replace('/\s\s+/', ' ', $voucherData));
			$jsonData = json_encode(array("time"=>$voucherid,"name"=>"voucher","text"=>trim(preg_replace('/\s\s+/', ' ', $voucherData))));
			
		} else echo "data: ".json_encode(array("time"=>0)). "\n\n";
    }
	if(isset($jsonData)) echo "data: {$jsonData} \n\n";
    fclose($file);
	
	// file_put_contents("chat_data.txt", "");
}

if ($file = fopen("chat_data.txt", "r")) {
    while(!feof($file)) {
        $line = fgets($file);
		if($line){
        $data = explode("&#",$line);
			$time = $data[1];
			$name = $data[2];
			$mess = $data[3];
			$jsonData = json_encode(array("time"=>$time,"name"=>$name,"text"=>trim(preg_replace('/\s\s+/', ' ', $mess))));
			echo "data: {$jsonData} \n\n";
		} else echo "data: ".json_encode(array("time"=>0)). "\n\n";
    }
    fclose($file);
	
	// file_put_contents("chat_data.txt", "");
}



flush();
ob_flush();

?>