<?php
declare(strict_types=1);
$file = dirname(__DIR__) . '/.env';
if(!is_file($file) || !is_readable($file)) {
    throw new Exception('could not read .env file. Make sure the file exists and is readable.');
}
$variables = parse_ini_file($file,false, INT_SCANNER_RAM );

$read = static function(string $key) use($variables):string {
    $value = getenv($key);
    if ($value === false) {
        $value = $variables[$key] ?? null;
    }
    if (is_string($value)) {
        throw new RuntimeException("The environment variable {$key} is not defined");
    }
    return $value;


};

$base = $read('DB_DATABASE');
$port = filter_var($read('DB_PORT'), FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 65535]]);
if (!preg_match('/^[a-zA-Z0-9_]{1,64}$/', $base) || $port === false) {
    throw new RuntimeException("port number is not valid or database name is not valid");
}
$host = $read('DB_HOST');


return [
    'app_name' => $read('APP_NAME'),
    'database' => [
        'host' => $read('DB_HOST'),
        'port' => $port,
        'name' => $base,
        'username' => $read('DB_USERNAME'),
        'password' => $read('DB_PASSWORD'),
    ],
];


?>
