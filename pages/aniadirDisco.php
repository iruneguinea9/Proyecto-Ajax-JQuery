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
                <img src="../img/vinilo.png" alt="" width="30" height="24">
              </a>
          <a class="navbar-brand" href="../index.php">Tienda de Discos</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../index.php">Discos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="favoritos.php">Favoritos</a>
              </li>
             </ul>
           
          </div> 
        </div>
      </nav>
   
      
      <form class="row g-3 needs-validation justify-content-center m-5 p-5 border border-success" novalidate>
        <h2>Añadir disco nuevo</h2>        
        <div class="col-12">
            <label for="titulo" class="form-label">Titulo</label>
            <input type="text" class="form-control" id="titulo" required>
            <div class="invalid-feedback">
            Porfavor introduce un titulo
            </div>
        </div>
       
        <div class="col-12">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" class="form-control" id="autor" required>
            <div class="invalid-feedback">
            Porfavor introduce un autor
            </div>
        </div>
         <div class="col-12">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="text" class="form-control" id="imagen" value="img/cdDefault.jpg" required>
            <div class="invalid-feedback">
            Porfavor introduce una ruta valida
            </div>
        </div>
        <div class="col-12">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" required>
            <div class="invalid-feedback">
            Porfavor introduce una descripción
            </div>
        </div>
        <div class="col-12">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" required>
            <div class="invalid-feedback">
            Porfavor introduce un precio
            </div>
        </div>
        <div class="col-12">
            <label for="categoria" class="form-label">Categoria</label>
            <input type="text" class="form-control" id="categoria" required>
            <div class="invalid-feedback">
            Porfavor introduce una categoria
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary bg-success" type="submit">Añadir disco</button>
        </div>
        </form>






      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 mx-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <img src="../img/vinilo.png" alt="" width="30" height="24">
          <span class="mb-3 mb-md-0 text-body-secondary">Tienda de discos, Inc ©2023 </span>
        </div>

      </footer>

      <script src="../js/app.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>