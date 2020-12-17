<?php
// var_dump($_POST);
// exit();


$todo = $_POST["todo"]; // データ受け取り
$deadline = $_POST["deadline"];
$write_data = "{$deadline} {$todo}\n"; // スペース区切りで最後に改行
$file = fopen('data/todo.txt', 'a'); // ファイルを開く 引数はa
flock($file, LOCK_EX); // ファイルをロック
fwrite($file, $write_data); // データに書き込み，
flock($file, LOCK_UN); // ロック解除
fclose($file); // ファイルを閉じる
header("Location:todo_txt_inp.php"); // 入力画面に移動    