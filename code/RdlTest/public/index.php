<?php
use Phalcon\Di\FactoryDefault;


error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

try {

    /**
     * The FactoryDefault Dependency Injector automatically registers
     * the services that provide a full stack framework.
     */
    $di = new FactoryDefault();


// REST
// Instantiate the class responsible for implementing a micro application
$app = new \Phalcon\Mvc\Micro($di);

    /**
     * Handle routes
     */
    include APP_PATH . '/config/router.php';

    /**
     * Read services
     */
    include APP_PATH . '/config/services.php';

    /**
     * Get config service for use in inline setup below
     */
    $config = $di->getConfig();

    /**
     * Include Autoloader
     */
    include APP_PATH . '/config/loader.php';

    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application($di);

    echo str_replace(["\n","\r","\t"], '', $application->handle()->getContent());

// REST
$app->get('/say/date', 'currentDate');
$app->get('/index/date', 'currentDate');
$app->get('/say/hello/{name}', 'greeting');
$app->notFound('notFound');

// REST
function currentDate() {
    echo date('Y-m-d');
}

function notFound() {
    // Access to the global var $app
    global $app;
    
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    echo 'Oops, Not Found!!';
}

// REST
// Handle the request
$app->handle();


} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
