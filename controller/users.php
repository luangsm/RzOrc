<?php 
    include_once 'bd.php';
    class Users {
        
        public $name;
        public $pass;

        public function __construct($name, $pass){
            $this->name = $name;
            $this->pass = $pass;
        }

        public function startLogin(){
            global $link;

            $sql = "SELECT * FROM users WHERE username = '$this->name' AND pass = '$this->pass' AND active = 1 LIMIT 1";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);
            
            if($db != null){
                $_SESSION['UserId'] = $db['id'];
                $_SESSION['UserName'] = $db['name'];
                $_SESSION['UserLevel'] = $db['level'];
                echo "<script>window.location.href = \"../view\"</script>";
            }

        }

        public function getbyId($id, $campo){
            global $link;

            $sql = "SELECT * FROM users WHERE id = '$id'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);
            
            if(isset($db[$campo])){
                return $db[$campo];
            }   
        }

    }
?>

