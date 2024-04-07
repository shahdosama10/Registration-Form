<!-- client side validation -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="indexStyles.css">

</head>
<body>
    <?php include 'Header.php'; ?>

    <div class="container">
        <h1>Registration Form</h1>
        <form method="POST" action="Upload.php" enctype="multipart/form-data" onsubmit="return validateForm();">

            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name">
            <br>

            <label for="user_name">Username:</label>
            <input type="text" id="user_name" name="user_name">
            <br>

            <label for="birthdate">Birthdate:</label>
            <input type="date" id="birthdate" name="birthdate">
            <button type="button" onclick="checkActors()">Check Actors</button>
            <br>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone">
            <br>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address">
            <br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <br>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password">
            <br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <br>

            <label for="user_image">User Image:</label>
            <input type="file" id="user_image" name="user_image" accept="image/*">
            <br>

            <input type="submit" value="Register">
        </form>
    </div>

    <?php include 'Footer.php'; ?>
    <script src="indexScripts.js"></script>

</body>
</html>



<!-- form view -->