<?php
 //ví dụ, $arr =[0,100,-4,8,143,5,99,100]
$arr =[0,100,-4,8,143,5,99,100];
$dem = 2;
$tong_max = 0;
for ($i=0; $i < $dem; $i++) { 
   $tong_max += (int) max($arr);
   $index = array_search($tong_max,$arr);
   unset($arr[$index]);
}
echo '<pre>';
print_r($tong_max);
