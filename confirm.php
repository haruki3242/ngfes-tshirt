<?php
// セッションを開始する
session_start();

// 必要な設定を含むファイルを読み込む
require_once 'config.php';

// データベース接続を確立する
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// データベース接続エラーの確認
if ($conn->connect_error) {
    die("データベース接続エラー: " . $conn->connect_error);
}
$student_number = htmlspecialchars($_POST['student-number']);
// プリペアドステートメントを準備する
$stmt = $conn->prepare("SELECT * FROM students WHERE student_number = ?");
if (!$stmt) {
    die("プリペアドステートメントの準備中にエラーが発生しました: " . $conn->error);
}

// パラメータをバインドする
$stmt->bind_param("s", $student_number); // "s" は文字列を意味します

// プリペアドステートメントを実行する
$stmt->execute();

// 結果を取得する
$result = $stmt->get_result();

//ここ要注意です
$colorNames = array(
    'a' => 'ホワイト',
    'b' => 'ベビーピンク',
    'c' => 'ライトブルー',
    'd' => 'ロイヤルブルー',
    'e' => 'ブラック'
);

// POSTリクエストの処理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 入力値の取得とサニタイズ
    $student_number = htmlspecialchars($_POST['student-number']);
    $email = htmlspecialchars($_POST['email']);
    $size = htmlspecialchars($_POST['size-select']);
    $count = htmlspecialchars($_POST['count-select']);
    $colors = array(); // カラーの配列

    // カラーを取得
    for ($i = 1; $i <= $count; $i++) {
        $colorKey = 'color' . $i;
        $color = htmlspecialchars($_POST[$colorKey]);
        $colors[$i] = $color;
    }

    // 二重送信防止用トークンの発行
    $token = uniqid('', true);

    // トークンをセッション変数にセット
    $_SESSION['token'] = $token;

    // 入力された情報をセッションに保存
    $row = $result->fetch_assoc(); // 最初の行のデータを取得
    $_SESSION['name'] = $row['name'];
    $_SESSION['name_kana'] = $row['name_kana'];
    $_SESSION['student_number'] = $student_number;
    $_SESSION['email'] = $email;
    $_SESSION['size'] = $size;
    $_SESSION['count'] = $count;
    $_SESSION['colors'] = $colors;
}

$result->close();
$stmt->close();

// データベース接続をクローズする
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>確認ページ</title>
  <meta name="viewport" content="width=device-width">
  <link rel="icon" href="icon2023.ico">
  <link rel="stylesheet" href="./new.css">
  <link rel="stylesheet" href="./confirm.css">
  <style>
    .text {
      font-size: 18px;
    }
  </style>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-53HN6Y2T88"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-53HN6Y2T88');
  </script>

</head>
<body>
<div class="form-wrapper">
  <h1>確認ページ</h1>
  <br><h2>内容を確認してください</h2><br>

    <label class="confirm-item">名前</label><br><p>
        <div class="text"><?php echo htmlspecialchars($_SESSION['name']); ?></div>
        <br>

    <label class="confirm-item">名前（ひらがな）</label><br> <p>
        <div class="text"><?php echo htmlspecialchars($_SESSION['name_kana']); ?></div>
        <br>

    <label class="confirm-item">メールアドレス</label><br>
    <div class="text"><?php echo htmlspecialchars($_SESSION['email']); ?></div>
    <br>

  <label class="confirm-item">サイズ</label><br>
  <div class="text"><?php echo htmlspecialchars($_SESSION['size']); ?></div>
  <br>

      <label class="confirm-item">カラー・枚数</label>
      <div class="text">合計:<?php echo htmlspecialchars($_SESSION['count']); ?>枚
    <?php for ($i = 1; $i <= $_SESSION['count']; $i++): ?>
      <p><?php echo $i; ?>枚目のカラー： <?php echo $colorNames[$colors[$i]]; ?></p>
    <?php endfor; ?>
      </div>
  <!-- その他の表示したい情報 -->

<div class="button-panel">
  <form action="complete.php" method="POST">
    <!-- 必要なフォームの追加 -->
    <input type="hidden" name="token" value="<?php echo $token;?>">
    <input type="submit" class="button" id="submit-button" value="この内容で予約する"> <p> <br>
</form>
</div>
  <div class="form-footer">
<p><a href="">名前が違う・表示されない場合はこちら</a></p><br><p></p>
    <p>&copy; 2023 奈良学園中学校・高等学校 文化祭実行委員会</p>
  </div>
</div>
</body>
</html>
