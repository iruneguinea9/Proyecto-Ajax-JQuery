<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discos</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"></head>
<body>

    <!-- -------------------------------------BARRA DE NAVEGACION ------------------------------------- -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../img/vinilo.png" alt="" width="30" height="24">
              </a>
          <a class="navbar-brand" href="../index.php">Tienda de Discos</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Discos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Favoritos</a>
              </li>
             </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
           
        </div>
      </nav>

    <!-- --------------------------------LOGIN -------------------------------- -->
      <section class="vh-100" style="background-color: #20B2AA;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="../img/login.png"
                        alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                    </div>
                    <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                     <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">


                        <div class="d-flex align-items-center mb-3 pb-1">
                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                            <span class="h1 fw-bold mb-0">Inicia sesión</span>
                        </div>

                        <div class="form-outline mb-4">
                            
                            <input type="text" id="usuario" name="username" class="form-control form-control-lg" />
                            <label class="form-label" for="form2Example17">Usuario</label>
                        </div>

                        <div class="form-outline mb-4">
                         <input type="password" id="contra" name="password" class="form-control form-control-lg" />
                            <label class="form-label" for="form2Example27">Contraseña</label>
                        </div>

                        <div class="pt-1 mb-4">
                            <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                        </div>

                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Aun no tienes cuenta? <a href="#!"
                            style="color: #393f81;">Registrate aquí!</a></p>
                        </form>

                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
      <script src="../js/app.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>