<?php
session_start();
include "php/conn.php";

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $privilegio = 0;

    // Verificar se o nome de usuário já existe no banco de dados
    $sql_check = "SELECT * FROM tbusuarios WHERE login = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $username);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        echo "Usuário já existe!";
    } else {
        $senha_hash = password_hash($password, PASSWORD_DEFAULT);

        $sql_insert = "INSERT INTO tbusuarios (login, senha, privilegio) VALUES (?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("ssi", $username, $senha_hash, $privilegio);
        if ($stmt_insert->execute()) {
            // Redireciona para a página de login após o cadastro
            header("Location: index.php");
            exit();
        } else {
            echo "Erro ao cadastrar usuário: " . $stmt_insert->error;
        }
    }

    $stmt_check->close();
    $stmt_insert->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Painel E-Health</title>
  
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">

  <!-- Data Tables -->
  <link rel="stylesheet" type="text/css" href="vendor/DataTables/datatables.min.css" />
 
  <!-- Custom styles -->
  <link href="css/simple-sidebar.css" rel="stylesheet">
  <link href="css/main_login.css" rel="stylesheet">
  
</head>

<body>
    <div class="header">Empresa E-Health</div>
    
    <div class="container">
        <div class="login-container">
            <h2>Cadastrar Novo Usuário</h2>
            <form action="cadastro.php" method="POST">
                <div class="input-group">
                  <input type="text" class="form-control" id="username" name="username" placeholder="Nome de Usuário" required>
                </div>
                <div class="input-group">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
                </div>
                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
    
    <div class="footer">&copy; 2025 Empresa E-Health. Todos os direitos reservados.</div>
</body>

