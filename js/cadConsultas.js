var tbPacientes = $('#tbPacientes').DataTable({
  "scrollX": true,
"language": {
    "decimal": "","emptyTable": "Nenhum rgistro disponÃ­nel","info": "Mostrando _START_ - _END_ de _TOTAL_ registros", "infoEmpty": "Mostrando 0 - 0 de 0 registros", "infoFiltered": "(Filtrar de _MAX_ total de registros)", "infoPostFix": "", "thousands": ",", "lengthMenu": "Mostrar _MENU_ ", "loadingRecords": "Carregando...", "processing": "Processando...", "search": "Filtrar: ", "zeroRecords": "Nenhum resultado para pesquisa", "paginate": { "first": "Primeiro", "last": "Último", "next": "Próximo", "previous": "Anterior" },
    "aria": { "sortAscending": ": classificar coluna em ordem crescente", "sortDescending": ": classificar coluna em ordem decrescente" }
  },
  "pageLength": 5,
  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'Todos']]    
});



var tbMedicos = $('#tbMedicos').DataTable({
  "scrollX": true,
"language": {	  
    "decimal": "","emptyTable": "Nenhum rgistro disponÃ­nel","info": "Mostrando _START_ - _END_ de _TOTAL_ registros", "infoEmpty": "Mostrando 0 - 0 de 0 registros", "infoFiltered": "(Filtrar de _MAX_ total de registros)", "infoPostFix": "", "thousands": ",", "lengthMenu": "Mostrar _MENU_ ", "loadingRecords": "Carregando...", "processing": "Processando...", "search": "Filtrar: ", "zeroRecords": "Nenhum resultado para pesquisa", "paginate": { "first": "Primeiro", "last": "Último", "next": "Próximo", "previous": "Anterior" },
    "aria": { "sortAscending": ": classificar coluna em ordem crescente", "sortDescending": ": classificar coluna em ordem decrescente" }
  },
  "pageLength": 5,
  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
});


/* Nova logica para click */
/* Abondonei o uso do idTB textTB */
/* Agora pego a primeira e segunda coluna, parecido com a lÃ³gica da Gabriella */


var tableMedicos = $('#tbMedicos').DataTable();
$('#tbMedicos tbody').on('click', 'tr', function () {
var data = tableMedicos.row( this ).data();
document.querySelector("#inputNomeMedico").value = data[0] +" - "+data[1];
document.querySelector("#inputIDMedico").value = data[0];
});


var tablePacientes = $('#tbPacientes').DataTable();
$('#tbPacientes tbody').on('click', 'tr', function () {
var data = tablePacientes.row( this ).data();
document.querySelector("#inputNomePaciente").value = data[0] +" - "+data[1];
document.querySelector("#inputIDPaciente").value = data[0];
});