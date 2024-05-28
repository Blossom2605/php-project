<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>자유 게시판 글쓰기</title>
<link rel="icon" href="img/감사콩.ico">
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<link rel="stylesheet" type="text/css" href="./css/header.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
<script>
  function check_input() {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.board_form.subject.focus();
          return;
      }
      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>
<body> 
<header>
    <?php include "header.php"; include "events.php"?>
</header>  
<section>
	<?php
		if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
		else $userid = "";

		$con = mysqli_connect("localhost", "user1", "12345", "project");
		$sql = "SELECT level FROM members WHERE id = '$userid'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		
		mysqli_close($con);
		
		if($row["level"] == 1) $tierImg = "bronze.png";
		else if($row["level"] == 2) $tierImg = "silver.png";
		else if($row["level"] == 3) $tierImg = "gold.png";
		else if($row["level"] == 4) $tierImg = "platinum.png";
		else if($row["level"] == 5) $tierImg = "diamond.png";
		else if($row["level"] == 6) $tierImg = "master.png";
		else $tierImg = "grandmaster.png";
	?>
	<div id="main_img_bar">
		<?php 
			$randIndex = array_rand($dataEvents);
			$banner = $dataEvents[$randIndex]['Thumbnail'];
			$link = $dataEvents[$randIndex]['Link'];
		?>
        <a href="<?php echo $link ?>"><img src="<?php echo $banner;?>"></a>
    </div>
   	<div id="board_box">
	    <h3 id="board_title">
	    		게시판 > 글 쓰기
		</h3>
	    <form  name="board_form" method="post" action="board_insert.php" enctype="multipart/form-data">
	    	 <ul id="board_form">
				<li>
					<span class="col1">이름 : </span>
					<span class="col2"><?=$username?></span>
				</li>		
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text"></span>
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"></textarea>
	    			</span>
	    		</li>
	    		<li>
			        <span class="col1"> 첨부 파일</span>
			        <span class="col2"><input type="file" name="upfile"></span>
			    </li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">완료</button></li>
				<li><button type="button" onclick="location.href='board_list.php'">목록</button></li>
			</ul>
	    </form>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.html";?>
</footer>
</body>
</html>
