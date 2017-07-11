<?php

class Response {
    /**
     * 以json的格式输出
     *
     * @param int $code 状态码
     * @param string $message 状态信息
     * @param array $data 格式化数据
     * @return void 
     */
    public static function json($code,$message = '',$data = array()){
        if(!is_numeric($code)){
            return '';
        }

        $result = array(
            'code' => $code,
            'message' => $message,
            'data' => $data 
        );

        echo json_encode($result);
        exit;
    }
}
?>