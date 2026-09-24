<?php

session_start();

$name = $_SESSION['name'] ?? null;
$alerts = $_SESSION['alerts'] ?? [];
$active_form = $_SESSION['active_form'] ?? '';

session_unset();

if ($name !== null) {
    $_SESSION['name'] = $name;
}

?>

<!doctype html>

<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="login.css" />

    <link
      href="https://cdn.boxicons.com/3.0.8/fonts/basic/boxicons.min.css"
      rel="stylesheet"
    />

    <title>Login</title>
  </head>

  <body>
    <?php if (!empty($alerts)): ?>
      <div class="alert-box">
        <?php foreach ($alerts as $alert): ?>
          <div class="alert <?= $alert['type']; ?>">
            <i
              class="bx <?= $alert['type'] === 'success' ? 'bx-check-circle' : 'bxs-x-circle'; ?>"
            ></i>

            <span><?= $alert['message']; ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <div
      class="auth-modal <?= $active_form === 'register'
        ? 'show slide'
        : ($active_form === 'login' ? 'show' : ''); ?>"
    >
      <!-- LOGIN -->

      <div class="form-box login">
        <h2>Login</h2>

        <form action="auth_process.php" method="POST">
          <div class="input-box">
            <input
              type="email"
              name="email"
              placeholder="Email"
              required
            />

            <i class="bx bx-envelope"></i>
          </div>

          <div class="input-box">
            <input
              type="password"
              name="password"
              placeholder="Password"
              required
            />

            <i class="bx bx-lock"></i>
          </div>

          <button type="submit" name="login-btn" class="btn">
            Login
          </button>

          <p>
            Você não tem uma conta?
            <a href="#" class="register-link">Registrar</a>
          </p>
        </form>
      </div>

      <!-- REGISTRAR -->

      <div class="form-box register">
        <h2>Registrar</h2>

        <form action="auth_process.php" method="POST">
          <div class="input-box">
            <input
              type="text"
              name="name"
              placeholder="Nome"
              required
            />

            <i class="bx bx-user"></i>
          </div>

          <div class="input-box">
            <input
              type="email"
              name="email"
              placeholder="Email"
              required
            />

            <i class="bx bx-envelope"></i>
          </div>

          <div class="input-box">
            <input
              type="password"
              name="password"
              placeholder="Password"
              required
            />

            <i class="bx bx-lock"></i>
          </div>

          <button type="submit" name="register-btn" class="btn">
            Registrar
          </button>

          <p>
            Você já tem uma conta?
            <a href="#" class="login-link">Logar</a>
          </p>
        </form>
      </div>
    </div>

    <script src="login.js"></script>
  </body>
</html>