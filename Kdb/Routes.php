<?php 
namespace Kdb;
class routes implements \CSY2028\Routes {
    public function getController($name){
        require '../database.php';
        
        $categoriesTable = new \CSY2028\DatabaseTable($pdo, 'category', 'id');
        $menuTable = new \CSY2028\DatabaseTable($pdo, 'menu', 'id','\Kdb\Entity\Menu', [$categoriesTable]);
        $adminTable = new \CSY2028\DatabaseTable($pdo, 'admins', 'id');
        $visibilityTable = new \CSY2028\DatabaseTable($pdo, 'visibility', 'id');
        $offersTable = new \CSY2028\DatabaseTable($pdo, 'offers', 'id');
        $reviewTable = new \CSY2028\DatabaseTable($pdo, 'review', 'id');
    
        $controllers = []; 
        $controllers['kitchen'] = new \Kdb\Controllers\Kitchen($categoriesTable, $offersTable);
        $controllers['menu'] =  new \Kdb\Controllers\Menu($menuTable, $categoriesTable, $visibilityTable, $reviewTable);
        $controllers['admin'] =  new \Kdb\Controllers\Admin($categoriesTable, $menuTable, $adminTable,$visibilityTable, $offersTable, $reviewTable);
    
        return $controllers[$name];
    }
    public function getDefaultRoute() {
        return 'kitchen/home';
    }

    public function checkLogin($route){
        session_start();
        $loginRoutes = [];
        $loginRoutes['admin/category'] =true;
        $loginRoutes['admin/menu'] =true;
        $loginRoutes['admin/editAdmin'] =true;
        
        $requiresLogin= $loginRoutes[$route] ?? false;

        if($requiresLogin && !isset($_SESSION['loggedin'])){
            header('location: /admin/login');
            exit();
        }

    }

    public function getLayoutVariables()
    {
        require '../database.php';
        $categoriesTable = new \CSY2028\DatabaseTable($pdo, 'category', 'id');

        $categories = $categoriesTable->findAll();
        return ['categories' => $categories];
    }
}