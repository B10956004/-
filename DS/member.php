<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="1111.js"></script>
    <script>
        $(function(){
            $("#1234").click(function(){
                if($("#name").val()&& $("#sex").val() && $("#phone").val() && $("#age").val()&&$("#birthday").val()){
                    $.post({
                    url:"member_action.php",
                    data:{
                        name:$("#name").val(),
                        sex:$("#sex").val(),
                        phone:$("#phone").val(),
                        age:$("#age").val(),
                        birthday:$("#birthday").val(),
                    },
                    success:function(msg){
                        alert("更新成功");
                        location.href="member_printf.php";
                    },
                });
                }else{
                alert("不能有空值");
                }
        });
        });
    </script>
</head>
<body>
    <h1>新增會員資料</h1>
        姓名：<input type="text" id="name" /> <br>
        性別：<select id="sex">
            <option value="男">男</option>
            <option value="女">女</option>
        </select> <br>
        電話：<input type="text" id="phone" /> <br>
        年齡：<input type="text" id="age" /> <br>
        生日：<input type="date" id="birthday" /> <br>
        <button id="1234" >送出</button>
        <input type ="button" onclick="history.back()"value="回上頁"></input>
</body>
</html>