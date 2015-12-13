<html>
<h2>Aplikasi Pencarian Tweet</h2>
</html>
<form action='index.php' method='post'>
Kata Kunci <input type='text' name='kata_kunci'/><br/>
Jumlah Tweet <input type='text' name='qty'/><br/>
<input type='submit'/>
</form>

<?php

require_once('TwitterAPIExchange.php');


if(isset($_POST['kata_kunci'])){
$katakunci = $_POST['kata_kunci'];
$jumlah = $_POST['qty'];
$settings = array(
    'oauth_access_token' => "3232926711-kvMvNK5mFJlUFzCdtw3ryuwZfhIbLJtPX9e8E3Y",
    'oauth_access_token_secret' => "EYrFp0lfNajBslYV3WgAGmpHqYZvvNxP5uxxSq8Dbs1wa",
    'consumer_key' => "VXD22AD9kcNyNgsfW6cwkWRkw",
    'consumer_secret' => "y0k3z9Y46V0DMAKGe4Az2aDtqNt9aXjg3ssCMCldUheGBT0YL9"
);
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$requestMethod = 'GET';

$getfield = '?q='.$katakunci.'&count='.$jumlah.'&lang=id';

$twitter = new TwitterAPIExchange($settings);
$response =  $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();

$re = json_decode($response);



//echo $response;

foreach($re as $keysatu => $valuesatu){
	if($keysatu == 'statuses'){
	foreach($valuesatu as $keydua => $valuedua){
				
				echo "<pre>";
				echo $valuedua->text;
				echo "</pre>";
			}
		}
	}
}
else
{

}


?>