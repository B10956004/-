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
    session_start();
    $no = $_SESSION['no'];
    $sql = "SELECT *FROM member_account WHERE No='$no'";
    $result = mysqli_fetch_array(mysqli_query($link, $sql));
    $pw = $result['password'];
    $email = $result['email'];
    echo "<h1>修改密碼或電子郵件</h1>";
    echo "<form name='form' method='post' action='password_revise_action.php'>";
    echo "原密碼：<input type='text' name='pw_o' readonly='readonly' value='$pw'/> <br>
        新密碼:<input type='password' name='pw'/><br>注意:密碼最少6個字元，要含英文+數字組合，且至少要有1個大寫英文1個小寫英文<BR>
        <input type='submit' name='button' value='更新' />";
    echo "</form>";
    echo "<form name='form' method='post' action='password_revise_action_email.php'>";
    echo "原E-Mail：<input type='text' name='email_o' readonly='readonly' value='$email'/> <br>
    新E-Mail:<input type='text' name='email'/><br>
    <input type='submit' name='button' value='更新' />";
    echo "</form>";
    ?>
<input type ='button' onclick="history.back()"value='回上頁'></input>

</body>

</html>