<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body id="login">
    <form name="form" method="post" action="login_action.php">
        帳號：<input type="text" name="account" /> <br>
        密碼：<input type="password" name="pw" /> <br><BR>
        <input type="submit" name="button" value="登入" />&nbsp;&nbsp;  
        <input type="button" onclick="register()" value="申請帳號">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</input>
        <input type="button" onclick="forget()" value="忘記密碼"></input>
    </form>
    <script language="javascript">
        function register() {
            setTimeout(function(){window.location.href='Xregister.php';},10);
        }
        function forget() {
            setTimeout(function(){window.location.href='Xforget.php';},10);
        }
    </script>
</body>

</html>