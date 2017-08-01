<?php
require_once '../include.php';
/**
 * 生成验证码图片
 *
 * @param integer $type  验证码类型 1仅数字 2仅字母 3数字字母混合
 * @param integer $length 验证码长度
 * @param integer $pixel 干扰点的数量
 * @param integer $line 干扰线的数量
 * @param string $sess_name 存储在session中的字段名
 * @return void
 */
function verifyImage($type=1,$length=4,$pixel=0,$line=0,$sess_name="verify"){
    //通过GD库做验证码
    // session_start();
    //创建画布
    $width = 80;
    $height = 28;
    $image = imagecreatetruecolor($width,$height);

    //创建颜色
    $whiteColor = imagecolorallocate($image,255,255,255);
    //创建填充矩形
    imagefilledrectangle($image,0,0,$width,$height,$whiteColor);

    $chars = buildRandomString($type,$length);
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

/**
 * 生成缩略图
 *
 * @param [string] $filename 图片资源
 * @param [string] $destination 形如"../testupload/uploads/aa.jpg"
 * @param [int] $dst_w 生成缩略图的宽
 * @param [int] $dst_h 生成缩略图的高
 * @param boolean $isReverseSource 是否删除原图片资源
 * @param float $scale 默认缩放比例
 * @return string 返回文件名
 */
function thumb($filename,$destination=null,$dst_w=null,$dst_h=null,$isReverseSource=false,$scale=0.5){
    list($src_w,$src_h,$imagetype) = getimagesize($filename);
    if(is_null($dst_w) || is_null($dst_h)){
        $dst_w = ceil($src_w*$scale);
        $dst_h = ceil($src_h*$scale);
    }
    $mime = image_type_to_mime_type($imagetype);

    $createFun = str_replace("/","createfrom",$mime);
    $outFun = str_replace("/",null,$mime);
    $src_image = $createFun($filename);
    $dst_image = imagecreatetruecolor($dst_w,$dst_h);
    imagecopyresampled($dst_image,$src_image,0,0,0,0,$dst_w,$dst_h,$src_w,$src_h);
    if($destination&&!file_exists(dirname($destination))){
        mkdir(dirname($destination),0777,true);
    }
    // $destFileName = dirname($destination).".".getExt($filename);
    $destFileName = $destination == null ? getUniName().".".getExt($filename) : $destination;
    $outFun($dst_image,$destFileName);
    imagedestroy($src_image);
    imagedestroy($dst_image);
    if($isReverseSource){
        unlink($filename);
    }
    return $destFileName;
}
