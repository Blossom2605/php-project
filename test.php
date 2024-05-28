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
                <div id="top">
                    <h3>
                        <a href="index.php"><img src="img/circle_logo.png" alt="" width="200", height="55"></a>
                    </h3>
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
        <div id="menu_bar">
            <ul>  
                <li><a href="index.php">HOME</a></li>
                <li><a href="searchForm.php">캐릭터 검색</a></li>                                
                <li><a href="board_list.php">자유 게시판</a></li>
                <li><a href="freeboard_list.php">사진 게시판</a></li>
                <li><a href="rankUP.php">등급업 신청</a></li>
            </ul>
        </div>