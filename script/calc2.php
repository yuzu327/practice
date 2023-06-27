<?php
    // Content-TypeをJSONに指定する
    header('Content-Type: application/json');

    $list2 = (string)filter_input(INPUT_POST, 'list2');
    //mysqlから自分側の種族値を取得
    $name = "\"".$list2."\"";
    try{
        $db = new PDO('mysql:dbname=poke_cal;host=localhost;charset=utf8','root','');
        //echo "接続OK！" . "<br>";
    }catch(PDOException $e) {
        //echo 'DB接続エラー！: ' . $e->getMessage();
    }
    $SQL = "select * from base_status where name = $name";
    //echo $SQL."<br>";
    $stmt = $db->query($SQL);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode(compact('result'));
?>
