<?php
    session_start();
    $logout = @$_POST['logout'];
    if ($logout != "") {
        session_destroy();
        echo"登出中...";
        echo "<script>
        window.parent.location.reload();
    </script>";
    }
    ?>