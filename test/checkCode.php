<?php
function buildRandomString($type=1,$length=4){
    $chars = '';
    switch ($type) {
        case 1://数字
        $chars = join('',range(0,9));
        break;
        case 2://字母
        $chars = join('',array_merge(range('a','z'),range('A','Z')));
        break;
        case 3://字母+数字
        $chars = join('',array_merge(range(0,9),range('a','z'),range('A','Z')));
        break;
        default:
        $chars = join('',range(0,9));
        break;
    }

    if($length > strlen($chars)) {
        exit('字符串长度不够');
    }

    //打乱$chars顺序
    $chars = str_shuffle($chars);
    return substr($chars,0,$length);
}

$width = 80;
$height = 28;
//创建画布
$image = imagecreatetruecolor($width,$height);

//创建颜色
$whiteColor = imagecolorallocate($image,255,255,255);

//创建填充矩形
imagefilledrectangle($image,0,0,$width,$height,$whiteColor);

$chars = buildRandomString(3,4);
$sess_name = 'checkcode';
$_SESSION [$sess_name] = $chars;
$fontfiles = array ("ChalkboardSE.ttc" );
for($i = 0; $i < 4; $i ++) {
    $size = mt_rand ( 14, 18 );
    $angle = mt_rand ( - 15, 15 );
    $x = 5 + $i * $size;
    $y = mt_rand ( 20, 26 );
    // $fontfile = "./fonts/" . $fontfiles [mt_rand ( 0, count ( $fontfiles ) - 1 )];
    $fontfile = "./fonts/" . $fontfiles[0];
    $color = imagecolorallocate ( $image, mt_rand ( 50, 90 ), mt_rand ( 80, 200 ), mt_rand ( 90, 180 ) );
    $text = substr ( $chars, $i, 1 );
    imagettftext ( $image, $size, $angle, $x, $y, $color, $fontfile, $text );
    // imagechar($image,$size,$x,$y,$text,$color);
}
// if ($pixel) {
//     for($i = 0; $i < 50; $i ++) {
//         imagesetpixel ( $image, mt_rand ( 0, $width - 1 ), mt_rand ( 0, $height - 1 ), $black );
//     }
// }
// if ($line) {
//     for($i = 1; $i < $line; $i ++) {
//         $color = imagecolorallocate ( $image, mt_rand ( 50, 90 ), mt_rand ( 80, 200 ), mt_rand ( 90, 180 ) );
//         imageline ( $image, mt_rand ( 0, $width - 1 ), mt_rand ( 0, $height - 1 ), mt_rand ( 0, $width - 1 ), mt_rand ( 0, $height - 1 ), $color );
//     }
// }

//浏览器中输出格式设置
header('content-type:image/png');
//图片输出格式设置
// imagepng($image,'./bg.png');
imagepng($image);

//销毁资源
imagedestroy($image);
?>