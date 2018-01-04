<?php
echo PATH_SEPARATOR.'----'.DIRECTORY_SEPARATOR;//结果 :----/

echo __DIR__;
echo '<br>';
define('ROOT',__DIR__);
echo ".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path();
echo '<br>';
echo get_include_path();
echo '<br>';

?>