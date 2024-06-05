# Registration Web Page

This project implements a user registration web page that inserts user data into a MySQL database with client-side and server-side validations, user image upload, and integration with a third-party API to check for actors born on the same day.

## Project Features

1. **Form Fields**:
   - Personal details: `full_name`, `user_name`, `birthdate`, `phone`, `address`, `password`, `confirm_password`, `user_image`, and `email`.
     
   - **Client-side validations**:
     
     - All fields are mandatory.
       
     - Email, birthdate, and full_name must be of the correct type.
       
     - Password must match confirm_password, be at least 8 characters long, contain at least 1 number, and 1 special character.
       
   - **Server-side validations**:
     
     - Check if the username is not already registered.
       
     - Alert user to choose another username if it already exists.

2. **Header and Footer**:
   
   - Custom header and footer included in the registration webpage.

3. **Image Upload**:
   
   - User image is uploaded to the server, and the image name is stored in the database.

4. **Third-party API Integration**:
   
   - Button to check actors born on the same day as the user using MDBI API (`https://rapidapi.com/apidojo/api/imdb8/`).

## Project Structure


- `API_Ops.php`: Handles operations related to the third-party API integration.
  
- `Controller.php`: Contains the main logic for handling user input, validations, and interactions between the form and the database.
  
- `DB_Ops.php`: Manages database operations such as checking for existing usernames and inserting new user records.
  
- `Footer.php`: Contains the HTML for the footer of the registration page.
  
- `Header.php`: Contains the HTML for the header of the registration page.
  
- `index.php`: The main entry point of the web application, containing the registration form.

- `indexScripts.js`: JavaScript file for client-side validations and other dynamic behaviors using AJAX.
  
- `indexStyles.css`: CSS file for styling the registration page.
  
- `Upload.php`: Handles the uploading of user images to the server.

## Usage

1. **Set Up Database**(optional):
   
   - Create a MySQL database and a `users` table to store user information.
     
   - Ensure the table includes columns for `full_name`, `user_name`, `birthdate`, `phone`, `address`, `password`, `user_image`, and `email`.

2. **Configure Database Connection**:
   
   - Update the database connection details in `DB_Ops.php`.

3. **Run the Web Application**:
   
   - Host the application on a local or remote server with PHP and MySQL support.
     
   - Navigate to the `index.php` page to access the registration form.

4. **Register a User**:
   
   - Fill in the form with the required details.
     
   - Click the button to check for actors born on the same day (optional).
     
   - Submit the form to register the user.

## Contributors

We would like to thank the following contributors to this project:

- [**Shahd Osama**](https://github.com/shahdosama10).
- [**Shahd Mostafa**](https://github.com/ShahdMostafa30).
- [**Maryam Osama**](https://github.com/maryamosama33).
- [**Ahmed Saad**](https://github.com/ahmedsaad123456).
- [**Seif Ibrahim**](https://github.com/Seif-Ibrahim1).
- [**Ahmed Adel**](https://github.com/Dola112).

---

Feel free to contribute to this project by opening issues or submitting pull requests.

