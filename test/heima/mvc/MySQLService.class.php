
<?php
class MySQLService{
    private $mysqliObj = null;//保存链接成功的资源

    private $host;
    private $port;
    private $user;
    private $passwd;
    private $charset;
    private $dbname;

    private static $instance = null;
    static function shareInstance($config){
        if(!(self::$instance instanceof self)){
            self::$instance = new self($config);
        } 
        return self::$instance;
    }

    private function __clone(){}
    
    private function __construct($config){
        $this->host = !empty($config['host']) ? $config['host'] : '192.168.10.10';
        $this->port = !empty($config['port']) ? $config['port'] : 3306;
        $this->user = !empty($config['user']) ? $config['user'] : 'homestead';
        $this->passwd = !empty($config['passwd']) ? $config['passwd'] : 'secret';
        $this->charset = !empty($config['charset']) ? $config['charset'] : 'utf8';
        $this->dbname = !empty($config['dbname']) ? $config['dbname'] : 'homestead';
        $this->mysqliObj = new mysqli($this->host,$this->user,$this->passwd,$this->dbname,$this->port) or die('连接失败');
        $this->setCharset($this->charset);
        $this->selectDB($this->dbname);
    }

    /**
     * 设定使用的连接编码
     *
     * @param [string] $charset
     * @return bool
     */
    function setCharset($charset){
        return $this->mysqliObj->set_charset($charset);
    }

    /**
     * 选择使用的db名称
     *
     * @param [string] $dbname
     * @return bool
     */
    function selectDB($dbname){
        return $this->mysqliObj->select_db($dbname);
    }

    /**
     * 关闭数据库连接
     *
     * @return bool
     */
    function closeDB(){
        return $this->mysqliObj->close();
    }

    /**
     * 执行增删改操作
     *
     * @param [string] $sql
     * @return bool
     */
    function exec($sql){
        return $this->query($sql);
    }

    /**
     * 执行一条只会返回一行数据的语句
     * 数组的下标，就是sql语句中的取出的字段名；
     * @param [type] $sql
     * @return array
     */
    function getOneRow($sql){
        $result = $this->query($sql);
        $rec = $result->fetch_assoc();
        $result->free();//释放结果集
        return $rec;
    }

    /**
     * 执行一条返回多行数据的语句
     *
     * @param [string] $sql
     * @return array 二维数组
     */
    function getRows($sql){
        $result = $this->query($sql);
        $arr = array();
        while($rec = $result->fetch_assoc()){
            $arr[] = $rec;
        }
        $result->free();//释放结果集
        return $arr;
    }

    /**
     * 执行一条返回一个数据的语句，它可以返回一个直接值
     * 类似这样：select  count(*) as c  from  user_list
     * @param [string] $sql
     * @return void
     */
    function getOneData($sql){
        $result = $this->query($sql);
        $rec = $result->fetch_row();
        $data = $rec[0];
        $result->free();
        return $data;
    }

    private function query($sql){
        $result = $this->mysqliObj->query($sql);
        if($result === false){
            //对任何sql语句，执行失败，都需要处理这种失败情况：
			echo "<p>sql语句执行失败，请参考如下信息：";
			echo "<br />错误代号：" . $this->mysqliObj->errno;	//获取错误代号
			echo "<br />错误信息：" . $this->mysqliObj->error;	//获取错误提示内部
			echo "<br />错误语句：" . $sql;
			die();
        }
        return $result;
    }
}

// $config = array(
//     'host' => '192.168.10.10',
//     'port' => 3306,
//     'user' => 'homestead',
//     'passwd'=> 'secret',
//     'dbname'=> 'homestead',
//     'charset'=> 'utf8'
// );

// $obj = MySQLService::shareInstance($config);
// $sql = 'show tables';
// $result = $obj->getRows($sql);
// var_dump($result);