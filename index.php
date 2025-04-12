<?php
$altura_carlitos = 120;
$n_brinquedos = 6;
$altura_brinquedos = [200, 90, 100, 123, 120, 169];
$pode_ir_no_brinquedo = 0;

for($i = 0; $i < $n_brinquedos; $i++){
 if($altura_carlitos >= $altura_brinquedos[$i]){
  $pode_ir_no_brinquedo++;
 }
}

echo $pode_ir_no_brinquedo;