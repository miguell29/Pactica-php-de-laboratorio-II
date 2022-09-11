


<?php
    require_once("html/encabezado.html");
    $nivel=chr(mt_rand(65,67));  // SE CREA UNA LETRA ALEATORIA ENTRE A Y C
?>

<section class = "contenido">
    <aside>
        <h2>Usuario nivel <?php echo $nivel;?></h2> <!--se muestra el nivel de acceso de la cuenta y sus categorias-->
        <ul>
            <?php
            switch ($nivel) {
                case 'A':
                        echo 
                        '<li>Lista de productos</li>
                        <li>Informes</li>';
                    break;

                case 'B':
                        echo 
                        '<li>CRUD productos</li>
                        <li>CRUD categorias</li>
                        <li>Informes</li>';
                    break;

                case 'C':
                        echo 
                        '<li>CRUD productos</li>
                        <li>CRUD categorias</li>
                        <li>Informes</li>
                        <li>CRUD usuarios</li>
                        <li>Balances</li>';
                    break;

            }
            ?>
        </ul>
        
    </aside>
    <section class="contenido-principal">
        <h2>Contenido Principal</h2>
    </section>
</section>

<?php
    require_once("html/footer.html");
?>


