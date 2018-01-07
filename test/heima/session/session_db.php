<?php
function sessRead(){

}

function sessWrite(){

}

function sessOpen(){

}

function sessClose(){

}

function sessDestroy(){

}
function sessGC(){

}

//设置session机制存储处理函数
session_set_save_handler('sessOpen','sessClose','sessRead','sessWrite','sessDestroy','sessGC');
