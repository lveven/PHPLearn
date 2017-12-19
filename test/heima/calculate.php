<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<?php
//array(0) { }  isset 是true
    if(!empty($_POST)){
        $data1 = $_POST["data1"];
        $data2 = $_POST["data2"];
        $op = $_POST["op"];
        $result = '';
        switch ($op){
            case '+':
            $result = $data1 + $data2;
            break;
            case '-':
            $result = $data1 - $data2;
            break;
            case '*':
            $result = $data1 * $data2;
            break;
            case '/':
            $result = $data1 / $data2;
            break;
            default:
            $result = '';
            break;
        }
    } else {
        $data1 = '';
        $data2 = '';
        $result = '';
    }
?>
<!--当action为空字符串的时候，是提交到本页面！
	表单中的所有数据，要想提交，都必须有name
-->
    <form action="" method='post'>
        <input type="text" name="data1" value="<?php echo isset($data1) ? $data1 : '' ?>"/>
        <select name="op">
        <option value="+" <?php if($op == "+"){ echo 'selected="selected"'; }?>>+</option>
        <option value="-" <?php if($op == "-"){ echo 'selected="selected"'; }?>>-</option>
        <option value="*" <?php if($op == "*"){ echo 'selected="selected"'; }?>>*</option>
        <option value="/" <?php if($op == "/"){ echo 'selected="selected"'; }?>>/</option>
        </select>
        <input type="text" name="data2" value="<?php echo isset($data2) ? $data2 : '' ?>"/>
        <input type="submit" value="="/>
        <input type="text" name="result" value="<?php echo $result ?>"/>
        <br/><input type="reset" name="resetaction" value="重置"/>
    </form> 
</body>
</html>