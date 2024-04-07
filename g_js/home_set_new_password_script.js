document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector('.form');
    const newPasswordInput = document.querySelector('input[name="newpassword"]');
    const confirmPasswordInput = document.querySelector('input[name="confirmpassword"]');
    const btnSubmit = document.querySelector('.btnn');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission
        
        // Reset previous error messages
        resetErrors();

        // Validate passwords
        if (validatePassword(newPasswordInput.value) && newPasswordInput.value === confirmPasswordInput.value) {
            // Passwords are valid
            // Submit form or perform other actions
            form.submit();
        } else {
            // Display error message
            if (!validatePassword(newPasswordInput.value)) {
                showError(newPasswordInput, 'Password must be at least 8 characters long and contain numbers, letters, and special symbols.');
            }
            if (newPasswordInput.value !== confirmPasswordInput.value) {
                showError(confirmPasswordInput, 'Passwords do not match.');
            }
        }
    });

    // Add event listeners to input fields to clear errors on input
    newPasswordInput.addEventListener('input', function() {
        clearError(newPasswordInput);
    });

    confirmPasswordInput.addEventListener('input', function() {
        clearError(confirmPasswordInput);
    });

    function validatePassword(password) {
        // Password must be at least 8 characters long and contain numbers, letters, and special symbols
        const regex = /^(?=.*[!@#$%^&*])(?=.*[0-9])(?=.*[A-Z]).{8,}$/;
        return regex.test(password);
    }

    function showError(input, message) {
        const parent = input.parentElement;
        const error = document.createElement('p');
        error.classList.add('error');
        error.textContent = message;
        parent.appendChild(error);
        input.classList.add('error-input');
    }

    function clearError(input) {
        const parent = input.parentElement;
        const error = parent.querySelector('.error');
        if (error) {
            error.remove();
            input.classList.remove('error-input');
        }
    }

    function resetErrors() {
        const errors = document.querySelectorAll('.error');
        errors.forEach(error => error.remove());
        const errorInputs = document.querySelectorAll('.error-input');
        errorInputs.forEach(input => input.classList.remove('error-input'));
    }
});
