<?php
session_start();

if(isset($_SESSION['username'])) {
    header("Location: welcome.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $valid_username = 'user';
        $valid_password = 'password';
        
        if($username === $valid_username && $password === $valid_password) {
            $_SESSION['username'] = $username;
            
            header("Location: welcome.php");
            exit;
        } else {
            $error = "Usuário ou senha inválidos.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php
    if(isset($error)) {
        echo "<p>$error</p>";
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
