<?php
    // 資料庫主機設定
    $dbms = "mysql";                // 資料庫管理系統
    $db_host = "127.0.0.1";         // 資料庫主機名稱
    $db_name = "testDB";            // 資料庫名稱
    $db_username = "root";          // 資料庫使用者名稱
    $db_password = "";              // 資料庫密碼
    $db_charset = "charset=utf8";   // 字元集與編碼
    $dsn = "{$dbms}:host={$db_host}; dbname={$db_name}; {$db_charset}"; // 資料庫來源名稱

    try {
        // Connect to Database
        $db_link = new PDO($dsn, $db_username, $db_password);
    } catch (PDOException $e) {
        $data["status"] = -2;
		$data["message"] = "Connection failed!";
		return json_encode($data);
    }
?>
