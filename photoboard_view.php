<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>그림 게시글 보기</title>
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
	    <h3 class="title">
			게시판 > 내용보기
		</h3>
<?php
	$num  = $_GET["num"];
	$page  = $_GET["page"];

	$con = mysqli_connect("localhost", "user1", "12345", "project");
	$sql = "select * from board where num=$num";
	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($result);
	$id      = $row["id"];
	$name      = $row["name"];
	$regist_day = $row["regist_day"];
	$subject    = $row["subject"];
	$content    = $row["content"];
	$file_name    = $row["file_name"];
	$file_type    = $row["file_type"];
	$file_copied  = $row["file_copied"];
	$hit          = $row["hit"];
	$tier = $row["tier"];

	$content = str_replace(" ", "&nbsp;", $content);
	$content = str_replace("\n", "<br>", $content);

	$new_hit = $hit + 1;
	$sql = "update board set hit=$new_hit where num=$num";   
	mysqli_query($con, $sql);
?>		
	    <ul id="view_content">
			<li>
				<span class="col1"><b>제목 :</b> <?=$subject?></span>
				<span class="col2"><?=$name?><img src="img/<?php echo $tier ?>" style="width: 18px; height: 18px;"> | <?=$regist_day?></span>
			</li>
			<li>
				<?php
					$real_name = $file_copied;
					$file_path = "./data/".$real_name;
					$y = $file_path;
				?>
				<img src= <?=$y?> alt="" width="300", height="300">
				
				<br><?=$content?>
			</li>		
	    </ul>
	    <ul class="buttons">
				<li><button onclick="location.href='photoboard_list.php?page=<?=$page?>'">목록</button></li>
				<?php if($userid == $id){?>
				<li><button onclick="location.href='photoboard_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
				<li><button onclick="location.href='photoboard_delete_check.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
				<?php }?>
				<li><button onclick="location.href='photoboard_form.php'">글쓰기</button></li>
		</ul>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.html";?>
</footer>
</body>
</html>
