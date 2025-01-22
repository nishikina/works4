<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "survey_db";

// 接続を作成する
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続をチェックする
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// フォームデータを取得する
$gender = $_POST['gender'];
$age_group = $_POST['age_group'];
$prefecture = $_POST['prefecture'];
$satisfaction = $_POST['satisfaction'];
$quality = $_POST['quality'];
$toothbrush_experience = isset($_POST['toothbrush_experience']) ? implode(", ", $_POST['toothbrush_experience']) : '';
$impression_change = $_POST['impression_change'];
$email = $_POST['email'];  // 追加
$feedback = $_POST['feedback'];

// データをテーブルに挿入する
$sql = "INSERT INTO survey_responses (gender, age_group, prefecture, satisfaction, quality, toothbrush_experience, impression_change, email, feedback)
VALUES ('$gender', '$age_group', '$prefecture', '$satisfaction', '$quality', '$toothbrush_experience', '$impression_change', '$email', '$feedback')";

if ($conn->query($sql) === TRUE) {
    // データ挿入成功時の表示
    echo <<<HTML
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アンケート送信完了</title>
    <link rel="stylesheet" href="css/submit_survey.css">
</head>
<body>
    <div class="container">
        <h1>アンケート送信完了</h1>
        <p>ご協力ありがとうございました。</p>
        <a href="index.html" class="button">戻る</a>
    </div>
</body>
</html>
HTML;
} else {
    // エラー時の表示
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
