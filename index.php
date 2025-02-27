<?php
  session_start();
  session_unset();
  session_destroy();
  session_start();
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
            <h2>Login</h2>
            <form action="#" method="post">
                <div class="input-group">
                    <label for="username">Usuário</label>
                    <input type="text" id="username" name="username" placeholder="Digite seu nome de usuário" required>
                </div>
                <div class="input-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" placeholder="Digite sua senha" required>
                </div>
                <button type="submit">Entrar</button>
            </form>
            <div class="mt-3">
                <a href="cadastro.php">Cadastrar novo usuário</a>
            </div>
        </div>
    </div>
    
    <div class="footer">&copy; 2025 Empresa E-Health. Todos os direitos reservados.</div>
</body>
</html>


<?php
include "php/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Buscar o usuário no banco de dados
    $sql = "SELECT * FROM tbusuarios WHERE login = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username); // "s" para string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['senha'])) {
            $_SESSION["usuario"] = $username;
            header("Location: Medico.php");
            exit();
        } else {
            echo '<script>alert("Senha incorreta!");window.location.href="./index.php";</script>'; 
        }
    } else {
        echo '<script>alert("Usuário não encontrado!");window.location.href="./index.php";</script>'; 
    }

    $stmt->close();
}
?>


