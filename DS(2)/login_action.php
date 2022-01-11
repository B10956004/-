<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php
include('SQLserver.php');
$account=$_POST['account'];
$pw=$_POST['pw'];
if($account&&$pw != ""){
    $sql="SELECT * FROM member_account WHERE account='$account' and password='$pw'";
    $result=mysqli_query($link,$sql);
    $rows=mysqli_num_rows($result);
    if($rows){
        $result=mysqli_fetch_assoc($result);
        $no=$result['No'];
        $name=$result['username'];
        $admin=$result['admin'];
        session_start();//存入session
        $_SESSION['account']=$account;
        $_SESSION['admin']=$admin;
        $_SESSION['no']=$no;
        $_SESSION['username']=$name;
        echo"<script>
        window.parent.frames[0].location.reload();
        window.parent.frames[2].location.reload();
        </script>";
    }else {
        echo"帳號或密碼錯誤";
        header("refresh:1;url=Xlogin.php");
    }
}else {
    echo"<script>
    alert('帳號或密碼填寫不完整');
    setTimeout(function(){window.location.href='Xlogin.php'},1000);
    </script>";
}
echo "<script>
            setTimeout(function(){window.location.href='Xlogout.php';},0);
            </script>";


?>
</body>

</html>