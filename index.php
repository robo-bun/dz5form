<form action="" method="post">
    <p>
        <label for="firstname">Имя</label>
        <input type="text" name="firstname" id="firstname">
    </p>
    <p>
        <label for="secondname">Фамилия</label>
        <input type="text" name="secondname" id="secondname">
    </p>
    <p>
        <label for="email">Почта</label>
        <input type="email" name="email" id="email">
    </p>
    <p>
        <input type="checkbox" name="agree" value="yes" required>
        <label for="agree">Я согласен с обработкой формы</label>
    </p>
        <button type="submit" name="submit">Отправить </button>
</form>



<?php
function validateFirstName($fieldName) {
    return isset($_POST[$fieldName]) && !empty(trim($_POST[$fieldName])) ? $_POST[$fieldName] : false;
}

function validateSecondName($fieldName) {
    return isset($_POST[$fieldName]) && !empty(trim($_POST[$fieldName])) ? $_POST[$fieldName] : false;
}

function validateEmail($fieldName) {
    return filter_var($_POST[$fieldName], FILTER_VALIDATE_EMAIL) ? $_POST[$fieldName] : false;
}


if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $firstname = validateFirstName('firstname');

    $secondname = validateFirstName('secondname');

    $email = validateEmail('email');
}

$errors = [];

if($firstname == false) {
    $errors[] = 'Пожалуйста, укажите имя';
}

if($secondname == false) {
    $errors[] = 'Пожалуйста, укажите фамилию';
}

if($email == false) {
    $errors[] = 'Пожалуйста, укажите почту';
}

if(!empty($errors)) {
    foreach($errors as $error) {
    echo $error . '<br/>';
    }
}
