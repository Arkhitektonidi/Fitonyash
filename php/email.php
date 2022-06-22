<?php
  $login = $_POST['login'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];

  $login = htmlspecialchars($login);
  $email = htmlspecialchars($email);
  $tel = htmlspecialchars($tel);

  $login = urldecode($login);
  $email = urldecode($email);
  $tel = urldecode($tel);
  
  $login = trim($login);
  $email = trim($email);
  $tel = trim($tel);

  if (mail(
    "makarkazka@mail.ru",
    "Новое письмо сайта",
    "Логин: ".$login."\n"
    "Маил: ".$email."\n"
    "Сообщение: ".$tel."\n"
    "Form: no-reply@mail.ru \r\n")
  ){
    echo ('Писмо успешно отправлено!')
  }
  else{
    echo ('Есть ошибки! проверьте данные...')
  }
?>