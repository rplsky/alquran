<?php
require_once dirname(__FILE__)."/Config/config.php";
require_once dirname(__FILE__)."/Config//quran.php";

$quran = new Quran($serverName, $port, $username, $password, $databaseName, $tableAyat, $tableTranslation);
$quran->connect();

$quran->createNumber();

