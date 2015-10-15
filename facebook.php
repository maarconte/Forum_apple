$fb = new Facebook\Facebook([
  'app_id' => '1506494756332119',
  'app_secret' => '
194f00918b03172666d619ee06b9d4f9',
  'default_graph_version' => 'v2.4',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';