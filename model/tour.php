<?php 
    include_once 'bd.php';
    class Tour {
        
        public $name;
        public $service;
        public $city;
        public $ticket;

        public function __construct($name, $service, $city, $ticket){
            $this->name = $name;
            $this->service = $service;
            $this->city = $city;
            $this->ticket = $ticket;
        }


        public function checkTour(){
            global $link;

            $sql = "SELECT name, ticket FROM tour WHERE name LIKE '%$this->name%'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);
            
            if($db["name"] == null){
                return "0";
            }
            else{
                if($db["ticket"] == null){
                    return "1";
                }
                else{
                    if($this->ticket == $db["ticket"]){
                        return "1";
                    }
                    else{
                        return "0";
                    }
                }
            }
        }
        
        public function createTour(){
            global $link;

            $sql = "INSERT INTO tour (idCity, name, service, ticket) VALUES ('$this->city', '$this->name', '$this->service', '$this->ticket')";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

        public function getId(){
            global $link;

            $sql = "SELECT id FROM tour WHERE name LIKE '%$this->name%' AND idCity = '$this->city'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);
            
            return $db["id"];
        }

        public function checkContent($id){
            global $link;

            $sql = "SELECT * FROM tourcontent WHERE idParent = '$id'";

            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);

            if($db != null){
                return 1;
            }
            else{
                return 0;
            }
        }

        public function tableTour($city){
            global $link;

            $sql = "SELECT * FROM tour WHERE idCity = '$city'";

            $show = mysqli_query($link, $sql);

            while($db = mysqli_fetch_assoc($show)) {
                $id = $db['id'];            
                $name = $db['name'];                
                $ticket = $db['ticket'];
                $check = Tour::checkContent($id);
                if($check == 1){
                    $content = "Cadastrado";
                }
                else{
                    $content = "Não Cadastrado";
                }          
                echo "<tr>";
                echo "<th>{$id}</th>";
                echo "<td>{$name}</td>";
                echo "<td><a href=\"?id={$id}&class=4\">{$content}</a></td>";
                echo "<td><a href=\"?id={$id}&class=1\">Editar</a></td>";
                echo "<td><a href=\"../controller/delete.php?id={$id}&class=1\">Deletar</a></form></td>";
                echo "</tr>";
            }
        }

        public function getbyId($id, $campo){
            global $link;

            $sql = "SELECT * FROM tour WHERE id = '$id'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);
            
            return $db["$campo"];
        }

        public function deleteTour($id){
            global $link;

            $sql = "DELETE FROM tour WHERE id = '$id'";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }

            $sql = "DELETE FROM images WHERE idParent = '$id'";
            
            mysqli_query($link, $sql);
        }

        public function deleteImg($id){
            global $link;

            $sql = "DELETE FROM images WHERE id = '$id'";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

        public function updateTour($id){
            global $link;

            $sql = "UPDATE tour SET name = '$this->name', idCity = '$this->city', service = '$this->service', ticket = '$this->ticket' WHERE id = '$id'";
            
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

        public function selectTourCity($city){
            global $link;

            $sql = "SELECT * FROM tour WHERE idCity = '$city'";

            $show = mysqli_query($link, $sql);

            $i = 0;
            while($db = mysqli_fetch_assoc($show)) {
                $id = $db['id'];            
                $name = $db['name'];
                if($i == 0){
                    echo "<option value=\"\">Nada</option>";
                    $i++;
                }
                echo "<option value=\"{$id}\">{$name}</option>"; 
            }
        }

        public function selectedTourCity($city, $idp){
            global $link;

            $sql = "SELECT * FROM tour WHERE idCity = '$city'";

            $show = mysqli_query($link, $sql);

            $i = 0;
            while($db = mysqli_fetch_assoc($show)) {
                $id = $db['id'];            
                $name = $db['name'];
                if($i == 0){
                    echo "<option value=\"\">Nada</option>";
                    $i++;
                }
                if($idp == $id){
                    echo "<option value=\"{$id}\" selected>{$name}</option>";   
                }
                else{
                    echo "<option value=\"{$id}\">{$name}</option>";
                }
            }
        }

        public function getImgArray($id, $class, $campo){
            global $link;

            $sql = "SELECT * FROM `images` WHERE idParent = '$id' AND  class = '$class'";

            $show = mysqli_query($link, $sql);

            $i = 0;
            while($db = mysqli_fetch_assoc($show)) {
                $data = $db["$campo"];            
                $arr["$i"] = $data;
                $i++; 
            }
            if(isset($arr)){
                return $arr;
            }
        }

        public function getPath($id, $class){
            global $link;

            $sql = "SELECT * FROM `images` WHERE idParent = '$id' AND  class = '$class'";

            $show = mysqli_query($link, $sql);

            while($db = mysqli_fetch_assoc($show)) {
                $data = $db["path"];
            }
            return $data;    
        }

        public function getArrayPath($id, $class){
            global $link;

            $sql = "SELECT * FROM `images` WHERE idParent = '$id' AND  class = '$class'";

            $count = 0;
            if(($show = mysqli_query($link, $sql)) !== null){
                while($db = mysqli_fetch_assoc($show)) {
                    $data[$count] = $db["path"];
                    $count++;
                }
                if(isset($data)){
                    return $data;
                }
            }     
        }

        public function getService($id){
            global $link;

            $sql = "SELECT * FROM `tour` WHERE id = '$id'";

            $show = mysqli_query($link, $sql);

            if($db = mysqli_fetch_assoc($show)){
                $service = $db["service"];
                $ticket = $db["ticket"];
                if($ticket == "sim"){
                    $string = $service . " (Com ingresso incluso)";
                }
                elseif($ticket == "não"){
                    $string = $service . " (Com ingresso não incluso)";
                }
                else{
                    $string = $service;
                }
                return $string; 
            }
            else{
                return null;
            }
               
        }

        public function selectTour(){
            global $link;

            $sql = "SELECT * FROM tour";

            $show = mysqli_query($link, $sql);

            while($db = mysqli_fetch_assoc($show)) {
                $id = $db['id'];            
                $name = $db['name'];
                echo "<option value=\"{$id}\">{$name}</option>"; 
            }
        }

        public function selectedTour($idp){
            global $link;

            $sql = "SELECT * FROM tour";

            $show = mysqli_query($link, $sql);

            $i = 0;
            while($db = mysqli_fetch_assoc($show)) {
                $id = $db['id'];            
                $name = $db['name'];
                if($i == 0){
                    echo "<option value=\"\">Nada</option>";
                    $i++;
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

