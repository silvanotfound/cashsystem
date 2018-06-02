<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <?php
        include 'template\Menu.php';
        $_params = $this->getParams();
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
            <h5 class="modal-title">Cadastro Tipo de Produto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            <div id="alert">
            </div>
            
            <form method="post" class="form-type" autocomplete="off">
              <div class="form-group">
                <label>Código</label>
                <input type="text" class="form-control" name="type-code">
              </div>
              <div class="form-group">
                <label>Descrição</label>
                <input type="text" class="form-control" name="type-description">
              </div>
            </form>

          </div>
          <div class="modal-footer">
            <a class="btn btn-secondary" href="#" role="button" data-dismiss="modal">Cancelar</a>
            <button class="btn btn-success" onclick="saveType()" name="save">Salvar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="table-type">
        <table class="table table-striped table-bordered table-sm">
          <thead>
            <tr>
              <th>Código Tipo de Produto</th>
              <th>Descrição Tipo de Produto</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($consulta = pg_fetch_array($_params))
              {
                echo '<tr>';
                  echo '<td>'.$consulta['product_type_code'].'</td>';
                  echo '<td>'.$consulta['product_type_description'].'</td>';
                echo '</tr>';
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <script src="./scripts/persistsType.js" charset="utf-8"></script>
  </body>
</html>
