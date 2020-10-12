<?php 
    include_once 'bd.php';
    class contentHotel {
        
        public $hotel;
        public $body;

        public function __construct($hotel, $body){
            $this->hotel = $hotel;
            $this->body = $body;
        }

        public function createHotelContent(){
            global $link;

            $sql = "INSERT INTO hotelcontent (`idParent`, `body`) VALUES ('$this->hotel', '$this->body')";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

        public function updateHotelContent($id){
            global $link;

            $sql = "UPDATE hotelcontent SET idParent = '$this->hotel', body = '$this->body' WHERE id = '$id'";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

        public function getId(){
            global $link;

            $sql = "SELECT * FROM hotelcontent WHERE idParent = '$this->hotel' AND body = '$this->body'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);

            return $db["id"];
        }
        
        public function getbyId($id, $campo){
            global $link;

            $sql = "SELECT * FROM hotelcontent WHERE idParent = '$id'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);
            
            if(isset($db[$campo])){
                return $db[$campo];
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