<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/login.css">
</head>

<body class="text-center">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <main class="form-signin">
    <div class="container-b">
      <form action="./php/sesion.php" method="post">
        <img class="mb-4" src="img/logo.png" alt="" width="250" height="65">
        <h1 class="h3 mb-3 fw-normal">Bienvenido(a) a SICS</h1>

        <div class="form-floating">
          <input type="text" class="form-control" name="user" id="floatingInput" placeholder="User">
          <label for="floatingInput">Usuario</label>
        </div>
        <div class="mt-2 form-floating">
          <input type="password" class="form-control" name="pass" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Contraseña</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar Sesión</button>
        <p class="mt-5 mb-3 text-muted">&copy; SICS - Fundación Museo Amparo I.A.P.</p>
      </form>
    </div>
  </main>
</body>

</html>