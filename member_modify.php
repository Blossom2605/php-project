<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // POST 방식으로 전송된 값을 받습니다.
            $nickname = $_POST['myChar'];
        }
        
        
        if (isset($_GET['char'])) {
            $nickname = $_GET['char'];
        }
    
        $APIKEY = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsIng1dCI6IktYMk40TkRDSTJ5NTA5NWpjTWk5TllqY2lyZyIsImtpZCI6IktYMk40TkRDSTJ5NTA5NWpjTWk5TllqY2lyZyJ9.eyJpc3MiOiJodHRwczovL2x1ZHkuZ2FtZS5vbnN0b3ZlLmNvbSIsImF1ZCI6Imh0dHBzOi8vbHVkeS5nYW1lLm9uc3RvdmUuY29tL3Jlc291cmNlcyIsImNsaWVudF9pZCI6IjEwMDAwMDAwMDA1MjU3NDAifQ.FfrOTHfU43I4nFFYTa_4FczuIUaPF8rjaSxk09Vory-8ICO3iOscpRbhJZTZQxQ6aJEAbQfc_VTYxOzYDuwN9lGB-EdLOfVwv-qhC4jaYwx-8-Y4oJz3Ng8zqO0-8lK5Levzdnq-Q9g-ul4nGuO9X9fntQqTft0CtrcIOM70SA11Z6npJutpJLAmk2Jnifzn0bHwBmoIPXeEPe7fCzqRCH8Mys2fRK_JoFbTw_Q0aG-zmTl2p4WDsIrPthtcRqTWFE8em-HAW38PiFmUn6NGkgr25G2LIdvuMXGp8w9AZy9CKyiUp3-1ipc4zC6AWC3Cqb37X7I45WpVEp8wLEADAg";
        $url = "https://developer-lostark.game.onstove.com/characters/".$nickname."/siblings";
        $url2 = "https://developer-lostark.game.onstove.com/armories/characters/".$nickname."/profiles";
        $headers = array(
            "accept: application/json",
            "authorization: bearer ".$APIKEY
        );
    
        // cURL 초기화
        $ch = curl_init();
        // 호출할 URL 설정
        curl_setopt($ch, CURLOPT_URL, $url);
        // HTTP GET 요청 설정
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        // 응답을 문자열로 반환
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // 헤더 설정
         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // 호출을 실행하고 응답 받기
         $response = curl_exec($ch);
        // 에러 체크
        if ($response === false) {
            echo 'cURL Error: ' . curl_error($ch);
        }

        $ch2 = curl_init();
        // 호출할 URL 설정
        curl_setopt($ch2, CURLOPT_URL, $url2);
        // HTTP GET 요청 설정
        curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "GET");
        // 응답을 문자열로 반환
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
        // 헤더 설정
        curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers);
        // 호출을 실행하고 응답 받기
        $response2 = curl_exec($ch2);
        // 에러 체크
        if ($response2 === false) {
            echo 'cURL Error: ' . curl_error($ch2);
        }
    
        // cURL 세션 닫기
        curl_close($ch); 
    
        $data = json_decode($response, true); 
        $dataArmories = json_decode($response2, true);    

        $img_url = $dataArmories["CharacterImage"];

        foreach($data as $row) {
            if($row['CharacterName'] == $nickname) {
                $maxLevel = $row['ItemMaxLevel'];
                $job = $row['CharacterClassName'];
                $server = $row['ServerName'];
            }
        }
?>

<?php
    session_start();
    $id = $_GET["id"];
    $user_id = $_GET["id"];

    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email1  = $_POST["email1"];
    $email2  = $_POST["email2"];

    $email = $email1."@".$email2;
          
    $con = mysqli_connect("localhost", "user1", "12345", "project");
    $sql = "update members set pass='$pass', name='$name' , email='$email'";
    $sql .= " where id='$id'";
    mysqli_query($con, $sql);

    $sql = "update charinfo set nickname='$nickname', image_url='$img_url' , level='$maxLevel' , job='$job' , server='$server'";
    $sql .= " where user_id='$user_id'";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    $_SESSION["username"] = $name;
?>
<script>
    alert("회원정보 수정이 완료되었습니다.");
</script>
<?php
    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>

   
