document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector('.form');
    const firstNameInput = document.querySelector('input[name="firstname"]');
    const lastNameInput = document.querySelector('input[name="lastname"]');
    const genderInputs = document.querySelectorAll('input[name="gender"]');
    const addressInput = document.querySelector('input[name="street_address"]');
    const phonenumberInput = document.querySelector('input[name="phonenumber"]');
    const emailInput = document.querySelector('input[name="email"]');
    const passwordInput = document.querySelector('input[name="password"]');
    const confirmPasswordInput = document.querySelector('input[name="confirmpassword"]');

    const ans1 = document.querySelector('input[name="security_answer[]"]');
    const ans2 = document.querySelector('input[name="security_answer[]"]:nth-of-type(2)');
    const ans3 = document.querySelector('input[name="security_answer[]"]:nth-of-type(3)');

    function sanitizeInput(str) {
        return str.replace(/&/g, '&amp;')
                  .replace(/</g, '&lt;')
                  .replace(/>/g, '&gt;')
                  .replace(/"/g, '&quot;')
                  .replace(/'/g, '&#039;');
    }
    
    
    
    
    // Sanitize input values
    
    const passwordRegex = /^(?=.*[!@#$%^&*])(?=.*[0-9])(?=.*[A-Z]).{8,}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    form.addEventListener('submit', function(event) {
        // Prevent form submission for now
        event.preventDefault();
        // Validation flag
        let valid = true;

        // Check if first name is not empty
        if (firstNameInput.value.trim() === '') {
            alert('Please enter your first name.');
            event.preventDefault();
            valid = false;
        }

        // Check if last name is not empty
        if (lastNameInput.value.trim() === '') {
            alert('Please enter your last name.');
            event.preventDefault();
            valid = false;
        }

        // Check if gender is selected
        let genderSelected = false;
        genderInputs.forEach(function(input) {
            if (input.checked) {
                genderSelected = true;
            }
        });
        if (!genderSelected) {
            alert('Please select your gender.');
            event.preventDefault();
            valid = false;
        }

        // Check if email is valid
        if (!emailRegex.test(emailInput.value)) {
            alert('Please enter a valid email address.');
            event.preventDefault();
            valid = false;
        }

        // Check if password meets requirements and matches confirm password
        if (!passwordRegex.test(passwordInput.value) || passwordInput.value !== confirmPasswordInput.value) {
            alert('Please make sure your password meets the requirements and matches the confirm password.');
            event.preventDefault();
            valid = false;
        }

    

        // Security answers validation

      
        const sanitizedAns1 = sanitizeInput(ans1.value);
        const sanitizedAns2 = sanitizeInput(ans2.value);
        const sanitizedAns3 = sanitizeInput(ans3.value);

        if (sanitizedAns1.trim() === '') {
            alert('Please enter a valid answer for security question 1.');
            event.preventDefault();
            valid = false;
        }

        if (sanitizedAns2.trim() === '') {
            alert('Please enter a valid answer for security question 2.');
            event.preventDefault();
            valid = false;
        }

        if (sanitizedAns3.trim() === '') {
            alert('Please enter a valid answer for security question 3.');
            event.preventDefault();
            valid = false;
        }

        if(valid){
            return valid;
        }
    });
});
