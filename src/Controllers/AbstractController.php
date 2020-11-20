<?php

namespace Konwersatorium\Controllers;

use Konwersatorium\Core\Config;
use Konwersatorium\Core\Db;
use Konwersatorium\Core\Request;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Twig_Environment;
use Twig_Loader_Filesystem;

/*
* Initialize database connection, configuration readers
* Process HTTP requests coming from the client and return a response
*/
abstract class AbstractController {
    protected $request;
    protected $conn;
    protected $config;
    protected $view;
    protected $log;

    protected $customerId;

    public function __construct(Request $request) {
        $this->request = $request;
        $this->conn = Db::getConnection();
        $this->config = Config::getConfig();

        $loader = new Twig_Loader_Filesystem(__DIR__ . '/../../views');
        $this->view = new Twig_Environment($loader);

        $this->log = new Logger('konwersatorium');
        $logFile = $this->config->get('log');
        $this->log->pushHandler(new StreamHandler(__DIR__ . '/../..' . $logFile, Logger::DEBUG));
    }

    /*
    * Set id of user performing the action.
    */
    public function setCustomerId(int $customerId) {
        $this->customerId = $customerId;
    }

    protected function render($template, $params) {
        return $this->view->loadTemplate($template)->render($params);
    }

}