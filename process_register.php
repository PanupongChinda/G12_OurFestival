<?php
// ตั้งค่า Timezone ให้เป็นไทย
date_default_timezone_set('Asia/Bangkok');

// ตรวจสอบว่ามีการส่งข้อมูลมาหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // รับค่าจากฟอร์ม
    $newData = [
        'name' => htmlspecialchars($_POST['name']),
        'email' => htmlspecialchars($_POST['email']),
        'phone' => htmlspecialchars($_POST['phone']),
        'ticket' => htmlspecialchars($_POST['ticket']),
        'timestamp' => date('Y-m-d H:i:s')
    ];

    $file = 'data/registrations.json';

    // ตรวจสอบไฟล์เดิม
    if (file_exists($file)) {
        $currentData = json_decode(file_get_contents($file), true);
    } else {
        $currentData = [];
    }

    // เพิ่มข้อมูลใหม่
    $currentData[] = $newData;

    // บันทึกไฟล์ (รองรับภาษาไทย)
    if(file_put_contents($file, json_encode($currentData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
        // บันทึกสำเร็จ -> กลับไปหน้า register พร้อมสถานะ success
        header("Location: register.html?status=success");
    } else {
        echo "Error saving data. Please check folder permissions.";
    }
}
?>