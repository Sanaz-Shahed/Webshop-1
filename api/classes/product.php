<?php 

include_once('./../Class/database.php');

class Product {
    /* properties */
    public $ID;
    public $name;
    public $price;
    public $quantity;
    public $picture;
    
    function __construct($ID, $name, $price, $quantity, $picture) {
        
        $this->ID = $ID;
        $this->name = $name;
        $this ->price = $price;
        $this ->quantity = $quantity;
        $this ->picture = $picture;
    }
    public static function fromRow($row)
    {
        return new Product(
            $row["ID"], 
            $row["name"],
            $row["price"],
            $row["quantity"],
            $row["picture"],
        );
    }
    
    public static function findAll() {
        $database = new Database();
        error_log("getAllProducts_OOP");

        $query = $database->connection->prepare('SELECT * FROM product;');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $products = array_map(function ($row) {
            return Product::fromRow($row);
        }, $result);
        return $products;
    }
    
    public static function findByCategoryId($specificCategory) {
        $database = new Database();
        error_log("getCategory_OOP");

        $query = $database->connection->prepare('SELECT * FROM categorydetails JOIN product ON categorydetails.ID = product.ID WHERE categoryID = :myCategoryID;');
        $query->execute(array(":myCategoryID" => $specificCategory));
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $products = array_map(function ($row) {
            return Product::fromRow($row);
        }, $result);
        return $products;
    }

    public static function findDiscount(){
        $database = new Database();
        error_log("getdiscount_OOP");

        $query = $database->connection->prepare("SELECT * FROM product WHERE discount != 0;");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $products = array_map(function ($row) {
            return Product::fromRow($row);
        }, $result);
        return $products;
    }

    public static function findById($id){
        $database = new Database();

        $query = $database->connection->prepare("SELECT * FROM `product` WHERE ID = :id");
        $query->execute(array(":id" => $id));
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $product = Product::fromRow($result[0]);
        return $product;
    }

    public function updateInStock($newnumber) {
        
        $database = new Database();
/*
//vi har inte inStock//
        $query = <<<EOD
        UPDATE product SET inStock = $newnumber WHERE ID = :product;
        EOD;
        $statement = $database->connection->prepare($query);
        $statement->execute(array(":product" => $this->ID));
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (empty($products)) {
            throw new exception("Cannot update", 404);
            exit;
        }
              return $products;  
    }
}*/
?>