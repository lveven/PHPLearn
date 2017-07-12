<?php
require_once('./response.php');
/*
 * 处理接口公共业务
*/
class Common {
    public $params;
    public function check(){
          $this->params['app_id'] = $appId = isset($_POST['app_id']) ? $_POST['app_id'] : '';
          $this->params['version_id'] = $versionId = isset($_POST['version_id']) ? $_POST['version_id'] : '';
          $this->params['version_mini'] = $versionMini = isset($_POST['version_mini']) ? $_POST['version_mini'] : '';
          $this->params['did'] = $did = isset($_POST['did']) ? $_POST['did'] : '';
          $this->params['encrypt_did'] = $encrypt_did = isset($_POST['encrypt_did']) ? $_POST['encrypt_did'] : '';
          if(!is_numeric($appId)){
              return Response::json(401,'参数不合法');
          }
    }
}
?>