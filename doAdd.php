<?php

session_start();

$id = $_SESSION["uid"];

$title = addslashes($_POST["title"]);

$author = addslashes($_POST["author"]);

$_SESSION["authorl"] = $author;

$content = addslashes($_POST["content"]);

$ip = $_SERVER["REMOTE_ADDR"];

require_once "connet.php";

require_once 'mysqlconfig.php';

$ma1 = new DB();

$link = $ma1->connect();

$fp = fopen("lock.txt", "w+");
if (!flock($fp, LOCK_EX | LOCK_NB)) {
    echo "系统繁忙，请稍后再试";
    return;
}


$sql = "insert into tbl_ms1 (user,title,author,ip,liuyan,time) values('$id','$title','$author','$ip','$content',now())";

if ($title) {

    if ($author) {

        $res = $ma1->insertl($link, $sql);

        flock($fp, LOCK_UN);//释放锁

    } else {

        echo "<script>alert('请输入留言者！');location='add.php';</script>";

    };

} else {

    echo "<script>alert('请输入留言标题！');location='add.php';</script>";

};

fclose($fp);

?>
