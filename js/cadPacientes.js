var tbPacientes = $('#tbPacientes').DataTable({
  "scrollX": true,
"language": {
    "decimal": "","emptyTable": "Nenhum rgistro disponÃ­nel","info": "Mostrando _START_ - _END_ de _TOTAL_ registros", "infoEmpty": "Mostrando 0 - 0 de 0 registros", "infoFiltered": "(Filtrar de _MAX_ total de registros)", "infoPostFix": "", "thousands": ",", "lengthMenu": "Mostrar _MENU_ ", "loadingRecords": "Carregando...", "processing": "Processando...", "search": "Filtrar: ", "zeroRecords": "Nenhum resultado para pesquisa", "paginate": { "first": "Primeiro", "last": "Último", "next": "Próximo", "previous": "Anterior" },
    "aria": { "sortAscending": ": classificar coluna em ordem crescente", "sortDescending": ": classificar coluna em ordem decrescente" }
  },
  "pageLength": 5,
  "lengthMenu": [[5, 10, 20, -1], [5, 10, 20, 'Todos']]    
});

function dialogDelete(obj){
    if (window.confirm("Confirma a exclusão do registro?")) { 
        var urlRedirect = obj.getAttribute("redirect");
        window.location.href="././" + urlRedirect;
      }
}

