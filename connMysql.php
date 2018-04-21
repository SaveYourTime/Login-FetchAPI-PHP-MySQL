<?php
// 資料庫主機設定
$db_host = "127.0.0.1"; // 資料庫主機名稱
$db_name = "testDB"; // 資料庫名稱
$db_username = "root"; // 資料庫使用者名稱
$db_password = ""; // 資料庫密碼
// Connect to Database
$db_link = new mysqli($db_host, $db_username, $db_password, $db_name);
// 錯誤處理
if ($db_link->connect_error !== null) {
    $data["status"] = -2;
    $data["message"] = "Connection failed!";
    return json_encode($data);
} else {
    // 設定字元集與編碼
    $db_link->set_charset("utf8mb4");
}
