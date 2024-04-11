// let jquery_datatable = $('#table1,#tabletwe').DataTable({
//   responsive: true
// });
// let customized_datatable = $('#table2').DataTable({
//   responsive: true,
//   pagingType: 'simple',
//   dom: "<'row'<'col-3'l><'col-9'f>>" + "<'row dt-row'<'col-sm-12'tr>>" + "<'row'<'col-4'i><'col-8'p>>",
//   language: {
//     info: 'Page _PAGE_ of _PAGES_',
//     lengthMenu: '_MENU_ ',
//     search: '',
//     searchPlaceholder: 'Buscar..'
//   }
// });

// const setTableColor = () => {
//   document.querySelectorAll('.dataTables_paginate .pagination').forEach(dt => {
//     dt.classList.add('pagination-primary');
//   });
// };
// setTableColor();
// jquery_datatable.on('draw', setTableColor);

let jquery_datatable = $('#table1,#tabletwe').DataTable({
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

let customized_datatable = $('#table2').DataTable({
  responsive: true,
  pagingType: 'simple',
  dom: "<'row'<'col-3'l><'col-9'f>>" + "<'row dt-row'<'col-sm-12'tr>>" + "<'row'<'col-4'i><'col-8'p>>",
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

const setTableColor = () => {
  document.querySelectorAll('.dataTables_paginate .pagination').forEach(dt => {
    dt.classList.add('pagination-primary');
  });
};
setTableColor();
jquery_datatable.on('draw', setTableColor);
