<?php

// Check if birthdate is provided
if(isset($_GET['birthdate']) && !empty($_GET['birthdate'])) {
    $birthdate = $_GET['birthdate'];
    
    // Add the current year to make strtotime() parse the date correctly
    $current_year = date('Y');
    $birthdate_with_year = $current_year . '-' . $birthdate;
    
    // Convert the birthdate string into a date object
    $birthdate_date = strtotime($birthdate_with_year);
    
    // Check if the conversion was successful
    if($birthdate_date !== false) {
        // Extract day and month
        $day = date('d', $birthdate_date);
        $month = date('m', $birthdate_date);
    } else {
        echo "Invalid birthdate format!";
        exit;
    }
} else {
    echo "Please provide a birthdate!";
    exit;
}

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://imdb188.p.rapidapi.com/api/v1/getBornOn?month=$month&day=$day",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: imdb188.p.rapidapi.com",
        "X-RapidAPI-Key: YOUR_API_KEY"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    // Handle cURL error
    echo "Failed to fetch data from the API. Please try again later.";
} else {
    $response = json_decode($response, true);
    if(isset($response['data']['list'])) {
        $list = $response['data']['list'];
        foreach ($list as $actor) {
            echo $actor['nameText']['text'] . "<br>";
        }
    } else {
        // Handle API response error
        echo "Failed to retrieve actor data from the API.";
    }
}