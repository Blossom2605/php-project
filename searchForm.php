<?php
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>캐릭터 검색</title>
    <style>
        .bg-video {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        z-index: -1;
        /* opacity: 0.15; */
        }

        .bg-video__content {
        height: 100%;
        width: 100%;
        object-fit: cover; // background-size: cover 와 비슷함. (HTML 요소 or 비디오와 작동)
        }


        /* CSS를 사용하여 화면 중앙에 위치시킵니다. */
        .centered-form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* 화면 전체 높이를 기준으로 중앙에 위치시킵니다. */
        }

        /* 입력 요소를 적당한 간격으로 배치합니다. */
        .input-container {
            text-align: center;
        }

        .input-container label {
            margin-right: 10px; /* 라벨과 입력 필드 사이의 간격을 조절합니다. */
        }

        .label_color{
            color: white;
        }

        .search-bar {
            width: 500px;
        }
</style>
<link rel="icon" href="img/감사콩.ico">
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/header.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <?php include "header.php"; include("charaters.php"); include("charaterArmories.php");?>
</header>
<section>
    <?php
    if(!$userid) {
        include "main_login.php";
    }
    else {
    ?>
    <div class="centered-form" style="background-image: url(img/searchBG.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
        <div class="input-container">
        <img src="https://cdn-lostark.game.onstove.com/2018/obt/assets/images/common/guide/bi-lostark.png" alt="">
            <form action="charSearch.php" method="post">
                <div class="mx-auto mt-5 search-bar input-group mb-3">
                    <input name="userInput" type="text" id="userInput" class="form-control rounded-pill" placeholder="검색할 캐릭터명 입력" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    }
    ?>
    </section>
<footer>
    <?php include "footer.html";?>
</footer>
</body>
</html>