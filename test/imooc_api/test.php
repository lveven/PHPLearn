<?php
require_once('./response.php');
$arr = array(
    'id' => 1,
    'name' => 'leoliu',
    'type' => array(1,2,3)
);
Response::show(200,$arr);
