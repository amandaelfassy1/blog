<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($uri == "/") {
        postIndex();
    } elseif ($uri == "/show" and isset($_GET['id'])) {
        postShow();
    }
    elseif ($uri == "/create") {
        postCreate();    
    } else {
        http_response_code(404);
        echo "<html><body>Page not found</body></html>";
        return;
    }
    
} else {
    http_response_code(405);
    echo "<html><body>Method not allowed</body></html>";
    return;
}