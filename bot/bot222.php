file_put_contents(__DIR__ . '/message.txt', $out);
if (!empty($data['message']['text'])) {
	$text = $data['message']['text'];
	$name =  $data['message']['from']['first_name']." ".$data['message']['from']['last_name'];
	echo "$text";
}

if ($text == "/php"){
	$str = "Вы выбрали PHP!";
}
elseif($text == "/js"){
	$str = "Вы выбрали JavaScript!";
}
else {
	$str = "Что Вы хотите выбрать?";
}


$response = array(
	'chat_id' => $data['message']['chat']['id'],
	'text' => "Привет $name! Вы сказали: ".$text.$str
);	
		
$ch = curl_init('https://api.telegram.org/bot' . $token . '/sendMessage');  
curl_setopt($ch, CURLOPT_POST, 1);  
curl_setopt($ch, CURLOPT_POSTFIELDS, $response);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_exec($ch);
curl_close($ch);