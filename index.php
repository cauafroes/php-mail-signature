<?php

include 'vendor/autoload.php';

use Froes\Autosignature\AutoSignature;

$data['name'] = $_POST['name'] ?? null;
$data['work'] = $_POST['funcao'] ?? null;
$data['email'] = $_POST['email'] ?? null;
$data['phone'] = $_POST['phone'] ?? null;
$data['pass'] = $_POST['pass'] ?? null;

if (empty($data['name']) || empty($data['work']) || empty($data['email']) || empty($data['phone'])) {
	include __DIR__.'/src/form.html';
	return;
}

if ($data['pass'] != 'Clubers@2023') {
	echo 'Senha incorreta!';
	exit;
}

if(session_status() === PHP_SESSION_NONE) session_start();

$img = (new AutoSignature($data['name'], $data['work'], $data['email'], $data['phone']))->genSignature();

header('Location: /view_signature.php?img='.$img.'.jpeg');
