<?php
namespace Kdb\Controllers;
class Kitchen{
private $categoriesTable;
private $offersTable;

    public function __construct($categoriesTable, $offersTable) {
        $this->categoriesTable = $categoriesTable;
        $this->offersTable = $offersTable;
    }

    public function home(){
        $offers = $this->offersTable->findAll();;
        return[
            'template' => 'home.html.php',
            'variables' => ['offers' => $offers],
            'title' => 'Kate\'s Kitchen - Home',
        ];
    }

    public function aboutUs(){
        $categories = $this->categoriesTable->findAll();;
        return[
            'template' => 'aboutUs.html.php',
            'variables' => ['categories' => $categories],
            'title' => 'Kate\'s Kitchen - Home',
        ];
    }
}