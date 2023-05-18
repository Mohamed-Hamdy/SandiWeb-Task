<?php 

class DB 
{
    protected $db;

    public function __construct()
    {
        $this->db = $this->connect();
    }

    public function connect()
    {
        $this->db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if(!$this->db)
            die("Connection Error : ");
        return $this->db;
    }

    public function getAllProducts()
    {
        $sql = "SELECT * FROM product ORDER BY id";
        $result = mysqli_query($this->db,$sql);
        $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);      
        $count = mysqli_num_rows($result);
        //print_r($rows);
        return $rows;
    }


    /**
     * insert new product in db
     * @param array $data => fileds and values of product row 
     */
    public function insertProducts($product)
    {
        
        $sql = " INSERT INTO product(sku, name , type , price , value) 
                VALUES('" . $product->getSku() . "', '" . $product->getName() . "', '" . $product->getType() . "', '" . $product->getPrice() . "' , '" . $product->getValue() . "')";
        if (mysqli_query($this->db, $sql)) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->db);
        }
    }

    /**
     * delete product from db 
     * @param int $id => id of product 
     */
    public function deleteProduct($id)
    {
        $sql = "DELETE FROM product WHERE id=$id";
        if ($this->db->query($sql) === TRUE) {
            return true;
          } else {
            return false;
          }
    }


    /**
     * get data of product from database
     * @param int $id 
     * @return array 
     */

    public function getProduct($id)
    {
        $sql = "SELECT * FROM product WHERE id = '$id'";
        $result = mysqli_query($this->db,$sql);
        $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);      
        $count = mysqli_num_rows($result);
        return $rows;
    }
    
    public function getProductusingSKU($sku)
    {
        $sql = "SELECT * FROM product WHERE sku = '$sku'";
        $result = mysqli_query($this->db,$sql);
        $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);      
        $count = mysqli_num_rows($result);
        return $count;
    }
    
}