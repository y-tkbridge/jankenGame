<?php
session_start();
$fightCount = 0;

//****************************//
//プレイヤーが選択した手を取得する//
//****************************//

// 「!empty」は、index.php で「手」が選択されたことを確かめる
if (!empty($_POST['hand'])){
    $playerSelectValue = $_POST['hand'];
}else{
    header('Location:./index.php');
};

//****************************//
//プレイヤーが選択した手を表示する//
//****************************//

//グーが選択されたとき
if ($playerSelectValue == "1"){
    $userSelectHandImage =  "<image src='../images/gu.png'></image>";

//チョキが選択されたとき
}else if($playerSelectValue == "2"){
    $userSelectHandImage =  "<image src='../images/ch.png'></image>";

//パーが選択されたとき
}else if($playerSelectValue == "3"){
    $userSelectHandImage =  "<image src='../images/pa.png'></image>";
}

//***********************//
//CPUが選択した手を表示する//
//***********************//

// 1 ~ 3 をランダムで取得する
$cpuHandValue = rand(1,3);

if ($cpuHandValue == "1"){
    $cpuSelectHandImage =  "<image src='../images/gu.png'></image>";

//チョキが選択されたとき
}else if($cpuHandValue == "2"){
    $cpuSelectHandImage =  "<image src='../images/ch.png'></image>";

//パーが選択されたとき
}else if($cpuHandValue == "3"){
    $cpuSelectHandImage =  "<image src='../images/pa.png'></image>";
}


//**************************************//
//あいこのパターン//
// user | cpu | user  | cpu  | result |
//  1   |  1  | drow  | drow |    0   |
//  2   |  2  | drow  | drow |    0   |
//  3   |  3  | drow  | drow |    0   |

//勝ちのパターン
//  1   |  2  | win   | lose |  - 1   |
//  2   |  3  | win   | lose |  - 1   |
//  3   |  1  | win   | lose |    2   |

//負けのパターン
//  1   |  3  | lose  | win  |  - 2   |
//  2   |  1  | lose  | win  |    1   |
//  3   |  2  | lose  | win  |    1   |
//**************************************//

//****************************//
//プレイヤーが選択した手を表示する//
//****************************//

$resultValue = $playerSelectValue - $cpuHandValue;

// あいこ
if ($resultValue === 0){
    $fightResult = "あいこ";

//プレイヤーの勝ち
} else if ($resultValue === -1 || $resultValue === 2){
    $fightResult = "かち";

//プレイヤーの負け
}else if($resultValue === -2 || $resultValue === 1){
    $fightResult = "まけ";
}

$_SESSION['fightResult'] =array($fightResult);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        img {
            height:200px;
            padding:100px;
        }

        /* ラジオボタンを非表示にする */
        input[type=radio] {
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

        .resultBox {
            text-align: center;
            display:flex;
            justify-content: center;

        }

        .fightResult{
            font-size:48px;
        }

        .center{
            text-align: center;
        }

    </style>

</head>
<body>
    <div class="resultBox">
        <div >
            <div class="item">
                <?= $userSelectHandImage ?>
            </div>
            <span class="item">プレイヤーが出した手</span>
        </div>
        <div>
            <span class="fightResult"><?= $fightResult ?></span>
        </div>
        <div>
            <div class="item">
                <?= $cpuSelectHandImage ?>
            </div>
            <span class="item">コンピューターが出した手</span>
        </div>
    </div>
    <a href="./index.php">もう一回！</a>

</body>
</html>