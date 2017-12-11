<?php
$confFile = __DIR__ . '/config.php';
if (file_exists($confFile)) {
    $config = require $confFile;
} else {
    echo "Missing config file. Please copy config-example.php to config.php and fill out the values therein.\n";
    return 1;
}
parse_str($_SERVER['QUERY_STRING'], $args);
$fields = '';
if (isset($args['fields'])) {
    $fields = $args['fields'];
}
getEventData($config, $fields);
function getEventData($config, $fields)
{
    $requestUrl = $config['api_base_url'] . $config['page_id'] . '/events?fields=' . $fields . '&access_token=' . $config['app_id'] . '|' . $config['app_secret'];
    // check if origin is one of the allowed origins
    if (isset($config['allowed_origins'][0])) {
        if (isset($_SERVER['HTTP_ORIGIN']) && in_array($_SERVER['HTTP_ORIGIN'], $config['allowed_origins'])) {
            header('access-control-allow-origin: ' . $_SERVER['HTTP_ORIGIN']);
        } else {
            // default to first allowed origin if HTTP_ORIGIN was empty
            header('access-control-allow-origin: ' . $config['allowed_origins'][0]);
        }
    }
    header('content-type: application/json; charset=UTF-8');
    echo file_get_contents($requestUrl);
}
