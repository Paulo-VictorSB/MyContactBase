<?php defined('CONTROL') or die('Acesso negado!'); ?>

<script>
    // Exibe o card e a sobreposição ao clicar no botão "Add Now"
document.getElementById('addnow').addEventListener('click', function() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('addnowcard').style.display = 'block';
});

// Fecha o card e a sobreposição
document.getElementById('closeAddNowCard').addEventListener('click', function() {
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('addnowcard').style.display = 'none';
    inputName.value = ''
    inputPhone.value = ''
    inputEmail.value = ''
});

const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com.br|com)$/;
const phoneRegex = /^[1-9]{2}9[0-9]{8}$/;

const inputName = document.querySelector("#inputName");
const inputPhone = document.querySelector("#inputPhone");
const inputEmail = document.querySelector("#inputEmail");

const addnowbtn = document.querySelector("#addnowbtn");

const addNowForm = document.querySelector('#addNowForm');

// Função para validar os campos
function validateFields() {
    const isEmailValid = emailRegex.test(inputEmail.value);
    const isPhoneValid = phoneRegex.test(inputPhone.value);

    // Habilitar o botão se ambos os campos forem válidos
    addnowbtn.disabled = !(isEmailValid && isPhoneValid);
}

// Adiciona evento de validação nos campos de entrada
inputEmail.addEventListener('input', validateFields);
inputPhone.addEventListener('input', validateFields);

inputName.addEventListener('input', () => {
    if (inputName.value.trim() > 5) {
        // Se o nome não estiver vazio, você pode aplicar uma lógica ou habilitar o botão
        validateFields();  // Verifica novamente os outros campos e o botão
    }
});

</script>

</body>

</html>