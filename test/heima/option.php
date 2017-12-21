<?php
$t1 = microtime(true);//获取当前时间
for($i = 0; $i < 10000000; ++$i){

}
$t2 = microtime(true);

for($i = 0; $i < 10000000; $i++){

}
$t3 = microtime(true);

echo "<p>前++耗时：".($t2-$t1)."</p>";
echo "<p>后++耗时：".($t3-$t2)."</p>";