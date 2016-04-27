<? 



// ----------------------------конфигурация-------------------------- // 
 
$adminemail="chaika_70@mail.ru, 2kie.co@gmail.com, eleven.krsk@gmail.com;";  // e-mail админа 

$email="2kie.co@gmail.com,"; // почта пользователя по умолчанию  
 
$date=date("d.m.y"); // число.месяц.год  
 
$time=date("H:i"); // часы:минуты:секунды 
 
$backurl="https://www.facebook.com/profile.php?id=100002353290189&fref=ts";  // На какую страничку переходит после отправки письма 
 
//---------------------------------------------------------------------- // 
 
  
 
// Принимаем данные с формы 
 
$name=$_POST['lead_name']; 
   
$phone=$_POST['lead_phone'];

$mail=$_POST['lead_email'];
  
$message=$_POST['lead_text'];
 
$msg=" 
Меня заинтересовало резюме мамы.
Перезвоните мне

Имя: $name
Телефон: $phone
"; 
 
  
 
 // Отправляем письмо админу  
 
mail("$adminemail", "$date $time Сообщение 
от $name", "$msg"); 
 
  
 
// Сохраняем в базу данных 
 
$f = fopen("message.txt", "a+"); 
 
fwrite($f," \n $date $time Заявка с маминого резюме - $name"); 
 
fwrite($f,"\n $msg "); 
 
fwrite($f,"\n ---------------"); 
 
fclose($f); 
 
  
 
// Выводим сообщение пользователю   
 
print "<script language='Javascript'><!-- 
// function reload() {location = \"$backurl\"}; setTimeout('reload()', 2100); 
//--></script> 

<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

<div style=\"background: url(images/shattered.png); padding-top: 200px; height:100%;\">
<p style=\"font-family:'PT Sans'; font-size: 36px; font-weight:700; text-align:center;\">Спасибо! Ольга Вас наберёт в течение дня. Пока \"поизучайте\" её в фейсбуке</p>
</div>";  
exit; 
 
 
 
?>