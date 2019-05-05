<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://api.github.com/search/code?q=1ES14c7qLb5CYhLMUekctxLgc1FV2Ti9DA");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$token = file_get_contents('.token');
$headers = [
    "Authorization: token {$token}",
    "User-Agent: Awesome-Octocat-App"
];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$html = curl_exec($ch);

curl_close($ch);

$totalCount = json_decode($html)->total_count;
$timestamp = time();
$fh = fopen('data.csv', 'a+');
fputcsv($fh, [$timestamp, $totalCount]);
fclose($fh);
