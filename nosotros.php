<?php

    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp"> 
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>

                <p>
                    PROPER HOUSE es una empresa de bienes raices con mas de 20 años de experiencia, siempre con disposicion de ayudar a nuestros clientes para que puedan vender o comprar la casa de sus sueños, siempre adaptandonos a sus gustos y necesidades y apoyandolos en cada paso del proceso para que puedan estar tranquilos de que su futuro esta en buenas manos.
                </p>

                <p>
                    Para nosotros es un honor que confies en nuestra experiencia para poder encontrar lo que tanto soñabas, un lugar en el que puedes sentirte seguro de que tu patrimonio sera una inversion inteligente.
                </p>

            </div>

        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más sobre nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Nuestras casas y departamentos son verificados cuidadosamente antes de ser agregados en la pagina para mayor seguridad de nuestros clientes</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Los mejores precios en el mercado de viviendas</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>No esperes meses por tu casa, con nosotros obtendras tu vivienda en el menor tiempo posible</p>
            </div>
        </div>
    </section>

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