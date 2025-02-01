<?php
// フォームからのデータを受け取る
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// 保存先のCSVファイルのパス
$file = 'contact_messages.csv';

// 現在の日時を取得
$date = date('Y-m-d H:i:s');

// フォームのデータをCSVフォーマットに整形
$data = array($date, $name, $email, $message);

// ファイルが存在しない場合はヘッダーを追加
if (!file_exists($file)) {
    $header = array('日時', 'お名前', 'メールアドレス', 'お問い合わせ内容');
    $fileHandle = fopen($file, 'w');
    fputcsv($fileHandle, $header);
    fclose($fileHandle);
}

// CSVファイルにデータを追加
$fileHandle = fopen($file, 'a');
fputcsv($fileHandle, $data);
fclose($fileHandle);

// 送信完了後、ユーザーに確認メッセージを表示
echo "<h2 class='text-center'>お問い合わせありがとうございます。</h2>";
echo "<p class='text-center'><a href='index.html'>ホームに戻る</a></p>";

?>
