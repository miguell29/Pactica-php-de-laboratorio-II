

<?php
function cotizacionCripto($moneda){
    switch ($moneda) {
        case 'btc':
           return 2915560.38;
            break;
         case 'eth':
            return 240773.79;
            break;
         case 'sol':
            return 4982.59;
            break;
         case 'bnb':
            return 40947.50;
            break;
         case 'usdt':
            return 141.16;
            break;
    }
}
?>