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
  $medicoSelecionado = isset($_GET['id']) ? $_GET['id'] : -1; 
  include 'topSite.html'; // Inclui cabcario padrao
?>

<div class="container-fluid pr-3 pl-3">
  <div class="card mt-3 mb-3">
    <div class="card-header bg-dark text-white">
      <h3 class="card-title m-0">Histórico Médico</h3>
    </div>
    <div class="card-body">
		<h3>Selecione o Médico</h3>
    <form action="" method="post">
        <div class="form-group ">          
        <select class="form-control" id="historicoMedico">
        <option value="-1" <?= ($medicoSelecionado == -1) ? 'selected' : '' ?>>Todos</option>
        <?php
        $sql = "SELECT DISTINCT `nome`, `medico` FROM `tbconsultas` 
                    JOIN `tbmedicos` ON `tbconsultas`.`medico_FK` = `tbmedicos`.`medico` 
                    ORDER BY `medico` ASC";
        $result = $conn->query($sql); 
        while($row = $result->fetch_assoc()) {
          $selected = ($row["medico"] == $medicoSelecionado) ? 'selected' : '';
          echo '<option value="' . $row["medico"] . '" ' . $selected . '>' . $row["nome"] . ' (id: ' . $row["medico"] . ') </option>';
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
            <th>Paciente</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Ação</th>
          </tr>
        </thead>
           <tbody> 
           <?php
              if ($medicoSelecionado == -1) {
                    $sql = "SELECT c.consulta, p.nome AS nome_do_paciente, c.horario, c.data, medico
                            FROM tbconsultas c
                            INNER JOIN tbmedicos m ON c.medico_FK = m.medico
                            INNER JOIN tbpacientes p ON c.paciente_FK = p.paciente";
                } else {
                    $sql = "SELECT c.consulta, p.nome AS nome_do_paciente, c.horario, c.data, medico
                            FROM tbconsultas c
                            INNER JOIN tbmedicos m ON c.medico_FK = m.medico
                            INNER JOIN tbpacientes p ON c.paciente_FK = p.paciente
                            WHERE c.medico_FK = $medicoSelecionado";
                }
              $result = $conn->query($sql);
              while ($row = $result->fetch_assoc()) {
                  $dataCadastro = date_create($row["data"]);
                  $dataCadastroFormatada = date_format($dataCadastro, "d/m/Y");

                  echo '<tr>';
                  echo '<td>' . $row["consulta"] . '</td>';
                  echo '<TD>' . $row["nome_do_paciente"] .' <span class="idsTable"> (id: '. $row["medico"] .') </span> </TD>';
                  echo '<td>' . $dataCadastroFormatada . '</td>';
                  echo '<td>' . $row["horario"] . '</td>';
                  echo '<TD><i redirect="php/deleteScripts.php?tabela=tbconsultasMedico&id='.$row["consulta"].'" class="fas fa-trash-alt text-danger" onclick="dialogDelete(this)" style="cursor:pointer"></i></TD></TD>';
                  echo '</tr>';
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