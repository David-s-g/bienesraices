<?php

require '../../includes/funciones.php';
$auth = estaAutenticado();

if(!$auth) {
    header('Location: /bienesraices/index.php');
}

    //Funcion para predecir el precio

    $valores = [];
    // obtener los valores de ubicación, habitaciones y baños ingresados por el usuario
    $ubicacion = $_POST['ubicacion'];
    $habitaciones = $_POST['habitaciones'];
    $wc = $_POST['wc'];
    $estacionamientos = $_POST['estacionamientos'];
    $terreno = $_POST['terreno'];
    
    // definir las condiciones para imprimir el valor
    if ($ubicacion == 'Guadalajara' && $habitaciones == 2 && $wc == 1 && $estacionamientos == 1 && $terreno == 90) {
      // imprimir el valor entre 1200000 y 1700000
      $valores[] = round(rand(1600000, 2200000) / 150000) * 150000;
    }
    elseif ($ubicacion == 'Guadalajara' && $habitaciones == 3 && $wc == 2 && $estacionamientos == 1 && $terreno == 150) {
        // imprimir el valor entre 1200000 y 1700000
        $valores[] = round(rand(2000000, 3800000) / 150000) * 150000;
      } 
      elseif ($ubicacion == 'Guadalajara' && $habitaciones == 3 && $wc == 2 && $estacionamientos == 2 && $terreno == 200) {
        // imprimir el valor entre 1200000 y 1700000
        $valores[] = round(rand(2200000, 3800000) / 150000) * 150000;
      } 
      elseif ($ubicacion == 'Tonala' && $habitaciones == 2 && $wc == 1 && $estacionamientos == 1 && $terreno == 90) {
        // imprimir el valor entre 1200000 y 1700000
        $valores[] = round(rand(900000, 1400000) / 150000) * 150000;
      } 
      elseif ($ubicacion == 'Tonala' && $habitaciones == 3 && $wc == 2 && $estacionamientos == 1 && $terreno == 120) {
        // imprimir el valor entre 1200000 y 1700000
        $valores[] = round(rand(1200000, 1900000) / 150000) * 150000;
      } 
      elseif ($ubicacion == 'Tonala' && $habitaciones == 3 && $wc == 2 && $estacionamientos == 2 && $terreno == 150) {
        // imprimir el valor entre 1200000 y 1700000
        $valores[] = round(rand(1500000, 2300000) / 150000) * 150000;
      } 
      elseif ($ubicacion == 'Zapopan' && $habitaciones == 3 && $wc == 2 && $estacionamientos == 2 && $terreno == 160) {
        // imprimir el valor entre 1200000 y 1700000
        $valores[] = round(rand(2200000, 3800000) / 150000) * 150000;
      }
      elseif ($ubicacion == 'Zapopan' && $habitaciones == 3 && $wc == 2 && $estacionamientos == 2 && $terreno == 200) {
        // imprimir el valor entre 2100000 y 3700000
        $valores[] = round(rand(2200000, 3800000) / 150000) * 150000;
      } 
      elseif ($ubicacion == 'Zapopan' && $habitaciones == 4 && $wc == 3 && $estacionamientos == 2 && $terreno == 250) {
        // imprimir el valor entre 1200000 y 1700000
        $valores[] = round(rand(2800000, 4500000) / 150000) * 150000;
      } 
    

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Valuador</h1>

        <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>

        <?php foreach($valores as $valor): ?>
            <div class="alerta exito">
                 <?php echo "El valor de la propiedad en $ubicacion con $habitaciones habitaciones, $wc baños, $estacionamientos estacionamientos y $terreno metros de terreno es de $valor pesos."; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="post" action="/bienesraices/admin/propiedades/valuador.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion general</legend>

                <label for="ubicacion">Ubicacion:</label>
                <input type="text" id="ubicacion" name="ubicacion" placeholder="Ubicacion de la propiedad (Guadalajara, Zapopan, etc...)">

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Habitaciones con las que cuenta la propiedad" >

                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Baños con los que cuenta la propiedad" >

                <label for="estacionamientos">Estacionamientos:</label>
                <input type="number" id="estacionamientos" name="estacionamientos" placeholder="Numero de estacionamientos con los que cuenta la propiedad" >

                <label for="terreno">Metros cuadrados de terreno:</label>
                <input type="number" id="terreno" name="terreno" placeholder="Metros cuadrados del terreno" >

            </fieldset>

            <input type="submit" value="Valuar Propiedad" class="boton boton-verde">

        </form>

    </main>

<?php

incluirTemplate('footer');
?>
