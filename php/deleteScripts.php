<?php
    include "conn.php";
    $tabela = $_GET['tabela'];
    
    if ($tabela == 'tbmedicos'){

        $id = $_GET['id'];
                
        $sqlQuery = "DELETE FROM `tbmedicos` WHERE `medico` = ".$id;
        
        if ($conn->query($sqlQuery) === TRUE) {
            $msg = "Registro de médico apagado com sucesso";            
        } else {
            $msg = "ERRO SQL: ".$sql." - Mensagem do Servidor: ".$conn->error;
        }  
        echo '<script>alert("'.$msg.'");window.location.href="../Medico.php";</script>';            
    }

    if ($tabela == 'tbpacientes'){

        $id = $_GET['id'];
                
        $sqlQuery = "DELETE FROM `tbpacientes` WHERE `paciente` = ".$id;
        
        if ($conn->query($sqlQuery) === TRUE) {
            $msg = "Registro de paciente apagado com sucesso";            
        } else {
            $msg = "ERRO SQL: ".$sql." - Mensagem do Servidor: ".$conn->error;
        }  
        echo '<script>alert("'.$msg.'");window.location.href="../Pacientes.php";</script>';            
    }

    if ($tabela == 'tbconsultas'){

        $id = $_GET['id'];
                
        $sqlQuery = "DELETE FROM `tbpacientes` WHERE `paciente` = ".$id;
        
        if ($conn->query($sqlQuery) === TRUE) {
            $msg = "Registro de paciente apagado com sucesso";            
        } else {
            $msg = "ERRO SQL: ".$sql." - Mensagem do Servidor: ".$conn->error;
        }  
        echo '<script>alert("'.$msg.'");window.location.href="../Pacientes.php";</script>';            
    }

    if ($tabela == 'tbconsultasMedico'){

        $id = $_GET['id'];
                
        $sqlQuery = "DELETE FROM `tbconsultas` WHERE `consulta` = ".$id;
        
        if ($conn->query($sqlQuery) === TRUE) {
            $msg = "Registro de paciente apagado com sucesso";            
        } else {
            $msg = "ERRO SQL: ".$sql." - Mensagem do Servidor: ".$conn->error;
        }  
        echo '<script>alert("'.$msg.'");window.location.href="../HistoricoMedico.php";</script>';            
    }

    if ($tabela == 'tbconsultasPaciente'){

        $id = $_GET['id'];
                
        $sqlQuery = "DELETE FROM `tbconsultas` WHERE `consulta` = ".$id;
        
        if ($conn->query($sqlQuery) === TRUE) {
            $msg = "Registro de médico apagado com sucesso";            
        } else {
            $msg = "ERRO SQL: ".$sql." - Mensagem do Servidor: ".$conn->error;
        }  
        echo '<script>alert("'.$msg.'");window.location.href="../HistoricoPaciente.php";</script>';            
    }
?>

