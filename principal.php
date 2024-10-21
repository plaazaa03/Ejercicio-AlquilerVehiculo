<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Listado de Vehiculos</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='vehiculos.css'>
</head>

<body>
    <h1>Alquileres Plaza</h1>

    <form action="principal.php" method="post">
        <h2>Filtrado de Vehiculos</h2>

        <label>Modelos:</label>
        <select name="modelo">
            <option value="">Selecciona un modelo</option>
            <?php
            require_once 'coches.php';
            $coches = obtenerCoches($modelo, $color, $precio, $imagen);
            foreach ($coches as $coche) {
                echo "<option value='" . $coche->getModelo() . "'>" . $coche->getModelo() . "</option>";
            }
            ?>
        </select>
        <label>Precio:</label>
        <input type="number" name="precio">

        <button type="submit" id="filtrar">Filtrar</button>
    </form>

    <section>
        <h2>Listado de Vehiculos</h2>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $modelo = isset($_POST["modelo"]) ? $_POST["modelo"] : "";
            $precio = isset($_POST["precio"]) ? $_POST["precio"] : "";

            $vehiculosFiltrados = [];


            foreach ($coches as $coche) {
                $modeloFiltrado = empty($modelo) || $coche->getModelo() == $modelo;
                $precioFiltrado = empty($precio) || $coche->getPrecio() <= $precio;

                if ($modeloFiltrado && $precioFiltrado) {
                    $vehiculosFiltrados[] = $coche;
                }
            }

            if (!empty($vehiculosFiltrados)) {
                foreach ($vehiculosFiltrados as $coche) {
                    echo "<form action='alquiler.php' method='POST'>";
                    echo "<div>";
                    echo "<img src='" . $coche->getImagen() . "' alt='" . $coche->getModelo() . "';'>";
                    echo "<h3>" . $coche->getModelo() . "</h3>";
                    echo "<p>Color: " . $coche->getColor() . "</p>";
                    echo "<p>Precio: " . $coche->getPrecio() . "</p>";
                    echo "<input type='hidden' name='modelo' value='" . $coche->getModelo() . "'>";
                    echo "<input type='hidden' name='color' value='" . $coche->getColor() . "'>";
                    echo "<input type='hidden' name='precio' value='" . $coche->getPrecio() . "'>";
                    echo "<input type='hidden' name='imagen' value='" . $coche->getImagen() . "'>";
                    echo "<button type='submit' id='alquilar'>Alquilar</button>";
                    echo "</div>";
                    echo "</form>";
                }
            } else {
                echo "<p>No se encontraron resultados</p>";
            }


        } else {
            foreach ($coches as $coche) {
                echo "<form action='alquiler.php' method='POST'>";
                echo "<div>";
                echo "<img src='" . $coche->getImagen() . "' alt='" . $coche->getModelo() . "';'>";
                echo "<h3>" . $coche->getModelo() . "</h3>";
                echo "<p>Color: " . $coche->getColor() . "</p>";
                echo "<p>Precio: " . $coche->getPrecio() . "€ por día</p>";
                echo "<input type='hidden' name='modelo' value='" . $coche->getModelo() . "'>";
                echo "<input type='hidden' name='color' value='" . $coche->getColor() . "'>";
                echo "<input type='hidden' name='precio' value='" . $coche->getPrecio() . "'>";
                echo "<input type='hidden' name='imagen' value='" . $coche->getImagen() . "'>";
                echo "<button type='submit' id='alquilar'>Alquilar</button>";
                echo "</div>";
                echo "</form>";
            }
        }

        ?>
    </section>

</body>

<footer>
    <p>Raul Plaza Gálvez</p>
</footer>

</html>