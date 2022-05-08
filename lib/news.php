<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<?php
error_reporting(0);

// вывод данных из файлов index.php, config.php
require "../index.php";
require '../config.php';

// переменные из формы
$search = $_POST['search'];
$act = $_POST['is_active'];

// поисковик по id
if (isset($_POST['submit'])) $_GET['page'] = $search;

// пагинация
// номер страницы отображается в url
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
// вычисляем с какого объекта начать выводить
$offset = ($page-1) * $size_page;

// отправляем запрос для получения количества элементов
$result = mysqli_query($link, $count_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $size_page);

// запрос для фильтрации
if (isset($act)) $sql = 'SELECT * FROM news WHERE is_active = '.$act.' LIMIT '.$offset.', '.$size_page;
else $sql = 'SELECT * FROM `news` WHERE is_active = 1 OR is_active = 0'.$act.' LIMIT '.$offset.', '.$size_page;

// вывод данных в соответствии с поиском и фильтром
$res_data = mysqli_query($link, $sql);
while($row = mysqli_fetch_array($res_data)){
    printf("%s (%s) %s \n", $row["id"], $row["title"], $row["is_active"]);
    echo "<br>";
}
?>
<!--навигация пагинации-->
<ul class="pagination">
    <li><a href="?page=1">First</a></li>
    <li class="<?php if($page <= 1){ echo 'disabled'; } ?>">
        <a href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>">Prev</a>
    </li>
    <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?>">
        <a href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=".($page + 1); } ?>">Next</a>
    </li>
    <li><a href="?page=<?php echo $total_pages; ?>">Last</a></li>
</ul>
</body>
</html>