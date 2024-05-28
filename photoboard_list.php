<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>게시글 목록</title>
<link rel="icon" href="img/감사콩.ico">
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<link rel="stylesheet" type="text/css" href="./css/header.css">

</head>
<body> 
<header>
    <?php include "header.php"; include "events.php"?>
</header>  
<section>
    <div id="main_img_bar">
        <?php 
            $randIndex = array_rand($dataEvents);
            $banner = $dataEvents[$randIndex]['Thumbnail'];
            $link = $dataEvents[$randIndex]['Link'];
        ?>
        <a href="<?php echo $link ?>"><img src="<?php echo $banner;?>"></a>
    </div>
    <div id="board_box">
        <h3>게시판 > 목록보기</h3>
        <ul id="board_list">
            <li>
                <span class="col2">이미지</span>
                <span class="col3">글쓴이</span>
                <span class="col5">등록일</span>
                <span class="col6">조회</span>
            </li>
<?php
    if (isset($_GET["page"]))
        $page = $_GET["page"];
    else
        $page = 1;

    $con = mysqli_connect("localhost", "user1", "12345", "project");
    $sql = "SELECT * FROM board ORDER BY num DESC";
    $result = mysqli_query($con, $sql);
    $total_record = mysqli_num_rows($result); // 전체 글 수

    $scale = 4;

    // 전체 페이지 수($total_page) 계산 
    if ($total_record % $scale == 0)     
        $total_page = floor($total_record/$scale);      
    else
        $total_page = floor($total_record/$scale) + 1; 

    // 표시할 페이지($page)에 따라 $start 계산  
    $start = ($page - 1) * $scale;      

    for ($i = $start; $i < $start + $scale && $i < $total_record; $i++) {
        mysqli_data_seek($result, $i);
        $row = mysqli_fetch_array($result);
        $num = $row["num"];
        $id = $row["id"];
        $name = $row["name"];
        $subject = $row["subject"];
        $regist_day = $row["regist_day"];
        $hit = $row["hit"];
        $file_name = $row["file_name"];
        $file_copied = $row["file_copied"];
        $file_path = "./data/" . $file_copied;
        $tier = $row["tier"];

        if ($file_name) {
?>
            <li>
                <span class="col2"><a href="photoboard_view.php?num=<?=$num?>&page=<?=$page?>"><img src="<?=$file_path?>" alt="" width="200" height="100"></a></span>
                <span class="col3"><?=$name?><img src="img/<?=$tier?>" style="width: 18px; height: 18px;"></span>
                <span class="col5"><?=$regist_day?></span>
                <span class="col6"><?=$hit?></span>
            </li>    
<?php
        }
		else {
		?>
			<li>
			<span class="col2"><a href="photoboard_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></span>
			<span class="col3"><?=$name?><img src="img/<?php echo $tier ?>" style="width: 18px; height: 18px;"></span>
			<span class="col5"><?=$regist_day?></span>
			<span class="col6"><?=$hit?></span>
		</li>	
		<?php
		}
    }
    mysqli_close($con);
?>
        </ul>
        <ul id="page_num">     
<?php
    if ($total_page >= 2 && $page >= 2) {
        $new_page = $page - 1;
        echo "<li><a href='photoboard_list.php?page=$new_page' style='color: black !important;'>◀ 이전</a> </li>";
    } else {
        echo "<li>&nbsp;</li>";
    }

    for ($i = 1; $i <= $total_page; $i++) {
        if ($page == $i) {
            echo "<li><b> $i </b></li>";
        } else {
            echo "<li><a href='photoboard_list.php?page=$i' style='color: black !important;'> $i </a></li>";
        }
    }

    if ($total_page >= 2 && $page != $total_page) {
        $new_page = $page + 1;
        echo "<li> <a href='photoboard_list.php?page=$new_page' style='color: black !important;'>다음 ▶</a> </li>";
    } else {
        echo "<li>&nbsp;</li>";
    }
?>
        </ul> <!-- page -->           
        <ul class="buttons">
            <li><button onclick="location.href='photoboard_list.php'">목록</button></li>
            <li>
<?php 
    if ($userid) {
?>
                <button onclick="location.href='photoboard_form.php'">글쓰기</button>
<?php
    } else {
?>
                <a href="javascript:alert('로그인 후 이용해 주세요!')"><button>글쓰기</button></a>
<?php
    }
?>
            </li>
        </ul>
    </div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.html";?>
</footer>
</body>
</html>
