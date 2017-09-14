<?php
session_start();
require_once "config.php";

$user_id = isset($_SESSION['auth']) ? $_SESSION['auth'] : null;

$user = \arku\Models\User::find($user_id);

if (!$user_id) {
    echo "Ошибка, нет доступа";
    die();
}

?>

Это защищенная часть сайта. Доступ сюда только после авторизации!

<br><br><br>

Привет, мир! Эту надпись увидит только авторизованный.


<?php
if ($user->role == 1) {
    echo "Привет, админ!";
}
