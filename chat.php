<?php
header('Content-Type: application/json');


header("Content-Type: application/json");
$input = json_decode(file_get_contents("php://input"), true);
$message = $input["message"] ?? "";

// 🔑 ใส่ API Key ของคุณตรงนี้
// $apiKey = "YOUR_OPENAI_API_KEY";
// ใส่ API Key ของคุณ
$apiKey = "";

$ch = curl_init("https://api.openai.com/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $apiKey"
]);
// ขึ้นบรรทัดใหม่เพื่อให้อ่านง่ายขึ้น
$message = trim($message);  // ตัดช่องว่างด้านหน้าหรือด้านหลังของข้อความ

// ส่งข้อความไปยัง API
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    "model" => "gpt-4o-mini",  // รุ่นที่ประสิทธิภาพดีและราคาคุ้มค่า
    "messages" => [
        [
            "role" => "system", 
            "content" => "ช่วยวิเคราะห์อาการโรคผิวหนังในสุนัขและแมว เช่น ขนเปราะ หักง่าย หรือบางผิดปกติ อธิบายสาเหตุที่เป็นไปได้ (เชื้อรา แบคทีเรีย หรือภูมิแพ้) พร้อมคำแนะนำเบื้องต้นในการดูแล โดยให้ตอบเป็นภาษาไทย แบบสั้น กระชับ และแบ่งบรรทัดให้อ่านง่าย"
        ],
        [
            "role" => "user", 
            "content" => $message
        ]
    ]
]));




$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);
echo json_encode([
    "reply" => $data["choices"][0]["message"]["content"] ?? "❌ เกิดข้อผิดพลาด"
]);

?>