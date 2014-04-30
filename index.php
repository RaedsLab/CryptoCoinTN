<?php

session_start();
define('CONSUMER_KEY', 'H7gvtHuBOCIxVZ6nAqAjHw');
define('CONSUMER_SECRET', 'vyUU0JjBq9sVoCc5wP5vI5DRj9Av38UTwLFJxyehAQ');
define('OAUTH_CALLBACK', 'http://lab.raed.tn/twout/callback.php');

require_once('twitteroauth/twitteroauth.php');



$_SESSION['oauth_token']="xxxxxxxxxx";
$_SESSION['oauth_token_secret']="xxxxxxxxxx";



    function getConnectionWithAccessToken($oauth_token, $oauth_token_secret) {

      $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $oauth_token, $oauth_token_secret);

      return $connection;

    }

     

$connection = getConnectionWithAccessToken("xxxxxxxxxx", "xxxxxxxxxx"); // access / secret



 $c= $connection->get('statuses/user_timeline',array('screen_name' => 'Crypt0Ticker'));
 /* yo dawg 
 much work
 so swag
 wow
 */


$str = $c[0]->text;
//echo $str;
$tmp = explode(" ",$str);

//for ($i=0; $i <15 ; $i++) { 
//echo "[".$i."] ".$tmp[$i]."<br>";}


// TODO : implement something to get real time US DOLLAR => TN DINAR VALUE 
$btc = floatval($tmp[3]);
$btc = ($btc*1.6034);

$lite = floatval($tmp[6]);
$lite = ($lite*1.6034);

$peer = floatval($tmp[9]);
$peer = ($peer*1.6034);

$dog = floatval($tmp[12]);
$dog = ($dog*1.6034);
if($btc>=0){
	$tweet = "#Bitcoin = ".$btc." DTN \n #Litecoin = ".$lite." DTN \n #Peercoin = ".$peer." DTN \n #Dogecoin = ".$dog." DTN";
	$connection->post('statuses/update', array('status' => $tweet));
	printf("%s",$tweet);
}
else{
	echo "You fucked up";
}