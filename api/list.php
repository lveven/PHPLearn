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

$db = Db::getInstance();
try{
    $connect = $db->connect();
    $result = mysqli_query($connect,$sql);
} catch(Exception $e){
    return Response::json(403,'数据库连接异常');
}

$videos = array();
while($video=mysqli_fetch_assoc($result)){
    $videos[] = $video;
}

if($videos){
    return Response::json(200,'首页数据获取成功',$videos);
} else {
    return Response::json(400,'首页数据获取失败',$videos);
}
?>