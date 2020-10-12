<?php 
    include_once 'bd.php';
    class Roteiro {
        
        public $client;
        public $city;
        public $in;
        public $out;

        public function __construct($client, $city, $in, $out){
            $this->client = $client;
            $this->city = $city;
            $this->in = $in;
            $this->out = $out;
        }

        public function createRoteiro(){
            global $link;

            $sql = "INSERT INTO roteiro (`idClient`, `city`, `in`, `out`) VALUES ('$this->client', '$this->city', '$this->in', '$this->out')";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }


        public function getId(){
            return $this->client;
        }

        public function check($id){
            global $link;

            $sql = "SELECT * FROM roteiro WHERE idClient = '$id'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);
            
            if($db != null){
                return 0;
            }
            else{
                return 1;
            }
        }


        public function getbyId($id, $campo){
            global $link;

            $sql = "SELECT * FROM roteiro WHERE idClient = '$id'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);
            
            return $db["$campo"];
        }

        public function updateRoteiro($id){
            global $link;

            $sql = "UPDATE roteiro SET `city` = '$this->city', `in` = '$this->in', `out` = '$this->out' WHERE idClient = '$this->client'";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

        public function updatePics($id, $class, $path){
            global $link;

            $sql = "UPDATE images SET `path` = '$path' WHERE idParent = '$id' AND class = '$class'";
            
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

        public function getPath($id, $class){
            global $link;

            $sql = "SELECT * FROM images WHERE idParent = '$id' AND class = '$class'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);
            
            return $db["path"];
        }

    }
