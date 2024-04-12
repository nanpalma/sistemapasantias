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
      $('#formAddMaterial')
        .find('input:text, input:password, input:file, input:hidden  , input[name="email"],select, textarea')
        .removeClass('is-invalid')
        .removeClass('is-valid');
    },
    error: function (xhr, ajaxOptions, thrownError) {
      // Error de formulario validacion
      if (xhr.status == 422) {
        // Elimina el mensaje de error de los campos que estan correctos
        $('#formAddMaterial').find('strong[id]').text('');
        // Estilo de bootstrap para marcar que estan correctos los datos
        $('#formAddMaterial')
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
      const resp = await axios.get(base_url() + '/blindado-transporte/vehiculoszosi/list');
      console.log(resp.data);

      let table = '';
      if (resp.data == '') {
        table += `
          <table class="table" id="table1">
          <thead>
            <tr>
              <th>#ID</th>
              <th>MARCA</th>
              <th>MODELO</th>
              <th>COLOR</th>
              <th>PLACA</th>
              <th>SERIAL CHASIS</th>
              <th>SERIAL MOTOR</th>
              <th>UBICACIÓN</th>
              <th>INOPERATIVO</th>
              <th>OPERATIVO</th>
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
          <th>MARCA</th>
          <th>MODELO</th>
          <th>COLOR</th>
          <th>PLACA</th>
          <th>SERIAL CHASIS</th>
          <th>SERIAL MOTOR</th>
          <th>UBICACIÓN</th>
          <th>INOPERATIVO</th>
          <th>OPERATIVO</th>
          <th class="text-end"></th>
          </tr>
        </thead>
        <tbody>
            `;

        for (let i = 0; i < resp.data.length; i++) {
          let opr = resp.data[i].operativo
            ? `<input type="checkbox" class="form-check-input form-check-info"
        checked="" name="customCheck" id="customColorCheck5">`
            : '--------';

          let inoper = resp.data[i].inoperativo
            ? `<input type="checkbox" class="form-check-input form-check-info"
        checked="" name="customCheck" id="customColorCheck5">`
            : '--------';
          table += `
              <tr>
              <td>#${resp.data[i].id}</td>
              <td>${resp.data[i].marca}</td>
              <td>${resp.data[i].modelo}</td>
              <td>${resp.data[i].color}</td>
              <td>${resp.data[i].placa}</td>
              <td>${resp.data[i].serial_chasis}</td>
              <td>${resp.data[i].serial_motor}</td>
              <td>${resp.data[i].ubicacion}</td>
              <td>${opr}</td>
              <td>${inoper}</td>

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
          decimal: '',
          emptyTable: 'No hay datos disponibles en la tabla',
          info: 'Mostrando _START_ a _END_ de _TOTAL_ entradas',
          infoEmpty: 'Mostrando 0 a 0 de 0 entradas',
          infoFiltered: '(filtrado de un total de _MAX_ entradas)',
          infoPostFix: '',
          thousands: ',',
          lengthMenu: 'Mostrar _MENU_ entradas',
          loadingRecords: 'Cargando...',
          processing: 'Procesando...',
          search: 'Buscar:',
          zeroRecords: 'No se encontraron registros coincidentes',
          paginate: {
            first: 'Primero',
            last: 'Último',
            next: 'Siguiente',
            previous: 'Anterior'
          },
          aria: {
            sortAscending: ': activar para ordenar la columna ascendente',
            sortDescending: ': activar para ordenar la columna descendente'
          }
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
          const resp = await axios.delete(base_url() + '/blindado-transporte/vehiculoszodi/delet/' + id);
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
      const resp = await axios.get(base_url() + '/blindado-transporte/vehiculoszodi/edit/' + id);
      console.log(resp.data);
      $('#addModalMaterial').click();
      $('#id').val(resp.data.id);
      $('#marca').val(resp.data.marca);
      $('#modelo').val(resp.data.modelo);
      $('#color').val(resp.data.color);
      $('#placa').val(resp.data.placa);
      $('#serial_chasis').val(resp.data.serial_chasis);
      $('#serial_motor').val(resp.data.serial_motor);
      $('#ubicacion').val(resp.data.ubicacion);
      $('#flexRadioDefault1').prop('checked', resp.data.operativo);
      $('#flexRadioDefault2').prop('checked', resp.data.inoperativo);
    } catch (err) {
      // Handle Error Here
    }
  };
  sendGetRequest();
  //
}
