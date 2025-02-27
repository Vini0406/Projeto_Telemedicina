<?php
    include "conn.php";
    $tabela = $_GET['tabela'];
    
    if ($tabela == 'tbmedicos'){

        $id = $_GET['id'];
                
        $inputMedicoNome = $_POST['inputMedicoNome'];
        $inputCRM = $_POST['inputCRM'];
        $inputEspecialidadeFK = $_POST['inputEspecialidadeFK'];                
        $sqlQuery = "UPDATE `tbmedicos` 
                        SET 
                      `nome`='".$inputMedicoNome."',
                       `CRM`='".$inputCRM."',
          `especialidade_FK`='".$inputEspecialidadeFK."'
                      WHERE 
                   `medico` = ".$id;
        
        if ($conn->query($sqlQuery) === TRUE) {
            $msg = "Registro de Médico alterado com sucesso";            
        } else {
            $msg = "ERRO SQL: ".$sql." - Mensagem do Servidor: ".$conn->error;
        }  
        echo '<script>alert("'.$msg.'");window.location.href="../index.php";</script>';            
    }

    if ($tabela == 'tbpacientes'){

        $id = $_GET['id'];
                
        $inputPacienteNome = $_POST['inputPacienteNome'];
        $inputCPF = $_POST['inputCPF'];
        $inputDataNascimento = $_POST['inputDataNascimento'];  
        $inputPlano = $_POST['inputPlano'];            
        $sqlQuery = "UPDATE `tbpacientes` 
                        SET 
                      `nome`='".$inputPacienteNome."',
                       `cpf`='".$inputCPF."',
           `data_nascimento`='".$inputDataNascimento.",
                    'plano' ='".$inputPlano."'
                      WHERE 
                   `paciente` = ".$id;
        
        if ($conn->query($sqlQuery) === TRUE) {
            $msg = "Registro de Paciente alterado com sucesso";            
        } else {
            $msg = "ERRO SQL: ".$sql." - Mensagem do Servidor: ".$conn->error;
        }  
        echo '<script>alert("'.$msg.'");window.location.href="../Pacientes.php";</script>';            
    }
?>

