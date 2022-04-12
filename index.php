<?php

header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  
  $messages = array();

  if (!empty($_COOKIE['save'])) {
    setcookie('save', '', 100000);
    // Если есть параметр save, то выводим сообщение пользователю.
    $messages[] = 'Спасибо, результаты сохранены.';
  }

  // Складываем признак ошибок в массив.
  $errors = array();
  $errors['field-name'] = !empty($_COOKIE['name_error']);
  $errors['field-email'] = !empty($_COOKIE['email_error']);
  $errors['year'] = !empty($_COOKIE['year_error']);
  $errors['radio-pol'] = !empty($_COOKIE['pol_error']);
  $errors['radio-limb'] = !empty($_COOKIE['limb_error']);
  $errors['field-super'] = !empty($_COOKIE['super_error']);
  $errors['field-bio'] = !empty($_COOKIE['bio_error']);
  $errors['checkbox'] = !empty($_COOKIE['check_error']);

  // Выдаем сообщения об ошибках.
  if ($errors['field-name']) {
    setcookie('name_error', '', 100000);
    $messages[] = '<div class="error">Заполните имя.</div>';
  }
  if ($errors['field-email']) {
    setcookie('email_error', '', 100000);
    $messages[] = '<div class="error">Заполните имейл.</div>';
  }
  if ($errors['year']) {
    setcookie('year_error', '', 100000);
    $messages[] = '<div class="error">Выберите год.</div>';
  }
  if ($errors['radio-pol']) {
    setcookie('pol_error', '', 100000);
    $messages[] = '<div class="error">Выберите пол.</div>';
  }
  if ($errors['radio-limb']) {
    setcookie('limb_error', '', 100000);
    $messages[] = '<div class="error">Укажите кол-во конечностей.</div>';
  }
  if ($errors['field-super']) {
    setcookie('super_error', '', 100000);
    $messages[] = '<div class="error">Выберите суперспособности(хотя бы одну).</div>';
  }
  if ($errors['field-bio']) {
    setcookie('bio_error', '', 100000);
    $messages[] = '<div class="error">Заполните биографию.</div>';
  }
  if ($errors['checkbox']) {
    setcookie('check_error', '', 100000);
    $messages[] = '<div class="error">Вы должны болеть за Red Bull Racing.</div>';
  }
  
  // Складываем предыдущие значения полей в массив, если есть.
  $values = array();
  $values['field-name'] = empty($_COOKIE['name_value']) ? '' : $_COOKIE['name_value'];
  $values['field-email'] = empty($_COOKIE['email_value']) ? '' : $_COOKIE['email_value'];
  $values['year'] = empty($_COOKIE['year_value']) ? 0 : $_COOKIE['year_value'];
  $values['radio-pol'] = empty($_COOKIE['pol_value']) ? '' : $_COOKIE['pol_value'];
  $values['radio-limb'] = empty($_COOKIE['limb_value']) ? '' : $_COOKIE['limb_value'];
  $values['immortal'] = empty($_COOKIE['immortal_value']) ? 0 : $_COOKIE['immortal_value'];
  $values['noclip'] = empty($_COOKIE['noclip_value']) ? 0 : $_COOKIE['noclip_value'];
  $values['power'] = empty($_COOKIE['power_value']) ? 0 : $_COOKIE['power_value'];
  $values['telepat'] = empty($_COOKIE['telepat_value']) ? 0 : $_COOKIE['telepat_value'];
  $values['field-bio'] = empty($_COOKIE['bio_value']) ? '' : $_COOKIE['bio_value'];
  $values['checkbox'] = empty($_COOKIE['check_value']) ? 0 : $_COOKIE['check_value'];

  // Включаем содержимое файла form.php.
  // В нем будут доступны переменные $messages, $errors и $values для вывода 
  // сообщений, полей с ранее заполненными данными и признаками ошибок.
  include('form.php');
}
else {
  // Проверяем ошибки.
  $errors = FALSE;
  if (empty($_POST['field-name'])) {
    setcookie('name_error', '1', time() + 24 * 60 * 60);
    setcookie('name_value', '', 100000);
    $errors = TRUE;
  }
  else {
    // Сохраняем ранее введенное в форму значение на год.
    setcookie('name_value', $_POST['field-name'], time() + 12 * 30 * 24 * 60 * 60);
    setcookie('name_error', '', 100000);
  }
  
  if (empty($_POST['field-email'])) {
    setcookie('email_error', '1', time() + 24 * 60 * 60);
    setcookie('email_value', '', 100000);
    $errors = TRUE;
  }
  else {
    setcookie('email_value', $_POST['field-email'], time() + 12 * 30 * 24 * 60 * 60);
    setcookie('email_error', '', 100000);
  }
  
  if (empty($_POST['year'])) {
    setcookie('year_error', '1', time() + 24 * 60 * 60);
    setcookie('year_value', '', 100000);
    $errors = TRUE;
  }
  else {
    setcookie('year_value', $_POST['year'], time() + 12 * 30 * 24 * 60 * 60);
    setcookie('year_error', '', 100000);
  }
  
  if (!isset($_POST['radio-pol'])) {
  setcookie('pol_error', '1', time() + 24 * 60 * 60);
  setcookie('pol_value', '', 100000);
  $errors = TRUE;
}
  else {
  setcookie('pol_value', $_POST['radio-pol'], time() + 12 * 30 * 24 * 60 * 60);
  setcookie('pol_error','',100000);
}
  
  if (!isset($_POST['radio-limb'])) {
  setcookie('limb_error', '1', time() + 24 * 60 * 60);
  setcookie('limb_value', '', 100000);
  $errors = TRUE;
}
  else {
  setcookie('limb_value', $_POST['radio-limb'], time() + 12 * 30 * 24 * 60 * 60);
  setcookie('limb_error','',100000);
}
  
  if (!isset($_POST['field-super'])) {
  setcookie('super_error', '1', time() + 24 * 60 * 60);
  setcookie('immortal_value', '', 100000);
  setcookie('noclip_value', '', 100000);
  setcookie('power_value', '', 100000);
  setcookie('telepat_value', '', 100000);
  $errors = TRUE;
}
  else {
  $powrs=$_POST['field-super'];
  $apw=array(
    "immortal_value"=>0,
    "noclip_value"=>0,
    "power_value"=>0
    "telepat_value"=>0
  );
  foreach($powrs as $pwer){
    if($pwer=='immortal'){setcookie('immortal_value', 1, time() + 12 * 30 * 24 * 60 * 60); $apw['immortal_value']=1;} 
    if($pwer=='noclip'){setcookie('noclip_value', 1, time() + 12*30 * 24 * 60 * 60);$apw['noclip_value']=1;} 
    if($pwer=='power'){setcookie('power_value', 1, time() + 12*30 * 24 * 60 * 60);$apw['power_value']=1;} 
    if($pwer=='telepat'){setcookie('telepat_value', 1, time() + 12*30 * 24 * 60 * 60);$apw['telepat_value']=1;}
  }
  foreach($apw as $c=>$val){
    if($val==0){
      setcookie($c,'',100000);
    }
  }
}
  
  if (empty($_POST['field-bio'])) {
    setcookie('bio_error', '1', time() + 24 * 60 * 60);
    setcookie('bio_value', '', 100000);
    $errors = TRUE;
  }
  else {
    setcookie('bio_value', $_POST['field-bio'], time() + 12 * 30 * 24 * 60 * 60);
    setcookie('bio_error', '', 100000);
  }
  
  if(!isset($_POST['checkbox'])){
  setcookie('check_error','1',time()+ 24 * 60 * 60);
  setcookie('check_value', '', 100000);
  $errors=TRUE;
}
else{
  setcookie('check_value', TRUE,time()+ 12 * 30 * 24 * 60 * 60);
  setcookie('check_error','',100000);
}

// *************
// TODO: тут необходимо проверить правильность заполнения всех остальных полей.
// Сохранить в Cookie признаки ошибок и значения полей.
// *************

  if ($errors) {
    // При наличии ошибок перезагружаем страницу и завершаем работу скрипта.
    header('Location: index.php');
    exit();
  }
  else {
    // Удаляем Cookies с признаками ошибок.
    setcookie('fio_error', '', 100000);
    // TODO: тут необходимо удалить остальные Cookies.
  }

  // Сохранение в БД.
  // ...

  // Сохраняем куку с признаком успешного сохранения.
  setcookie('save', '1');

  // Делаем перенаправление.
  header('Location: index.php');
}
