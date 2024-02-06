<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"></head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <body>

    <!-- -------------------------------------BARRA DE NAVEGACION ------------------------------------- -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/vinilo.png" alt="" width="30" height="24">
              </a>
          <a class="navbar-brand" href="#">Tienda de Discos</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Discos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/favoritos.php">Favoritos</a>
              </li>
             </ul>
            <form class="d-flex">
              <input id="searchBar" class="form-control me-2" type="search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>           
          </div> 
          <button type="button" class="btn btn-outline-secondary" id="botonLogin" style="display:block">Login</button>
          <button type="button" class="btn btn-outline-secondary" id="botonLogout" style="display:none">Logout</button>
        </div>
      </nav>
    <!-- ------------------------------------- CARRUSEL ------------------------------------- -->
      <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" style="height:  400px;">
            <img src="img/carrusel2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Bienvenido a la tienda de discos!</h5>
              <p>Tenemos la mejor selección de albumes</p>
            </div>
          </div>
          <div class="carousel-item" style="height:  400px;">
            <img src="img/carrusel1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Tus favoritos</h5>
              <p>Recuerda marcar tus albumes como favoritos para no perderlos de vista!</p>
            </div>
          </div>
          <div class="carousel-item" style="height:  400px;">
            <img src="img/carrusel3.jpg" class="d-block w-100"  alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Novedades</h5>
              <p>Cada semana traemos novedades para que no te pierdas nada</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div> 

    <!-- ------------------------------------- DISCOS ------------------------------------- -->


    <div class="row mx-3 mt-3" id="filtro">
      </div>
      
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 mx-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <img src="img/vinilo.png" alt="" width="30" height="24">
          <span class="mb-3 mb-md-0 text-body-secondary">Tienda de discos, Inc ©2023 </span>
        </div>

      </footer>
      <script src="js/app.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>