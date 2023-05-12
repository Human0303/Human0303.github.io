<?php
$message = $_POST["message"];

$data = array(
    "model" => "gpt-3.5-turbo",
    "messages" => array(
        array("role" => "system", "content" => "You are a helpful assistant."),
        array("role" => "user", "content" => $message)
    )
);

$dataString = json_encode($data);

$ch = curl_init('https://api.openai.com/v1/chat/completions');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer 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' // 将 YOUR_API_KEY 替换为您的 ChatGPT API 密钥
));

$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>