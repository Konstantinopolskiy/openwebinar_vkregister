<?php
session_start();
require_once "config.php";

use arku\Models\User;
use arku\Vk;

//задача: Регистрировать и авторизовывать пользователя через соц. сеть VK
$vk = new Vk();

if (empty($_GET['code'])) {
    echo "<a href='".$vk->authorizeUrl()."'>
        Я, такой-то такой-то,
        в полном сознании,
        разрешаю делать все что хочешь</a>";
} else {
    $data = $vk->accessToken($_GET['code']);

    $user = User::where('vk_id', $data['user_id'])->first();

    if (!$user) {
        $user = new User();
        $user->email = $data['email'];
        $user->vk_id = $data['user_id'];
        $user->password = sha1($data['access_token']);
        $user->save();
        echo "Новый юзер";
    }

    $_SESSION['auth'] = $user->id;
    echo "Вы авторизованы. <a href='/personal.php'>Зайти в личный кабинет</a>";


}
