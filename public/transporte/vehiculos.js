$(document).ready(function () {
  list_material();
});
$('#inlineForm').on('hidden.bs.modal', function () {
  console.log('El modal se está cerrando');
  recet_input();
  // Aquí puedes realizar las acciones que desees cuando el modal se cierre
});

function recet_input() {
  $('#id').val('');
  $('#modelo').val('');
  $('#nombre').val('');
  $('#placa').val('');
}

$('#btn_add_material').on('click', e => {
  e.preventDefault();
  console.log('hola');
  $.ajax({
    url: $('#formAddMaterial').attr('action'),
    data: $('#formAddMaterial').serialize(),
    type: $('#formAddMaterial').attr('method'),
    dataType: 'JSON',
    success: function (resp) {
      console.log(resp);
      Toast.fire({
        icon: 'success',
        title: resp.message
      });

      $('#cerrarModalMa').click();
      list_material();
      $('#formAddMaterial')[0].reset();
      $('#formAddMaterial').find('#id').val('');
    },
    error: function (xhr, ajaxOptions, thrownError) {
      // Error de formulario validacion
      if (xhr.status == 422) {
        // Elimina el mensaje de error de los campos que estan correctos
        $('#formAdd').find('strong[id]').text('');
        // Estilo de bootstrap para marcar que estan correctos los datos
        $('#formAdd')
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

function list_material() {
  // funtion_loader('show');
  const sendGetRequest = async () => {
    try {
      const resp = await axios.get(base_url() + '/blindado-transporte/vehiculos/list');
      console.log(resp.data);
      let table = '';
      if (resp.data == '') {
        table += `
          <table class="table" id="table1">
          <thead>
            <tr>
              <th>#ID</th>
              <th>VEHÍCULO DE TRASPORTE
              SISTEMA BLINDADOS Y SISTEMAS DE ARTILLERÍA</th>
              <th>SERIAL O PLACA </th>
              <th>TIPO</th>
              <th class="text-end"></th>
            </tr>
          </thead>
          <tbody>
            `;
        table += `
            </tbody>
            </table>`;
      } else {
        table += `
        <table class="table" id="table1">
        <thead>
          <tr>
            <th>#ID</th>
            <th>VEHÍCULO DE TRASPORTE SISTEMA BLINDADOS Y SISTEMAS DE ARTILLERÍA</th>
            <th>SERIAL O PLACA </th>
            <th>TIPO</th>
            <th class="text-end"></th>
          </tr>
        </thead>
        <tbody>
            `;

        for (let i = 0; i < resp.data.length; i++) {
          table += `
              <tr>
              <td>#${resp.data[i].id}</td>
              <td>${resp.data[i].placa}</td>
              <td>${resp.data[i].nombre}</td>
              <td>${resp.data[i].modelo}</td>

              <td class="text-end">
                <div class="btn-group mb-1">
                  <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Opciones
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" onclick="editMaterial(${resp.data[i].id})" href="#">Editar</a>
                      <a class="dropdown-item" onclick="deletMaterial(${resp.data[i].id})" href="#">Eliminar</a>
                    </div>
                  </div>
                </div>
              </td>
            </tr>`;
        }
        table += `
             </tbody>
             </table>`;
      }
      // funtion_loader('hide');
      $('#list_material').html(table);
      $('#table1').DataTable({
        responsive: true,
        language: {
          searchPlaceholder: 'Buscar...',
          sSearch: ''
        }
      });
      // $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
    } catch (err) {
      // Handle Error Here
    }
  };
  sendGetRequest();
}

function deletMaterial(id) {
  console.log(id);
  Swal.fire({
    title: 'ELIMINAR VEHÍCULO',
    text: '¿ Estas seguro que deseas eliminar este vehículo ?',
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
          const resp = await axios.delete(base_url() + '/blindado-transporte/vehiculos/delet/' + id);
          console.log(resp.data);
          list_material();
          Swal.fire({
            title: 'Eliminado!',
            text: 'Material eliminado con éxito.',
            icon: 'success'
          });
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
      const resp = await axios.get(base_url() + '/blindado-transporte/vehiculos/edit/' + id);
      console.log(resp.data);
      $('#id').val(resp.data.id);
      $('#nombre').val(resp.data.nombre);
      $('#placa').val(resp.data.placa);
      $('#modelo').val(resp.data.modelo);
      $('#addModalMaterial').click();
    } catch (err) {
      // Handle Error Here
    }
  };
  sendGetRequest();
  //
}
