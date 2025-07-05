<?php
header('Content-Type: application/json; charset=utf-8');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405); exit;
}

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['msg']) || !$data['msg']) {
  echo json_encode(['ok'=>false, 'error'=>'no message']); exit;
}

// Переменные ТГ
$token = '7503306058:AAE9Nu2PujufqPpFQtHj9WBYsfGhvz1ECHE';
$chat_id = '-1002526358815';

// Делаем строку строго в UTF-8 и без лишних символов
$msg = (string)$data['msg'];
$msg = mb_convert_encoding($msg, 'UTF-8', 'auto'); // just in case

$url = "https://api.telegram.org/bot$token/sendMessage";
$params = [
  'chat_id' => $chat_id,
  'text' => $msg,
  'parse_mode' => 'HTML'
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$out = curl_exec($ch);
$err = curl_errno($ch);
curl_close($ch);

if ($err) {
  echo json_encode(['ok'=>false, 'error'=>'cURL error']);
} else {
  echo $out;
}