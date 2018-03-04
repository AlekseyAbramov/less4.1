<?php

// Данные для MySQL сервера
$dbhost = "localhost";         // Хост
$dbuser = "aabramov";         // Имя пользователя
$dbpassword = "neto1499";    // Пароль
$dbname = "global";         // Имя базы данных

// Подключаемся к MySQL серверу
$link = mysql_connect($dbhost, $dbuser, $dbpassword);
if (false === $link)
   die ('Ошибка подключения к базе данных< br>');
// Выбираем нашу базу данных
$select_result = mysql_select_db($dbname, $link);
if (false === $select_result)
   die ('Ошибка выбора базы данных< br>');
// Создаём таблицу customer с помощью SQL-запроса
//$query = "create table customer (id int(11) primary key
//auto_increment, name varchar(255), author varchar(255), year int(11), isbn varchar(255), genre varchar(255))";
//$query_result = mysql_query($query, $link);
//if (false === $query_result)
//   die ('Error database SQL query< br>');
// Закрываем соединение
$close_result = mysql_close($link);
if (false === $close_result)
   die ('Ошибка закрытия базы данных< br>');
?>