<?php
  require './includes/database.php';

  $showErrorMessage = false;
  $usernameExists = false;
  $showPassMessage = false;
  $emailExists = false;

  if ( isset( $_POST['submit'] ) ) {

    $name = htmlentities( mysqli_real_escape_string( $conn, $_POST['name'] ) );
    $surname = htmlentities( mysqli_real_escape_string( $conn, $_POST['surname'] ) );
    $email = htmlentities( mysqli_real_escape_string( $conn, $_POST['email'] ) );
    $username = htmlentities( mysqli_real_escape_string( $conn, $_POST['username'] ) );
    $password = htmlentities( mysqli_real_escape_string( $conn, $_POST['password'] ) );
    $gender = htmlentities( mysqli_real_escape_string( $conn, $_POST['gender'] ) );
    $dob = htmlentities( mysqli_real_escape_string( $conn, $_POST['dob'] ) );

    if (
      trim( $name ) != '' &&
      trim( $surname ) != '' &&
      trim( $email ) != '' &&
      trim( $username ) != '' &&
      trim( $password ) != '' &&
      trim( $gender ) != '' &&
      trim( $dob ) != ''
    ) {
      $query = "
        insert into users
            (Name, Surname, Email, Username, Password, Gender, DOB)
                values ('$name','$surname', '$email', '$username', '$password', '$gender', '$dob')
        ";
      
        if ( strlen( $password ) < 8 ) {
        $showPassMessage = true;
      } else {
        try {
          if ( mysqli_query( $conn, $query ) ) {
            header( "Location: login.php" );
          }
        } catch ( Exception $e ) {
          if ( $e->getMessage() == "Duplicate entry '$email' for key 'Email'" ) {
            $emailExists = true;
          } elseif ( $e->getMessage() == "Duplicate entry '$username' for key 'Username'" ) {
            $usernameExists = true;
          }
        }
      }
    } else {
      $showErrorMessage = true;
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
    <link rel="stylesheet" href="./dist/signup.css">
    <title>Sign Up</title>
</head>

<body>
    <?php require './includes/navbar.php'; ?>

    <h1 class="signup-title">Sign Up</h1>
    <div class="signup-container">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">

            <?php if ( $showErrorMessage ): ?>
            <div class="error-box">
                <strong>
                    <p>Please fill all the fields.</p>
                </strong>
            </div>
            <?php endif ?>

            <div class="signup-form-field">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?php echo isset( $_POST['name'] ) ? $name : '' ?>">
            </div>

            <div class="signup-form-field">
                <label for="surname">Surname</label>
                <input type="text" name="surname" id="surname"
                    value="<?php echo isset( $_POST['surname'] ) ? $surname : '' ?>">
            </div>

            <div class="signup-form-field">
                <label for="email">Email</label>
                <input type="email" name="email" id="email"
                    value="<?php echo isset( $_POST['email'] ) ? $email : '' ?>">
            </div>
            <?php if ( $emailExists ): ?>
            <div class="error-box">
                <strong>
                    <p>Email already exists.</p>
                </strong>
            </div>
            <?php endif ?>

            <div class="signup-form-field">
                <label for="username">Username</label>
                <input type="text" name="username" id="username"
                    value="<?php echo isset( $_POST['username'] ) ? $username : '' ?>">
            </div>

            <?php if ( $usernameExists ): ?>
            <div class="error-box">
                <strong>
                    <p>Username already exists.</p>
                </strong>
            </div>
            <?php endif ?>

            <div class="signup-form-field">
                <label for="password">Password</label>
                <input type="password" name="password" id="password"
                    value="<?php echo isset( $_POST['password'] ) ? $password : '' ?>">
            </div>

            <?php if ( $showPassMessage ): ?>
            <div class="error-box">
                <strong>
                    <p>Password should be more than 8 characters.</p>
                </strong>
            </div>
            <?php endif ?>
            
            <div class="signup-form-field">
                <label for="gender">Gender</label>
                <select required name="gender" id="gender">
                    <option value="" selected disabled>Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="signup-form-field">
                <label for="dateofbirth">Date of Birth</label>
                <input type="date" name="dob" id="dateofbirth" value="<?php echo isset( $_POST['dob'] ) ? $dob : '' ?>">
            </div>
            <input class="signup-button" name="submit" type="submit" value="Sign Up">
        </form>
    </div>
</body>
</html>
