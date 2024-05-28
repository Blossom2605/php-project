<?php
session_start();

// 오늘 날짜 구하기
$today = date("Y-m-d");

// 데이터베이스 연결
$con = mysqli_connect("localhost", "user1", "12345", "project");

// 이전 출첵 날짜와 포인트 가져오기
$sql = "SELECT c.last_checkin_date, m.point 
        FROM checkins c 
        JOIN members m ON c.user_id = m.id 
        WHERE c.user_id = '{$_SESSION['userid']}'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$lastCheckinDate = $row['last_checkin_date'];
$points = $row['point'];

// 출첵 여부 확인
if ($lastCheckinDate != $today) {
    // 오늘 출첵하지 않은 경우
    $pointsEarned = rand(100, 500);

    // members 테이블에서 포인트 업데이트
    $sql = "UPDATE members SET point = point + $pointsEarned WHERE id = '{$_SESSION['userid']}'";
    mysqli_query($con, $sql);

    // checkins 테이블에서 출첵 날짜 업데이트
    $sql = "UPDATE checkins SET last_checkin_date = '$today' WHERE user_id = '{$_SESSION['userid']}'";
    mysqli_query($con, $sql);

    // 출첵 알림창 띄우고 index.php로 이동
    if($pointsEarned >= 100 && $pointsEarned < 200) {
        echo "<script>alert('출첵 성공! 오늘은 {$pointsEarned} 포인트를 획득했습니다. 포인트가 짜다..ㅠ');</script>";
    }
    else if($pointsEarned >= 200 && $pointsEarned < 400) {
        echo "<script>alert('출첵 성공! 오늘은 {$pointsEarned} 포인트를 획득했습니다. 오늘은 운이 보통인걸요?');</script>";
    }
    else {
        echo "<script>alert('출첵 성공! 대박! 오늘은 {$pointsEarned} 포인트를 획득했어요! 오늘은 다 잘 되겠는걸요?');</script>";
    }
    echo "<script>location.href = 'index.php';</script>";
} else {
    // 이미 출첵한 경우
    echo "<script>alert('오늘은 이미 출첵했습니다.');</script>";
    echo "<script>location.href = 'index.php';</script>";
}

// 데이터베이스 연결 종료
mysqli_close($con);

// 세션에 포인트 업데이트
$_SESSION['userpoint'] = $points + $pointsEarned;
?>