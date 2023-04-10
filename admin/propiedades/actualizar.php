<?php

//validar que sea un id valido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id){
    header('Location: /bienesraices/admin/index.php');
}

//Base de datos

    require '../../includes/config/database.php';
    $db = conectarDB();

    //obtener los datos de la propiedad
    $consulta = "SELECT * FROM propiedades WHERE id = {$id}";
    $resultado = mysqli_query($db, $consulta);
    $propiedad = mysqli_fetch_assoc($resultado);


    //consultar para obtener los vendedores

    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    //Arreglo con mensajes de erroes
    $errores = [];

    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedores_id = $propiedad['vendedores_id'];
    $imagenPropiedad = $propiedad['imagen'];

    //Ejecutar el codigo despues de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        //echo "<pre>";
        //var_dump($_POST);
        //echo "</pre>";


        $titulo = mysqli_real_escape_string( $db, $_POST['titulo'] );
        $precio = mysqli_real_escape_string( $db, $_POST['precio'] );
        $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion'] );
        $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones'] );
        $wc = mysqli_real_escape_string( $db, $_POST['wc'] );
        $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento'] );
        $vendedores_id = mysqli_real_escape_string( $db, $_POST['vendedores_id'] );
        $creado =  date('Y/m/d');

        //asignar files a una variable
        $imagen = $_FILES['imagen'];


        if(!$titulo) {
            $errores[] = "Debes añadir un titulo";
        }

        if(!$precio) {
            $errores[] = "El precio es obligatorio";
        }

        if( strlen( $descripcion) < 50) {
            $errores[] = "La descripcion es obligatoria y debe contener al menos 50 caracteres";
        }

        if(!$habitaciones) {
            $errores[] = "El numero de baños es obligatorio";
        }

        if(!$wc) {
            $errores[] = "El numero de baños es obligatorio";
        }

        if(!$estacionamiento) {
            $errores[] = "El numero de lugares de estacionamiento es obligatorio";
        }

        if(!$vendedores_id) {
            $errores[] = "Elige un vendedor";
        }

        // Validar por tamaño
        $medida = 1000 * 1000;

        if($imagen['size'] > $medida) {
            $errores[] = 'La imagen es muy grande';
        }

        /**echo "<pre>";
        var_dump($errores);
        echo "</pre>";**/

        //Revisar que el arreglos de errores este vacio

        if(empty($errores)) {

             //Crear una carpeta
             $carpetaImagenes = '../../imagenes/';

             if(!is_dir($carpetaImagenes)){
                 mkdir($carpetaImagenes);
             }
 

             $nombreImagen = '';
        /**Subida de archivos **/

            if($imagen['name']){
                //Eliminar la imagen previa

                unlink($carpetaImagenes . $propiedad['imagen']);
            
            //generar un nombre unico
            $nombreImagen = md5( uniqid(rand(), true ) ) . ".jpg";

            //Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen); 
            } else {
                $nombreImagen = $propiedad['imagen'];
            }

            

            //Insertar en la base de datos
            $query = "UPDATE propiedades SET titulo = '{$titulo}', precio = '{$precio}',imagen = '{$nombreImagen}', titulo = '{$titulo}', descripcion = '{$descripcion}', habitaciones = {$habitaciones}, wc = {$wc}, estacionamiento = {$estacionamiento}, vendedores_id = {$vendedores_id} WHERE id = {$id}"; 


            //echo $query;


            $resultado = mysqli_query($db, $query);

            if($resultado) {
                    //redireccionar al usuario

                    header('Location: /bienesraices/admin/index.php?resultado=2');
            }
        }

        
    }


    require '../../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Actualizar propiedad</h1>

        <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>
        
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                 <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion general</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <img src="/bienesraices/imagenes/<?php echo $imagenPropiedad; ?>" class="imagen-small">

                <label for="descripcion">Descripcion</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>

            </fieldset>

            <fieldset>
                <legend>Informacion de la propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input 
                type="number" 
                id="habitaciones" 
                name="habitaciones" 
                placeholder="Ej: 3" 
                min="1" 
                max="9"  
                value="<?php echo $habitaciones; ?>" >

                <label for="wc">Baños:</label>
                <input 
                type="number" 
                id="wc" 
                name="wc" 
                placeholder="Ej: 3" 
                min="1" 
                max="9" 
                value="<?php echo $wc; ?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <input 
                type="number" 
                id="estacionamiento" 
                name="estacionamiento" 
                placeholder="Ej: 3" 
                min="1" 
                max="9" 
                value="<?php echo $estacionamiento; ?>">

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedores_id">
                    <option value="">--Seleccione un vendedor--</option>
                    <?php while($vendedores_id = mysqli_fetch_assoc($resultado)): ?>
                        <option  <?php echo $vendedores_id === $vendedores_id['id'] ? 'selected' : ''; ?>  value="<?php echo $vendedores_id['id']; ?>"><?php echo $vendedores_id['nombre'] . " " . $vendedores_id['apellido'];  ?></option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">

        </form>

    </main>

<?php

incluirTemplate('footer');
?>
