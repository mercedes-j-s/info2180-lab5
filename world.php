<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries");

$country = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
$urlrequest = $_SERVER['REQUEST_URI'];
$query = parse_url($urlrequest, PHP_URL_QUERY);
parse_str($query, $param);

$context = $param['context'];

$find_cities = $conn->query("SELECT * FROM countries JOIN cities ON countries.code = cities.country_code where countries.name LIKE '%$country%'");
$find_country = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

$resultcountry = $find_country->fetchAll(PDO::FETCH_ASSOC);
$resultcities = $find_cities->fetchAll(PDO::FETCH_ASSOC);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php if($context == "cities"): ?>