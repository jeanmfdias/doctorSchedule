import * as CDataTable from './components/dataTable';

const FIELDS = [
  { data: 'id', name: 'id' },
  { data: 'name', columns: 'name' },
  { data: 'email', columns: 'email' }
];
const ID_TABLE = '#users-table';
const BASE_URL = '/users/';

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