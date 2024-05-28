<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>회원 로그인</title>
<link rel="icon" href="img/감사콩.ico">
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/login.css">
<link rel="stylesheet" type="text/css" href="./css/header.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
<script type="text/javascript" src="./js/login.js"></script>
</head>
<body> 
	<header>
    	<?php include "header.php";?>
    </header>
	<section>
        <div class="login-main">
			<div class="login-img">
			<?php
			$randNum = rand(1, 2);
			if($randNum == 1) {
			?>
				<img src="img/카마인.gif">
			<?php }
			else if($randNum == 2) {
			?>
				<img src="img/니나브획득.gif">
			<?php }?>
			</div>
      		<div id="login_box">
	    		<div id="login_title">
		    		<span>로그인</span>
	    		</div>
	    		<div id="login_form">
          		<form  name="login_form" method="post" action="login.php">		       	
                  	<ul>
                    <li><input type="text" name="id" placeholder="아이디" ></li>
                    <li><input type="password" id="pass" name="pass" placeholder="비밀번호" ></li> <!-- pass -->
                  	</ul>
                  	<div id="login_btn">
                      	<a href="#"><img src="./img/login.png" style="width: 427px; height: 60px;"onclick="check_input()"></a>
                  	</div>		    	
           		</form>
        		</div> <!-- login_form -->
    		</div> <!-- login_box -->
        </div> <!-- main_content -->
	</section> 
	<footer>
    	<?php include "footer.html";?>
    </footer>
</body>
</html>

