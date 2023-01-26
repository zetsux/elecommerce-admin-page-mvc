<?php 
    class Products_Model {
        private $prods = [
            [
                "id" => 1,
                "name" => "SAMSUNG 55QN85B Neo QLED 4K Smart TV",
                "brand" => "Samsung", 
                "category" => "TV",
                "seller" => "Seth Forger",
                "price" => "Rp 15.999.999",
                "image" => "55qn85b.jpg"
            ],

            [
                "id" => 2,
                "name" => "Sekai HDO 615-S Electric Fan",
                "brand" => "Sekai", 
                "category" => "Electric Fan",
                "seller" => "Brandon Fleming",
                "price" => "Rp 105.000",
                "image" => "hdo615s.jpeg"
            ],

            [
                "id" => 3,
                "name" => "Miyako HM 620 Mixer",
                "brand" => "Miyako", 
                "category" => "Mixer", 
                "seller" => "Jacob Burne",
                "price" => "Rp 163.000",
                "image" => "hm620.jpeg"
            ],

            [
                "id" => 4,
                "name" => "iPhone 14",
                "brand" => "Apple", 
                "category" => "Smartphone", 
                "seller" => "Mike Fross",
                "price" => "Rp 24.450.000",
                "image" => "iphone14.jpg"
            ],

            [
                "id" => 5,
                "name" => "Oxone OX655D Double Ceramic Electric Stove",
                "brand" => "Oxone", 
                "category" => "Stove",
                "seller" => "Brandon Fleming",
                "price" => "Rp 990.000",
                "image" => "ox655d.jpg"
            ],
            
            [
                "id" => 6,
                "name" => "Oxone OX851G Stand Mixer",
                "brand" => "Oxone", 
                "category" => "Mixer",
                "seller" => "Jacob Burne",
                "price" => "Rp 2.850.000",
                "image" => "ox851g.jpg"
            ],

            [
                "id" => 7,
                "name" => "Xiaomi Redmi 10A 6/128GB Smartphone",
                "brand" => "Xiaomi", 
                "category" => "Smartphone",
                "seller" => "Jacky Black",
                "price" => "Rp 1.399.000",
                "image" => "redmi10a.jpg"
            ],

            [
                "id" => 8,
                "name" => "Samsung Galaxy S22 Ultra 12/256Gb",
                "brand" => "Samsung", 
                "category" => "Smartphone",
                "seller" => "Matthew Vroy",
                "price" => "Rp 15.999.999",
                "image" => "s22ultra.jpeg"
            ],
            
            [
                "id" => 9,
                "name" => "Asus ROG ZEPHYRUS G14",
                "brand" => "Asus", 
                "category" => "Laptop",
                "seller" => "Blake Thunder",
                "price" => "Rp 29.250.000",
                "image" => "zephyrusg14.jpg"
            ],

            [
                "id" => 10,
                "name" => "Asus ROG ZEPHYRUS S17",
                "brand" => "Asus", 
                "category" => "Laptop",
                "seller" => "Seth Forger",
                "price" => "Rp 62.999.999",
                "image" => "zephyruss17.jpg"
            ],
        ];


        public function getAllProducts() {
            return $this->prods;
        }

    }
?>