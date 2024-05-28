<?php
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["tierImg"])) $tierImg = $_SESSION["tierImg"];
else $tierImg = "";
if (isset($_SESSION["tier"])) $tier = $_SESSION["tier"];
else $tier = "";
if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
else $userpoint = "";

// 데이터베이스 연결
$con = mysqli_connect("localhost", "user1", "12345", "project");

// SQL 쿼리 작성
$sql = "SELECT * FROM charinfo WHERE user_id = '$userid'";

// 쿼리 실행
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // 결과 출력
    while ($row = mysqli_fetch_assoc($result)) {
        $userName = $row["nickname"];
        $level = $row["level"];
        $job = $row["job"];
        $img_url = $row["image_url"];
        $server = $row["server"];
    }
}

// 데이터베이스 연결 종료
mysqli_close($con);


include("charaters.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/loginMain.css">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <title>Document</title>
</head>
<body>
    <?php
    if (!$userid) {
        include "main_login_fail.php";
    } else {
    ?>
    <div class="home-content">
        <div class="main-profit">
            <div class="characters-info-header">
                <h1>내 회원등급 & TOP5 포인트 랭킹</h1>
            </div>
            <div class="characters-info">
                <div class="represent">
                    <img src="img/<?php echo $tierImg?>">
                    <span class="name"><?php echo $tier?></span>
                    <span class="level">포인트 : <?php echo $userpoint?></span>
                </div>
                <div class="character-list">
                    <?php
                    $con = mysqli_connect("localhost", "user1", "12345", "project");
                    $sql = "SELECT id, name, point, level FROM members ORDER BY point DESC LIMIT 5";
                    $result = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $rank = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            // 각 멤버의 티어 이미지 결정
                            $memberLevel = $row['level'];
                            if ($memberLevel == 1) $memberTierImg = "bronze.png";
                            else if ($memberLevel == 2) $memberTierImg = "silver.png";
                            else if ($memberLevel == 3) $memberTierImg = "gold.png";
                            else if ($memberLevel == 4) $memberTierImg = "platinum.png";
                            else if ($memberLevel == 5) $memberTierImg = "diamond.png";
                            else if ($memberLevel == 6) $memberTierImg = "master.png";
                            else $memberTierImg = "grandmaster.png";
                    ?>
                    <div class="character-info-box">
                        <span class="character-server"><?php echo $rank ?>위</span>
                        <span class="character-server"><img src="img/<?php echo $memberTierImg ?>" style="width: 18px; height: 18px;"></span>
                        <span class="character-className"><?php echo $row['name'] ?></span>
                        <span class="character-name"><?php echo $row['point'] ?></span>
                    </div>
                    <?php
                            $rank++;
                        }
                    }
                    mysqli_close($con);
                    ?>
                </div>
            </div>
        </div>
        <div class="main-characters">
            <div class="characters-info-header">
                <h1>내 캐릭터</h1>
            </div>
            <div class="characters-info">
                <div class="represent">
                    <span class="img" style="background-image: url(&quot;<?php echo $img_url ?>&quot;); background-position: 50% 15%; background-color: black;"></span>
                    <span class="name"><?php echo $userName ?></span>
                    <span class="level">Lv. <?php echo $level ?></span>
                    <span class="info">@<?php echo $server ?>&nbsp<?php echo $job ?></span>
                </div>
                <div class="character-list">
                    <?php
                    $cnt = 0;
                    foreach ($data as $info) {
                        if ($info["ServerName"]) {
                            $cnt++;
                    ?>
                    <div class="character-info-box">
                        <span class="character-server"><?php echo $info["ServerName"] ?></span>
                        <span class="character-className"><?php echo $info["CharacterClassName"] ?></span>
                        <span class="character-name"><?php echo $info["CharacterName"] ?>&nbsp</span>
                        <span class="character-itemLevel">Lv. <?php echo $info["ItemMaxLevel"] ?></span>
                    </div>
                    <?php
                        }
                    }
                    ?>
                    <div class="characters-info-summary">
                        <div class="summary">
                            <span>총</span>
                            <span class="val"><?php echo $cnt ?></span><span>캐릭</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="home-content" >
        <div class="main-profit" style="width: 96.6%">
            <h1>현재 진행중인 이벤트</h1>
            <ul>
                <?php
                include "events.php";

                $banners = [];
                $usedIndexes = [];
            
                $maxCount = min(2, count($dataEvents));
                for($i = 0; $i < $maxCount; $i++) {
                    do {
                        $randIndex = array_rand($dataEvents);
                    } while (in_array($randIndex, $usedIndexes));
            
                    $usedIndexes[] = $randIndex;
                    $banners[$i]['Thumbnail'] = $dataEvents[$randIndex]['Thumbnail'];
                    $banners[$i]['Link'] = $dataEvents[$randIndex]['Link'];
                    }
                ?>
                <li>
                <div class="character-list">
                    <div class="event-list-box">
                        <?php foreach ($banners as $banner): ?>
                        <a href="<?php echo $banner['Link']; ?>" style="margin: 15px;"><img src="<?php echo $banner['Thumbnail']; ?>"></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                </li>
                </ul>
            </div>
        </div>
    <div class="home-content" >
        <div class="main-profit" style="width: 96.6%">
            <h1>최근 게시글</h1>
            <ul>
                <!-- 최근 게시 글 DB에서 불러오기 -->
                <?php
                $con = mysqli_connect("localhost", "user1", "12345", "project");
                $sql = "select * from board order by num desc limit 5";
                $result = mysqli_query($con, $sql);

                if (!$result)
                    echo "게시판 DB 테이블(board)이 생성 전이거나 아직 게시글이 없습니다!";
                else {
                    while ($row = mysqli_fetch_array($result)) {
                        $regist_day = substr($row["regist_day"], 0, 10);

                        if ($row["file_name"])
                            $file_image = "<img src='./img/file.gif'>";
                        else
                            $file_image = " ";
                ?>
                <li>
                <div class="character-list">
                    <div class="character-info-box">
                        <span class="board-subject" style="font-size: 20px;"><?=$row["subject"]?></span>
                        <span class="board-name" style="font-size: 20px;"><?=$row["name"]?></span>
                        <span class="board-tier"><img src="img/<?=$row["tier"] ?>" style="width: 20px; height: 20px;"></span>
                        <span class="board-tier" style="font-size: 20px;"><?=$file_image?></span>
                        <span class="board-date" style="font-size: 20px;"><?=$regist_day?></span>
                    </div>
                </div>
                </li>
                <?php
                    }
                }
                mysqli_close($con);
                ?>
                </ul>
            </div>
        </div>
    <?php
    }
    ?>
</body>
</html>
