<?php
// $arr =[0,100,-4,8,143,5,90,102];
$arr = [1,5,4,9,0,-10,13,93,14,15];
sort($arr);

$array_kc = [];
$min = 0;
for ($i = count($arr)-1; $i >= 0; $i--) { 
    if ($i==0) {
        break;
    }
    $min = $arr[$i]-$arr[$i-1];
    array_push($array_kc,$min);
}
$khoang_cach_min = min($array_kc);

$array_cap_kc_min = [];
for ($j=0; $j < count($arr); $j++) { 
    if ($j==count($arr)-1) {
        break;
    }
    if ($arr[$j]+$khoang_cach_min == $arr[$j+1]) {
        $arr_cap = [$arr[$j],$arr[$j+1]];
        array_push($array_cap_kc_min,$arr_cap);
    }
}

echo '<pre>';
print_r($array_cap_kc_min);
// echo $items[array_rand($items)];
// echo $items[array_rand($items)]; 11111 
// 
