<?php
require_once('./response.php');
require_once('./db.php');
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$pageSize = isset($_GET['pageSize']) ? $_GET['pageSize'] : 6;
if(!is_numeric($page) || !is_numeric($pageSize)) {
    return Response::json(401,'数据不合法');
}
$offset = ($page -1) * $pageSize;
$sql = "select * from video where status = 1 order by orderby desc limit ".$offset.",".$pageSize;
echo $sql;

$db = Db::getInstance();
$connect = $db->connect();
$result = mysqli_query($connect,$sql);
var_dump($result);
?>