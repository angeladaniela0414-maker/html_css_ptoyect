<?php 
include("conexion.php"); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Comentarios Gamers</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo1.css">
</head>

<body class="bg-dark text-light">

<div class="container p-4 mt-5 shadow-lg rounded" style="background: rgba(20,20,40,0.6); border: 1px solid #0ff;">

    <h2 class="text-center mb-4" style="color: #00eaff; text-shadow: 0 0 10px #00eaff;">
        Comentarios Gamers
    </h2>

    <!-- FORMULARIO PARA GUARDAR COMENTARIO -->
    <form action="guardar_comentario.php" method="POST">

        <input type="text" name="usuario" class="form-control mb-3" 
            placeholder="Usuario" required
            style="border: 2px solid #00eaff; background: rgba(255,255,255,0.1); color: white;">

        <textarea name="comentario" class="form-control mb-3" 
            placeholder="Escribe un comentario gamer" rows="3" required
            style="border: 2px solid #00eaff; background: rgba(255,255,255,0.1); color: white;"></textarea>

        <button class="btn w-100" type="submit"
            style="background: #ff0080; color: white; font-weight: bold; border-radius: 12px;">
            Guardar Comentario
        </button>

    </form>

    <hr style="border-color: #00eaff; margin-top: 40px;">

    <h3 class="text-center" style="color: #00eaff; text-shadow: 0 0 10px #00eaff;">
        Lista de Comentarios
    </h3>

    <!-- TABLA DE COMENTARIOS -->
    <table class="table table-dark table-bordered mt-4" 
        style="border: 2px solid #00eaff;">

        <thead>
            <tr style="text-align: center;">
                <th>Usuario</th>
                <th>Comentario</th>
                <th>Fecha</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $sql = "SELECT usuario, comentario, fecha FROM comentarios ORDER BY fecha DESC";
                $res = $conn->query($sql);

                while($fila = $res->fetch_assoc()){
                    echo "
                    <tr>
                        <td>".$fila['usuario']."</td>
                        <td>".$fila['comentario']."</td>
                        <td>".$fila['fecha']."</td>
                    </tr>";
                }
            ?>
        </tbody>
    </table>

</div>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
