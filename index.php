<?php
    $name = "";
    if(isset($_POST['submit'])){
        $user_name = $_POST['user_name'];
        $name = $user_name;

    }


?>



<?php include 'header.php'; ?>

<div class="form-container">
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required><br>
        

        <label for="user_name">User Name:</label>
        <input type="text" id="user_name" name="user_name" required><br><br>
        <?php echo $name ?>

        <label for="birthdate">Birthdate:</label>
        <input type="date" id="birthdate" name="birthdate" required>
        <button type="button" onclick="checkActors()">Check Actors Born on the Same Day</button><br><br>
        
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required><br><br>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>

        <label for="user_image">User Image:</label>
        <input type="file" id="user_image" name="user_image" accept="image/*"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <button name = "submit">Submit</button>
    </form>

   
</div>


<?php include 'footer.php'; ?>


