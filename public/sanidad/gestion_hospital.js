$(document).ready(function () {
  list_material();
  list_area();
});

$('#inlineForm').on('shown.bs.modal', function () {
  if ($('#id').val() == '') {
    console.log('El modal se ha abierto');

    let choices2 = document.querySelectorAll('.list_select_area');
    const example2 = new Choices(choices2[0]);
    $('.ocult_elemet').show();
  }
});
$('#inlineForm').on('hidden.bs.modal', function () {
  console.log('El modal se está cerrando');
  list_material();
  list_area();
  recet_input();
  $('#id').val('');
  // Aquí puedes realizar las acciones que desees cuando el modal se cierre
});

function recet_input() {
  $('#toe').val(0);
  $('#dotado').val(0);
  $('#faltan').val(0);
  $('#operativo').val(0);
  $('#inoperativo').val(0);
  $('#observacion').val('');
}

$('.inputValue').keyup(function () {
  // Puedes realizar las acciones que desees con el valor actual del input
  valoresLoad();
});
function valoresLoad() {
  const valor = $('#dotado').val() == '' ? 0 : $('#dotado').val();
  const toe = $('#toe').val() == '' ? 0 : parseInt($('#toe').val());
  const inoperativo = $('#inoperativo').val() == '' ? 0 : parseInt($('#inoperativo').val());

  let faltan = 0;
  if (toe == '' && toe == 0) {
  } else {
    faltan = parseInt($('#toe').val()) - parseInt(valor);
  }
  console.log('El valor actual del input es: ' + valor);
  let ope = parseInt(valor) - inoperativo;
  $('#operativo').val(ope);
  $('#faltan').val(faltan);
}

$('#btn_add_stock_modal').on('click', e => {
  e.preventDefault();
  console.log('hola');
  $.ajax({
    url: $('#formAddStore').attr('action'),
    data: $('#formAddStore').serialize(),
    type: $('#formAddStore').attr('method'),
    dataType: 'JSON',
    success: function (resp) {
      console.log(resp);
      if (resp.status == 201) {
        Toast.fire({
          icon: 'success',
          title: resp.message
        });
        location.reload();
      } else {
        Toast.fire({
          icon: 'error',
          title: resp.message
        });
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: resp.message
        });
      }
    },
    error: function (xhr, ajaxOptions, thrownError) {
      // Error de formulario validacion
      if (xhr.status == 422) {
        // Elimina el mensaje de error de los campos que estan correctos
        $('#formAddStore').find('strong[id]').text('');
        // Estilo de bootstrap para marcar que estan correctos los datos
        $('#formAddStore')
          .find('input:text, input:password, input:file, input:hidden  , input[name="email"],select, textarea')
          .removeClass('is-invalid')
          .addClass('is-valid');
        // Definido en el archivo general.js, muestra los campos que contienen errores en el formulario
        errores_formulario(xhr.responseJSON.errors);
      } //Errores web
      else {
        if (xhr.status == 404) {
          mensaje = 'Página no encontrada';
        } else if (xhr.status == 500) {
          mensaje = 'Error interno, intente de nuevo mas tarde o contacte al administrador del portal.';
        } else if (xhr.status == 0) {
          mensaje = 'No hay conexión a internet, por favor revise su conexión.';
        } else {
          mensaje = xhr.responseText;
        }

        // swal("Error "+xhr.status,mensaje, "error");
      }
    }
  });
});

function list_material(id = '') {
  // funtion_loader('show');
  const sendGetRequest = async () => {
    try {
      const resp = await axios.get(base_url() + '/departamento/material/list');
      console.log(resp.data);
      var cadena = '';
      // cadena += '<option value="">Seleccionar material</option>';
      for (let i = 0; i < resp.data.length; i++) {
        if (resp.data[i].id === id) {
          cadena += '<option selected value="' + resp.data[i].id + '">' + resp.data[i].nombre + ' </option>';
        } else {
          cadena += '<option value="' + resp.data[i].id + '">' + resp.data[i].nombre + '</option>';
        }
      }
      $('.list_select_material').html(cadena);
    } catch (err) {
      // Handle Error Here
    }
  };
  sendGetRequest();
  // Inicializar Choices.js después de rellenar el select
}

function list_area(id = '') {
  // funtion_loader('show');
  let id_brigada = $('#municipios_hospitale_id').val();
  console.log('id_brigada');
  const sendGetRequest = async () => {
    try {
      const resp = await axios.get(base_url() + '/departamento/sanidad/sub_brigadas/list/' + id_brigada);
      console.log(resp.data);
      var cadena = '';
      // cadena += '<option value="">Seleccionar el area</option>';
      for (let i = 0; i < resp.data.length; i++) {
        if (resp.data[i].id === id) {
          cadena += '<option selected value="' + resp.data[i].id + '">' + resp.data[i].nombre + ' </option>';
        } else {
          cadena += '<option value="' + resp.data[i].id + '">' + resp.data[i].nombre + '</option>';
        }
      }
      $('.list_select_area').html(cadena);
    } catch (err) {
      // Handle Error Here
    }
  };
  sendGetRequest();
  // Inicializar Choices.js después de rellenar el select
}

function deletMaterial(id) {
  console.log(id);
  Swal.fire({
    title: 'ELIMINAR',
    text: '¿ Estas seguro que deseas eliminar este registro ?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, Eliminar!',
    cancelmButtonText: 'Cancelar'
  }).then(result => {
    if (result.isConfirmed) {
      const sendGetRequest = async () => {
        try {
          const resp = await axios.delete(base_url() + '/departamento/sanidad/gestion/delet_stock/' + id);
          console.log(resp.data);
          Swal.fire({
            title: 'Eliminado!',
            text: 'Material eliminado con éxito.',
            icon: 'success'
          });
          location.reload();
        } catch (err) {
          // Handle Error Here
        }
      };
      sendGetRequest();
    }
  });
}

function editMaterial(id) {
  console.log(id);
  const sendGetRequest = async () => {
    try {
      const resp = await axios.get(base_url() + '/departamento/sanidad/gestion/edit/' + id);
      console.log(resp.data);
      $('#addModalMaterial').click();
      $('.ocult_elemet').hide();

      $('#id').val(resp.data.id);
      $('#municipios_hospitale_id').val(resp.data.municipios_hospitale_id);

      $('#hospitale_id').val(resp.data.hospitale_id).trigger('change');
      $('#hospitale_id').val(resp.data.hospitale_id);
      $('#establecimiento').val(resp.data.establecimiento);
      $('#parroquia').val(resp.data.parroquia);
      $('#tipo').val(resp.data.tipo);
      $('#direccion').val(resp.data.direccion);
    } catch (err) {
      // Handle Error Here
    }
  };
  sendGetRequest();
  //
}
