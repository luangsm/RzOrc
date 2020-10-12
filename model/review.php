<?php 
    include_once 'bd.php';
    class Review {

        public function getbyId($id, $campo){
            global $link;

            $sql = "SELECT * FROM review WHERE idParent = '$id'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);
            
            if(isset($db[$campo])){
                return $db[$campo];
            }   
        }

        public function createReview($id){
            global $link;

            $sql = "INSERT INTO review (`idParent`) VALUES ('$id')";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

        public function updateReview($id, $campo, $val){
            global $link;

            $sql = "UPDATE review SET `$campo` = '$val' WHERE idParent = '$id'";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

        public function getId(){
            global $link;

            $sql = "SELECT * FROM profile WHERE userid = '$this->id'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);

            return $db["id"];
        }

        public function check($id){
            global $link;

            $sql = "SELECT * FROM review WHERE idParent = '$id'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);

            if($db == null){
                return 0;
            }
            else{
                return 1;
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