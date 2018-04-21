<?php
header("Content-Type: text/html, application/json; charset=utf-8;");
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
require "cmd_lib.php";

$input = json_decode(file_get_contents("php://input"));

switch($_REQUEST["func"])
{
	case "login":
		$data = login($input->account, $input->password);
		break;
	case "signUp":
		$data = signUp($input->account, $input->password);
		break;
}
echo $data;
?>
