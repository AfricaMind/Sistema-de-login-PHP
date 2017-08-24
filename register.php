<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
    <h2>Cadastro de Usuários</h2>
</div>

<form method="post" action="register.php">

    <?php include('errors.php'); ?>

    <div class="input-group">
        <label>Nome de Usuário</label>
        <input type="text" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="input-group">
        <label>E-mail</label>
        <input type="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">
        <label>Senha</label>
        <input type="password" name="password_1">
    </div>
    <div class="input-group">
        <label>Confirmar Senha </label>
        <input type="password" name="password_2">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="reg_user">Cadastrar</button>
    </div>
    <p>
        Já sou cadastrado? <a href="login.php">Logar</a>
    </p>
</form>
</body>
</html>