<?php
$str_json = file_get_contents("php://input");
$plantAction = json_decode($str_json);
var_dump($str_json);
