<?php
session_start();

require_once '../vendor/autoload.php';


$fb = new Facebook\Facebook([
  'app_id' => '700485047143983', // Replace {app-id} with your app id
  'app_secret' => '{app-secret}',
  'default_graph_version' => 'v3.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('localhost/Web/Project/login/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>