<?php
namespace Kdb\Controllers;
class Menu{
    private $menuTable;
    private $categoriesTable;
    private $visibility;
    private $review;
    public function __construct($menuTable, $categoriesTable, $visibilityTable, $reviewTable) {
        $this->menuTable = $menuTable;
        $this->categoriesTable = $categoriesTable;
        $this->visibilityTable = $visibilityTable;
        $this->reviewTable = $reviewTable;
    }

    public function category(){
        $menu = $this->menuTable->find('categoryId', $_GET['id']);
        $categories = $this->categoriesTable->findAll();
        $categoryName = $this->categoriesTable->find('id', $_GET['id']);
        $visibility = $this->visibilityTable->findAll(); //used to hide dishes
        $review = $this->reviewTable->findAll();
        return[
            'template' => 'menu.html.php',
            'variables' => ['menu' => $menu, 'categories' => $categories, 'categoryName' => $categoryName, 'visibility' => $visibility, 'review' => $review],
            'title' => 'Kate\'s Kitchen - Categories',
            'class' => 'sidebar'
        ];
    }

    public function categorySubmit(){ //when the review is entered by the user.
            $review = $_POST['review'];
            if($review['rating'] >= 1 && $review['rating'] <= 5 ){
                $review =$this->reviewTable->save($review);
            header('location: /');
            }else{
                header('location: /');
            }
        }

    public function FAQs(){
        return[
            'template' => 'faqs.html.php',
            'variables' => [],
            'title' => 'Kate\'s Kitchen - FAQs',
        ];
    }

}