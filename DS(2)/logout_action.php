<?php
    session_start();
    $logout = @$_POST['logout'];
    if ($logout != "") {
        session_destroy();
        echo"登出中...";
        echo "<script>
        setTimeout(function(){window.location.href='index.php';},1000);
    </script>";
    }
    ?>