<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="./scripts/persistsProduct.js" charset="utf-8"></script>
  </head>
  <body>
    <?php
        include 'template\Menu.php';
        $_params = $this->getParams();
        $_paramsType = $this->getParamsType();
    ?>
    <div class="jumbotron">
      <div class="container">
        <a class="btn btn-success" href="#" role="button" data-toggle="modal" data-target="#form-type-collapse">Novo Tipo</a>
      </div>
    </div>

    <div class="modal fade" id="form-type-collapse" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Cadastro de Produto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form class="form-product">
              <div class="form-group">
                <label>Código</label>
                <input type="text" class="form-control" name="product-code">
              </div>
              <div class="form-group">
                <label>Descrição</label>
                <input type="text" class="form-control" name="product-description">
              </div>
              <div class="form-group">
                <label>Tipo</label>
                <select class="form-control" name="product-type">
                  <?php
                    while($consulta = pg_fetch_array($_paramsType))
                    {
                      echo '<option value='.$consulta['product_type_code'].'>'.$consulta['product_type_description'].'</option>';
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Valor</label>
                <input type="text" class="form-control" name="product-value">
              </div>
            </form>

          </div>
          <div class="modal-footer">
            <a class="btn btn-secondary" href="#" role="button" data-dismiss="modal">Cancelar</a>
            <a class="btn btn-success" href="#" role="button" onclick="saveProduct()">Salvar</a>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="table-type">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Código do Produto</th>
              <th>Descrição do Produto</th>
              <th>Tipo do Produto</th>
              <th>Valor do Produto</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($consulta = pg_fetch_array($_params))
              {
                echo '<tr>';
                  echo '<td>'.$consulta['product_code'].'</td>';
                  echo '<td>'.$consulta['product_description'].'</td>';
                  echo '<td>'.$consulta['product_type_description'].'</td>';
                  echo '<td>'.$consulta['product_value'].'</td>';
                echo '</tr>';
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
