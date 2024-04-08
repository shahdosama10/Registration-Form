<?php

$birthdate = $_GET['birthdate'];

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://imdb8.p.rapidapi.com/actors/v2/get-born-today?today=$birthdate&first=20",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: imdb8.p.rapidapi.com",
        "X-RapidAPI-Key: 4648805e9fmshdb928ab630e4755p16c96fjsn3872a1f3e683"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $actor_names = get_actor_names($response);
}

function get_actor_names($response) {
	$actor_ids = array();
	$response = json_decode($response, true);
	$nodes_list = $response['data']['bornToday']['edges'];
	foreach ($nodes_list as $node) {
		array_push($actor_ids, $node['node']['id']);
	}
	foreach ($actor_ids as $actor_id) {
		echo "$actor_id <br>";
	}

	$actor_names = array();

	return $actor_names;
}