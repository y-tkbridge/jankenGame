<?php
session_start();
$fightResult = null;

if(!empty($_SESSION['fightResult'])){
    $fightResult[] = $_SESSION['fightResult'];
}

//デバッグを確認する
var_dump($fightResult);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>じゃんけんゲーム！</title>
    <style>
        h1 {
            text-align: center;
        }

        img {
            height:200px;
        }

        /* ラジオボタンを非表示にする */
        input[type=radio] {
            display: none;
        }

        .selectHands{
            text-align: center;
            padding:40px;
        }
        .selectHands .radio {
            display: none;

        }

        .imgBox {
            text-align: center;
            display: inline-flex;
            cursor: pointer;
            opacity: 1;
            padding:40px;

            /*transition-property: transform, opacity;
                transition-duration: .4s .4s;
            */

        }

        .imgBox:hover {
            transform:scale(1.5);
            /*background: skyblue;*/
        }

        .imgSelected {
            background-color: skyblue;
        }

        .gameStartButton {
            background-color: #333;
            color: #fff;
            height:3.5rem;
            width:7rem;

        }

        .gameStartButton:hover {
            background-color: #59b1eb;
        }
    </style>

</head>
<body>
    <!-- google がホストしているJQueryの読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <!-- 処理が書いてあるjavascriptファイルの読み込み先 -->
    <script src='./../script/script.js'></script>

    <h1>じゃんけんゲーム！</h1>
    <form class="selectHands" action="./Janken.php" method="post">
        <div class="selectHands">
            <div class="imgBox">
                <label id="gu"><input type="radio" id="gu" name="hand" value="1">
                    <image src="../images/gu.png"></image>
                </label>
            </div>

            <div class="imgBox">
                <label id="ch"><input type="radio" id="ch" name="hand" value="2">
                    <image src="../images/ch.png"></image>
                </label>
            </div>

            <div class="imgBox">
                <label id="pa"><input type="radio" id="pa" name="hand" value="3">
                    <image src="../images/pa.png"></image>
                </label>
            </div>
        </div>
        <span id="countdown"></span>
        <input class="gameStartButton" type="submit" value="start">
    </form>


</body>
</html>