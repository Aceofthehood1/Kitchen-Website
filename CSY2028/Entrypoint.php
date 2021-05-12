<?php
namespace CSY2028;
class EntryPoint {
    private $routes;

    public function __construct(\CSY2028\Routes $routes){
    $this->routes = $routes;
    }

    public function run(){
        $route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');

        if($route == ''){
            $route = $this->routes->getDefaultRoute();
        }

        $this->routes->checkLogin($route);

        list($controllerName, $functionName) = explode('/', $route);

        if($_SERVER['REQUEST_METHOD'] == 'POST' ){
            $functionName = $functionName . 'Submit';
        }
        
        $controller = $this->routes->getController($controllerName);
        $page  = $controller->$functionName();

        $output = $this->loadTemplate('../templates/' . $page['template'], $page['variables']);
        $title = $page['title'];
        $layoutVars = $this->routes->getLayoutVariables();
        $layoutVars['class'] = $page['class'] ?? NULL;
        echo $this->loadTemplate('../templates/layout.html.php', ['output' => $output, 'title' => $title,
                                                                  'layoutVars' => $layoutVars]);
    }
    
    function loadTemplate($fileName, $templateVars) {
        extract($templateVars);
        ob_start();
        require $fileName;
        $contents = ob_get_clean();
        return $contents;
    }
}
?>