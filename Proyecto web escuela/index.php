<?php include('conection.php'); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gadgets</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JavaScript (Popper.js y Bootstrap JS) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>

  </head>
  <body>
    <!-- Section: Design Block -->
<section class="text-center text-lg-start">
  <style>
    .cascading-right {
      margin-right: -50px;
      margin-left: 70px;
    }

    @media (max-width: 700.98px) {
      .cascading-right {
        margin-right: -50px;
        margin-top: -100px;
      }
    }
  </style>

  <!-- Jumbotron -->
  <div class="container py-4">
    <div class="row g-0 align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card cascading-right" style="
            background: hsla(0, 0%, 70%, 0.55);
            backdrop-filter: blur(30px);
            ">
          <div class="card-body p-5 shadow-5 text-center">
            <h2 class="fw-bold mb-5">Ingresar</h2>

                <?php
              // Verificar si cam es 1
              if (isset($_GET['cam']) && $_GET['cam'] == 1) {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Contraseña cambiada con éxito!</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
              }
              ?>
            <form action="procesar_formulario.php" method="POST">

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control" name="email"/>
                <label class="form-label" for="form3Example3">Correo Electronico</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="form3Example4" class="form-control" name="password"/>
                <label class="form-label" for="form3Example4">Contraseña</label>
              </div>
              
              <!-- Captcha -->
              <form action="?" method="POST">
              <div class="g-recaptcha" data-sitekey="6LcrI70pAAAAAONSZpSmHAD5Xzn_Fb96ycRf7ZB3"></div>
              <br/>

              <button type="submit" class="btn btn-primary btn-block mb-4">
                Ingresar
              </button>
            </form>


              

              <!-- Register buttons -->
              <div class="text-center">
                <p>si no tienes cuenta:</p>
                  <button type="button" class="btn btn-primary btn-block mb-4" onclick="window.location.href='sign_up.php'">
                  Registrar
                  </button>
                </button>
              </div>


              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" id="botonRecuperarContraseña" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Recuperar Contraseña
              </button>

              


          </div>
        </div>
      </div>
      <div class="col-lg-6 mb-5 mb-lg-0">
        <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" class="w-60 rounded-4 shadow-4" height="700"
          alt="" />
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Recuperar contraseña</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

            <form method="POST" action="comp_mail.php">
                <label for="email">Correo Electrónico:</label><br>
                <input type="email" id="email" name="email" required><br><br>
                <button type="submit" class="btn btn-primary">Enviar código</button><br><br>
            </form>        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal 1 -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Recuperar contraseña</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

            <form method="POST" action="comp_code.php">
                <label for="email">Correo Electrónico:</label><br>
                <input type="email" id="email" name="email" required><br><br>
                <label for="codigo">Código:</label><br>
                <input type="text" id="codigo" name="codigo" required><br><br>
                <button type="submit" class="btn btn-primary">Cambiar Contraseña</button><br><br>
            </form>   

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal 2 -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Recuperar contraseña</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div class="alert alert-danger" role="alert"> Correo equivocado o no registrado ! </div>
            <form method="POST" action="comp_mail.php">
                <label for="email">Correo Electrónico:</label><br>
                <input type="email" id="email" name="email" required><br><br>
                <button type="submit" class="btn btn-primary">Enviar código</button><br><br>
            </form>        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal 4 -->
<div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Recuperar contraseña</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

            <div class="alert alert-danger" role="alert"> Correo y/o código incorrecto ! </div>
            <form method="POST" action="comp_code.php">
                <label for="email">Correo Electrónico:</label><br>
                <input type="email" id="email" name="email" required><br><br>
                <label for="codigo">Código:</label><br>
                <input type="text" id="codigo" name="codigo" required><br><br>
                <button type="submit" class="btn btn-primary">Cambiar Contraseña</button><br><br>
            </form>   

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal 3 -->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Recuperar contraseña</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

            <form method="POST" action="camb_con.php">
                <label for="c1">Nueva Contraseña:</label><br>
                <input type="text" id="c1" name="c1" required><br><br>
                <label for="c2">Repetir Contraseña:</label><br>
                <input type="text" id="c2" name="c2" required><br><br>
                <input type="hidden" id="v" name="v" value="<?php echo $_GET['v']; ?>">
                <button type="submit" class="btn btn-primary">Cambiar Contraseña</button><br><br>
                
            </form>   

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal 5 -->
<div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Recuperar contraseña</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

            <div class="alert alert-danger" role="alert"> Las contraseñas no cohinciden ! </div>
            <form method="POST" action="camb_con.php">
                <label for="c1">Nueva Contraseña:</label><br>
                <input type="text" id="c1" name="c1" required><br><br>
                <label for="c2">Repetir Contraseña:</label><br>
                <input type="text" id="c2" name="c2" required><br><br>
                <input type="hidden" id="v" name="v" value="<?php echo $_GET['v']; ?>">
                <button type="submit" class="btn btn-primary">Cambiar Contraseña</button><br><br>
                
            </form>   

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
      </div>
    </div>
  </div>
</div>


<button type="button" id="botonRecuperarContraseña1" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="visibility: hidden;">
              </button>

<button type="button" id="botonRecuperarContraseña2" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="visibility: hidden;">
              </button>

<button type="button" id="botonRecuperarContraseña4" data-bs-toggle="modal" data-bs-target="#exampleModal4" style="visibility: hidden;">
              </button>

<button type="button" id="botonRecuperarContraseña3" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="visibility: hidden;">
              </button>

<button type="button" id="botonRecuperarContraseña5" data-bs-toggle="modal" data-bs-target="#exampleModal5" style="visibility: hidden;">
              </button>

<?php
    // Verificar si el valor es igual a 1
    if (isset($_GET['valor']) && $_GET['valor'] == 1) {
      ?>
        <script>document.getElementById('botonRecuperarContraseña1').click();</script>;
        <?php
    }
    ?>

<?php
    // Verificar si el valor es igual a 2
    if (isset($_GET['valor']) && $_GET['valor'] == 2) {
      ?>
        <script>document.getElementById('botonRecuperarContraseña2').click();</script>;
        <?php
        echo '<div class="alert alert-danger" role="alert">A simple danger alert—check it out!</div>';
    }
    ?>

<?php
    // Verificar si el v es igual a 0
    if (isset($_GET['v']) && $_GET['v'] == 0) {
      ?>
        <script>document.getElementById('botonRecuperarContraseña4').click();</script>;
        <?php
        echo '<div class="alert alert-danger" role="alert">A simple danger alert—check it out!</div>';
    }
    ?>

<?php
    // Verificar si el v es mayor o igual a 1
    if (isset($_GET['v']) && $_GET['v'] >= 1 && $_GET['cam'] != 2) {
      ?>
        <script>document.getElementById('botonRecuperarContraseña3').click();</script>;
        <?php
    }
    ?>

<?php
    // Verificar si cam son diferentes
    if (isset($_GET['cam']) && $_GET['cam'] == 2) {
      ?>
        <script>document.getElementById('botonRecuperarContraseña5').click();</script>;
        <?php
    }
    ?>

  </body>
</html>
