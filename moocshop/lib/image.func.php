<?php
require_once './string.func.php';
// echo phpinfo();

function verifyImage($type=1,$length=4,$pixel=0,$line=0,$sess_name="verify"){
    //通过GD库做验证码
    //创建画布
    $width = 80;
    $height = 28;
    $image = imagecreatetruecolor($width,$height);

    //创建颜色
    $whiteColor = imagecolorallocate($image,255,255,255);
    //创建填充矩形
    imagefilledrectangle($image,0,0,$width,$height,$whiteColor);

    $chars = buildRandomString(3,4);
    $_SESSION [$sess_name] = $chars;
    $fontfiles = array ("ChalkboardSE.ttc" );
    for($i = 0; $i < 4; $i ++) {
        $size = mt_rand ( 14, 18 );
        $angle = mt_rand ( - 15, 15 );
        $x = 5 + $i * $size;
        $y = mt_rand ( 20, 26 );
        // $fontfile = "./fonts/" . $fontfiles [mt_rand ( 0, count ( $fontfiles ) - 1 )];
        $fontfile = "../fonts/" . $fontfiles[0];
        $color = imagecolorallocate ( $image, mt_rand ( 50, 90 ), mt_rand ( 80, 200 ), mt_rand ( 90, 180 ) );
        $text = substr ( $chars, $i, 1 );
        imagettftext ( $image, $size, $angle, $x, $y, $color, $fontfile, $text );
        // imagechar($image,$size,$x,$y,$text,$color);
    }
    if ($pixel) {
        for($i = 0; $i < $pixel; $i ++) {
            $color = imagecolorallocate ( $image, mt_rand ( 50, 90 ), mt_rand ( 80, 200 ), mt_rand ( 90, 180 ) );
            imagesetpixel ( $image, mt_rand ( 0, $width - 1 ), mt_rand ( 0, $height - 1 ), $color );
        }
    }
    if ($line) {
        for($i = 1; $i < $line; $i ++) {
            $color = imagecolorallocate ( $image, mt_rand ( 50, 90 ), mt_rand ( 80, 200 ), mt_rand ( 90, 180 ) );
            imageline ( $image, mt_rand ( 0, $width - 1 ), mt_rand ( 0, $height - 1 ), mt_rand ( 0, $width - 1 ), mt_rand ( 0, $height - 1 ), $color );
        }
    }

    //浏览器中输出格式设置
    header('content-type:image/png');
    //图片输出格式设置
    // imagepng($image,'./bg.png');
    imagepng($image);

    //销毁资源
    imagedestroy($image);
}

verifyImage(2,5,30,4);
