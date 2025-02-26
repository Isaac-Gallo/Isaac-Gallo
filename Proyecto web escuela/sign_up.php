<?php include('conection.php'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Usuario</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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

    <div class="container py-4">
        <div class="row g-0 align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="card cascading-right" style="background: hsla(0, 0%, 70%, 0.55); backdrop-filter: blur(30px);">
                    <div class="card-body p-5 shadow-5 text-center">
                        <h2 class="fw-bold mb-5">Regístrate ahora</h2>

                        <form action="registrar.php" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="nombre" id="form3Example1" class="form-control" required />
                                        <label class="form-label" for="form3Example1">Nombres</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="apellido" id="form3Example2" class="form-control" required />
                                        <label class="form-label" for="form3Example2">Apellidos</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="email" name="mail" id="form3Example3" class="form-control" required />
                                <label class="form-label" for="form3Example3">Correo Electrónico</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" name="con" id="form3Example4" class="form-control" required />
                                <label class="form-label" for="form3Example4">Contraseña</label>
                            </div>

                            <!-- reCAPTCHA -->
                            <div class="g-recaptcha" data-sitekey="TU_CLAVE_PUBLICA_DE_RECAPTCHA"></div>
                            <br/>

                            <!-- Botón de envío -->
                            <button type="submit" name="registrar" class="btn btn-primary btn-block mb-4">
                                Registrarse
                            </button>
                        </form>

                        <div class="text-center">
                            <p>O si ya tienes cuenta:</p>
                            <button type="button" class="btn btn-primary btn-block mb-4" onclick="window.location.href='index.php'">
                                Ingresar
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0">
                <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" class="w-60 rounded-4 shadow-4" height="700" alt="" />
            </div>
        </div>
    </div>
</section>
</body>
</html>
