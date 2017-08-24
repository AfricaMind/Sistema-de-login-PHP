<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
    <h2>Acessar</h2>
</div>

<form method="post" action="login.php">

    <?php include('errors.php'); ?>

    <div class="input-group">
        <label>Usuário</label>
        <input type="text" name="username" >
    </div>
    <div class="input-group">
        <label>Senha</label>
        <input type="password" name="password">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
        Não tem cadastro? <a href="register.php">Cadastrar</a>
    </p>
</form>


</body>
</html>