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
    $city = $_POST['city'];
    $element=$_POST['element'];
    header("location:admin_weather_revise&delete.php?city=$city&element=$element");
    ?>
</body>
</html>