<?php
session_start();
header("Content-Type: text/html, application/json; charset=utf-8;");

// 回傳狀態：1(成功執行), -1(數據接收錯誤), -2(資料庫連線錯誤), -3(資料庫查無資料), -4(資料庫無符合的資料), -5(資料重複), -6(寫入資料庫失敗)

function login($account, $password) {
	// 連線資料庫
	require_once("connectMysql.php");
	// 準備SQL
	$sql_prepare = 'SELECT * FROM `account`';
	// 執行SQL
	$sql_query = $db_link->query($sql_prepare);
	if ($sql_query) {
		//$result = $sql_query->fetchAll(PDO::FETCH_ASSOC);
		foreach($sql_query as $row) {
			$getAccount = $row['user_account'];
			$getPassword = $row['user_password'];
			if ($getAccount===$account && $getPassword===$password) {
				$data["status"] = 1;
				$db_link = NULL;
				return json_encode($data);
			}
		}
		// 資料庫無符合的資料
		$data["status"] = -4;
		$db_link = NULL;
		return json_encode($data);
	} else {
		// 資料庫查無資料
		$data["status"] = -3;
		$db_link = NULL;
		return json_encode($data);
	}
}
function signUp($account, $password) {
	// 連線資料庫
	require_once("connectMysql.php");
	// 準備SQL
	$sql_prepare = $db_link->prepare('INSERT INTO `account` (`user_account`, `user_password`) VALUES (?, ?)');
	//$sql_prepare = $db_link->prepare('INSERT INTO `account` (`user_account`, `user_password`) VALUES (:user_account, :user_password)');
	// 執行SQL
	$sql_execute = $sql_prepare->execute(array($account, $password));
	//$sql_execute = $sql_prepare->execute(array(':user_account' => $account, ':user_password' => $password));
	// 寫入資料庫成功
	if ($sql_execute) {
		$data["status"] = 1;
		$db_link = NULL;
		return json_encode($data);
	} else {
		// 寫入資料庫失敗
		$data["status"] = -6;
		$db_link = NULL;
		return json_encode($data);
	}
}
?>
