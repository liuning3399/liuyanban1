
<?php

header('Content-type: text/html; charset=UTF8');

?>

<html>

<head>

    <title>我的留言板.查看留言</title>

    <link rel="stylesheet" type="text/css" href="./css/index1.css">

</head>

<body background="./images/7.jpg" style="background-size:cover;background-attachment: fixed;" >

<center>

    <h2>我的留言板</h2>

    <input type = "button" value = "添加留言" onclick="location.href='add.php'" class="button"/>

    <input type = "button" value = "查看留言" onclick="location.href='show.php'" class="button"/>

    <input type = "button" value = "退出登陆" onclick="location.href='index.php';logout()" class="button"/>

    <hr width = "70%">

</center>

<?php

//数据库连接

$con = @mysqli_connect("127.0.0.1","root","root","my1");

if(!$con){

    die("数据库连接错误".mysqli_connect_error());

}

mysqli_query($con,"set names 'utf8'");

//显示每页的留言数

$pagesize = 8;

//确定页数p参数

@$p = $_GET['p']?$_GET['p']:1;

//数据指针

$offset = ($p-1)*$pagesize;

//查询本页现实的数据

session_start();

$id=$_SESSION["uid"];

$query_sql = "select * from tbl_ms1 where user= '$id' order by user desc limit $offset,$pagesize";

# echo $query_sql;

$result = mysqli_query($con,$query_sql);

/*if (!$result) {

    printf("Error: %s\n", mysqli_error($con));

    exit();

}*/

//循环输出

echo "<div style='margin-top:55px'>";

while($res = mysqli_fetch_array($result)){

    echo "<div class='k'>";

    echo "<div class='ds-post-main'>";

    echo "<div class='ds-comment-body'>

			<span>{$res['author']}  于  {$res['time']}  给我留言</span>

			<span style='float:right'><a href = 'del.php?id=".$res['id']."'><input type='submit' class='button1' value='删除'></input></a></span>

			<p>留言主题 : {$res['title']}   留言地址 : <span>{$res['ip']}</span></p>

            <hr width=450px> 

			<p>{$res['liuyan']}</p></div><br>";

    echo "</div>";

    echo "</div>";

}

echo "</div>";

//分页代码

//计算留言总数

$count_result = mysqli_query($con,"select count(*) as count from tbl_ms1 where user= '$id'");

$count_array = mysqli_fetch_array($count_result);



//计算总的页数

$pagenum = ceil($count_array['count']/$pagesize);

//echo '共',$count_array['count'],'条留言';

//echo '共',$pagenum,'页';

echo "<center>";

echo "<div style='display: inline-block;margin-right: 15px;margin-left:15px;'>",'共',$count_array['count'],'条留言','</div>';

echo "<div style='display: inline-block;margin-right: 15px;margin-left:15px;'>",'共',$pagenum,'页','</div>';



//循环输出个页数及链接

if($pagenum>1){

    for($i = 1;$i<=$pagenum;$i++){

        if($i == $p){

            echo "<div style='background:#e8ffc4;width:25px;display: inline-block;margin-right: 10px;'>",$i,"</div>";



        }else{

            //echo  '<a href="show.php?p=',$i,'">',$i,'</a>';

            echo '<a href="show.php?p=',$i,'">',"<div style='width:25px;display: inline-block;margin-right: 10px;background:#FF9D6F'>",$i,'</div>','</a>';

        }

    }

    echo "<div style='display: inline-block;margin-right: 10px;'>",'当前在 ',$p, ' 页',"</center></div>";

}

echo "<br>";

echo "<br>";

echo "<br>";

echo "</div>";

?>

<script type="text/javascript">

    function logout(){

    <%

        session.invalidate(); //运用invalidate()比较好，退出时使session失效

    %>

    }

</script>

</body>

</html>
