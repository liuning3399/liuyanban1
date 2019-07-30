
<?php

header('Content-type: text/html; charset=UTF8');

?>

<html>

<head>

    <link rel="stylesheet" type="text/css" href="./css/index1.css">

    <title>我的留言板.添加留言</title>

</head>

<body background="./images/7.jpg" style="background-size:cover;" >

<center>

    <h2>我的留言板</h2>

    <input type = "button" value = "添加留言" onclick="location.href='add.php'" class="button"/>

    <input type = "button" value = "查看留言" onclick="location.href='show.php'" class="button"/>

    <input type = "button" value = "退出登陆" onclick="location.href='index.php'" class="button"/>

    <hr width = "70%">

</center>

<div class="k1">

    <form action = "doAdd.php" method = "post">

        <h1>Add A Message

            <span>What's New To Share With You。</span>

        </h1>

        <label>

            <span>Your Name :</span>

            <input type="text" name="author" placeholder="Your Full Name" />

        </label>



        <label>

            <span>Title :</span>

            <input type="text" name="title" placeholder="Please input title" />

        </label>



        <label>

            <span>Message :</span>

            <textarea name="content" placeholder="Your Message to Us"></textarea>

        </label>

        <div style="margin-left:125px">

            <input type="submit" value="提交" class="submit">

            <input type = "reset" value = "重置" class="reset">

        </div>

</div>

</form>

</body>

</html>


