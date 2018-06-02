<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  </head>
  <body>
    <?php
        include 'template\Menu.php';
        $_params = $this->getParams();
    ?>
    
    <div class="jumbotron" id="jumbotron">
      <div class="container">
        
        <div id="alert">  
        </div>

        <form class="form-cash-system"  autocomplete="off">
          <div class="row d-flex justify-content-center">
            
            <div class="col col-md-2">
              <label>Código do Produto</label>
              <input id="input-product-code" type="text" class="form-control" name="product-code">
            </div>
            
            <div class="col col-md-4">
              <label>Produto</label>
              <input type="text" disabled id="input-product" class="form-control" name="product" placeholder="">
            </div>
            
            <div class="col col-md-3">
              <label>Quantidate</label>
              <input type="text" class="form-control" id="input-count"name="count-product">
            </div>
            
            <div class="col col-md-2">
              <button type="submit" class="btn btn-success mb-2 align-self-end" id="add-product">Adicionar</button>
            </div>

          </div>
        </form>
      </div>
    </div>

    <div class="container">
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Total da Compra</a>
          <a class="nav-link disabled" href="#" style="text-align: center;"><strong name="sum-value">R$ 00,00</strong></a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Total de Imposto</a>
          <a class="nav-link disabled" href="#" style="text-align: center;"><strong name="sum-tax">R$ 00,00</strong></a>
        </li>
      </ul>

      <table class="table table-striped table-bordered table-sm" id="table-releases">
        <thead>
          <tr>
            <th>Produto</th>
            <th>Valor Pago</th>
            <th>Imposto Pago</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
    <script src="./scripts/persistsCashSystem.js" charset="utf-8"></script>
  </body>
</html>
