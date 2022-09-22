

<?php
function clacularInteres($deposito,$plazo){

   $tasa = 0;
   switch ($plazo) {
      case 30:
         $tasa = 75;
         break;
      case 45:
         $tasa = 80;
         break;
      case 60:
         $tasa = 90;
         break;
      case 90:
         $tasa = 110;
         break;
   }
    return $deposito*(($tasa/100)*$plazo/365);
}
?>