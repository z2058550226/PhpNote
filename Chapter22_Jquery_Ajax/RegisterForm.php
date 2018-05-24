<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/13
 * Time: 12:32
 */
?>
<!--<script type="text/javascript" src="jquery-3.3.1.min.js"></script>-->
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.js"></script>
<script type="text/javascript">
    $('document').ready(function () {
        $('#check_un').click(function (e) {
            //检索用户名字段值
            var username = $('#username').val();
            //用jQuery的$.get函数发送一个GET请求到JqueryTest1.php,判断是否在数据库（伪）中
            $.get(
                "JqueryTest1.php",
                {username: username},
                function (response) {
                    console.log(response.status);
                    if (response.status === false) {
                        console.log("false branch");
                        $('#valid').html("Not available!");
                    } else {
                        console.log("true branch");
                        $('#valid').html("Available!");
                    }
                },
                "json"
            );
            //防止链接被跟踪
            e.preventDefault();
        });
    });
</script>

<form id="form_register" method="get" action="RegisterForm.php">

    <p>
        Provide your email address <br/>
        <input type="text" name="email" value=""/>
    </p>

    <p>
        Choose a username<br/>
        <input type="text" id="username" value="" name="username"/>
        <button class="button" id="check_un">Check Username</button>
        <br/>

        <span id="valid"></span>
    </p>

    <p>
        input your password<br/>
        <input type="password" id="psw1" value=""/><br/>
        <input type="password" id="psw2" value=""/>
    </p>

    <p>
        <input type="submit" name="submit" value="Register"/>
    </p>

</form>