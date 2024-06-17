<?php

include '../vendor/autoload.php';

use Dotenv\Dotenv;
use Froes\Autosignature\AutoSignature;

$data['name'] = $_POST['name'] ?? null;
$data['work'] = $_POST['funcao'] ?? null;
$data['email'] = $_POST['email'] ?? null;
$data['phone'] = $_POST['phone'] ?? null;
$data['pass'] = $_POST['pass'] ?? null;

//alterar aqui o local da env.
$dir = (__DIR__.'/../');
echo $dir;

$dotenv = Dotenv::createImmutable($dir);
$dotenv->safeLoad();
$dotenv->required('PASSWORD')->notEmpty();

if (empty($data['pass']) || $data['pass'] != $_ENV['PASSWORD']) {
    header("Status: 301 Moved Permanently");
    header('Location: form.php'.'?error=1');
    return;
}

if (empty($data['name']) || empty($data['work']) || empty($data['email']) || empty($data['phone'])) {
	header('Location: form.php');
	return;
}

if(session_status() === PHP_SESSION_NONE) session_start();

$img = (new AutoSignature($data['name'], $data['work'], $data['email'], $data['phone']))->genSignature();

header('Location: view_signature.php?img='.$img.'.jpeg');
