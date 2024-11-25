document.getElementById('form').addEventListener('submit', function (e) {
    e.preventDefault();

    const messageContainer = document.getElementById('message');
    messageContainer.innerHTML = '';

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    const validationResult = validateForm(username, password);
    if (validationResult.isValid) {
        // Redirect to Dashboard on successful login
        window.location.href = 'http://localhost/ncmt/login/dashboard/index.php';
    } else {
        displayError(validationResult.message);
    }
});

function validateForm(username, password) {
    if (username.trim() === '' || password.trim() === '') {
        return { isValid: false, message: 'All fields are required.' };
    }
    
    const uniquePassword = "pramod@00";
    const uniqueUsername = "pramod";

    if (username !== uniqueUsername) {
        return { isValid: false, message: "Incorrect Username." };
    }

    if (password !== uniquePassword) {
        return { isValid: false, message: "Incorrect Password." };
    }

    return { isValid: true, message: '' };
}

function displayError(message) {
    const messageContainer = document.getElementById('message');
    const errorMessage = document.createElement('div');
    errorMessage.className = 'error-message';
    errorMessage.textContent = message;
    messageContainer.appendChild(errorMessage);
}
