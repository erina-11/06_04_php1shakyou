<?php
// ファイル読み込み操作の流れ
$str = ''; // 出力用の空の文字列
$file = fopen('data/todo.txt', 'r'); // ファイルを開く（読み取り専用）
flock($file, LOCK_EX); // ファイルをロック
if ($file) {
    while ($line = fgets($file)) { // fgets()で1行ずつ取得→$lineに格納
        $str .= "<tr><td>{$line}</td></tr>"; // 取得したデータを$strに入れる
    }
}
flock($file, LOCK_UN); // ロック解除
fclose($file); // ファイル閉じる
// （$strに全部の情報が入る！）


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>textファイル書き込み型todoリスト（一覧画面）</title>
</head>

<body>
    <fieldset>
        <legend>textファイル書き込み型todoリスト（一覧画面）</legend>
        <a href="todo_txt_inp.php">入力画面</a>
        <table>
            <thead>
                <tr>
                    <th>todo</th>
                </tr>
            </thead>
            <tbody>
                <?= $str ?>
            </tbody>
        </table>
    </fieldset>
</body>

</html>