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
        <form action="">

            <div class="signup-form-field">
                <label for="name">Name</label>
                <input type="text" name="" id="name">
            </div>
            <div class="signup-form-field">
                <label for="surname">Surname</label>
                <input type="text" name="" id="surname">
            </div>
            <div class="signup-form-field">
                <label for="email">Email</label>
                <input type="email" name="" id="email">
            </div>
            <div class="signup-form-field">
                <label for="password">Password</label>
                <input type="password" name="" id="password">
            </div>
            <div class="signup-form-field">
                <label for="">Gender</label>
                <select>
                    <option value="" selected disabled>Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="signup-form-field">
                <label for="dateofbirth">Date of Birth</label>
                <input type="date" name="" id="dateofbirth">
            </div>
            <input class="signup-button" type="submit" value="Sign Up">
        </form>
    </div>
</body>
</html>