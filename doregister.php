<?php

require_once "connet.php";

require_once 'mysqlconfig.php';

$ma1 = new DB();

$link = $ma1->connect();

$id = addslashes($_POST['id']);

$password = addslashes($_POST['password']);

$confirmPassword = addslashes($_POST['confirmPassword']);

if ($password != $confirmPassword) {

    echo "<script>alert('输入的密码和确认的密码不相等');location='register.php';</script>";;

}

mysqli_query($link,"BEGIN");  //开始事务

$alt = "select * from tbl_ms where username='$id' FOR UPDATE";

$res = $ma1->print1($link, $alt);

mysqli_query($link,"COMMIT");//事务提交即解锁

if ($id != null && $password != null) {

    $ma = new DB();

    $link = $ma->connect();

    $sql = "insert into tbl_ms (username,password) values('$id','$password')";

    for ($i = 0; $i < count($res); $i++) {

        if ($id != $res[$i]['username']) {

            $res = $ma->insert($link, $sql);

        };

        if ($id == $res[$i]['username']) {

            echo "<script>alert('注册失败，该账号已被注册！');location='register.php';</script>";

        }

    }

} else {

    echo "<script>alert('注册失败，请输入账号和密码');location='register.php';</script>";

}

?>
