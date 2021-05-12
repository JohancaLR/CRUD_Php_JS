<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script
    src='../Libs/jquery.js' integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../Controller/app.js"></script>
    <link rel="stylesheet" href='../Libs/bootstrap-4.0.0-dist/CSS/bootstrap.min.css' integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src='../Libs/bootstrap-4.0.0-dist/js/bootstrap.min.js' integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Datos Universitarios</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">DATOS UNIVERSITARIOS</span>
      </div>
    </nav>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-sm-12">
              <form id="formulario">
                <div class="form-group">
                  <label for="">Identificación:</label>
                  <input class="form-control mr-sm-2" type="number" id="id_est" required>
                  <p id="val_id"></p>
                </div>
                <div class="form-group">
                  <label for="">Nombre Completo:</label>
                  <input class="form-control mr-sm-2" type="text" id="nombre_est" required>
                  <p id="val_nombre"></p>
                </div>
                <div class="form-group">
                  <label for="">Fecha de Nacimiento:</label>
                  <input class="form-control mr-sm-2" max="2010-12-12" min="1930-01-01" type="date" id="fecha_nac_est" required>
                  <p id="val_fecha"></p>
                </div>
                <div class="form-group">
                  <label for="">Edad:</label>
                  <input class="form-control mr-sm-2" type="number" id="edad_est" required>
                </div>
                <div class="form-group">
                  <label for="">Departamento de Nacimiento:</label>
                  <select class="form-control mr-sm-2" id="departamento" required>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Ciudad de Nacimiento:</label>
                  <select class="form-control mr-sm-2" id="ciudad" required>
                  </select>
                </div>
                <div align="center" class="d-grid gap-2 d-md-block">
                  <button class="btn btn-success my-2 my-sm-0" id="guardar" type="submit">GUARDAR</button>
                  <button class="btn btn-warning my-2 my-sm-0" id="modificar" type="button">MODIFICAR</button>
                  <button class="btn btn-danger my-2 my-sm-0" id="borrar" type="button">BORRAR</button>
                  <button class="btn btn-info my-2 my-sm-0" id="limpiar" type="button">LIMPIAR</button>
                </div>
              </form>
              <br>
        </div>
        <div class="col-md-7">
          <table class="table table-bordered table-sm">
            <thead class="table-dark">
              <tr>
                <td>Identificación</td>
                <td>Nombre</td>
                <td>F.Nacimiento</td>
                <td>Ciudad</td>
                <td>Departamento</td>
                <td>Edad</td>
              </tr>
            </thead>
            <tbody id="tabla">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
