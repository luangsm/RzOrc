<?php 
    include_once 'bd.php';
    class contentTour {
        
        public $tour;
        public $intro;
        public $body;

        public function __construct($tour, $intro, $body){
            $this->tour = $tour;
            $this->intro = $intro;
            $this->body = $body;
        }

        public function createTourContent(){
            global $link;

            $sql = "INSERT INTO tourcontent (`idParent`, `intro`, `body`) VALUES ('$this->tour', '$this->intro', '$this->body')";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

        public function updateTourContent($id){
            global $link;

            $sql = "UPDATE tourcontent SET idParent = '$this->tour', intro = '$this->intro', body = '$this->body' WHERE id = '$id'";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

        public function getId(){
            global $link;

            $sql = "SELECT * FROM tourcontent WHERE idParent = '$this->tour' AND intro = '$this->intro'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);

            return $db["id"];
        }

        public function getbyId($id, $campo){
            global $link;

            $sql = "SELECT * FROM tourcontent WHERE idParent = '$id'";
            
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