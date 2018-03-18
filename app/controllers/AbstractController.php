<?php

// TODO : regarder ce qui se fait ici : https://github.com/dappur/framework/blob/master/app/src/Controller/Controller.php
// https://github.com/panada/panada/blob/master/panada/Resources/Controller.php
// TODO : regarder ici : https://github.com/swoft-cloud/framework/blob/master/src/Base/Controller.php

class AbstractController
{

    //protected $response;
    //protected $request;
    protected $app;

    public function __construct($app)
    {
        $this->app = $app;
        //$this->response = $c->response;
        //$this->request = $c->request;
    }

    /**
     * Load a view class
     */
    public function view($data = [])
    {
        // Create a new view and display the parsed contents
        // TODO : chemin à externaliser dans le fichier index.php quand on démarre l'application
        $templatePath = ROOT_DIR . '/templates/';
        return new Chiron\PhpView($templatePath, $data);
    }
    /**
     * Load a model class
     */
    public function model($model)
    {
        return new $model($this->app);
    }

    /**
     * Load a helper class
     */
    public function loadHelper($name)
    {
        $helper = new $name;
        return $helper;
    }

    /**
     * Require a plugin php file
     */
    // Vérifier si cette méthode est encore utilie
    public function loadPlugin($name)
    {
        // TODO : chemin à externaliser dans le fichier index.php quand on démarre l'application
        require APP_DIR . '/plugins/' . strtolower($name) . '.php';
    }

    /**
     * Do a "302 found" redirect to the home page
     */
    /*
                                        public function goHome()
                                        {
                                            header('Location: '. $this->app->basePath());
                                            exit();
                                        }
    */

    // TODO : utiliser cette méthode et virer la méthode "goHome" du dessus
    public function goToRoute($route)
    {
        // TODO : utiliser plutot un response.write pour faire la redirection !!!!!!!!!!!!
        header('Location: ' . $this->app->router->generate($route));
        exit();
    }

    /**
     * Handles ETag HTTP caching.
     *
     * @param string $id ETag identifier
     * @param string $type ETag type
     */
    /*
                                            public function check_etag($id, $type = 'strong') {
                                                $id = (($type === 'weak') ? 'W/' : '').$id;
                                                $this->response()->header('ETag', $id);
                                                if (isset($_SERVER['HTTP_IF_NONE_MATCH']) && $_SERVER['HTTP_IF_NONE_MATCH'] === $id) {
                                                    $this->halt(304);
                                                }
                                            }
    */
    /**
     * Handles last modified HTTP caching.
     *
     * @param int $time Unix timestamp
     */
    /*
                                            public function check_lastModified($time) {
                                                $this->response()->header('Last-Modified', gmdate('D, d M Y H:i:s \G\M\T', $time));
                                                if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) === $time) {
                                                    $this->halt(304);
                                                }
                                            }
    */

    /**
     * Determines if the Response validators (ETag, Last-Modified) match
     * a conditional value specified in the Request.
     *
     * If the Response is not modified, it sets the status code to 304 and
     * removes the actual content by calling the setNotModified() method.
     *
     * @return bool true if the Response validators match the Request, false otherwise
     *
     */
    public function isNotModified()
    {
        $notModified = false;

        $lastModified = $this->response->getLastModified();
        $modifiedSince = $this->request->getHeader('If-Modified-Since');

        $etag = $this->response->getEtag();
        $noneMatch = $this->request->getHeader('If-None-Match');

        if ($noneMatch) {
            $notModified = ($etag == $noneMatch);
        }
        if ($modifiedSince && $lastModified) {
            $notModified = strtotime($modifiedSince) >= $lastModified->getTimestamp() && (!$noneMatch || $notModified);
        }

        return $notModified;
    }

    /*
                                            protected function beforeAction()
                                            {

                                            }

                                            final public function action($action)
                                            {
                                                $methodName = 'action' . $action;
                                                $this->beforeAction();
                                                return $this->$methodName();
                                            }
    */

    //https://github.com/kohana/core/blob/bdbe81afb5a09cee4269d2e2210a0d293265231a/classes/Kohana/Controller.php
    /**
     * Executes the given action and calls the [Controller::before] and [Controller::after] methods.
     *
     * Can also be used to catch exceptions from actions in a single place.
     *
     * 1. Before the controller action is called, the [Controller::before] method
     * will be called.
     * 2. Next the controller action will be called.
     * 3. After the controller action is called, the [Controller::after] method
     * will be called.
     *
     * @throws  HTTP_Exception_404
     * @return  Response
     */
    /*
                                    public function execute()
                                    {
                                    // Execute the "before action" method
                                    $this->before();
                                    // Determine the action to use
                                    $action = 'action_'.$this->request->action();
                                    // If the action doesn't exist, it's a 404
                                    if ( ! method_exists($this, $action))
                                    {
                                    throw HTTP_Exception::factory(404,
                                    'The requested URL :uri was not found on this server.',
                                    array(':uri' => $this->request->uri())
                                    )->request($this->request);
                                    }
                                    // Execute the action itself
                                    $this->{$action}();
                                    // Execute the "after action" method
                                    $this->after();
                                    // Return the response
                                    return $this->response;
                                    }
    */
    /**
     * Automatically executed before the controller action. Can be used to set
     * class properties, do authorization checks, and execute other custom code.
     *
     * @return  void
     */
    /*
                                    public function before()
                                    {
                                    // Nothing by default
                                    }
    */
    /**
     * Automatically executed after the controller action. Can be used to apply
     * transformation to the response, add extra output, and execute
     * other custom code.
     *
     * @return  void
     */
    /*
                                    public function after()
                                    {
                                    // Nothing by default
                                    }
    */

    /**
     * Slim application container
     *
     * @var ContainerInterface
     */
    protected $container;
    /*
                                            public function __construct(ContainerInterface $container)
                                            {
                                                $this->container = $container;
                                            }
    */
    /**
     * Redirect to route
     *
     * @param Response $response
     * @param string $route
     * @param array $params
     * @return Response
     */
    /*
                                            public function redirect(Response $response, $route, array $params = array())
                                            {
                                                return $response->withRedirect($this->router->pathFor($route, $params));
                                            }
    */
    /**
     * Redirect to url
     *
     * @param Response $response
     * @param string $url
     *
     * @return Response
     */
    /*
                                            public function redirectTo(Response $response, $url)
                                            {
                                                return $response->withRedirect($url);
    */
    /**
     * Write JSON in the response body
     *
     * @param Response $response
     * @param mixed $data
     * @param int $status
     * @return int
     */
    /*
                                            public function json(Response $response, $data, $status = 200)
                                            {
                                                return $response->withJson($data, $status);
    */
    /**
     * Write text in the response body
     *
     * @param Response $response
     * @param string $data
     * @param int $status
     * @return int
     */
    /*
                                            public function write(Response $response, $data, $status = 200)
                                            {
                                                return $response->withStatus($status)->getBody()->write($data);
    */
    /**
     * Add a flash message
     *
     * @param string $name
     * @param string $message
     */
    /*
                                            public function flash($name, $message)
                                            {
                                                $this->flash->addMessage($name, $message);
    */
    /**
     * Create new NotFoundException
     *
     * @param Request $request
     * @param Response $response
     * @return NotFoundException
     */
    /*
                                            public function notFoundException(Request $request, Response $response)
                                            {
                                                return new NotFoundException($request, $response);
                                            }
                                            public function __get($property)
                                            {
                                                return $this->container->get($property);
    */
}
