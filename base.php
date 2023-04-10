<?php

    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Blog</h1>
    </main>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <div class="mobile-menu">
                <img src="build/img/barras.svg" alt="menu responsive">
            </div>

            <div class="derecha">
                <img class="dark-mode-boton" src="build/img/dark-mode.svg">
                <nav class="navegacion">
                    <a href="nosotros.html">Nosotros</a>
                    <a href="anuncios.html">Anuncios</a>
                    <a href="blog.html">Blog</a>
                    <a href="contacto.html">Contacto</a>
                </nav>
            </div>
        </div>

        <p class="copyright">Todos los derechos reservados 2023 &copy;</p>
    </footer>
    
    <script src="build/js/bundle.min.js"></script>

</body>
</html>