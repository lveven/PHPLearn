<?php
/**
 * 连接数据库
 *  
 * @return link 
 */
function connect(){
    $link = mysqli_connect(DB_HOST,DB_USER,DB_PWD) or die('数据库连接失败'.mysqli_connect_error());
    mysqli_set_charset($link,DB_CHARSET);
    mysqli_select_db($link,DB_DBNAME) or die('指定数据库打开失败');
    echo '数据库连接成功';
    return $link;
}
/**
 * 数据库插入操作
 *  
 * @param [string] $table
 * @param [array] $array
 * @return 插入成功后自动生成的插入id
 */
function insert($table,$array){
    $link = $GLOBALS['link'];
    $keys = join(',',array_keys($array));
    $values = "'".join(',',array_values($array))."'";
    $sql = "insert into {$table} ({$keys}) values({$values})";
    mysqli_query($link,$sql);
    return mysqli_insert_id($link);
}
/**
 * 数据库更新操作
 *
 * @param [string] $table
 * @param [array] $array
 * @param [string] $where
 * @return 数据库更新成功后的响应行数
 */
function update($table,$array,$where=null){
    $link = $GLOBALS['link'];
    foreach($array as $key=>$val){
        if($str==null){
            $sep="";
        }else{
            $sep=",";
        }
        $str.=$sep.$key."=".$val."'";
    }
    $sql = "update {$table} set {$str} ".($where==null?null:" where ".$where);
    $result = mysqli_query($link,$sql);
    if($result){
        return mysqli_affected_rows($link);
    } else {
        return false;
    }
}
/**
 * 数据库删除操作
 *
 * @param [string] $table
 * @param [string] $where
 * @return void
 */
function delete($table,$where=null){
    $link = $GLOBALS['link'];
    $where = $where == null ? null: 'where '.$where;
    $sql = 'delete from {$table} {$where}';
    mysqli_query($link,$sql);
    return mysqli_affected_rows($link);
}
/**
 * 得到结果集中一条记录
 *
 * @param [string] $sql
 * @param [string] $result_type
 * @return void
 */
function fetchOne($sql,$result_type = MYSQLI_ASSOC){
    $link = $GLOBALS['link'];
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_array($result,$result_type);
    return $row;
}

/**
 * 得到结果集中的记录条数
 *
 * @param [string] $table
 * @param [string] $result_type
 * @return void
 */
function fetchAll($table,$result_type = MYSQLI_ASSOC){
    $link = $GLOBALS['link'];
    $result = mysqli_query($link,$sql);
    while(@$row-mysqli_fetch_array($result,$result_type)){
        $rows[]=$row;
    }
    return $rows;
}
/**
 * 得到结果集中的记录条数
 *
 * @param [string] $sql
 * @return number
 */
function getResultNum($sql){
    $link = $GLOBALS['link'];
    $result = mysqli_query($link,$sql);
    return mysqli_num_rows($result);

}

/**
 * 得到上一步插入记录的ID号
 *
 * @return number
 */
function getInsertId(){
    $link = $GLOBALS['link'];
    return mysqli_insert_id($link);
}
?>