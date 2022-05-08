<?php
// вывод данных из файла config.php
require '../config.php';
if ($link)
{
    echo "Соединение установлено.<br><br>";

    // реализация функций по работе с бд
    $result = mysqli_query($link, 'SELECT * FROM news') or die(mysqli_error($link));
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div style='display: flex; flex-direction: column'>";
        printf("%s (%s) \n", $row["id"], $row["title"]);
        echo "</div>";
    }
}