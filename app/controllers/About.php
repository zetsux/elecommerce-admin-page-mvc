<?php 
    class About extends Controller {
        public function index($data1 ='default1', $data2 ='default2') {
            $data["data1"] = $data1;
            $data["data2"] = $data2;
            $data["title"] = 'About Index';

            $this->view('templates/header', $data);
            $this->view('about/index', $data);
            $this->view('templates/footer');
        }

        public function page() {
            $data["title"] = 'About Pages';

            $this->view('templates/header', $data);
            $this->view('about/page');
            $this->view('templates/footer');
        }
    }
?>