function validateForm(event) {

    event.preventDefault(); // Prevent default form submission

    // Get form inputs
    var fullName = document.getElementById('full_name').value;
    var userName = document.getElementById('user_name').value;
    var birthdate = document.getElementById('birthdate').value;
    var phone = document.getElementById('phone').value;
    var address = document.getElementById('address').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirm_password').value;
    var email = document.getElementById('email').value;
    var userImage = document.getElementById('user_image').value;

    // Regular expression patterns
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var passwordPattern = /^(?=.*[0-9])(?=.*[!@#$%^&*()\-_=+{};:,<.>ยง~])[a-zA-Z0-9!@#$%^&*()\-_=+{};:,<.>ยง~]{8,}$/;
    var phonePattern = /^\+?([0-9]\s?){6,14}[0-9]$/;
    var namePattern = /^[a-zA-Z\s]+$/;

    // Clear previous error messages
    clearErrors();

    // Validate full name
    if (fullName.trim() === '') {
        showError('full_name', 'Please enter your full name.');
        scrollToError('full_name');
        return false;
    } else if (!namePattern.test(fullName)) {
        showError('full_name', 'Please enter a valid full name.');
        scrollToError('full_name');
        return false;
    }

    // Validate username
    if (userName.trim() === '') {
        showError('user_name', 'Please enter a username.');
        scrollToError('user_name');
        return false;
    }

    // Validate birthdate
    if (birthdate === '') {
        showError('birthdate', 'Please select your birthdate.');
        scrollToError('birthdate');
        return false;
    }

     // Validate birth year
     var birthYear = new Date(birthdate).getFullYear();
     if (birthYear > 2005) {
         showError('birthdate', 'You must be born in 2005 or earlier to register.');
         scrollToError('birthdate');
         return false;
     }
 
    // Validate phone
    if (phone.trim() === '' || !phonePattern.test(phone)) {
        showError('phone', 'Please enter a valid phone number.');
        scrollToError('phone');
        return false;
    }

    // Validate address
    if (address.trim() === '') {
        showError('address', 'Please enter your address.');
        scrollToError('address');
        return false;
    }

    // Validate password
    if (!passwordPattern.test(password)) {
        showError('password', 'Password must be at least 8 characters long and contain at least one number and one special character.');
        scrollToError('password');
        return false;
    }

    // Confirm password
    if (password !== confirmPassword) {
        showError('confirm_password', 'Passwords do not match.');
        scrollToError('confirm_password');
        return false;
    }

    // Validate email
    if (!emailPattern.test(email)) {
        showError('email', 'Please enter a valid email address.');
        scrollToError('email');
        return false;
    }

    // Validate user image
    if (userImage.trim() === '') {
        showError('user_image', 'Please upload your profile picture.');
        scrollToError('user_image');
        return false;
    }

    // form data that will be sent to the controller page
    var formData = new FormData(document.querySelector('.input_form'));
    formData.append('user_image', userImage); // add image to form data

    // server side validation and inserting in the database
    $.ajax({
        type: "POST",
        url: "Controller.php",
        data: formData,
        processData: false,
        contentType: false, 
        success: function(response) {
            
            alert(response);

            // if form is submitted successfully then reload the page
            if(response.trim() === "Sign up successfully"){
                window.location.reload();
            }
           
        },
        // in case error in the request 
        error: function(error) {
            alert(error.responseText)
        }
    });

    return true;
}

// Function to show error message text
function showError(inputId, message) {
    var errorSpan = document.createElement('span');
    errorSpan.className = 'error-message';
    errorSpan.innerText = message;
    
    var inputField = document.getElementById(inputId);
    inputField.parentNode.insertBefore(errorSpan, inputField.nextSibling);
}

// Function to clear error message text
function clearErrors() {
    var errorMessages = document.getElementsByClassName('error-message');
    while (errorMessages.length > 0) {
        errorMessages[0].parentNode.removeChild(errorMessages[0]);
    }
}

// Function to scroll to error part
function scrollToError(inputId) {
    var inputField = document.getElementById(inputId);
    inputField.scrollIntoView({ behavior: 'smooth', block: 'center' });
}


function checkActors() {
    var birthdate = document.getElementById("birthdate").value;
    var birthdateParts = birthdate.split("-");
    var month = birthdateParts[1];
    var day = birthdateParts[2];
    var formattedDate = month + "-" + day;
    
    // Display status message
    document.getElementById("actorsResult").style.display = "block";
    document.getElementById("actorsResult").innerHTML = "Fetching actors...";

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                // Request successful
                document.getElementById("actorsResult").innerHTML = xhr.responseText;
            } else {
                // Request failed
                console.error("Error:", xhr.statusText);
                document.getElementById("actorsResult").innerHTML = "An error occurred. Please try again.";
            }
        }
    };
    
    xhr.open("GET", "API_Ops.php?birthdate=" + formattedDate, true);
    xhr.send();
}
