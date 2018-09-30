import * as CDataTable from './components/dataTable';

const FIELDS = [
  { data: 'id', name: 'id' },
  { data: 'date_time', columns: 'date_time' },
  { data: 'patient', columns: 'patient' },
  { data: 'doctor', columns: 'doctor' },
  // { data: 'has_exams', columns: 'has_exams' },
  { data: 'status', columns: 'status' },
];
// const FIELDS_EDITOR = [
//   { targets: 3, "width": "16%", render: $.fn.dataTable.render.moment( 'Do MMM YYYYY' ) }
// ];
const ID_TABLE = '#schedules-table';
const BASE_URL = '/schedules/';

$(() => {
  CDataTable.loadDataTable(ID_TABLE, BASE_URL + 'data', FIELDS);
});

$(document).on('click', '.btn-delete', (event) => {
  CDataTable.deleteItem(event, BASE_URL, () => {
    $(ID_TABLE).DataTable().destroy();
    CDataTable.loadDataTable(ID_TABLE, BASE_URL + 'data', FIELDS);
  })
});

$(document).on('click', '.btn-edit', (event) => {
  CDataTable.updateItem(event, BASE_URL);
});

$(document).on('click', '.btn-preview', (event) => {
  CDataTable.previewItem(event, BASE_URL);
});