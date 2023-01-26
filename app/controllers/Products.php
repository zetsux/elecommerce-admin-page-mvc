<?php 
    class Products extends Controller {
        public function index() {
            $data["title"] = 'Products List';
            $data["prods"] = $this->model('Products_Model')->getAllProducts();

            $this->view('templates/header', $data);
            $this->view('products/index', $data);
            $this->view('templates/footer');
        }
    }
?>