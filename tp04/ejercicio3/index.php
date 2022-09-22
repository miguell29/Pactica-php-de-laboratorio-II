<?php

$path ='css/';
require_once('html/encabezado.html');
require_once('php/funciones.php');
?>
<section>
    <form action="php/calculo.php" method="post">
    <section>
        <label for="deposito">Deposito Inicial</label>
        <input type="number" required id="deposito" name="deposito" placeholder="Ingrese el valor en pesos">
    </section>
    <fieldset>
        <legend>Plazo:</legend>
        <section><label for="30">30 Dias</label>
        <input type="radio" id="30" value="30" name="plazo">
    </section>
        <section><label for="45">45 Dias</label>
        <input type="radio" id="45" value="45" name="plazo">
    </section>
        <section> <label for="60">60 Dias</label>
        <input type="radio" id="60" value="60" name="plazo">
    </section>
        <section><label for="90">90 Dias</label>
        <input type="radio" id="90" value="90" name="plazo">
    </section>
        
       
        
    </fieldset>
        <input type="submit" value="Simular">
    </section>
    </form>
</section>

<?php
require_once('html/pie.html');
?>