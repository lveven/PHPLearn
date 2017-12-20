<?php
//array(0) { }  isset 是true
    if(!empty($_POST)){
        echo "_POST<br>";
        var_dump($_POST);
    } 
    if(!empty($_GET)){
        echo "<br>_GET<br>";
        var_dump($_GET);
    }

    if(!empty($_REQUEST)){
        echo "<br>_REQUEST<br>";
        var_dump($_REQUEST);
    }
?>
<!--当action为空字符串的时候，是提交到本页面！
	表单中的所有数据，要想提交，都必须有name
-->
    <form action="request.php?data1=1&d2=2" method='post'>
    数据1:<input type="text" name="data1"/>
    数据2:<input type="text" name="data2"/>
    <input type="submit" value="提交"/>
    </form> 