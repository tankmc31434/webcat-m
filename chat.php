<?php
header('Content-Type: application/json');

// ใส่ API Key ของคุณ
$apiKey = "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";

// รับข้อมูล JSON จาก frontend
$inputJSON = file_get_contents('php://input');
$inputData = json_decode($inputJSON, true);

// ตรวจสอบว่ามีข้อความส่งมาจริงหรือไม่
$message = trim($inputData['message'] ?? '');
if (!$message) {
    echo json_encode(['reply' => 'ไม่มีข้อความ']);
    exit;
}

// เตรียมข้อมูลสำหรับ Responses API
$data = [
    "model" => "gpt-4.1-mini",  // เลือกรุ่นตามต้องการ
    "input" => $message
];

$ch = curl_init("https://api.openai.com/v1/responses");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $apiKey"
]);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo json_encode(['reply' => 'Error: ' . curl_error($ch)]);
    exit;
}
curl_close($ch);

// แปลง JSON และดึงข้อความอย่างปลอดภัย
$response = json_decode($result, true);
$reply = 'ไม่พบคำตอบ';

// ตรวจสอบโครงสร้าง output
if (isset($response['output']) && is_array($response['output'])) {
    foreach ($response['output'] as $item) {
        if (isset($item['content']) && is_array($item['content'])) {
            foreach ($item['content'] as $content) {
                if (isset($content['text'])) {
                    $reply .= $content['text'];
                }
            }
        }
    }
}

// ส่งกลับไป frontend
echo json_encode(['reply' => $reply]);
?>
