<?php
// 単語のリスト
$dbc=mysqli_connect("localhost","root","") or die("MySQL接続失敗: ".mysqli_error());
mysqli_select_db($dbc,"poke_cal") or die("データベース選択失敗: ".mysqli_error());
// SQL文生成
$sql="SELECT name FROM base_status";

// クエリ送信
$res=mysqli_query($dbc, $sql) or die("クエリ失敗: ".mysqli_error());

// リスト取得
$list = array();
while ($row = mysqli_fetch_array($res)) {
    $list[] = $row['name'];
}

$words = array();
 
// 現在入力中の文字を取得
$term = (isset($_GET['term']) && is_string($_GET['term'])) ? $_GET['term'] : '';
// 全角カナに変換
$term = mb_convert_kana($term, "KVC");
 
// 部分一致で検索
foreach($list as $word){
    if(mb_stripos( $word, $term) !== FALSE){
        $words[] = $word;
    }   
}

header("Content-Type: application/json; charset=utf-8");
echo json_encode($words);
