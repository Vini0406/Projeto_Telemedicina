<?php
    include "conn.php";
    $tabela = $_GET['tabela'];
    
    if ($tabela == 'tbmedicos'){
                
        $inputMedicoNome = $_POST['inputMedicoNome'];
        $inputCRM = $_POST['inputCRM'];
        $inputEspecialidadeFK = $_POST['inputEspecialidadeFK'];   
        $dtCadastro = date("Y-m-d");
        
        $sqlQuery = "INSERT INTO `tbmedicos`( `nome`, `CRM`, `especialidade_FK`, `data_cadastro`) 
                          VALUES (
                          '".$inputMedicoNome."',
                          '".$inputCRM."',
                          '".$inputEspecialidadeFK."',
                          '".$dtCadastro."')";
        
        if ($conn->query($sqlQuery) === TRUE) {
            $msg = "Registro de Médico incluido com sucesso";            
        } else {
            $msg = "ERRO SQL: ".$sql." - Mensagem do Servidor: ".$conn->error;
        }  
        echo '<script>alert("'.$msg.'");window.location.href="../Medico.php";</script>';            
    } 
    
    if ($tabela == 'tbpacientes'){
                
        $inputPacienteNome = $_POST['inputPacienteNome'];
        $inputCPF = $_POST['inputCPF'];
        $inputDataNascimento = $_POST['inputDataNascimento'];   
        $inputPlano = $_POST['inputPlano'] ?? "0"; // Se não estiver marcado, assume "0"
        $planoinsert = $inputPlano; // Já será "1" ou "0"
        
        $sqlQuery = "INSERT INTO `tbpacientes`( `nome`, `cpf`, `plano`, `data_nascimento` ) 
                          VALUES (
                          '".$inputPacienteNome."',
                          '".$inputCPF."',
                          '".$planoinsert."',
                          '".$inputDataNascimento."')";
        
        if ($conn->query($sqlQuery) === TRUE) {
            $msg = "Registro de Paciente incluido com sucesso";            
        } else {
            $msg = "ERRO SQL: ".$sql." - Mensagem do Servidor: ".$conn->error;
        }  
        echo '<script>alert("'.$msg.'");window.location.href="../Pacientes.php";</script>';            
    }
    
    if ($tabela == 'tbconsultas'){
                
        $inputIDPaciente = $_POST['inputIDPaciente'];
        $inputIDMedico = $_POST['inputIDMedico'];
        $inputDataConsulta = $_POST['inputDataConsulta'];   
        $inputHorario = $_POST['inputHorario'];
        
        $sqlQuery = "INSERT INTO `tbconsultas`( `medico_FK`, `paciente_FK`, `horario`, `data`) 
                          VALUES (
                          '".$inputIDMedico."',
                          '".$inputIDPaciente."',
                          '".$inputHorario."',
                          '".$inputDataConsulta."')";
        
        if ($conn->query($sqlQuery) === TRUE) {
            $msg = "Registro de Consulta incluido com sucesso";            
        } else {
            $msg = "ERRO SQL: ".$sql." - Mensagem do Servidor: ".$conn->error;
        }  
        echo '<script>alert("'.$msg.'");window.location.href="../Consultas.php";</script>';            
    } 

?>