<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Это дефолтный html код страницы</h1>
<h6>Спасибо, что проверяете мой опоздавший код</h6>
<form method="post">
    <h4>Фильтрация по активности</h4>
    <select name="is_active">
        <option>-</option>
        <option value="1">Активные</option>
        <option value="0">Не активные</option>
    </select>
    <br>
    <br>
    <input name="search" type="number" value="<?= $_GET['page']; ?>">
    <input type="submit" name="submit" value="Поиск">
    <!--фильтрация работает не так как хотелось бы. фильтрует только данную страницу из пагинации,
    после этого нужно нажать на переключение страницы. при повторном нажатии на кнопку поиска
    данные исчезают :(
    делала на скорость-->
</form>
<br>
</body>
</html>