<?php
    require "db.php";
    $data = $_POST;
    if(isset($data['submitReg'])){
        $errors=array();
        if(trim($data['logReg'])==''){
            $errors[]='Введите логин';
        }
        if(trim($data['emailReg'])==''){
            $errors[]='Введите почту';
        }
        if($data['passReg']==''){
            $errors[]='Введите пароль';
        }
        if($data['passReg_2']!=$data['passReg']){
            $errors[]='Повторный пароль введен не верно';
        }
        if(R::count('users', "login = ?", array(
            $data['logReg'])) > 0){
            $errors[]='Логин занят другим пользователем';
        }
        if(R::count('users', "email_reg = ?", array(
            $data['emailReg'])) > 0){
            $errors[]='Данная почта используется';
        }
        if(empty($errors)){
            $user = R::dispense('users');
            $user->login = $data['logReg'];
            $user->emailReg = $data['emailReg'];
            $user->passReg = password_hash($data['passReg'], PASSWORD_DEFAULT);
            R::store($user);
            echo '<div">Успешная регистрация пользователя</div>';
        }
        else{
            echo '<div style="color:red;">'.array_shift($errors).'</div>';
        }
    }
?>