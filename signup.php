<?php
  require './includes/database.php';

  $showErrorMessage = false;

  if ( isset( $_POST['submit'] ) ) {

    $name = htmlentities( mysqli_real_escape_string( $conn, $_POST['name'] ) );
    $surname = htmlentities( mysqli_real_escape_string( $conn, $_POST['surname'] ) );
    $email = htmlentities( mysqli_real_escape_string( $conn, $_POST['email'] ) );
    $password = htmlentities( mysqli_real_escape_string( $conn, $_POST['password'] ) );
    $gender = htmlentities( mysqli_real_escape_string( $conn, $_POST['gender'] ) );
    $dob = htmlentities( mysqli_real_escape_string( $conn, $_POST['dob'] ) );

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
    <link rel="stylesheet" href="./dist/signup.css">
    <title>Sign Up</title>
</head>

<body>
    <?php require './includes/navbar.php'; ?>

    <h1 class="signup-title">Sign Up</h1>
    <div class="signup-container">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <?php if ( !$showErrorMessage ): ?>
            <div class="error-box">
                <strong>
                    <p>Please fill all the fields.</p>
                </strong>
            </div>
            <?php endif ?>
            <div class="signup-form-field">
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="signup-form-field">
                <label for="surname">Surname</label>
                <input type="text" name="surname" id="surname">
            </div>
            <div class="signup-form-field">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="signup-form-field">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="signup-form-field">
                <label for="">Gender</label>
                <select name="gender">
                    <option value="" selected disabled>Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="signup-form-field">
                <label for="dateofbirth">Date of Birth</label>
                <input type="date" name="dob" id="dateofbirth">
            </div>
            <input class="signup-button" name="submit" type="submit" value="Sign Up">
        </form>
    </div>
</body>
</html>