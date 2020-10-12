<?php 
    include_once 'bd.php';
    class Hotel {
        
        public $name;
        public $stars;
        public $city;

        public function __construct($name, $stars, $city){
            $this->name = $name;
            $this->stars = $stars;
            $this->city = $city;
        }

        public function checkHotel(){
            global $link;

            $sql = "SELECT name, idCity FROM hotel WHERE name LIKE '%$this->name%'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);
            
            if($db["name"] == null){
                return "0";
            }
            else{
                if($db["idCity"] == $this->city){
                    return "1";
                }
                else{
                    return "0";
                }
            }
        }
        
        public function createHotel(){
            global $link;

            $sql = "INSERT INTO hotel (idCity, name, stars) VALUES ('$this->city', '$this->name', '$this->stars')";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

        public function getId(){
            global $link;

            $sql = "SELECT id FROM hotel WHERE name LIKE '%$this->name%' AND idCity = '$this->city'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);
            
            return $db["id"];
        }

        public function savePics($idp, $class, $path){
            global $link;

            $sql = "INSERT INTO images (idParent, class, path) VALUES ('$idp', '$class', '$path')";

            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

        public function deleteHotel($id){
            global $link;

            $sql = "DELETE FROM hotel WHERE id = '$id'";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }

            $sql = "DELETE FROM images WHERE idParent = '$id'";
            
            mysqli_query($link, $sql);
        }

        public function checkContent($id){
            global $link;

            $sql = "SELECT * FROM hotelcontent WHERE idParent = '$id'";

            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);

            if($db != null){
                return 1;
            }
            else{
                return 0;
            }
        }

        public function tableHotel($city){
            global $link;

            $sql = "SELECT * FROM hotel WHERE idCity = '$city'";

            $show = mysqli_query($link, $sql);

            while($db = mysqli_fetch_assoc($show)) {
                $id = $db['id'];            
                $name = $db['name'];            
                $stars = $db['stars'];
                $check = Hotel::checkContent($id);
                if($check == 1){
                    $content = "Cadastrado";
                }
                else{
                    $content = "Não Cadastrado";
                }            
                echo "<tr>";
                echo "<th>{$id}</th>";
                echo "<td>{$name}</td>";
                echo "<td>{$stars}</td>";
                echo "<td><a href=\"?id={$id}&class=5\">{$content}</a></td>";
                echo "<td><a href=\"?id={$id}&class=2\">Editar</a></td>";
                echo "<td><a href=\"../controller/delete.php?id={$id}&class=2\">Deletar</a></form></td>";
                echo "</tr>";
            }
        }

        public function getbyId($id, $campo){
            global $link;

            $sql = "SELECT $campo FROM hotel WHERE id = '$id'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);
            
            return $db["$campo"];
        }

        public function updateHotel($id){
            global $link;

            $sql = "UPDATE hotel SET name = '$this->name', idCity = '$this->city', stars = '$this->stars' WHERE id = '$id'";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

        public function selectHotel(){
            global $link;

            $sql = "SELECT * FROM hotel";

            $show = mysqli_query($link, $sql);

            while($db = mysqli_fetch_assoc($show)) {
                $id = $db['id'];            
                $name = $db['name'];
                echo "<option value=\"{$id}\">{$name}</option>"; 
            }
        }

        public function selectedHotel($idp){
            global $link;

            $sql = "SELECT * FROM hotel";

            $show = mysqli_query($link, $sql);

            while($db = mysqli_fetch_assoc($show)) {
                $id = $db['id'];            
                $name = $db['name'];
                if($idp == $id){
                    echo "<option value=\"{$id}\" selected>{$name}</option>";
                }
                else{
                    echo "<option value=\"{$id}\">{$name}</option>";
                } 
            }
        }

        public function selectHotelCity($city){
            global $link;

            $sql = "SELECT * FROM hotel WHERE idCity = '$city'";

            $show = mysqli_query($link, $sql);
            $b = 0;
            while($db = mysqli_fetch_assoc($show)) {
                $id = $db['id'];            
                $name = $db['name'];
                if($b == 0){
                    echo "<option value=\"\">Nenhum</option>";
                    $b = 1;
                }
                echo "<option value=\"{$id}\">{$name}</option>";   
            }
        }

        public function selectedHotelCity($city ,$idp){
            global $link;

            $sql = "SELECT * FROM hotel WHERE idCity = '$city'";

            $show = mysqli_query($link, $sql);
            $b = 0;
            while($db = mysqli_fetch_assoc($show)) {
                $id = $db['id'];            
                $name = $db['name'];
                if($b == 0){
                    echo "<option value=\"\">Nenhum</option>";
                    $b = 1;
                }
                if($idp == $id){
                    echo "<option value=\"{$id}\" selected>{$name}</option>";
                }
                else{
                    echo "<option value=\"{$id}\">{$name}</option>";
                }  
            }
        }
    } 
?>

