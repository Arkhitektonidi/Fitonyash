<?php
    require "db.php";
    $data = $_POST;
    if(isset($data['doLogin'])){
        $errors = array();
        $user = R::findOne('users', 'login = ?', array($data['logReg']));
        if($user){
            if(password_verify($data['passReg'], $user->pass_reg)){
                $_SESSION['logged_user'] = $user;
                echo '<div">Успешная авторизация пользователя</div>';
            }
            else{
                $errors[] = 'Пороль не найден';
            }
        }
        else{
            $errors[] = 'Пользователь не найден';
        }
        if(!empty($errors)){
            echo '<div style="color:red;">'.array_shift($errors).'</div>';
        }
    }
?>