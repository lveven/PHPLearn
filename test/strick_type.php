<?php declare(strict_types = 1);

function strictInt(int $a){
    echo "$a=".$a.'<br>';
}

//strictInt(12.3);

function divisible($dividend,$divider):Int{
    return $dividend/$divider;
}

echo divisible(6,4).'<br>';
