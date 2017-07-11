<?php
require_once('./response.php');
require_once('./file.php');

$arr = array(
    'id' => 1,
    'name' => 'leoliu'
);

$file = new File();
if($file->cacheData('index_mk_cache','')) {
    echo 'success'.'<br>';
} else {
    echo 'fail'.'<br>';
}

var_dump($file->cacheData('index_mk_cache',''));
// 返回路径中的目录部分 
echo dirname(__FILE__) ."<br>";//与__DIR__等价

// 文件的完整路径和文件名
echo __FILE__ . '<br>';

echo '<br>';
// Response::json(200,'数据返回成功',$arr);

?>