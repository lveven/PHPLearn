<?php
class File {
    private $_dir;
    const EXT = 'json';
    function __construct(){
        $this->_dir = dirname(__FILE__).'/files/';
    }
    /**
     * 存储缓存、删除缓存、取缓存
     * value = '' 时 取缓存
     * value = null 时 删除缓存
     * value = 'xxx' 时 存储缓存
     * @param string $key 文件名
     * @param string $value 要存储的数据
     * @param string $path 文件路径
     * @return void
     */
    public function cacheData($key,$value = '',$path = ''){
        $filename = $this->_dir.$path.$key.'.'.self::EXT;
        if($value !== '') {
            //如果vaule = null 删除缓存
            if(is_null($value)){
                return @unlink($filename);
            }
             $dir = dirname($filename);
             //如果目录不存在，创建目录
             if(!is_dir($dir)){
                 mkdir($dir,0777);
             }
             return file_put_contents($filename,json_encode($value));
        }

        if(!is_file($filename)){
            return FALSE;
        } else {
            return json_decode(file_get_contents($filename),true);
        }
    }
}
?>