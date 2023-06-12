<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>StatusCalculator</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/script/script.js" charset="UTF-8"></script>
        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css" />
        <!--自分と相手の種族名のオートコンプリート-->
        <script>
        $(function() {
            $("#list").autocomplete({
                source: "/script/autocomplete.php"
            });
            $("#list2").autocomplete({
                source: "/script/autocomplete.php"
            });
        });
        </script>
        <!--彼我の実数値を横並びに-->
        <style type="text/css">
            .flexbox{
             display: flex;
             justify-content: flex-start;
             width: auto;
             height: auto;
             background:#ddd;
             }
             .box-item{
              background:orange;
              text-align: start;
              padding:15px 40px;
              border:5px solid #ddd;
            }
        </style>
    </head>
    <!--種族名入力時に実数値の計算-->
    <body onload="hcalc();acalc();bcalc();ccalc();dcalc();scalc();ehcalc();eacalc();ebcalc();eccalc();edcalc();escalc()">
        <div>
            <?php
            if(isset($_POST["list"])){
                $list = htmlspecialchars($_POST["list"], ENT_QUOTES); 
            }
            if(isset($_POST["list2"])){
                $list2 = htmlspecialchars($_POST["list2"], ENT_QUOTES); 
            }
            ?>
            <form  method="post">
            <!--自分側の種族名を入力-->
            <a>自分のポケモン</a><br>
                <input type="text" name ="list" id="list" value="<?= $list;?>"><br>

            <!--mysqlから自分側の種族値を取得-->
            <?php
            $name1 = "\"".$_POST['list']."\"";
            try{
                $db = new PDO('mysql:dbname=poke_cal;host=localhost;charset=utf8','root','');
                //echo "接続OK！" . "<br>";
            }catch(PDOException $e) {
                //echo 'DB接続エラー！: ' . $e->getMessage();
            }
            $SQL = "select * from base_status where name = $name1";
            //echo $SQL."<br>";
            $stmt = $db->query($SQL);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $name = $result['name'];
                $H_bs = $result['HP'];
                $A_bs = $result['A'];
                $B_bs = $result['B'];
                $C_bs = $result['C'];
                $D_bs = $result['D'];
                $S_bs = $result['S'];
                $type1 = $result['type1'];
                $type2 = $result['type2'];
                $total = $result['total'];
            echo "タイプ1：".$type1."<br>タイプ2：".$type2."<br><br>";
            ?>

            <!--相手側の種族名を入力-->
            <a>相手のポケモン</a><br>
                <input type="text" name ="list2" id="list2" value="<?= $list2;?>"><br>

            <!--mysqlから相手側の種族値を取得-->
            <?php
                $name2 = "\"".$_POST["list2"]."\"";
                try{
                    $db = new PDO('mysql:dbname=poke_cal;host=localhost;charset=utf8','root','');
                    //echo "接続OK！" . "<br>";
                }catch(PDOException $e) {
                    //echo 'DB接続エラー！: ' . $e->getMessage();
                }
                //$SQL = "select * from base_status where name = $name2";
                $SQL = "select * from base_status where name = $name2";
                //echo $SQL."<br>";
                $stmt = $db->query($SQL);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    $eName = $result['name'];
                    $eH_bs = $result['HP'];
                    $eA_bs = $result['A'];
                    $eB_bs = $result['B'];
                    $eC_bs = $result['C'];
                    $eD_bs = $result['D'];
                    $eS_bs = $result['S'];
                    $etype1 = $result['type1'];
                    $etype2 = $result['type2'];
                    $etotal = $result['total'];
            echo "タイプ1：".$etype1."<br>タイプ2：".$etype2."<br>";
            ?>
            <input type="submit" name="" style="display: none;"/>
            </form>

            <!--
            <?php
            echo '<script>console.log('.json_encode($_POST['list']).');</script>';
            echo '<script>console.log('.json_encode($_POST['list2']).');</script>';
            echo '<script>console.log('.json_encode($H_bs).');</script>';
            ?>
            -->

            <div class="flexbox">
                <!--実数値の表示-->
                <div class="box-item">
                <a>実数値</a><br>
                    <a>HP : </a>
			    	<a id="H_real">---</a><br>
                    <a>こうげき : </a>
			    	<a id="A_real">---</a><br>
                    <a>ぼうぎょ : </a>
			    	<a id="B_real">---</a><br>
                    <a>とくこう : </a>
			    	<a id="C_real">---</a><br>
                    <a>とくぼう : </a>
			    	<a id="D_real">---</a><br>
                    <a>すばやさ : </a>
			    	<a id="S_real">---</a><br><br>
    
			    <!--性格のリスト(選択時に実数値更新)-->
			    <a>性格補正</a>
                <select name="nature" id="nature" oninput="hcalc();acalc();bcalc();ccalc();dcalc();scalc()">
                    <option value="0">補正なし</option>
                    <option value="1">さみしがり(A↑B↓)</option>
                    <option value="2">いじっばり(A↑C↓)</option>
                    <option value="3">やんちゃ(A↑D↓)</option>
                    <option value="4">ゆうかん(A↑S↓)</option>
                    <option value="5">ずぶとい(B↑A↓)</option>
                    <option value="6">わんぱく(B↑C↓)</option>
                    <option value="7">のうてんき(B↑D↓)</option>
                    <option value="8">のんき(B↑S↓)</option>
                    <option value="9">ひかえめ(C↑A↓)</option>
                    <option value="10">おっとり(C↑B↓)</option>
                    <option value="11">うっかりや(C↑D↓)</option>
                    <option value="12">れいせい(C↑S↓)</option>
                    <option value="13">おだやか(D↑A↓)</option>
                    <option value="14">おとなしい(D↑B↓)</option>
                    <option value="15">しんちょう(D↑C↓)</option>
                    <option value="16">なまいき(D↑S↓)</option>
                    <option value="17">おくびょう(S↑A↓)</option>
                    <option value="18">せっかち(S↑B↓)</option>
                    <option value="19">ようき(S↑C↓)</option>
                    <option value="20">むじゃき(S↑D↓)</option>
                </select><br>
    
		        <!--努力値(def 0)と個体値(def 31)の入力(選択時に実数値更新)-->
                <a>HP：</a>
                <a>種族値</a>
                    <input type="number" id="H_bs" style="width: 50px" oninput="hcalc()" value ="<?= $H_bs;?>">
                    <a>個体値</a>
                    <input type="number" id="H_ev" style="width: 50px" oninput="hcalc()" value ="31">
                    <a>努力値</a>
                    <input type="number" id="H_iv" style="width: 50px" oninput="hcalc()" value ="0"><br>
    
                <a>こうげき：</a>
                    <a>種族値</a>
                    <input type="number" id="A_bs" style="width: 50px" oninput="acalc()" value ="<?php echo $A_bs?>">
                    <a>個体値</a>
                    <input type="number" id="A_ev" style="width: 50px" oninput="acalc()" value ="31">
                    <a>努力値</a>
                    <input type="number" id="A_iv" style="width: 50px" oninput="acalc()" value ="0"><br>
    
                <a>ぼうぎょ：</a>
                    <a>種族値</a>
                    <input type="number" id="B_bs" style="width: 50px" oninput="bcalc()" value ="<?php echo $B_bs?>">
                    <a>個体値</a>
                    <input type="number" id="B_ev" style="width: 50px" oninput="bcalc()" value ="31">
                    <a>努力値</a>
                    <input type="number" id="B_iv" style="width: 50px" oninput="bcalc()" value ="0"><br>
    
                <a>とくこう：</a>
                    <a>種族値</a>
                    <input type="number" id="C_bs" style="width: 50px" oninput="ccalc()" value ="<?php echo $C_bs?>">
                    <a>個体値</a>
                    <input type="number" id="C_ev" style="width: 50px" oninput="ccalc()" value ="31">
                    <a>努力値</a>
                    <input type="number" id="C_iv" style="width: 50px" oninput="ccalc()" value ="0"><br>
    
                <a>とくぼう：</a>
                    <a>種族値</a>
                    <input type="number" id="D_bs" style="width: 50px" oninput="dcalc()" value ="<?php echo $D_bs?>">
                    <a>個体値</a>
                    <input type="number" id="D_ev" style="width: 50px" oninput="dcalc()" value ="31">
                    <a>努力値</a>
                    <input type="number" id="D_iv" style="width: 50px" oninput="dcalc()" value ="0"><br>
    
                <a>すばやさ：</a>
                    <a>種族値</a>
                    <input type="number" id="S_bs" style="width: 50px" oninput="scalc()" value ="<?php echo $S_bs?>">
                    <a>個体値</a>
                    <input type="number" id="S_ev" style="width: 50px" oninput="scalc()" value ="31">
                    <a>努力値</a>
                    <input type="number" id="S_iv" style="width: 50px" oninput="scalc()" value ="0">
                </div>
                
                <div class="box-item">
                <!--相手側の実数値の表示-->
                <a>実数値</a><br>
                    <a>HP : </a>
			    	<a id="eH_real">---</a><br>
                    <a>こうげき : </a>
			    	<a id="eA_real">---</a><br>
                    <a>ぼうぎょ : </a>
			    	<a id="eB_real">---</a><br>
                    <a>とくこう : </a>
			    	<a id="eC_real">---</a><br>
                    <a>とくぼう : </a>
			    	<a id="eD_real">---</a><br>
                    <a>すばやさ : </a>
			    	<a id="eS_real">---</a><br><br>
    
			    <!--相手側の性格のリスト(更新時に実数値更新)-->
			    <a>性格補正</a>
                <select name="nature2" id="nature2" oninput="ehcalc();eacalc();ebcalc();eccalc();edcalc();escalc()">
                    <option value="0">補正なし</option>
                    <option value="1">さみしがり(A↑B↓)</option>
                    <option value="2">いじっばり(A↑C↓)</option>
                    <option value="3">やんちゃ(A↑D↓)</option>
                    <option value="4">ゆうかん(A↑S↓)</option>
                    <option value="5">ずぶとい(B↑A↓)</option>
                    <option value="6">わんぱく(B↑C↓)</option>
                    <option value="7">のうてんき(B↑D↓)</option>
                    <option value="8">のんき(B↑S↓)</option>
                    <option value="9">ひかえめ(C↑A↓)</option>
                    <option value="10">おっとり(C↑B↓)</option>
                    <option value="11">うっかりや(C↑D↓)</option>
                    <option value="12">れいせい(C↑S↓)</option>
                    <option value="13">おだやか(D↑A↓)</option>
                    <option value="14">おとなしい(D↑B↓)</option>
                    <option value="15">しんちょう(D↑C↓)</option>
                    <option value="16">なまいき(D↑S↓)</option>
                    <option value="17">おくびょう(S↑A↓)</option>
                    <option value="18">せっかち(S↑B↓)</option>
                    <option value="19">ようき(S↑C↓)</option>
                    <option value="20">むじゃき(S↑D↓)</option>
                </select><br>
    
			    <!--相手側の努力値(def 0)と個体値(def 31)の入力(選択時に実数値更新)-->
                <a>HP：</a>
                    <a>種族値</a>
                    <input type="number" id="eH_bs" style="width: 50px" oninput="ehcalc()" value="<?php echo $eH_bs?>">
                    <a>個体値</a>
                    <input type="number" id="eH_ev" style="width: 50px" oninput="ehcalc()" value ="31">
                    <a>努力値</a>
                    <input type="number" id="eH_iv" style="width: 50px" oninput="ehcalc()" value ="0"><br>
    
                <a>こうげき：</a>
                    <a>種族値</a>
                    <input type="number" id="eA_bs" style="width: 50px" oninput="eacalc()" value="<?php echo $eA_bs?>">
                    <a>個体値</a>
                    <input type="number" id="eA_ev" style="width: 50px" oninput="eacalc()" value ="31">
                    <a>努力値</a>
                    <input type="number" id="eA_iv" style="width: 50px" oninput="eacalc()" value ="0"><br>
    
                <a>ぼうぎょ：</a>
                    <a>種族値</a>
                    <input type="number" id="eB_bs" style="width: 50px" oninput="ebcalc()" value="<?php echo $eB_bs?>">
                    <a>個体値</a>
                    <input type="number" id="eB_ev" style="width: 50px" oninput="ebcalc()" value ="31">
                    <a>努力値</a>
                    <input type="number" id="eB_iv" style="width: 50px" oninput="ebcalc()" value ="0"><br>
    
                <a>とくこう：</a>
                    <a>種族値</a>
                    <input type="number" id="eC_bs" style="width: 50px" oninput="eccalc()" value="<?php echo $eC_bs?>">
                    <a>個体値</a>
                    <input type="number" id="eC_ev" style="width: 50px" oninput="eccalc()" value ="31">
                    <a>努力値</a>
                    <input type="number" id="eC_iv" style="width: 50px" oninput="eccalc()" value ="0"><br>
    
                <a>とくぼう：</a>
                    <a>種族値</a>
                    <input type="number" id="eD_bs" style="width: 50px" oninput="edcalc()" value="<?php echo $eD_bs?>">
                    <a>個体値</a>
                    <input type="number" id="eD_ev" style="width: 50px" oninput="edcalc()" value ="31">
                    <a>努力値</a>
                    <input type="number" id="eD_iv" style="width: 50px" oninput="edcalc()" value ="0"><br>
    
                <a>すばやさ：</a>
                    <a>種族値</a>
                    <input type="number" id="eS_bs" style="width: 50px" oninput="escalc()" value="<?php echo $eS_bs?>">
                    <a>個体値</a>
                    <input type="number" id="eS_ev" style="width: 50px" oninput="escalc()" value ="31">
                    <a>努力値</a>
                    <input type="number" id="eS_iv" style="width: 50px" oninput="escalc()" value ="0">
                </div>
            </div>
        </div>
    </body>
</html>
