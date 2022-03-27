<?php
require './includes/database.php';

$show_error_message = false;
$show_user_message = false;

if (isset($_POST['submit'])) {
    $username = htmlentities(mysqli_real_escape_string($conn, $_POST['username_login']));
    $password = htmlentities(mysqli_real_escape_string($conn, $_POST['password_login']));

    if (trim($username) != '' and trim($password) != '') {
        $check_query = "select * from users where username='$username' and password='$password'";
        $result_query = mysqli_query($conn, $check_query);

        $user_data = mysqli_fetch_assoc($result_query);

        if (!empty($user_data)) {
            if ($username == $user_data['Username'] and $password == $user_data['Password']) {
                header("Location: index.php");
            } else {
                $show_user_message = true;
            }
        } else {
            $show_user_message = true;
        }
    } else {
        $show_error_message = true;
    }
}
?>

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

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

            <?php if ($show_error_message) : ?>
                <div class="error-box">
                    <strong>
                        <p>Please fill all the fields.</p>
                    </strong>
                </div>
            <?php endif ?>

            <?php if ($show_user_message) : ?>
                <div class="error-box">
                    <strong>
                        <p>Incorrect Username or Password!</p>
                    </strong>
                </div>
            <?php endif ?>

            <div class="login-form-field username_field">
                <label for="">Username</label>
                <input type="text" name="username_login" value="<?php echo isset($_POST['username_login']) ? $username : '' ?>">
            </div>

            <div class="login-form-field password_field">
                <label for="">Password</label>
                <input type="password" name="password_login">
            </div>

            <input type="submit" class="login_button" value="Log In" name="submit">

        </form>
    </div>
</body>

</html>