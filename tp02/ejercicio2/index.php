


<?php
    require_once("html/encabezado.html");

    /*****SE ELIJE UN CODIGO ALEATORIO ENTRE 1 Y 25 ******/
    $codigoIngresado = mt_rand(1,25);
    $codigo = ($codigoIngresado < 10)? 'P0'.$codigoIngresado:'P'.$codigoIngresado ;

   
    
?>


<section class = "contenido">
    <aside>
        <?php
     /*****MOSTRANDO LOS DATOS POR PANTALLA ******/
             switch ($codigoIngresado) {
                case 6: echo '<h2>'.$codigo.' - Programación</h2>
                    <p>Lunes - 14:00 a 17:00 - Practica</p>
                    <p>Lunes - 17:00 a 20:00 - Practica</p>
                    <p>Miercoles - 18:00 a 20:00 - Teoria</p>
                    <p>Viernes - 14:00 a 16:00 - Teoria</p>';
                    break;
                case 14: echo '<h2>'.$codigo.' - Paradigmas de Programación	</h2>
                <p>Lunes - 17:00 a 19:00 - Teo.-Pract.</p>
                <p>Miercoles - 15:00 a 17:00 - Teo.-Pract.</p>
                <p>Miercoles - 17:00 a 19:00 - Teo.-Pract.</p>';
                    break;
                case 7: echo '<h2>'.$codigo.' - Laboratorio II</h2>
                <p>Jueves - 15:00 a 18:00 - Practica</p>
                <p>Jueves - 18:00 a 20:00 - Teoria</p>';
                    break;
                case 9: echo '<h2>'.$codigo.' - Conceptos de Bases de Datos I</h2>
                <p>Martes - 15:00 a 17:00 - Practica</p>
                <p>Martes - 17:00 a 19:00 - Teoria</p>
                <p>Jueves - 17:00 a 19:00 - Practica</p>';
                    break;
                case 23: echo '<h2>'.$codigo.' - Taller de Lenguajes II</h2>
                <p>Miercoles - 19:00 a 20:30 - Teoria</p>
                <p>Viernes - 15:00 a 17:30 - Teoria</p>
                <p>Viernes - 17:30 a 20:00 - Practica</p>';
                    break;
                case 20: echo '<h2>'.$codigo.' - Ingeniería de Software</h2>
                <p>Miercoles - 14:30 a 15:30</p>
                <p>Viernes - 17:00 a 18:00</p>';
                    break;
                case   25: echo '<h2>'.$codigo.' Sistemas Abiertos</h2>
                <p>Martes - 15:00 18:00 - Teo.-Pract.</p>
                <p>Viernes - 14:00 17:00 - Teo.-Pract.</p>';
                    break;
                case 21: echo '<h2>'.$codigo.' - Comunicaciones II</h2>
                <p>Martes - 19:00 a 20:00 - Practica</p>
                <p>Jueves - 15:00 17:30 - Teoria</p>
                <p>Jueves - 19:00 a 20:00 - Practica</p>';
                    break;
                case 24: echo '<h2>'.$codigo.' - Taller de Legislación y Organizaciones</h2>
                <p>Lunes - 18:00 - 20:00</p>
                <p>Miercoles - 18:00 - 20:00</p>';
                    break;
        
                case   2:
                case   4:
                case   5:
                case   12:
                case   19:
                case   22:
                case   25:  
                    echo '<p class = "error">EL CODIGO DE MATERIA '.$codigo.' NO EXISTE</p>
                    <p>Para mas informacion presione <a href = "https://www.facet.unt.edu.ar/programadoruniversitario/plan-de-estudios/" target = "_blank">aquí</a></p>';
                    break;
                    default:
                    echo '<p class = "aviso">El codigo de materia '.$codigo.' no se cursa en este cuatrimestre</p>
                    <p>Para mas informacion presione <a href = "https://www.facet.unt.edu.ar/programadoruniversitario/plan-de-estudios/" target = "_blank">aquí</a></p>';
                    break;
            }
        ?>
        
        
    </aside>
    <section class="contenido-principal">
        <h2>Contenido Principal</h2>
    </section>
</section>

<?php
    require_once("html/footer.html");
?>


