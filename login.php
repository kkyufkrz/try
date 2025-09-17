<?php
session_start();
include 'config.php';
include 'partials/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' LIMIT 1");
    $user = mysqli_fetch_assoc($result);

if ($user && $password === $user['password']) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $user['username'];
    header("Location: dashboard.php");
    exit;
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<?php if (isset($error)): ?>
    <div class="alert alert-danger text-center">
        <?= $error ?>
    </div>
<?php endif; ?>

<style>
    body, html {
        height: 100%;
    }
    .login-wrapper {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<div class="container login-wrapper">
    <div class="row justify-content-center w-100">
        <div class="col-xl-6 col-lg-8 col-md-9">
            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-0">

                        <!-- Login Form -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Halo, Selamat Datang!</h1>
                                    </div>
                                    <form class="user" method="POST" action="">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                placeholder="Username..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                placeholder="Password..." required>
                                        </div>
                                        <button type="submit" id="btnLogin" class="btn btn-primary btn-user btn-block fw-bold">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>