<?php

$googleApiUrl = "https://coronavirus-19-api.herokuapp.com/all";



$ch = curl_init(); // Initialize a cURL session

curl_setopt($ch, CURLOPT_HEADER, 0); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


/*
curl_setopt-> Set an option for a cURL transfer
CURLOPT_HEADER-> Pass headers to the data stream
CURLOPT_RETURNTRANSFER-> If you set CURLOPT_RETURNTRANSFER to true or 1 then the return value from curl_exec will be the actual result from the successful operation
CURLOPT_URL-> Provide the URL to use in the request
CURLOPT_FOLLOWLOCATION-> Follow HTTP 3xx redirects
CURLOPT_VERBOSE-> Set verbose mode on/off
CURLOPT_SSL_VERIFYPEER-> Verify the peer's SSL certificate


*/


$response = curl_exec($ch); // curl_exec => Execute the given cURL session.

curl_close($ch);
$data = json_decode($response);  // json_decode => Takes a JSON encoded string and converts it into a PHP variable.
print_r($data);

?>
<h2>Cases: <?php echo $data->cases; ?></h2>
<h2>Deaths: <?php echo $data->deaths; ?></h2>
<h2>Recovered: <?php echo $data->recovered; ?></h2>






