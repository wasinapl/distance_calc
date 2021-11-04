<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
$response = [];


if (isset($_POST['points'])) {
    require_once('./models/Point.php');
    require_once('./models/Distance.php');

    $pointA = new Point($_POST['points']['a']);
    $pointB = new Point($_POST['points']['b']);

    if ($pointA->validate() && $pointB->validate()) {
        $response['ok'] = true;
        $response['result'] = Distance::CalcDistance($pointA, $pointB);
        http_response_code(200);
    } else {
        $response['ok'] = false;
        $response['message'] = 'niepoprawne dane';
        http_response_code(400);
    }
} else {
    $response['ok'] = false;
    $response['message'] = 'brak danych';
    http_response_code(400);
}


echo json_encode($response);
