<?php
            session_start();
            if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
            else $userid = "";
            if (isset($_SESSION["username"])) $username = $_SESSION["username"];
            else $username = "";
            if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
            else $userlevel = "";
            if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
            else $userpoint = "";

            if($userlevel == 1) {
                $tierImg = "bronze.png";
                $_SESSION["tier"] = "브론즈";
            }
            else if($userlevel == 2) {
                $tierImg = "silver.png";
                $_SESSION["tier"] = "실버";
            }
            else if($userlevel == 3) {
                $tierImg = "gold.png";
                $_SESSION["tier"] = "골드";
            }
            else if($userlevel == 4) {
                $tierImg = "platinum.png";
                $_SESSION["tier"] = "플래티넘";
            }
            else if($userlevel == 5) {
                $tierImg = "diamond.png";
                $_SESSION["tier"] = "다이아몬드";
            }
            else if($userlevel == 6) {
                $tierImg = "master.png";
                $_SESSION["tier"] = "마스터";
            }
            else {
                $tierImg = "grandmaster.png";
                $_SESSION["tier"] = "그랜드마스터";
            }

            $_SESSION["tierImg"] = $tierImg;
        ?>	
        <nav class="navbar" style="color: white;">
            <div class="navbar__logo">
                <a href="index.php"><img src="img/circle_logo.png" style="width: 80px;"></img></a>
            </div>
            <ul class="navbar__menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="searchForm.php">Search</a></li>
                <li><a href="board_list.php">Free Board</a></li>
                <li><a href="photoboard_list.php">Photo Board</a></li>
                <li><a href="rankUP.php">Rank UP!</a></li>
            </ul>
            <div id="top" style="background-color: #002841;">
                <ul id="top_menu">
                <?php
            if(!$userid) {
            ?>                
                <li><a href="member_form.php">회원 가입</a> </li>
                <li> | </li>
                <li><a href="login_form.php">로그인</a></li>
            <?php
            } 
            else {
                    $logged = $username."(".$userid.")님[회원 등급 : <img src='img/".$tierImg."' style='width:28px; height=28px;'> 포인트 : ".$userpoint."]";
            ?>
                    <li><?=$logged?> </li>
                    <li> | </li>
                    <li><a href="logout.php">로그아웃</a> </li>
                    <li> | </li>
                    <li><a href="member_modify_form.php">정보 수정</a></li>
                    <li> | </li>
                    <li><a href="checkin.php">출석체크</a></li>
                    <?php
            }
            ?>
            <?php
                if ($userlevel == 10) {
            ?>
                <li> | </li>
                <li><a href="admin.php">관리 페이지</a></li>
            <?php
                }
            ?>
                </ul>
            </div>
        </nav>    