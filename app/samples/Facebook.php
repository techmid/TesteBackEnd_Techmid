<?php
require '../../vendor/autoload.php';

$url = "http://www.techmid.com.br/retorno";

Facebook\FacebookSession::setDefaultApplication("APP_ID", "APP_SECRET_ID");
$helper = new Facebook\FacebookRedirectLoginHelper($url);

$loginUrl = $helper->getLoginUrl();

echo "<a href='{$loginUrl}'>Logar com o Facebook</a>";
