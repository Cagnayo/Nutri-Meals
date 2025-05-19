<?php
session_start();
include 'connection.php';
$errorText = '';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $con->prepare("SELECT * FROM `admin-users` WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if ($password === $user['password']) { // Or use password_verify() if hashed
            $_SESSION['admin'] = $user['username'];
            header("Location: admin.php");
            exit();
        } else {
            $errorText = "Incorrect password!";
        }
    } else {
        $errorText = "User does not exist!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutri-Meals Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    .nutri-meal h1 {
        font-size: 70px;
    }

    .color-green {
        color: green;
    }

    .color-orange {
        color: #ed6d23;
    }

    .create-account a {
        padding-left: 5px;
        text-decoration: none;
        font-family: "poppins-light";
    }

    .create-account p {
        color: grey;
        font-family: "poppins-regular";
    }

    input.form-control.form-control-lg {
        font-size: 15px;
        font-family: "poppins-regular";
        color: grey;
    }

    input.form-control.form-control-lg:focus {
        color: black;
    }
</style>

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100 ">
        <div class="header">
            <div class="nutri-meal d-inline text-center">
                <h1 class="color-green d-inline">Nutri</h1>
                <h1 class="color-orange d-inline">Meal</h1>
            </div>
            <div class="sign-in d-flex justify-content-center">
                <h4> Sign in as an Admin</h4>
            </div>
            <div class="create-account d-flex justify-content-center ">
                <p> Or</p>
                <a href="index.php"> Back to HomePage</a>
            </div>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg " placeholder="Enter username" name="username" required autocomplete="off">
                </div>
                <div class="input-group mb-2">
                    <input type="password" class="form-control form-control-lg" placeholder="Enter password" name="password" required autocomplete="off">
                </div>

                <?php if (!empty($errorText)): ?>
                    <div class="text-danger mb-3" style="margin-top: -10px;">
                        <?php echo $errorText; ?>
                    </div>
                <?php endif; ?>

                <div class="input-group mb-3">
                    <button class="btn btn-lg btn btn-outline-success w-100 fs-6" name="submit">Sign in</button>
                </div>
            </form>

        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"></script>
</body>

</html>