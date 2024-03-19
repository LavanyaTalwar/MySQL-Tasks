<?php
require('./vendor/autoload.php');

# Add your client ID and Secret
$client_id = "214517314469-pv66lusrdfu8ag6mk8cfn21m91hiur3e.apps.googleusercontent.com";
$client_secret = "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";

$client = new Google\Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);

# redirection location is the path to login.php
$redirect_uri = 'http://sqltasks.com/googlesignin.php';
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");