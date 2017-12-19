<?php
class Response {

    const JSON = 'json';
    /**
     * 按综合方式返回数据
     *
     * @param [integer] $code
     * @param [array] $data
     * @return void
     */
    public static function show($code,$data = array()){
        if(!is_numeric($code)){return '';}
        $msg = self::messageFromCode($code);
        $result = array(
            'code' => $code,
            'message' => $msg,
            'data' => $data
        );

        $type = isset($_GET["format"]) ? $_GET["format"] : self::JSON;
        if($type == 'json'){
            self::json($code,$data);
            exit;
        } elseif($type == 'array'){
            var_dump($data);
            exit;
        } elseif($type == 'xml'){
            self::xmlEncode($code,$data);
            exit;
        } else {
            //TODO:
        }
    }
    /**
     * 按json格式输出通信数据
     *
     * @param [integer] $code
     * @param array $data
     * @return void
     */
    public static function json($code,$data = array()){
        if(!is_numeric($code)){return '';}
        $msg = self::messageFromCode($code);
        $result = array(
            'code' => $code,
            'message' => $msg,
            'data' => $data
        );

        echo json_encode($result);
        exit;
    }

    /**
     * 按xml方式输出数据
     *
     * @param [integer] $code
     * @param array $data
     * @return void
     */
    public static function xmlEncode($code,$data = array()){
        if(!is_numeric($code)){return '';}
        $msg = self::messageFromCode($code);
        $result = array(
            'code' => $code,
            'message' => $msg,
            'data' => $data 
        );
        header("Content-Type:text/xml");
        $xml = "<?xml version='1.0' encoding='UTF-8'?>";
        $xml .= "<root>";
        $xml .= Response::xmlToEncode($result);
        $xml .= "</root>";
        echo $xml;
    }

    /**
     * 根据code返回错误信息
     *
     * @param [integer] $code
     * @return [string] 错误信息
     */
    public static function messageFromCode($code){
        $msg = '';
        switch ($code) {
            case 200:
            $msg = '数据返回成功';
            break;
            case 400:
            $msg = '数据错误';
            break;
            default:
            $msg = '未知错误';
            break;
        }
        return $msg;
    }

    /**
     * xml数据拼装
     *
     * @param [array] $data
     * @return string
     */
    public static function xmlToEncode($data){
        $xml = $attr = "";
        foreach($data as $key => $value){
            if(is_numeric($key)){
                $attr = "id='{$key}'";
                $key = "item";
            }
            $xml .= "<{$key} {$attr}>";
            $xml .= is_array($value) ? self::xmlToEncode($value) : $value;
            $xml .= "</{$key}>";
        }
        return $xml;
    }
}



