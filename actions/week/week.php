<?php
require_once dirname(__FILE__) . '/../../autoload.php';

date_default_timezone_set('Asia/Tehran');
$letter = [
    'صفرم!',
    'اول',
    'دوم',
    'سوم',
    'چهارم',
    'پنجم',
    'ششم',
    'هفتم',
    'هشتم',
    'نهم',
    'دهم',
    'یازدهم',
    'دوازدهم',
    'سیزدهم',
    'چهاردهم',
    'پانزدهم',
    'شانزدهم',
    'هفدهم'
];

$letter2 = [
    'صفر',
    'یک',
    'دو',
    'سه',
    'چهار',
    'پنج',
    'شش',
    'هفت',
    'هشت',
    'نه',
    'ده',
    'یازده',
    'دوازده',
    'سیزده',
    'چهارده',
    'پانزده',
    'شانزده',
    'هفده'
];


$a = strtotime('2017/02/18');
if (date('D') == 'Fri'){
    $now = time() + (24 * 60 * 60);
} else{
    $now = time();
}
$b = $a + (60*60*24*7*16);

$odd = (floor( ($now - $a) / 60 / 60 / 24 / 7 ) % 2) ? 'زوج' : 'فرد';
$count = (int)ceil(($now - $a) / 60 / 60 / 24 / 7 );

if (date('D') == 'Fri'){
        $telegram->sendMessage([
            'chat_id' => $data->chat_id,
            'parse_mode' => 'Markdown',
            'text' => "هفته بعد (فردا)، هفته `" . $odd  . "` آموزشی (هفته *". $letter[$count] ."*)" . " خواهد بود." ."\n" .
                      "*" . $letter2[(int)ceil(($b - $now) / 60 / 60 / 24 / 7)] . "*" . ' ' . "هفته تا پایان این ترم مانده‌است . . ."
        ]);
    }else{
        $telegram->sendMessage([
            'chat_id' => $data->chat_id,
            'parse_mode' => 'Markdown',
            'text' => "هفته `" . $odd  . "` آموزشی (هفته *". $letter[$count] ."*)" . "\n" .
                      "*" . $letter2[(int)ceil(($b - $now) / 60 / 60 / 24 / 7)] . "*" . ' ' . "هفته تا پایان این ترم مانده‌است . . ."
        ]);
    }
