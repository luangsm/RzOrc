<?php 
    include_once 'bd.php';
    class Price {
        
        public $id;
        public $hotel;
        public $room;
        public $cat;
        public $price;

        public function __construct($id, $hotel, $room, $cat, $price){
            $this->id = $id;
            $this->hotel = $hotel;
            $this->room = $room;
            $this->cat = $cat;
            $this->price = $price;
        }

        public function getArraybyId($id, $campo){
            global $link;

            $sql = "SELECT * FROM price WHERE idParent = '$id'";
            
            $show = mysqli_query($link, $sql);

            $count = 0;
            while($db = mysqli_fetch_assoc($show)){
                $data = $db["$campo"];
                $array[$count] = $data;
                $count++;
            }

            return $array;
        }

        public function checkPrice($id){
            global $link;

            $sql = "SELECT * FROM price WHERE idParent LIKE '%$id%'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);
            
            if($db == null){
                return "1";
            }
            else{
                return "0";
            }
        }
        
        public function createPrice(){
            global $link;

            $sql = "INSERT INTO price (idParent, hotel, room, cat, price) VALUES ('$this->id', '$this->hotel', '$this->room', '$this->cat', '$this->price')";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

        public function arraybyId($id, $campo){
            global $link;

            $sql = "SELECT * FROM price WHERE idParent = '$id'";
            
            $show = mysqli_query($link, $sql);
            $count = 0;
            $last = 0;
            while($db = mysqli_fetch_assoc($show)) {
                $box = $db["$campo"];
                $return[$count] = $box;
                $count++;
            }

            return $return;
        }

        public function deletePrice($id){
            global $link;

            $sql = "UPDATE price SET hotel = NULL, room = NULL, cat = NULL, price = NULL WHERE id = '$id'";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

        public function updatePrice($id){
            global $link;

            $sql = "UPDATE price SET hotel = '$this->hotel', room = '$this->room', cat = '$this->cat', price = '$this->price' WHERE id = '$id'";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

        public function savePics($idp, $class, $path){
            global $link;

            $sql = "INSERT INTO images (idParent, class, path) VALUES ('$idp', '$class', '$path')";

            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }
    }
?>

