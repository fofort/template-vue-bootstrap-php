<?php

try{
	$pdo = new PDO('sqlite:'.dirname(__FILE__).'/database.sqlite');
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ERRMODE_WARNING | ERRMODE_EXCEPTION | ERRMODE_SILENT
} catch(Exception $e) {
	echo "Impossible d'accéder à la base de données SQLite : ".$e->getMessage();
	die();
}


$pdo->query("CREATE TABLE IF NOT EXISTS 'time_tracking' (
	'id' INTEGER AUTO_INCREMENT,
	`id_user` INTEGER DEFAULT NULL,
	`id_type_tracking` INTEGER DEFAULT NULL,
	`start_at` DATETIME DEFAULT NULL,
	`end_at` DATETIME DEFAULT NULL,
	`created_at` DATETIME DEFAULT NULL,
	PRIMARY KEY(`id`)
);");

$pdo->query("CREATE TABLE IF NOT EXISTS `user` (
	`id_user` INTEGER  AUTO_INCREMENT,
	`uuid` VARCHAR(50) DEFAULT NULL,
	`lastname` VARCHAR(50) DEFAULT NULL,
	`firstname` VARCHAR(50) DEFAULT NULL,
	`email` VARCHAR(255) DEFAULT NULL,
	`nickname` VARCHAR(50) DEFAULT NULL,
	`password` VARCHAR(255) DEFAULT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY(`id_user`)
);");
$pdo->query("CREATE TABLE IF NOT EXISTS `user_basedata` (
	`id_userbasedata` INTEGER  AUTO_INCREMENT,
	`id_user` INTEGER DEFAULT NULL,
	`address` VARCHAR(255) DEFAULT NULL,
	`address_2` VARCHAR(255) DEFAULT NULL,
	`zip` VARCHAR(50) DEFAULT NULL,
	`city` VARCHAR(100) DEFAULT NULL,
	`birthday` DATE DEFAULT NULL,
	`created_at` DATETIME DEFAULT NULL,
	`updated_at` DATETIME DEFAULT NULL,
	PRIMARY KEY(`id_userbasedata`)
);");
$pdo->query("CREATE TABLE IF NOT EXISTS `token` (
	`id` INTEGER  AUTO_INCREMENT UNIQUE,
	`id_user` INTEGER,
	`token` VARCHAR(100),
	`expire_at` INTEGER COMMENT 'expire timestamp',
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY(`id`)
);");
$pdo->query("CREATE TABLE IF NOT EXISTS `tracking_type` (
	`id` INTEGER  AUTO_INCREMENT UNIQUE,
	`name` VARCHAR(100),
	PRIMARY KEY(`id`)
);
");

/*
$pdo->query("CREATE TABLE IF NOT EXISTS posts ( 
	id            INTEGER         PRIMARY KEY AUTOINCREMENT,
	titre         VARCHAR( 250 ),
	created       DATETIME
);");
$stmt = $pdo->prepare("INSERT INTO posts (titre, created) VALUES (:titre, :created)");
$result = $stmt->execute(array(
	'titre'			=> "Lorem ipsum",
	'created'		=> date("Y-m-d H:i:s")
));
$stmt = $pdo->prepare("SELECT * FROM posts WHERE titre = :titre");
$stmt->execute(array('titre' => 'Lorem ipsum'));
$result = $stmt->fetchAll();
print_r($result);
*/
?>