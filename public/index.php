<?php

include '../vendor/autoload.php';

use Froes\Autosignature\AutoSignature;
use JetBrains\PhpStorm\NoReturn;

$data = AutoSignature::validateData();
$companyYamlData = AutoSignature::getYaml($data['pass']);


if(session_status() === PHP_SESSION_NONE) session_start();

try {
    $signature = (new AutoSignature($data, $companyYamlData))->genSignature();

    include_once __DIR__.'/../src/view_html.php';
} catch (\Exception $e) {
    //todo: error handling
    echo $e->getMessage();
    exit();
}

#[NoReturn] function dd($data): void
{
    header('Content-Type: application/json');
    echo json_encode($data);
    exit();
}
