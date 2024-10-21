<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Alquiler vehiculos</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='vehiculos.css'>
</head>

<script>
    function calcularTotal() {
        var dias = document.getElementById('dias').value;
        var precio = document.getElementById('precio').value;
        
        if (dias < 1) {
            document.getElementById('total').innerHTML = 'El número de día debe ser mayor que 0';
        } else {
            document.getElementById('total').innerHTML = 'Total de alquiler: ' + (dias * precio) + '€';
        }
    }
</script>

<body>
    <h1>Alquileres Plaza</h1>

    <?php
    if (isset($_POST['modelo']) && isset($_POST['color']) && isset($_POST['precio']) && isset($_POST['imagen'])) {
        $modelo = $_POST['modelo'];
        $color = $_POST['color'];
        $precio = $_POST['precio'];
        $imagen = $_POST['imagen'];

        echo "<form action='' method='POST'>";
        echo "<div>";
        echo "<img src='" . $imagen . "' alt='" . $imagen . "'>";
        echo "<h3>" . $modelo . "</h3>";
        echo "<p>Color: " . $color . "</p>";
        echo "<p>Precio por día: " . $precio . "€</p>";
        echo "<p>Selecciona los días de alquiler:</p>";
        echo "<input type='hidden' id='precio' value='" . $precio . "'>";
        echo "<input type='number' id='dias' name='dias' min='1' required>";
        echo "<button type='button' id='calcular' onclick='calcularTotal()'>Confirmar Reserva</button>";
        echo "</div>";
        echo "<p id='total'></p>";
        echo "</form>";

        // Parrafo para mostrar el total
    } else {
        echo "<p>No se han enviado todos los datos</p>";
    }
    ?>

</body>

<footer>
    <p>Raul Plaza Gálvez</p>
</footer>

</html>