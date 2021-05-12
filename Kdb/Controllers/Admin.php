<?php
namespace Kdb\Controllers;
class Admin{
    private $adminTable;
    private $categoriesTable;
    private $menuTable;
    private $visibilityTable;
    private $offersTable;
    private $reviewsTable;

    public function __construct($categoriesTable, $menuTable, $adminTable, $visibilityTable, $offersTable, $reviewsTable) {
        $this->categoriesTable = $categoriesTable;
        $this->menuTable = $menuTable;
        $this->adminTable = $adminTable;
        $this->visibilityTable = $visibilityTable;
        $this->offersTable = $offersTable;
        $this->reviewsTable = $reviewsTable;
    }

    public function login(){
        return[
            'template' => 'admin/index.html.php',
            'variables' => [],
            'title' => 'Kate\'s Kitchen - Admin login',
            'class' => 'home'
        ];
    }

    public function loginSubmit(){
        $admin = $_POST['admin'];
        $adminUser = $this->adminTable->find('username',$admin['username'])[0] ?? NULL;
        if(isset($adminUser))
        {
            if(password_verify($admin['password'], $adminUser->password))
            {
                $_SESSION['adminLoggedin'] = $adminUser->id;
                header('location: /admin/home');
            }else
            {
            $error = ['password' =>'The password is incorrect'];    
            return[
            'template' => 'admin/index.html.php',
            'variables' => ['error' => $error],
            'title' => 'Kate\'s Kitchen - Admin login',
            'class' => 'home'
        ];
        }
        }else{
            $error = ['username' => 'The username is incorrect'];    
            return[
            'template' => 'admin/index.html.php',
            'variables' => ['error' => $error],
            'title' => 'Kate\'s Kitchen - Admin login',
            'class' => 'home'
        ];
        }
    }

    public function accountList(){
        $_SESSION['loggedin'] = true;
        $admin = $this->adminTable->findAll();
        return[
            'template' => 'admin/accountList.html.php',
            'variables' => ['admin' => $admin],
            'title' => 'Kate\'s Kitchen - Admin Accounts',
            'class' => 'sidebar'
        ];
    }

    public function home(){
        return[
            'template' => 'admin/home.html.php',
            'variables' => [],
            'title' => 'Kate\'s Kitchen - Admin Home',
            'class' => 'sidebar'
        ];
    }

    public function menu(){
        $_SESSION['loggedin'] = true;
        $menu = $this->menuTable->findAll();
        return[
            'template' => 'admin/menu.html.php',
            'variables' => ['menu' => $menu],
            'title' => 'Kate\'s Kitchen - Admin Menu',
            'class' => 'sidebar'
        ];
    }

    public function categories(){
        $_SESSION['loggedin'] = true;
        $categories = $this->categoriesTable->findAll();
        return[
            'template' => 'admin/categories.html.php',
            'variables' => ['categories' => $categories],
            'title' => 'Kate\'s Kitchen - Admin Category',
            'class' => 'sidebar'
        ];
    }

    public function logout(){
        session_unset();
        session_destroy();
        header('Location: /admin/login');
    }


    public function editAccount(){
        if  (isset($_GET['id'])) {
            $result = $this->adminTable->find('id', $_GET['id']);
            $admin = $result[0];
        }else {
                $admin = false;
        }
        return[
            'template' => 'admin/editAccount.html.php',
            'variables' => ['admin' => $admin],
            'title' => 'Kate\'s Kitchen - Admin-Edit Account',
            'class' => 'sidebar'
        ];
    }

    public function editAccountSubmit()
     {
        $admin = $_POST['admin'];
        $admin['password'] = password_hash($admin['password'],PASSWORD_DEFAULT);
        $admin = $this->adminTable->save($admin);
        header('location: /admin/accountList');
    }

    public function editCategory(){
        if  (isset($_GET['id'])) {
            $result = $this->categoriesTable->find('id', $_GET['id']);
            $category = $result[0];
        }
        else  {
            $category = false;
        }
        return[
            'template' => 'admin/editCategory.html.php',
            'variables' => ['category' => $category],
            'title' => 'Kate\'s Kitchen - Add Category',
            'class' => 'sidebar'
        ];
    }

    public function editCategorySubmit(){
        $category = $_POST['category'];
        $category =$this->categoriesTable->save($category);
		header('location: /admin/categories');
    }

    public function editDish(){
        if  (isset($_GET['id'])) {
            $result = $this->menuTable->find('id', $_GET['id']);
            $menu = $result[0];
        }
        else  {
            $menu = false;
        }
        $categoriesList= $this->categoriesTable->findAll();
        $visibility = $this->visibilityTable->findAll(); 
        return[
            'template' => 'admin/editDish.html.php',
            'variables' => ['menu' => $menu,
                            'categoriesList' => $categoriesList,
                            'visibility' => $visibility],
            'title' => 'Kate\'s Kitchen - Edit Menu',
            'class' => 'sidebar'
        ];
    }

    public function editDishSubmit(){
        $menu = $_POST['menu'];
        $menuData = $this->menuTable->save($menu);
		header('location: /admin/menu');
    }

    public function deleteDishSubmit(){
        $this->menuTable->delete($_POST['id']);
		header('location: /admin/menu');
    }

    public function deleteCategorySubmit(){
        $this->categoriesTable->delete($_POST['id']);
		header('location: /admin/categories');
    }

    public function deleteAccountSubmit(){
        $this->adminTable->delete($_POST['id']);
		header('location: /admin/accountList');
    }
    
    public function editOffers(){
        if  (isset($_GET['id'])) {
            $result = $this->offersTable->find('id', $_GET['id']);
            $offer = $result[0];
        }
        else  {
            $offer = false;
        }
        return[
            'template' => 'admin/editOffers.html.php',
            'variables' => ['offers' => $offer],
            'title' => 'Kate\'s Kitchen - Add Offers',
            'class' => 'sidebar'
        ];
    }

    public function editOffersSubmit(){
        $offer = $_POST['offer'];
        $date = date('Y-m-d');
        $offer['date_entered'] = $date;
        $offer =$this->offersTable->save($offer);
		header('location: /admin/offersList');
    }

    public function offersList(){
        $_SESSION['loggedin'] = true;
        $offers = $this->offersTable->findAll();
        return[
            'template' => 'admin/offersList.html.php',
            'variables' => ['offers' => $offers],
            'title' => 'Kate\'s Kitchen - Admin Offers list',
            'class' => 'sidebar'
        ];
    }

    public function reviewList(){
        $_SESSION['loggedin'] = true;
        $reviews = $this->reviewsTable->findAll();
        return[
            'template' => 'admin/reviewList.html.php',
            'variables' => ['reviews' => $reviews],
            'title' => 'Kate\'s Kitchen - Admin Reviews list',
            'class' => 'sidebar'
        ];
    }

    public function deleteReviewSubmit(){
        $this->reviewsTable->delete($_POST['id']);
		header('location: /admin/reviewList');
    }

    public function deleteOfferSubmit(){
        $this->offersTable->delete($_POST['id']);
		header('location: /admin/offersList');
    }
}