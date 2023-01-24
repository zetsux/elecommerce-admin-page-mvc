<?php 
    class About {
        public function index($data1 ='default1', $data2 ='default2') {
            echo 'about/index';
            echo " Data : $data1, $data2";
        }

        public function page() {
            echo 'about/page';
        }
    }
?>