<?php
    if (!isset($userName)) {
        $userName = '';
    }

    $APIKEY = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsIng1dCI6IktYMk40TkRDSTJ5NTA5NWpjTWk5TllqY2lyZyIsImtpZCI6IktYMk40TkRDSTJ5NTA5NWpjTWk5TllqY2lyZyJ9.eyJpc3MiOiJodHRwczovL2x1ZHkuZ2FtZS5vbnN0b3ZlLmNvbSIsImF1ZCI6Imh0dHBzOi8vbHVkeS5nYW1lLm9uc3RvdmUuY29tL3Jlc291cmNlcyIsImNsaWVudF9pZCI6IjEwMDAwMDAwMDA1MjU3NDAifQ.FfrOTHfU43I4nFFYTa_4FczuIUaPF8rjaSxk09Vory-8ICO3iOscpRbhJZTZQxQ6aJEAbQfc_VTYxOzYDuwN9lGB-EdLOfVwv-qhC4jaYwx-8-Y4oJz3Ng8zqO0-8lK5Levzdnq-Q9g-ul4nGuO9X9fntQqTft0CtrcIOM70SA11Z6npJutpJLAmk2Jnifzn0bHwBmoIPXeEPe7fCzqRCH8Mys2fRK_JoFbTw_Q0aG-zmTl2p4WDsIrPthtcRqTWFE8em-HAW38PiFmUn6NGkgr25G2LIdvuMXGp8w9AZy9CKyiUp3-1ipc4zC6AWC3Cqb37X7I45WpVEp8wLEADAg";
    $url = "https://developer-lostark.game.onstove.com/armories/characters/".$userName."/profiles";
    $headers = array(
        "accept: application/json",
        "authorization: bearer ".$APIKEY
    );

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

    // cURL 세션 닫기
    curl_close($ch);

    $dataArmories = json_decode($response, true);
?>