<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Ropa</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body> 
    <header>
        <nav>
        <h1> <a href="index.php">Tienda de Ropa</a>  </h1>
            <ul class="filtro">
                <li><a href="nike.php">Nike</a></li>
                <li><a href="adidas.php">Adidas</a></li>
                <li><a href="supreme.php">Supreme</a></li>
                <li><a href="puma.php">Puma</a></li>
            </ul>
            <ul class="menu"> 
                <li><a href="login.php">Usuario</a></li>
                <li><a href="admin.php">Administrador</a></li>
                <li><a href="carrito.php">Carrito</a></li>
            </ul>
        </nav>
    </header>

    <h2>ADIDAS. Lo mejor esta por venir.</h2>
    <p>Lista de prendas</p>

    <div class="card-container">

    <?php
    // Conexión a la base de datos
    $conexion = mysqli_connect("127.0.0.1", "root", "", "tienda");
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Consulta para obtener datos de la tabla 'ropa'
    $consulta = "SELECT * FROM ropa WHERE marca = 'adidas' ";
    $datos = mysqli_query($conexion, $consulta);

    // Mostrar datos de 'ropa' en tarjetas
    while ($reg = mysqli_fetch_assoc($datos)) { ?>
        <div class="card">
            <img src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen']) ?>" alt="Imagen de <?php echo htmlspecialchars($reg['prenda']); ?>">
            <h3><?php echo htmlspecialchars($reg['prenda']); ?></h3>
            <p>Marca: <?php echo htmlspecialchars($reg['marca']); ?></p>
            <p>Talle: <?php echo htmlspecialchars($reg['talle']); ?></p>
            <p>Precio: $<?php echo htmlspecialchars($reg['precio']); ?></p>
            <a href="#"><button class="boton">Ver más</button></a>
            <form method="post" action="agregar_carrito.php">
                <input type="hidden" name="producto_id" value="<?php echo $reg['id']; ?>">
                <input type="number" name="cantidad" value="1" min="1">
                <input type="submit" value="Agregar al carrito">
            </form>
        </div>
    <?php }

    // Cerrar conexión a la base de datos
    mysqli_close($conexion);
    ?>

    </div>

</body>
</html>