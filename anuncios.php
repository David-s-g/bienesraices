<?php

    require 'includes/funciones.php';
    incluirTemplate('header2');

    
?>

    <main class="contenedor seccion">
        
        <?php
            $limite = 50;
            include 'includes/templates/anuncios.php';
        ?>   

        

    </main>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.html">Nosotros</a>
                <a href="anuncios.html">Anuncios</a>
                <a href="blog.html">Blog</a>
                <a href="contacto.html">Contacto</a>
            </nav>
        </div>

        <p class="copyright">Todos los derechos reservados 2023 &copy;</p>
    </footer>
    
    <script src="build/js/bundle.min.js"></script>

</body>
</html>