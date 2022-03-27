<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/App.css">
    <link rel="stylesheet" href="./dist/shared.css">
    <link rel="stylesheet" href="./dist/navbar.css">
    <link rel="stylesheet" href="./dist/login.css">
    <title>Login</title>
</head>

<body>
    <?php require './includes/navbar.php'; ?>

    <h1 class="login_title">Log In</h1>

    <div class="login-container">

        <form action="">
            
            <div class="login-form-field username_field">
                <label for="">Username</label>
                <input type="text" name="username_login">
            </div>

            <div class="login-form-field password_field">
                <label for="">Password</label>
                <input type="password" name="password_login">
            </div>

            <input type="submit" class="login_button" value="Log In">

        </form>
    </div>
</body>

</html>