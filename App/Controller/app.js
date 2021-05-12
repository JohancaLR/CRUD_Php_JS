$(document).ready(function(){
  //======================================================
  //            INICIO
  //======================================================
  $("#modificar").attr("disabled",true);
  $("#borrar").attr("disabled",true);
  $("#edad_est").attr("disabled",true);
  $('#val_id').css({ 'color':'red'});
  $('#val_nombre').css({ 'color':'red'});
  $('#val_fecha').css({ 'color':'red'});
  cargarTabla();
  var create = true;

  //CARGAR DEPARTAMENTOS Y CIUDADES
  $.getJSON('../Models/ReadDepartamentos.php', function(data) {
  			$.each(data, function(val,key) {
          //.append('<option value="' + key.id_departamento + '">' + key.nombre_departamento + '</option>');
          $("#departamento").append(new Option(key.nombre_departamento, key.id_departamento));
  			});
        let departamento = $('#departamento option:selected').attr('value');
        cargarCiudades(departamento);
  		});

  //======================================================
  //            ACCIONES
  //======================================================

  //ACCION -- GUARDAR -- ACTUALIZAR
  $('#formulario').submit(function(e){
    const estudiante = {
      id_est: $('#id_est').val(),
      nombre_est: $('#nombre_est').val(),
      fecha_nac_est: $('#fecha_nac_est').val(),
      ciudad_est: $('#ciudad option:selected').val()
    };
    let url = create === true ? '../Models/CreateEstudiante.php' : '../Models/UpdateEstudiante.php';
    $.post(url, estudiante, function(response){
      if (response==1) {
        $('#tabla').trigger('reset');
        cargarTabla();
        DesbloquearFormulario();
        $('#formulario').trigger('reset');
        let departamento = $('#departamento option:selected').attr('value');
        cargarCiudades(departamento);
        create = true;
      }else {
        alert('Error: ' + response)
      }
    });
    e.preventDefault();
  });

  //ACCION--MODIFICAR
  $('#modificar').click(function() {
    create = false;
    DesbloquearFormulario()
    $('#id_est').attr("disabled",true);
  });

  //ACCION -- BORRAR
  $('#borrar').click(function() {
    let desicion = confirm('Está seguro de que desea Eliminar este estudiante?');
    if (desicion) {
      const id_est = {id_est: $('#id_est').val()};
      $.post('../Models/DeleteEstudiante.php', id_est, function(response) {
        if (response==1) {
          $('#tabla').trigger('reset');
          cargarTabla();
          $('#formulario').trigger('reset');
          DesbloquearFormulario();
          let departamento = $('#departamento option:selected').attr('value');
          cargarCiudades(departamento);
        }else{
          alert('Error: ' + response);
        }
      });
    }
  });

  //ACCION -- LIMPIAR
  $('#limpiar').click(function () {
    $('#val_id').text('');
    $('#val_nombre').text('');
    $('#val_fecha').text('');
    $('#formulario').trigger('reset');
    DesbloquearFormulario();
    create = true;
  });

  //ACCION -- FECHA
  $('#fecha_nac_est').change(function() {
    $('#edad_est').val(calcularEdad($(this).val()));
  });

  //ACCION -- DEPARTAMENTO
  $('#departamento').change(function(){
    //let departamento = $('#departamento option:selected').val();
    cargarCiudades($('#departamento option:selected').val());
  });

  //ACCION -- CLICK TABLA
  $(document).on('click','.estudiante', function() {
    let row = $(this)[0];
    console.log(row);
    let id_departamento = $(row).find("td:eq(7)").text();
    cargarCiudades(id_departamento);
    let id_est = $(row).find("td:eq(0)").text();
    cargarEstudiante(id_est);
    bloquearFormulario();
  });

  //======================================================
  //            FUNCIONES
  //======================================================

  function DesbloquearFormulario() {
    $("#modificar").attr("disabled",true);
    $("#borrar").attr("disabled",true);
    $("#id_est").attr("disabled",false);
    $('#nombre_est').attr("disabled",false);
    $('#fecha_nac_est').attr("disabled",false);
    $('#departamento').attr("disabled",false);
    $('#ciudad').attr("disabled",false);
    $('#guardar').attr("disabled",false);
  }
  function bloquearFormulario() {
    $("#guardar").attr("disabled",true);
    $("#modificar").attr("disabled",false);
    $("#borrar").attr("disabled",false);
    $('#id_est').attr("disabled",true);
    $('#nombre_est').attr("disabled",true);
    $('#fecha_nac_est').attr("disabled",true);
    $('#departamento').attr("disabled",true);
    $('#ciudad').attr("disabled",true);

  }

  //CARGAR CIUDADES
  function cargarCiudades(departamento) {
  $.getJSON('../Models/ReadCiudades.php', {departamento}, function(data) {
        $('#ciudad').empty();
  			$.each(data, function(val,key) {
          $("#ciudad").append(new Option(key.nombre_ciudad, key.id_ciudad));
  			});
  		});
  }

  //CARGAR ESTUDIANTE
  function cargarEstudiante(id_est) {
    $.getJSON('../Models/ReadEstudiante.php', {id_est}, function (data){
      $('#id_est').val(data[0].id_est);
      $('#nombre_est').val(data[0].nombre_est);
      $('#fecha_nac_est').val(data[0].fecha_nac_est);
      $('#edad_est').val(calcularEdad(data[0].fecha_nac_est));
      $('#departamento').val(data[0].id_departamento.toString());
      $("#ciudad").val(data[0].id_ciudad.toString());
      });
  }

  //CALCULAR EDAD
  function calcularEdad(fecha) {
    fecha = new Date(fecha);
    let hoy = new Date();
    let edad = Math.floor((hoy-fecha) / (365.25 * 24 * 60 * 60 * 1000));
    return edad;
  }

  //CARGAR TABLA
  function cargarTabla() {
    $.getJSON('../Models/ReadEstudiantes.php', function(data) {
      $("#tabla").empty()
  		$.each(data, function(val,key) {
        $("#tabla").append('<tr class="estudiante">' +
          '<td align="center" >' + key.id_est + '</td>'+
          '<td align="center" >' + key.nombre_est + '</td>'+
          '<td align="center" >' + key.fecha_nac_est + '</td>'+
          '<td align="center" >' + key.nombre_ciudad + '</td>'+
          '<td align="center" >' + key.nombre_departamento + '</td>'+
          '<td align="center" >' + calcularEdad(key.fecha_nac_est) + '</td>'+
          '<td align="center" style="display:none;" >' + key.id_ciudad + '</td>'+
          '<td align="center" style="display:none;" >' + key.id_departamento + '</td>'+'</tr>');
    	});
    });

  }

  //======================================================
  //            VALIDACIONES
  //======================================================
  //validacion id_est
  $("#id_est").keyup(function(e){
    let numero = $(this).val().length;
    if (!numero) {
      $("#guardar").attr("disabled",true);
      e.preventDefault();
      $('#val_id').text('*debe rellenar este campo');
    }else if(numero<9){
      $("#guardar").attr("disabled",true);
      e.preventDefault();
      $('#val_id').text('*numero demasiado pequeño');
      //$(this).after('<p>Número demasiado corto</p>');
    }else if (numero >12) {
      $("#guardar").attr("disabled",true);
      e.preventDefault();
      $('#val_id').text('*numero demasiado largo');
    }
    else{
      $('#val_id').text('');
      $("#guardar").attr("disabled",false);
    }
  });

  //validacion nombre_est
  $("#nombre_est").keyup(function(e){
    let nombre = $(this).val();
    //let matches = nombre.match(/\d+/g);
    if (nombre.match(/\d+/g)!=null) {
      $("#guardar").attr("disabled",true);
      e.preventDefault();
      $('#val_nombre').text('*el nombre no debe contener numeros');
    }else if (!nombre.length) {
      $("#guardar").attr("disabled",true);
      e.preventDefault();
      $('#val_nombre').text('*debe rellenar este campo');
    }else if(nombre.length<5){
      $("#guardar").attr("disabled",true);
      e.preventDefault();
      $('#val_nombre').text('*nombre demasiado corto');
    }else if (nombre.length >29) {
      $("#guardar").attr("disabled",true);
      e.preventDefault();
      $('#val_nombre').text('*nombre demasiado largo');
    }
    else{
      $('#val_nombre').text('');
       $("#guardar").attr("disabled",false);
    }
  });

  //validacion fecha_nac_est
  $("#fecha_nac_est").keyup(function(e){
    let fecha = $(this).val().substr(0,4);
    if (!fecha) {
      $("#guardar").attr("disabled",true);
      e.preventDefault();
      $('#val_fecha').text('*debe completar este campo');
    }else if(fecha<1930 || fecha >2010){
      $("#guardar").attr("disabled",true);
      e.preventDefault();
      $('#val_fecha').text('*inserte una fecha entre 1930-2010');
    }
    else{
      $('#val_fecha').text('');
       $("#guardar").attr("disabled",false);
    }
  });

});
