<?php
// استقبال بيانات التقييم من النموذج
$bookTitle = $_POST['bookTitle'];
$visitorRating = $_POST['visitorRating'];

// قراءة محتوى ratings.json
$file = 'ratings.json';
$current = file_get_contents($file);

// تحويل المحتوى إلى مصفوفة PHP
$ratings = json_decode($current, true);

// إضافة التقييم الجديد إلى المصفوفة
$ratings[] = array('bookTitle' => $bookTitle, 'visitorRating' => $visitorRating);


// تحويل المصفوفة إلى JSON
$newJsonString = json_encode($ratings);

// كتابة المحتوى إلى ملف ratings.json
file_put_contents($file, $newJsonString);

// إرسال رد الاستجابة
echo json_encode(array('success' => true));
?>
