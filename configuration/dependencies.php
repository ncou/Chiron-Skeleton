<?php

$container = $app->getContainer();

$container['mailer'] = function ($c) {
    $config = $c->config;

    return new SMTP($config['mail']);
};

$container['database'] = function ($c) {
    $config = $c->config;

    $dsn = $config['db.driver'] . ':host=' . $config['db.host'] . ';dbname=' . $config['db.database'] . ';port=' . $config['db.port'] . ';connect_timeout=' . $config['db.timeout'];
    return new Database($dsn, $config['db.username'], $config['db.password']);
};

$container['session'] = function ($c) {
    return new Session();
};

$container['404notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {

        if ($request->isAjax()) {
            $response = $response->withStatus(404)
                ->withHeader('Content-Type', 'application/json')
                ->write(json_encode([
                    'status_code' => 404,
                    'reason_phrase' => 'Route not found!',
                ]));
        } else {
            $response = $response->withStatus(404)
                ->withHeader('Content-Type', 'text/html')
                ->write(file_get_contents('404.html'));
        }
        return $response;
    };
};
