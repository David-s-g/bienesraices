<?php

    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para la decoracion de tu hogar</h1>
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen de la propiedad">
        </picture>
        <p class="informacion-meta">Escrito el <span>12/01/2023</span>por <span>Admin</span></p> 

        <div class="resumen-propiedad">
            <p>Hermosa casa frente al bosque con acabados en madera y marmol, en esta propiedad la calma y la relajacion nunca seran un problema.</p>
            <p>Ver hermosos amaneceres y atardeceres pareceran un sueño, ya que desde la comodidad de tu habitacion podras tener hermosas vistas sin la necesidad de salir de tu hogar.</p>
        </div>
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