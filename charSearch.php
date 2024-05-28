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
        <title><?php echo $userName?> - 캐릭터 정보</title>
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
        <?php include "header.php"; include("charaters.php"); include("charaterArmories.php"); include("equipment.php"); include("card.php"); ?>
    </header>
    <div class="content-wrapper">
    <section>
    <div style="padding: 0.2em;">
        <div class="char-title-bar">
            <h2 class="char-title"><?php echo $userName ?></h2>
        </div>
    </div>    
    <?php
        // api 응답 테스트
        // echo '<pre>';
        // print_r($dataCard);
        // echo '</pre>';       

        // $data 배열이 비어있는지 확인
        if (!empty($data) && !empty($dataArmories)) {
            // 첫 번째 요소가 있는지 확인
            if (isset($data[0])) {
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
            <?php
                $headName = substr($dataEquipment[1]['Name'], 0, 3);
                $sholName = substr($dataEquipment[5]['Name'], 0, 3);
                $topName = substr($dataEquipment[2]['Name'], 0, 3);
                $pantsName = substr($dataEquipment[3]['Name'], 0, 3);
                $gloveName = substr($dataEquipment[4]['Name'], 0, 3);
                $weaphoneName = substr($dataEquipment[0]['Name'], 0, 3);
            ?>
            <div id=contents>
                <div class="char-layout">
                    <div class="main-wrap">
                        <ul class="char-tab">
                            <li>
                                <button type="button" style="padding: 0.25rem; font-size: 14px;" disabled="disabled">&nbsp;장비&nbsp;</button>
                            </li>
                            <li>
                                <form action="moreChar.php" method="post">
                                    <input type="hidden" name="userInput" value="<?php echo $userName; ?>">
                                    <button type="submit" style="padding: 0.25rem; font-size: 14px;">&nbsp;보유&nbsp캐릭터&nbsp;</button>
                                </form>
                            </li>
                            <li>
                                <form action="" method="post">
                                    <button type="button" style="padding: 0.25rem; font-size: 14px;">&nbsp;개발중&nbsp;</button>
                                </form>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active">
                                <div class="eqiup">
                                    <div class="char-equip2 col-md-6 col-8">
                                        <figure style=" padding: 0.2em;">
                                            <img src="<?php echo $dataEquipment[1]['Icon'];?>">
                                        </figure>
                                        <figure style="padding-bottom: 0px;">
                                            <div class="name-row">
                                                <h4 align="left" style="font-size: 13px; line-height: 140%; font-weight: 700; margin-left: 4px; width: 86px;">
                                                <span style="color:#ffffff;"> 
                                                    <?php echo $headName."&nbsp".$dataEquipment[1]['Grade'] ?> 
                                                </span>
                                            </h4>
                                        </div>
                                        </figure>
                                        <figure style=" padding: 0.2em;">
                                            <img src="<?php echo $dataEquipment[5]['Icon'];?>">
                                        </figure>
                                        <figure style="padding-bottom: 0px;">
                                            <div class="name-row">
                                                <h4 align="left" style="font-size: 13px; line-height: 140%; font-weight: 700; margin-left: 4px; width: 86px;">
                                                <span style="color:#ffffff;"> 
                                                    <?php echo $sholName."&nbsp".$dataEquipment[5]['Grade'] ?> 
                                                </span>
                                            </h4>
                                        </div>
                                        </figure>
                                        <figure style=" padding: 0.2em;">
                                            <img src="<?php echo $dataEquipment[2]['Icon'];?>">
                                        </figure>
                                        <figure style="padding-bottom: 0px;">
                                            <div class="name-row">
                                                <h4 align="left" style="font-size: 13px; line-height: 140%; font-weight: 700; margin-left: 4px; width: 86px;">
                                                <span style="color:#ffffff;"> 
                                                    <?php echo $topName."&nbsp".$dataEquipment[2]['Grade'] ?> 
                                                </span>
                                            </h4>
                                        </div>
                                        </figure>
                                        <figure style=" padding: 0.2em;">
                                            <img src="<?php echo $dataEquipment[3]['Icon'];?>">
                                        </figure>
                                        <figure style="padding-bottom: 0px;">
                                            <div class="name-row">
                                                <h4 align="left" style="font-size: 13px; line-height: 140%; font-weight: 700; margin-left: 4px; width: 86px;">
                                                <span style="color:#ffffff;"> 
                                                    <?php echo $pantsName."&nbsp".$dataEquipment[3]['Grade'] ?> 
                                                </span>
                                            </h4>
                                        </div>
                                        </figure>
                                        <figure style=" padding: 0.2em;">
                                            <img src="<?php echo $dataEquipment[4]['Icon'];?>">
                                        </figure>
                                        <figure style="padding-bottom: 0px;">
                                            <div class="name-row">
                                                <h4 align="left" style="font-size: 13px; line-height: 140%; font-weight: 700; margin-left: 4px; width: 86px;">
                                                <span style="color:#ffffff;"> 
                                                    <?php echo $gloveName."&nbsp".$dataEquipment[4]['Grade'] ?> 
                                                </span>
                                            </h4>
                                        </div>
                                        </figure>
                                        <figure style=" padding: 0.2em;">
                                            <img src="<?php echo $dataEquipment[0]['Icon'];?>">
                                        </figure>
                                        <figure style="padding-bottom: 0px;">
                                            <div class="name-row">
                                                <h4 align="left" style="font-size: 13px; line-height: 140%; font-weight: 700; margin-left: 4px; width: 86px;">
                                                <span style="color:#ffffff;"> 
                                                    <?php echo $weaphoneName."&nbsp".$dataEquipment[0]['Grade'] ?> 
                                                </span>
                                            </h4>
                                        </div>
                                        </figure>
                                    </div>
                                    <div class="card-container">
                                        <figure style="padding: 0.2em;">
                                            <img src="<?php echo $dataCard['Cards'][0]['Icon'];?>" style="width:110px; height:155px">
                                        </figure>
                                        <figure style="padding: 0.2em;">
                                            <img src="<?php echo $dataCard['Cards'][1]['Icon'];?>" style="width:110px; height:155px">
                                        </figure>
                                        <figure style="padding: 0.2em;">
                                            <img src="<?php echo $dataCard['Cards'][2]['Icon'];?>" style="width:110px; height:155px">
                                        </figure>
                                        <figure style="padding: 0.2em;">
                                            <img src="<?php echo $dataCard['Cards'][3]['Icon'];?>" style="width:110px; height:155px">
                                        </figure>
                                        <figure style="padding: 0.2em;">
                                            <img src="<?php echo $dataCard['Cards'][4]['Icon'];?>" style="width:110px; height:155px">
                                        </figure>
                                        <figure style="padding: 0.2em;">
                                            <img src="<?php echo $dataCard['Cards'][5]['Icon'];?>" style="width:110px; height:155px">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
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