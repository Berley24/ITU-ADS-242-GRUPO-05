function toggleForms() {
    var loginForm = document.getElementById('login-form');
    var cadastroForm = document.getElementById('cadastro-form');
    if (loginForm.style.display === 'none') {
        loginForm.style.display = 'block';
        cadastroForm.style.display = 'none';
    } else {
        loginForm.style.display = 'none';
        cadastroForm.style.display = 'block';
    }
}