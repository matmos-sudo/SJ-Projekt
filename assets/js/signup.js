document.getElementById('signup-form').addEventListener('submit', function(e) {
    const password = document.getElementById('password').value;
    const confirm = document.getElementById('confirm_password').value;

    if (password !== confirm) {
        e.preventDefault();
        alert("Passwords do not match!");
        return false;
    }

    if (password.length < 6) {
        e.preventDefault();
        alert("Password must be at least 6 characters long.");
        return false;
    }
});