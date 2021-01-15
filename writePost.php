<?php
    include "lib.php";

    $idx = $_POST['idx'];
    $subject = $_POST['subject'];
    $name = $_POST['name'];
    $memo = $_POST['memo'];

    $idx = mysqli_real_escape_string($conn,$idx);
    $subject = mysqli_real_escape_string($conn,$subject);
    $name = mysqli_real_escape_string($conn,$name);
    $memo = mysqli_real_escape_string($conn,$memo);

    if($idx){   //수정
        $query = "update sing_board set subject='$subject', name='$name', memo='$memo' where idx='$idx'";
        
        mysqli_query($conn, $query);
    }else{
        $regdate = date("Y-m-d H:i:s");
        $result = mysqli_query($conn, 'SELECT max(idx) From sing_board');
        $data = mysqli_fetch_array($result);
        $idx = $data[0]+1;
        echo $idx;
        $ip = $_SERVER[REMOTE_ADDR];

        $query = "insert into sing_board(idx, subject, name, memo, regdate, ip) values('$idx','$subject','$name','$memo','$regdate','$ip')";

        mysqli_query($conn, $query);
        echo $query;
    }
?>

<script>
    location.href='list.php';
</script>
