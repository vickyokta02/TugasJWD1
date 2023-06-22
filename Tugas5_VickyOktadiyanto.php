<html>
<head>
    <tittle><Text-Center><h4>Tugas5</h4><tittle>
</head>
<body>

<?php
$b1 = "9" ;
$b2 = "3" ;

echo "Bilangan 1: " ;  echo "$b1 <br>" ;
echo "Bilangan 2: " ;  echo "$b2 " ;

?>
<hr><hr>

<?php
function Penjumlahan($a, $b){
   $z = $a + $b;
   return $z;
}
echo "Hasil dari Penjumlahan = "; echo Penjumlahan(9,3). "<br>";


function Pengurangan($a, $b){
   $c = $a - $b;
   return $c;
}
 echo "Hasil Dari Pengurangan = "; echo Pengurangan(12,6). "<br>";

 function Perkalian($d, $e){
   $x = $d * $e;
   return $x;
 }
   echo "Hasil Dari Perkalian = "; echo Perkalian(9,3)."<br>";

   function Pembagian($f, $g){
      $j = $f * $g;
      return $j;
   }
   echo "Hasil Dari Pembagian = "; echo Pembagian(27,3);
?>
</body>
</html>