<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of twitter
 *
 * @author kvvn
 */
class twitter {
    
    function SendStatus($message){
        
        
        // Ключи CONSUMER_KEY и CONSUMER_SECRET полученные при регистрации приложения
        // на странице http://dev.twitter.com/apps/new
        $consumer_key = '';
        $consumer_secret = '';

        // Полученные токены/ключи
        $accessToken = '';
        $accessTokenSecret = '';

        // Создаем twitter API объект
        require_once("twitteroauth.php");
        $oauth = new TwitterOAuth($consumer_key, $consumer_secret, $accessToken, $accessTokenSecret);

        // Отсылаем API запрос для проверки полномочий
        $credentials = $oauth->get("account/verify_credentials");
        echo "Успешно подключены как пользователь @" . $credentials->screen_name;

        // Печатаем "hello world" в статус
        $oauth->post('statuses/update', array('status' => $message));




        
    }
}

?>
