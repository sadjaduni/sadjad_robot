﻿<?php
require_once 'autoload.php';
date_default_timezone_set('Asia/Tehran');

$database->insert("users", [
    "id" => $data->user_id,
    "username" => $data->username,
    "first_name" => $data->first_name,
    "last_name" => $data->last_name,
    'date_created' => date("Y-m-d H:i:s")
]);

$database->insert("logs", [
    "user_id" => $data->user_id,
    "text" => $data->text,
    "content" => json_encode(json_decode(file_get_contents('php://input')), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
    'date' => date("Y-m-d H:i:s")
]);

//// for log of server of texts
//$file = 'telegram.txt';
//$current = file_get_contents($file);
//$current .= date ("Y-m-d H:i:s", time()) . ":\n" . json_encode(json_decode(file_get_contents('php://input')), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n";
//file_put_contents($file, $current);

// if ($data->user_id == '96253493' || $data->user_id == '93267971') {

if ($constants->last_message !== null && $data->text != '/start') {

    switch ($constants->last_message) {
        case 'news':
            require_once 'actions/news.php';
            break;
        case 'contact_us':
            require_once 'actions/contact_us.php';
            break;
        case 'student_schedule':
            require_once 'actions/student_schedule.php';
            break;
        case 'student_exams':
            require_once 'actions/student_exams.php';
            break;
        case 'internet_credit':
            require_once 'actions/internet_credit.php';
            break;
        case 'self_service':
            require_once 'actions/self_service.php';
            break;
        case 'location':
            require_once 'actions/location.php';
            break;
        case 'send_all':
            require_once 'actions/send_to_all.php';
            break;
        default:
            require_once 'actions/start.php';
            break;
    }

} else {

    switch ($data->text) {
        case '/start':
            require_once 'actions/start.php';
            break;
        case 'ارسال به همه':
            require_once 'actions/sendtoall.php';
            break;
        case $keyboard->buttons['student_schedule']:
            require_once 'actions/student_schedule.php';
            break;
        case $keyboard->buttons['student_exams']:
            require_once 'actions/student_exams.php';
            break;
        case $keyboard->buttons['profile']:
            require_once 'actions/iprofile.php';
            break;
        case $keyboard->buttons['calender']:
            require_once 'actions/calender.php';
            break;
        case $keyboard->buttons['contact_us']:
            require_once 'actions/contact_us.php';
            break;
        case $keyboard->buttons['news']:
            require_once 'actions/news.php';
            break;
        case $keyboard->buttons['location']:
            require_once 'actions/location.php';
            break;
        case $keyboard->buttons['self_service']:
            require_once 'actions/self_service.php';
            break;
        case $keyboard->buttons['week']:
            require_once 'actions/week.php';
            break;
        case $keyboard->buttons['internet']:
            require_once 'actions/internet_credit.php';
            break;
        default:
            require_once 'actions/start.php';
            break;
    }
}
// }
// else{
//    $telegram->sendPhoto([
//        'chat_id' => $data->chat_id,
//        'photo'=> "AgADBAADlrQxGzW2vAWsPhk7KmkQxZZcaRkABIsU1hv_MAuHVSMCAAEC",
//        'caption' => 'در حال افزودن برنامه امتحانی به بات هستیم . تا ساعت 20 بات در دسترس نمیباشد . . . ',

//    ]);
// }
