<?php
// подключение к базе
$link = mysqli_connect('localhost', 'root', '', 'academydump');

// количество страниц для пагинации
$size_page = 10;

// SQL запрос для получения количества элементов
$count_sql = "SELECT COUNT(*) FROM news";
?>