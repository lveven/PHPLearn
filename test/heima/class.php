<?php
class C1{
    const PI = 3.14;
    const G = 9.8;
}
$v1 = C1::PI * 3 * 3;
echo "<br/>C1::G = ".C1::G;

class Student{
    public $name = '';
    static $count = 0;

    static function showInfo(){
        echo '<br>实例属性别调用'.self::$count;
    }
}

$s1 = new Student();
$s1->name = 'leoliu';

Student::$count++;

$s2 = new Student();
$s2->name = 'leoliu1';
Student::$count ++;

Student::showInfo();

echo "<br/> 当前学生人数：".Student::$count;

class MyDreamGirl{
    var $name;
    var $age;
    var $edu;

    function __construct($name,$age,$edu){
        $this->name = $name;
        $this->age = $age;
        $this->edu = $edu;
    }

    function __destruct(){
        echo '<br>销毁了！！！：'.$this->name;
    }
    function xiyifu(){
        echo "<br>{$this->age}岁的{$this->edu}学历";
        echo "的{$this->name}在轻快的洗衣服";
    }
}

// $girl1 = new MyDreamGirl();
// $girl1->name = "笑话";
// $girl1->age = 18;
// $girl1->edu = '大学';

// $girl1->xiyifu();

$girl2 = new MyDreamGirl('小花',18,'大学');
$girl2->xiyifu();
// unset($girl2);
echo '<br> over';

class A {
    static public $p1 = 1;
    static protected $p2 = 2;
}

class B extends A {
    static function show(){
        echo "<br>子类B中的方法";
        echo "<br>p1:".parent::$p1;
        echo "<br>p2:".parent::$p2;
    }
}

B::show();

class C {
    public $p1 = 1;
    function showInfo(){
        echo "<br>C中属性p1:".$this->p1;
    }
}

class D extends C{
    function show(){
        echo "<br>调用父类方法：";
        parent::showInfo();
    }
}

$d1 = new D();
$d1->show();