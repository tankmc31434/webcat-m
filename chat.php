<?php
header('Content-Type: application/json');


header("Content-Type: application/json");
$input = json_decode(file_get_contents("php://input"), true);
$message = $input["message"] ?? "";

// 🔑 ใส่ API Key ของคุณตรงนี้
// $apiKey = "YOUR_OPENAI_API_KEY";
// ใส่ API Key ของคุณ
$apiKey = "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";

$ch = curl_init("https://api.openai.com/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $apiKey"
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    "model" => "gpt-4o-mini",  // รุ่นเร็ว ราคาถูก
    "messages" => [
        ["role" => "system", "content" => "คุณคือผู้ช่วยค้นหาข้อมูลทั่วไป ตอบสั้น กระชับ และเป็นภาษาไทย"],
        ["role" => "user", "content" => $message]
    ]
]));

$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);
echo json_encode([
    "reply" => $data["choices"][0]["message"]["content"] ?? "❌ เกิดข้อผิดพลาด"
]);

?>