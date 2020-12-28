<?php
 //ví dụ  n = 3 , $arr =[11,2,8,10,5,99,1,8,9]
$n = 3;
$arr =[11,2,8,10,5,99,1,8,9];
$arr_spice_new =[];
$arr_new = [];
for ($j=0; $j < $n; $j++) {
    for ($i=0; $i < count($arr); $i++) {  
        if ($i%$n == 0) {
           array_push($arr_spice_new,$arr[$i+$j]);
        }
   
    }
}
echo '<pre>';
print_r($arr_spice_new);
