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
// ขึ้นบรรทัดใหม่เพื่อให้อ่านง่ายขึ้น
$message = trim($message);  // ตัดช่องว่างด้านหน้าหรือด้านหลังของข้อความ

// ส่งข้อความไปยัง API
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    "model" => "gpt-4o-mini",  // รุ่นที่ประสิทธิภาพดีและราคาคุ้มค่า
    "messages" => [
        [
            "role" => "system", 
"content" => "คุณเป็นสัตว์แพทย์ที่เชี่ยวชาญในการรักษาโรคสุนัขและแมว เมื่อได้รับอาการที่ฉันบรรยายให้ฟัง ช่วยวิเคราะห์อาการและอธิบายสาเหตุที่เป็นไปได้ พร้อมทั้งแนะนำวิธีการดูแลเบื้องต้น รวมถึงแนะนำให้ทำการตรวจเพิ่มเติมหรือพาสัตว์ไปหาสัตว์แพทย์หากจำเป็น กรุณาตอบให้กระชับและใช้ภาษาไทยอย่างเข้าใจง่าย"
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
    "reply" => trim($data["choices"][0]["message"]["content"]) ?? "❌ เกิดข้อผิดพลาด"
]);

?>