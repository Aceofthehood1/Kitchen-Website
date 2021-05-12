<?php
namespace Kdb\Entity;
class Menu {
    public $categoriesTable;

    public $id;
    public $name;
    public $price;
    public $description;
    public $categoryId;

    public function __construct(\CSY2028\DatabaseTable $categoriesTable){
        $this->categoriesTable = $categoriesTable;
    }

    public function getCategory() {
        return $this->categoriesTable->find('id', $this->categoryId)[0];
    }
}

?>