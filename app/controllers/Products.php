<?php 
    class Products extends Controller {
        public function index() {
            $data["title"] = 'Products List';
            $data["prods"] = $this->model('Products_Model')->getAllProducts();

            $this->view('templates/header', $data);
            $this->view('products/index', $data);
            $this->view('templates/footer');
        }

        public function detail($id) {
            $data["title"] = 'Product Detail';
            $data["prod"] = $this->model('Products_Model')->getProductById($id);

            $this->view('templates/header', $data);
            $this->view('products/detail', $data);
            $this->view('templates/footer');
        }
    }
?>