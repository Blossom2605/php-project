<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $num = $_GET["num"];
        $page = $_GET["page"];
    ?>
    <script>
        var x = confirm("진짜 삭제?")
        if (x === true){
            location.href = "board_delete.php?num=<?=$num?>&page=<?=$page?>"
        }
        else {
            history.back();
        }
    </script>
</body>
</html>