<?php

session_start();
require_once 'config.php';

if (isset($_POST['register-btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check_email = $conn->query(
        "SELECT email FROM users WHERE email = '$email'"
    );

    if (!$check_email) {
        die('Erro SQL: ' . $conn->error);
    }

    if ($check_email->num_rows > 0) {
        $_SESSION['alerts'][] = [
            'type' => 'error',
            'message' => 'Email já está registrado! Tente outro email'
        ];

        $_SESSION['active_form'] = 'register';
    } else {
        $result = $conn->query(
            "INSERT INTO users (name, email, password)
             VALUES ('$name', '$email', '$password')"
        );

        if (!$result) {
            die('Erro SQL: ' . $conn->error);
        }

        $_SESSION['alerts'][] = [
            'type' => 'success',
            'message' => 'Registrado com sucesso!'
        ];

        $_SESSION['active_form'] = 'login';
    }

    header('Location: login.php');
    exit();
}

if (isset($_POST['login-btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query(
        "SELECT * FROM users WHERE email = '$email'"
    );

    if (!$result) {
        die('Erro SQL: ' . $conn->error);
    }

    if ($result->num_rows === 0) {
        die('Email não encontrado.');
    }

    $user = $result->fetch_assoc();

    if (!password_verify($password, $user['password'])) {
        die('Senha incorreta.');
    }

    $_SESSION['name'] = $user['name'];

    $_SESSION['alerts'][] = [
        'type' => 'success',
        'message' => 'Logado com sucesso'
    ];

    header('Location: login.php');
    exit();
}
?>
