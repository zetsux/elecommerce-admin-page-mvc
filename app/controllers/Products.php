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

        public function new() {
            $check = $this->model('Products_Model')->addNewProduct($_POST, $_FILES);

            if ($check[0] > 0) {
                FlashMsg::setFlash('has successfully', 'been added to the products list', 'success');
                header('Location: ' . BASE_URL . 'products');
                exit;
            } else if ($check[0] >= -2) {
                FlashMsg::setFlash('is unsucessfully', 'added to the products list', 'danger', $check[1]);
                header('Location: ' . BASE_URL . 'products');
                exit;
            } else {
                FlashMsg::setFlash('is unsucessfully', 'added to the products list', 'danger');
                header('Location: ' . BASE_URL . 'products');
                exit;
            }
        }

        public function delete($id) {
            if ($this->model('Products_Model')->deleteProductById($id) > 0) {
                FlashMsg::setFlash('has successfully', 'been deleted from the products list', 'success');
                header('Location: ' . BASE_URL . 'products');
                exit;
            } else {
                FlashMsg::setFlash('is unsucessfully', 'deleted from the products list', 'danger');
                header('Location: ' . BASE_URL . 'products');
                exit;
            }
        }
    }
?>