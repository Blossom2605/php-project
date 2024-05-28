<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // POST 방식으로 전송된 값을 받습니다.
            $userName = $_POST['userInput'];
        }
        
        
        if (isset($_GET['char'])) {
            $userName = $_GET['char'];
        }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $userName?> - 보유 캐릭터</title>
        <link rel="icon" href="img/감사콩.ico">
        <link rel="stylesheet" type="text/css" href="./css/common.css">
        <link rel="stylesheet" type="text/css" href="./css/search.css">
        <link rel="stylesheet" type="text/css" href="./css/header.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
    </head>
    <body>
    <header>
        <?php include "header.php"; include("charaters.php"); include("charaterArmories.php");?>
    </header>
    <div class="content-wrapper">
    <section>
    <div style="padding: 0.2em;">
        <div class="char-title-bar">
            <h2 class="char-title"><?php echo $userName ?></h2>
        </div>
    </div>    
    <?php
        // $data 배열이 비어있는지 확인
        if (!empty($data) && !empty($dataArmories)) {
            // 첫 번째 요소가 있는지 확인
            if (isset($data[0])) {
                // 계정 내 최고렙 캐릭터 서버 기준으로 캐릭터 목록 정렬을 위한 변수 지정
                // data 배열에서 ItemMaxLevel 값만 추출하여 새로운 배열 생성
                $itemMaxLevels = array_column($data, 'ItemMaxLevel');
            
                // 쉼표(,)를 제거하고 부동 소수점 숫자로 변환하여 저장할 배열 생성
                $numericValues = [];
            
                foreach ($itemMaxLevels as $value) {
                    // 쉼표 제거 후 문자열을 부동 소수점 숫자로 변환하여 배열에 추가
                    $numericValues[] = floatval(str_replace(',', '', $value));
                }
            
                // 변환된 숫자들 중 최댓값을 찾음
                $maxValue = max($numericValues);
            
                foreach($data as $row) {
                    if($maxValue == floatval(str_replace(',', '', $row['ItemMaxLevel']))) {
                        $serverN = $row['ServerName'];
                    }
                }
            

                foreach($data as $row){
                    if ($row['CharacterName'] == $userName) {
                        $first_character = $row;
                        $img = $dataArmories["CharacterImage"];
                        break;
                    }
                }
                ?>
                <div class="char-layout">
                <div class="charInfo">
                <?php
                // 캐릭터 이미지 출력
                echo '<div style="background-color: rgb(21, 24, 29);
                background-repeat: no-repeat;
                width:80%;
                height:100%;
                background-size: contain;
                background-position: right center;
                background-image: url(' . $img . ');">';
                ?>
                <div class="character-info">
                    <dl class="char-info" style="width:100%">
                        <dt>&nbsp서&nbsp&nbsp버&nbsp</dt>
                        <dd>
                            <span style="color: rgb(255, 255, 255); text-shadow: rgb(0, 0, 0) -1px 0px, rgb(0, 0, 0) 0px 1px, rgb(0, 0, 0) 1px 0px, rgb(0, 0, 0) 0px -1px;"><?php echo $first_character['ServerName']; ?></span>
                        </dd>
                    </dl>
                    <dl class="char-info" style="width:100%">
                        <dt>&nbsp길&nbsp&nbsp드&nbsp</dt>
                        <dd>
                            <span style="color: rgb(255, 255, 255); text-shadow: rgb(0, 0, 0) -1px 0px, rgb(0, 0, 0) 0px 1px, rgb(0, 0, 0) 1px 0px, rgb(0, 0, 0) 0px -1px;"><?php echo $dataArmories['GuildName']; ?></span>
                        </dd>
                    </dl>
                    <dl class="char-info" style="width:100%">
                        <dt>&nbsp클래스&nbsp</dt>
                        <dd>
                            <span style="color: rgb(255, 255, 255); text-shadow: rgb(0, 0, 0) -1px 0px, rgb(0, 0, 0) 0px 1px, rgb(0, 0, 0) 1px 0px, rgb(0, 0, 0) 0px -1px;"><?php echo $first_character['CharacterClassName']; ?></span>
                        </dd>
                    </dl>
                    <dl class="char-info" style="width:100%">
                        <dt>&nbsp칭&nbsp&nbsp호&nbsp</dt>
                        <dd>
                            <span style="color: rgb(255, 255, 255); text-shadow: rgb(0, 0, 0) -1px 0px, rgb(0, 0, 0) 0px 1px, rgb(0, 0, 0) 1px 0px, rgb(0, 0, 0) 0px -1px;"><?php echo $dataArmories['Title'] ?></span>
                        </dd>
                    </dl>
                    <dl class="char-info" style="width:100%">
                        <dt>&nbsp전&nbsp&nbsp투&nbsp</dt>
                        <dd>
                            <span style="color: rgb(255, 255, 255); text-shadow: rgb(0, 0, 0) -1px 0px, rgb(0, 0, 0) 0px 1px, rgb(0, 0, 0) 1px 0px, rgb(0, 0, 0) 0px -1px;"><?php echo $first_character['CharacterLevel']; ?></span>
                        </dd>
                    </dl>
                    <dl class="char-info" style="width:100%">
                        <dt>&nbsp아이템&nbsp</dt>
                        <dd>
                            <span style="color: rgb(255, 255, 255); text-shadow: rgb(0, 0, 0) -1px 0px, rgb(0, 0, 0) 0px 1px, rgb(0, 0, 0) 1px 0px, rgb(0, 0, 0) 0px -1px;"><?php echo $first_character['ItemMaxLevel']; ?></span>
                        </dd>
                    </dl>
                    <dl class="char-info" style="width:100%">
                        <dt>&nbsp원정대&nbsp</dt>
                        <dd>
                            <span style="color: rgb(255, 255, 255); text-shadow: rgb(0, 0, 0) -1px 0px, rgb(0, 0, 0) 0px 1px, rgb(0, 0, 0) 1px 0px, rgb(0, 0, 0) 0px -1px;"><?php echo $dataArmories['ExpeditionLevel']; ?></span>
                        </dd>
                    </dl>
                    <dl class="char-info" style="width:100%">
                        <dt>&nbspP&nbspV&nbspP&nbsp</dt>
                        <dd>
                            <span style="color: rgb(255, 255, 255); text-shadow: rgb(0, 0, 0) -1px 0px, rgb(0, 0, 0) 0px 1px, rgb(0, 0, 0) 1px 0px, rgb(0, 0, 0) 0px -1px;"><?php echo $dataArmories['PvpGradeName'] ?></span>
                        </dd>
                    </dl>
                    <dl class="char-info" style="width:100%">
                        <dt>&nbsp영&nbsp&nbsp지&nbsp</dt>
                        <dd>
                            <span style="color: rgb(255, 255, 255); text-shadow: rgb(0, 0, 0) -1px 0px, rgb(0, 0, 0) 0px 1px, rgb(0, 0, 0) 1px 0px, rgb(0, 0, 0) 0px -1px;"><?php echo $dataArmories['TownLevel']."&nbsp".$dataArmories['TownName'] ?></span>
                        </dd>
                    </dl>
                </div>
            </div>   
            </div>
            <div id=contents>
                <div class="char-layout">
                    <div class="main-wrap">
                        <ul class="char-tab">
                            <li>
                            <form action="charSearch.php" method="post">
                                <input type="hidden" name="userInput" value="<?php echo $userName; ?>">
                                <button type="submit" style="padding: 0.25rem; font-size: 14px;">&nbsp;능력치&nbsp;</button>
                            </li>
                            <li>
                                <button type="submit" style="padding: 0.25rem; font-size: 14px;" disabled="disabled">&nbsp;보유&nbsp캐릭터&nbsp;</button>
                            </li>
                            <li>
                                <form action="" method="post">
                                    <button type="button" style="padding: 0.25rem; font-size: 14px;">&nbsp;개발중&nbsp;</button>
                                </form>
                            </li>
                        </ul>
                        <?php 
                            $cnt = 1;
                            // 캐릭터 목록 레벨 내림차순 정렬
                            usort($data, function($a, $b) {
                                return $b['ItemAvgLevel'] <=> $a['ItemAvgLevel'];
                            });
                                        
                            //캐릭터 목록 출력
                            foreach($data as $row) {
                                    if($row['ServerName'] == $serverN){
                                    echo '<label>';
                                    echo '<a href="charSearch.php?char='.$row['CharacterName'].'" style="color: #ffffff;">'.$cnt++.'. '.$row['CharacterName'].'</a> <p style="color: #ffffff;">아이템레벨 : '.$row['ItemAvgLevel'].'</p><br>';
                                    echo '</label>';
                                        
                                }
                            }
                            
                            foreach($data as $row) {
                                if($row['ServerName'] != $serverN) {
                                echo '<label style="color: #ffffff;">';
                                echo '<a href="charSearch.php?char='.$row['CharacterName'].'" style="color: #ffffff;">'.$cnt++.'. '.$row['CharacterName'].'</a> <p>아이템레벨 : '.$row['ItemAvgLevel'].'</p>';
                                echo '</label>';
                                }
                            }

                            echo '<br><label style="color: #ffffff;">총 캐릭터 수 : '.$cnt.' 캐릭터</label><br>';
                        ?>
                    </div>
                </div>
            </div>
            </div>
                <?php
                } else {
                    // 첫 번째 요소가 없는 경우
                    echo "API 응답에 캐릭터 정보가 없습니다.";
                    }
                } else {
                        // $data 배열이 비어있는 경우
                        echo "API 응답이 비어있습니다.";
                }
            ?>
    </section>
    </div>
    <footer>
        <?php include "footer.html";?>
    </footer>
    </body>
    </html>