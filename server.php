<?php
session_start();

// variable declaration
$username = "";
$email    = "";
$errors = array();
$_SESSION['success'] = "";

// connect to database
$db = mysqli_connect('localhost', 'root', 'MyPass', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled
    if (empty($username)) { array_push($errors, "O nome de usuário é obrigatório"); }
    if (empty($email)) { array_push($errors, "O email é obrigatório"); }
    if (empty($password_1)) { array_push($errors, "A senha é obrigatória"); }

    if ($password_1 != $password_2) {
        array_push($errors, "As senhas não combinam");
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
        $query = "INSERT INTO users (username, email, password) 
					  VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Você está logado";
        header('location: index.php');
    }

}

// ...

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "O nome de usuário é obrigatório");
    }
    if (empty($password)) {
        array_push($errors, "A senha é obrigatória");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Você está logado";
            header('location: index.php');
        }else {
            array_push($errors, "Nome de usuário errado/Senha errada");
        }
    }
}

?>