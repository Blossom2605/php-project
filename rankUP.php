<?php
// 세션 시작
session_start();

// 로그인되어 있는지 확인
if (!isset($_SESSION["userid"])) {
    // 로그인되어 있지 않다면 메인 페이지로 이동
    header("Location: index.php");
    exit();
}

// 랭크업 여부를 확인하고 랭크업할지 결정
if($_SESSION["userlevel"] < 7) {
    // 레벨별로 필요한 포인트를 배열에 저장
    $required_points = [200, 400, 800, 1600, 3200, 10000];

    // 사용자의 포인트와 레벨 정보를 세션에서 가져옴
    $userpoint = $_SESSION["userpoint"];
    $userlevel = $_SESSION["userlevel"];

    // 레벨에 따른 필요한 포인트 계산
    $required_point = $required_points[$userlevel - 1];

    // 랭크업 가능 여부 확인
    if ($userpoint < $required_point) {
        // 필요한 포인트가 부족한 경우
        echo "<script>alert('등급업에 필요한 포인트(" . $required_point . ")가 부족합니다.');</script>";
    } else {
        // 랭크업 가능한 경우
        // 데이터베이스 연결
        $con = mysqli_connect("localhost", "user1", "12345", "project");

        // 사용자의 포인트와 레벨 정보 업데이트
        $new_userpoint = $userpoint - $required_point;
        $new_userlevel = $userlevel + 1;

        // 사용자의 정보를 업데이트하는 SQL 쿼리 실행
        $sql = "UPDATE members SET point = '$new_userpoint', level = '$new_userlevel' WHERE id = '{$_SESSION["userid"]}'";
        $result = mysqli_query($con, $sql);

        // 데이터베이스 연결 종료
        mysqli_close($con);

        // 세션의 포인트와 레벨 정보 업데이트
        $_SESSION["userpoint"] = $new_userpoint;
        $_SESSION["userlevel"] = $new_userlevel;

        // 랭크업 완료 메시지 출력
        echo "<script>alert('랭크업이 완료되었습니다!');</script>";
    }
} else {
    // 최대 레벨에 도달한 경우
    echo "<script>alert('회원등급을 더 이상 올릴 수 없습니다.');</script>";
}

// 메인 페이지로 이동
echo "<script>location.href = 'index.php';</script>";
?>
