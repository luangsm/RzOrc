<?php 
    include_once 'bd.php';
    class Profile {
        
        public $id;
        public $tel;
        public $whats;
        public $tt1;
        public $tt2;
        public $fname;
        public $eml;
        public $clt1;
        public $clt2;

        public function __construct($id, $tel, $whats, $tt1, $tt2, $fname, $eml, $clt1, $clt2){
            $this->id = $id;
            $this->tel = $tel;
            $this->whats = $whats;
            $this->tt1 = $tt1;
            $this->tt2 = $tt2;
            $this->fname = $fname;
            $this->eml = $eml;
            $this->clt1 = $clt1;
            $this->clt2 = $clt2;
        }

        public function getbyId($id, $campo){
            global $link;

            $sql = "SELECT * FROM profile WHERE userid = '$id'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);
            
            if(isset($db[$campo])){
                return $db[$campo];
            }   
        }

        public function createProfile(){
            global $link;

            $sql = "INSERT INTO profile (`userid`, `tel`, `whats`, `tt1`, `tt2`, `email`, `name`, `clt1`, `clt2`) VALUES ('$this->id', '$this->tel', '$this->whats', '$this->tt1', '$this->tt2', '$this->eml', '$this->fname','$this->clt1', '$this->clt2')";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

        public function updateProfile($id){
            global $link;

            $sql = "UPDATE profile SET tel = '$this->tel', whats = '$this->whats', tt1 = '$this->tt1', tt2 = '$this->tt2', email = '$this->eml', name = '$this->fname', clt1 = '$this->clt1', clt2 = '$this->clt2' WHERE userid = '$id'";
            
            echo $this->tel;
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

            $sql = "SELECT * FROM profile WHERE userid = '$id'";
            
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