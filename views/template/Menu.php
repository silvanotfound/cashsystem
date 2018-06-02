<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="css\styles.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Cash System</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" id="cash-system-logo" href="?controller=CashSystem&action=render">Cash System</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link" href="?controller=Type&action=render">Cadastrar Tipo de Produto</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="?controller=Tax&action=render">Cadastrar Imposto</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="?controller=Product&action=render">Cadastrar Produto</a>
                  </li>
              </ul>
          </div>
        </div>
    </nav>

  </body>
</html>
