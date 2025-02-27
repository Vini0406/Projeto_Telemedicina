<?php 
  session_start(); 
  if (!isset($_SESSION["usuario"])){
    echo '<script>alert("Usuário não logado!");window.location.href="./index.php";</script>'; 
    die;
  }
?>

<?php
  include "php/conn.php";
  // Pega o ID do médico selecionado (se existir) via GET ou POST
  $pacienteSelecionado = isset($_GET['id']) ? $_GET['id'] : -1; 
  include 'topSite.html'; // Inclui cabcario padrao
?>

<div class="container-fluid pr-3 pl-3">
  <div class="card mt-3 mb-3">
    <div class="card-header bg-dark text-white">
      <h3 class="card-title m-0">Histórico Paciente</h3>
    </div>
    <div class="card-body">
		<h3>Selecione o Paciente</h3>
    <form action="" method="post">
        <div class="form-group ">          
        <select class="form-control" id="historicoPaciente">
        <option value="-1" <?= ($pacienteSelecionado == -1) ? 'selected' : '' ?>>Todos</option>
        <?php
        $sql = "SELECT DISTINCT `nome`, `paciente` FROM `tbconsultas` 
                    JOIN `tbpacientes` ON `tbconsultas`.`paciente_FK` = `tbpacientes`.`paciente` 
                    ORDER BY `nome` ASC";
        $result = $conn->query($sql); 
        while($row = $result->fetch_assoc()) {
          $selected = ($row["paciente"] == $pacienteSelecionado) ? 'selected' : '';
          echo '<option value="' . $row["paciente"] . '" ' . $selected . '>' . $row["nome"] . ' (id: ' . $row["paciente"] . ') </option>';
        }
        ?>
        </div>
      </select>
    </form>     
      <hr class="mt-3">
      <h3 class="card-title mt-4 mb-4">Agendamentos</h3>      
      <table id="tbHistorico" class="display compact nowrap" style="width:100%">
        <thead>
          <tr>
            <th>Id</th>
            <th>Médico</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Ação</th>
          </tr>
        </thead>
           <tbody> 
           <?php
              if ($pacienteSelecionado == -1) {
                $sql = "SELECT c.consulta, m.nome AS nome_do_medico, c.horario, c.data, paciente
                        FROM tbconsultas c
                        INNER JOIN tbmedicos m ON c.medico_FK = m.medico
                        INNER JOIN tbpacientes p ON c.paciente_FK = p.paciente";
              } else {
                  // Quando um médico específico é selecionado, filtra pela chave do médico
                  $sql = "SELECT c.consulta, m.nome AS nome_do_medico, c.horario, c.data, paciente
                          FROM tbconsultas c
                          INNER JOIN tbmedicos m ON c.medico_FK = m.medico
                          INNER JOIN tbpacientes p ON c.paciente_FK = p.paciente
                          WHERE c.paciente_FK = $pacienteSelecionado";
              }

              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
                  $dataCadastro = date_create($row["data"]);
                  $dataCadastroFormatada = date_format($dataCadastro, "d/m/Y");

                  echo '<TR>';
                  echo '<TD>' . $row["consulta"] . '</TD>';
                  echo '<TD>' . $row["nome_do_medico"] .' <span class="idsTable"> (id: '. $row["paciente"] .') </span> </TD>';
                  echo '<TD>' . $dataCadastroFormatada . '</TD>';
                  echo '<TD>' . $row["horario"] . '</TD>';
                  echo '<TD><i redirect="php/deleteScripts.php?tabela=tbconsultasPaciente&id='.$row["consulta"].'" class="fas fa-trash-alt text-danger" onclick="dialogDelete(this)" style="cursor:pointer"></i></TD></TD>';
                  echo '</TR>';
              }
              ?>
       
          </tbody>           
      </table>
     
      
    </div>

  </div>
</div>
</div> <!-- DIV FORA DO ARQUIVO-->
</div> <!-- DIV FORA DO ARQUIVO-->
<!-- /#page-content-wrapper -->
</div> <!-- DIV FORA DO ARQUIVO-->
<!-- /#wrapper -->



<!-- Menu Toggle Script -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
</script>

<script type="text/javascript" src="vendor/DataTables/datatables.min.js"></script>

<script src="js/historicos.js"></script>

</body>

</html>