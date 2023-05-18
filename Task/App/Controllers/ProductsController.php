<?php
require_once(CORE . 'DB.php');


class ProductsController extends Controller
{
    private $conn;


    private $pb;
    public function __construct()
    {
        $this->conn = new DB();
    }


    public function index()
    {
        $data['products'] = $this->conn->getAllProducts();
        return $this->view('products/index', $data);
    }

    public function add()
    {
        return $this->view('products/add');
    }

    public function store()
    {
        $sku = $_POST['sku'];
        $name = $_POST['name'];
        $type = $_POST['productType'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $width = $_POST['width'];
        $length = $_POST['length'];


        $value = "";
        $ProductArray = array(
            "sku" => $sku,
            "name" => $name,
            "type" => $type,
            "price" => $price,
            "size" => $size,
            "weight" => $weight,
            "height" => $height,
            "width" => $width,
            "length" => $length,
            "value" => $value,
        );

        $className = "App\\Models\\ProductTypes\\" . $type;
        if (class_exists($className)) {
            $object = new $className();
            $object->setValues($ProductArray);
            
            $len = $this->conn->getProductusingSKU($sku);
            if ($len != 0) {
                $data['error'] = "SKU Must be unique";
                return $this->view('products/add', $data);
            } else {
                if ($this->conn->insertProducts($object)) {
                    $data['success'] = "Data Added Successfully";
                    return $this->view('products/add', $data);
                } else {
                    $data['error'] = "Error";
                    return $this->view('products/add', $data);
                }
            }
        } else {
            echo "This ClassName is not exists";
        }
    }

    public function delete()
    {
        $check = "";
        if ($_POST) {
            foreach ($_POST as $key => $value) {
                $this->conn->deleteProduct($key);
                $check = "Done";
            }
        }
        $data['success'] = "Product Have Been Deleted";
        header('Location: /products/index');
    }
}
