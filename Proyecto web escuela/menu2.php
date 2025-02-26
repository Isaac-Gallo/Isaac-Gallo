<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gadgets</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/5b2fe078a7.js" crossorigin="anonymous"></script>


    <style>
/* Estilos para el contenedor */
.rectangulo {
    background-color: rgba(168, 168, 168, 0.7);
    width: 100%;
    height: 100px;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
    display: flex; /* Utilizamos flexbox para centrar el contenido verticalmente */
    justify-content: center; /* Centramos el contenido horizontalmente */
    align-items: center; /* Centramos el contenido verticalmente */
}

/* Estilos para el texto dentro del rectángulo */
.rectangulo p {
    text-align: center;
    line-height: 100px;
    margin: 0;
}

/* Estilos para el input */
.form-control {
    width: 400%; /* Ajusta el ancho según sea necesario */
    margin: 0 auto;
    transform: translateX(-35%); /* Centra el input */
}

.centro {
        height: 80vh; /* Altura total de la ventana del navegador */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .centro2 {
        /*height: 15vh; /* Altura total de la ventana del navegador */
        display: flex;
        justify-content: center;
        align-items: center;
        top: 50%;
        transform: translateY(120%);
    }

    /* Estilos para el div centrado */
    .centrado {
        background-color: rgba(168, 168, 168, 0.7);
        position: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        left: 0;
        right: 0;
        top: 50%;
        transform: translateY(-40%);
        margin: 0 auto;
        flex-direction: column; /* Alinea los elementos de manera descendente */
        overflow: auto; /* Muestra barras de desplazamiento cuando el contenido excede el tamaño del contenedor */
        padding: 20px;
    }

    .izq{
        display: flex;
        justify-content: end;
        align-items: end;
        transform: translateX(370%);
    }

    .form-floating .form-control {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: left;
        transform: translateX(0.4%);
        width: calc(100%); /* Ancho ajustado */
    }

</style>
</head>
<body>
      <!-- Contenedor del rectángulo -->
    <div class="rectangulo">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" id="search" placeholder="Buscar por nombre" aria-label="First name">
            </div>
        </div>
    </div>

    <div class="centro">
        <div class="centrado">
            <div class="izq">
                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Agregar  <i class="fa-solid fa-user-plus"></i>
                </button>
            </div><!-- Cierra izq -->

            <table class="table" id="result-table">
                <?php
                include "conection.php";

                $elementos = 5; // Número de resultados por página
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $inicio = ($page - 1) * $elementos;

                $sql = "SELECT * FROM usuarios WHERE estado='activo' LIMIT $inicio, $elementos";
                $resultado = $conn->query($sql);
                ?>
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php while ($datos = $resultado->fetch_object()): ?>
                            <tr>
                                <td><?= htmlspecialchars($datos->Nombre) ?></td>
                                <td><?= htmlspecialchars($datos->Apellidos) ?></td>
                                <td><?= htmlspecialchars($datos->Correo) ?></td>
                                <td>
                                    <a href="editar.php?id=<?= $datos->idUsuario ?>" class="btn btn-small btn-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="eliminar.php?id=<?= $datos->idUsuario ?>" class="btn btn-small btn-danger">
                                        <i class="fa-solid fa-user-minus"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

                <?php
                    // Obtener el número total de resultados
                    $sql = "SELECT COUNT(*) AS total FROM usuarios WHERE estado='activo'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $totales = $row['total'];
                    $total_pages = ceil($totales / $elementos);

                    $conn->close();
                ?>

        <div class="centro2">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php if ($page > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="menu2.php?page=<?= $page - 1 ?>">Anterior</a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                            <a class="page-link" href="menu2.php?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($page < $total_pages): ?>
                        <li class="page-item">
                            <a class="page-link" href="menu2.php?page=<?= $page + 1 ?>">Siguiente</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
         </div>

        </div><!-- Cierra Centrado -->

        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Datos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="editar2.php">
                            <?php
                            include "conection.php";

                            // Verificar si se ha pasado el parámetro idUsuario en la URL
                            if (isset($_GET['v'])) {
                                $idUsuario = $_GET['v'];

                                $sql = "SELECT * FROM usuarios WHERE idUsuario = $idUsuario";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($datos = $result->fetch_object()) {
                            ?>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Nombre/s" name="nombre" value="<?= htmlspecialchars($datos->Nombre) ?>" required>
                                            <label for="floatingInput">Nombre/s</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Apellido/s" name="apellido" value="<?= htmlspecialchars($datos->Apellidos) ?>" required>
                                            <label for="floatingInput">Apellido/s</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="floatingInput" placeholder="nombre@gmail.com" name="mail" value="<?= htmlspecialchars($datos->Correo) ?>" required>
                                            <label for="floatingInput">Correo Electrónico</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="floatingPassword" placeholder="Contraseña" name="con" value="<?= htmlspecialchars($datos->Contraseña) ?>" required>
                                            <label for="floatingPassword">Contraseña</label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary" name="addu" value="ok">Editar</button>
                                        </div>
                                        <input type="hidden" name="id" value="<?= htmlspecialchars($datos->idUsuario) ?>">
                            <?php
                                    }
                                } else {
                                    echo "<p>No se encontraron datos.</p>";
                                }
                                $conn->close();
                            } else {
                                echo "<p>ID de usuario no especificado.</p>";
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <button type="button" id="botonedit" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="visibility: hidden;">
              </button>

        <?php

        if (isset($_GET['v']) && $_GET['v'] != 0) {
        ?>
            <script>document.getElementById('botonedit').click();</script>;
            <?php
        }
        ?>
    </div><!-- Cierra centro -->



    
</body>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="registrar.php">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Nombre/s" name="nombre" required>
                        <label for="floatingInput">Nombre/s</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Apellido/s" name="apellido" required>
                        <label for="floatingInput">Apellido/s</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="nombre@gmail.com" name="mail" required>
                        <label for="floatingInput">Correo Electrónico</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Contraseña" name="con" required>
                        <label for="floatingPassword">Contraseña</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="addu" value="ok">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</html>