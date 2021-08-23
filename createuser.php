<?php
session_start();

error_reporting(-1);
ini_set('display_errors','On');
define('CONFIG_DIR',__DIR__.'/config');
require __DIR__.'/functions/database.php';

$username = "1";
$password = password_hash("1", PASSWORD_DEFAULT);

$sql ="INSERT INTO user SET
username='".$username."',
password='".$password."'";

$statement = getDB()->exec($sql);
if(!$sql){
    echo getDBErrorMessage();
}