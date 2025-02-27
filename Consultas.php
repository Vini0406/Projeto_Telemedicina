<?php 
  session_start(); 
  if (!isset($_SESSION["usuario"])){
    echo '<script>alert("Usuário não logado!");window.location.href="./index.php";</script>'; 
    die;
  }
?>

<?php
  include "php/conn.php";
  include 'topSite.html'; // Inclui cabcario padrao
?>

<div class="container-fluid pr-3 pl-3">
  <div class="card mt-3 mb-3">
    <div class="card-header bg-dark text-white">
      <h3 class="card-title m-0"><i class="fas fa-stethoscope mr-2"></i>Cadastro de Consultas</h3>
    </div>
    <div class="card-body">
        <form action="php/insertScripts.php?tabela=tbconsultas" method="post">
            <div class="form-group ">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Paciente:</label>
                        <input class="form-control mb-3 bg-dark text-white" type="text" placeholder="Clique para selecionar" id="inputNomePaciente" name="inputNomePaciente" required style="pointer-events: none;">
                        <input class="form-control" type="text" id="inputIDPaciente" name="inputIDPaciente" style="display:none;">
                    </div>
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Medico:</label>
                        <input class="form-control mb-3 bg-dark text-white" type="text" placeholder="Clique para selecionar" id="inputNomeMedico" name="inputNomeMedico" required style="pointer-events: none;">
                        <input class="form-control" type="text" id="inputIDMedico" name="inputIDMedico" style="display:none;">
                    </div>                    
                </div>  
               <div class="row">
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Data:</label>
                        <input class="form-control mb-3" type="date" name="inputDataConsulta" required>
                    </div>
                    <div class="col-12 col-lg-6">
                        <label class="font-weight-bold">Horário:</label>
                        <input class="form-control mb-3" type="time" name="inputHorario" required>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-12">
                        <input class="btn btn-primary" style="width:120px" type="submit" value="Cadastrar">
                        <a class="btn btn-secondary" href="Consultas.php" style="width:120px" role="submit">Limpar</a>
                    </div>
                </div>
            </div>
        </form>        
      <hr class="mt-3">
      <h3 class="card-title mt-3 mb-3">Pacientes</h3>      
      <table id="tbPacientes" class="display compact nowrap" style="width:100%">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Plano</th>
            <th>Dt nasc.</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $sql = "SELECT `paciente`, `nome`, `cpf`, `plano`, `data_nascimento` FROM `tbpacientes`";
          $result = $conn->query($sql);  
          while($row = $result->fetch_assoc()) {
            $dataNascimento = date_create($row["data_nascimento"]);
            $dataNascimentoFormatada = date_format($dataNascimento,"d/m/Y");    
            echo '<TR>';
            echo '<TD>'. $row["paciente"] .'</TD>';
            echo '<TD>'. $row["nome"] .'</TD>';
            echo '<TD>'. $row["cpf"] .'</TD>';
            echo '<TD>'. $row["plano"] .'</TD>';
            echo '<TD>'. $dataNascimentoFormatada .'</TD>';
            echo '</TR>';
          }
        ?>   
        </tbody>  
      </table>

      <hr class="mt-3">
      <h3 class="card-title mt-3 mb-3">Médicos</h3>      
      <table id="tbMedicos" class="display compact nowrap" style="width:100%">
        <thead>
          <tr>
            <th>Id</th>
            <th>Médico</th>
            <th>CRM</th>
            <th>Especialidade</th>
            <th>Data Cadastrada</th>
          </tr>
        </thead>
        <tbody>       
        <?php
          $sql = "SELECT `medico`, `nome`, `CRM`, `especialidade_FK`, `tbespecialidades`.`descricao` AS `especialidadeDescricao`, `data_cadastro` 
                  FROM `tbmedicos`, `tbespecialidades` 
                  WHERE `tbmedicos`.`especialidade_FK` = `tbespecialidades`.`especialidade`
                  ORDER BY `nome`";
          $result = $conn->query($sql);  
          while($row = $result->fetch_assoc()) {
            $dataCadastro = date_create($row["data_cadastro"]);
            $dataCadastroFormatada = date_format($dataCadastro,"d/m/Y");    
            echo '<TR>';
            echo '<TD>'. $row["medico"] .'</TD>';
            echo '<TD>'. $row["nome"] .'</TD>';
            echo '<TD>'. $row["CRM"] .'</TD>';
            echo '<TD>'. $row["especialidadeDescricao"] .'</TD>';
            echo '<TD>'. $dataCadastroFormatada .'</TD>';
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

<script src="js\cadConsultas.js"></script>

</body>

</html>
