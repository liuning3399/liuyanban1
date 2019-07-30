<?php

require_once "connet.php";

require_once 'mysqlconfig.php';

$id = addslashes($_POST['uid']);

session_start();

$_SESSION["uid"] = $id;

$password = addslashes($_POST['password']);

$ma1 = new DB();

$link = $ma1->connect();

mysqli_query($link,"BEGIN");  //开始事务

$sql = "select * from tbl_ms where username='$id' and password='$password' FOR UPDATE";

$res = $ma1->CheckUser($link, $sql);

mysqli_query($link,"COMMIT");//事务提交即解锁

if ($res) {

    header("Location:add.php");

}else{

    echo "<script>alert('登录失败，账号或密码错误');location='index.php';</script>";

};

?>
