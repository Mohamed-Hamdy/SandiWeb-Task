<?php



class ProductsController extends Controller
{
    private $conn;
    private $pb;
    public function __construct()
    {
        $this->conn = new Products();
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
        if (isset($_POST['submit'])) {

            $sku = $_POST['sku'];
            $name = $_POST['name'];
            $type = $_POST['type'];
            $price = $_POST['price'];
            $size = $_POST['size'];
            $weight = $_POST['weight'];
            $height = $_POST['height'];
            $width = $_POST['width'];
            $length = $_POST['length'];

            $value = "";
            // check product type 
            if($type == 'DVD'){
                $value = "Size : " . strval($size) . " MB";
            }else if($type == "Book"){
                $value = "weight : " . strval($weight) . " KG";
            }else if($type == "Furniture"){
                $value = "Dimensions : " . $width ."x" . $height . "x" . $length . " CM";
            }
            $this->conn = new Products();
            $dataInsert = array(
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

            $len = isset($this->conn->getProductusingSKU($sku)[0]) ? count($this->conn->getProductusingSKU($sku)[0]) : 0;

            //print_r($data['row']['sku']);
            if ($len != 0) {
                $data['error'] = "SKU Must be unique";
                return $this->view('products/add', $data);
            } else {
                if ($this->conn->insertProducts($dataInsert)) {
                    $data['success'] = "Data Added Successfully";
                    return $this->view('products/add', $data);
                } else {
    
                    $data['error'] = "Error";
                    return $this->view('products/add', $data);
                }
            } 
        }
        return $this->view('products/add');
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
 
    public function getValue($id)
    {
        if ($this->conn->calculateValue($id)) {
            $data['success'] = "Product Have Been Deleted";
            return $this->view('products/delete', $data);
        } else {
            $data['error'] = "Error";
            return $this->view('products/delete', $data);
        }
    }
    
}
