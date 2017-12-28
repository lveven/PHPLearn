<?php
class A{
    public $p1 = 1;
    //用来存储未定义的属性
    protected $prop_list = array();

    function __get($prop_name){
        echo "<br>get你调用了一个不存在的属性:{$prop_name}";
        if(isset($this->prop_list[$prop_name])){
            return $this->prop_list[$prop_name];
        }
        return '属性不存在';
    }

    function __set($p,$v){
        echo "<br> set方法被调用{$p}={$v}";
        $this->prop_list[$p] = $v;
    }

    function __isset($prop_name){
        echo "<br>isset你调用了一个不存在的属性:{$prop_name}";
        $v1 = isset($this->prop_list[$prop_name]);
        return $v1;
    }

    function __unset($prop_name){
        echo "<br>unset你调用了一个不存在的属性:{$prop_name}";
        unset($this->prop_list[$prop_name]);
    }

    function __call($methodName,$argument){
        echo "<br>call你调用了一个不存在的方法:{$methodName}";
    }

    function __callstatic($methodName,$argument){
        echo "<br>call你调用了一个不存在的方法:{$methodName}";
    }
}

$obj = new A();
// $obj->p1;
$obj->p2 = 1;

echo "<br>p2:".$obj->p2;
if(isset($obj->p2)){
    echo "<br> 存在";
} else{
    echo "<br> 不存在";
}

$obj->f1();