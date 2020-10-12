<?php 
    include_once 'bd.php';
    class City {
        
        public $name;
        public $pais;

        public function __construct($name, $pais){
            $this->name = $name;
            $this->pais = $pais;
        }

        public function getbyId($id){
            global $link;

            $sql = "SELECT name FROM city WHERE id = '$id'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);
            
            return $db['name'];
        }

        public function getAll(){
            global $link;

            $sql = "SELECT * FROM city";
            
            $show = mysqli_query($link, $sql);

            $array;
            $p = 0;
            while($db = mysqli_fetch_assoc($show)) {
                $id = $db['id'];
                $array[$p] = $id;
                $p++;
            }
            return $array;
        }

        public function getbyIdd($id){
            global $link;

            $sql = "SELECT pais FROM city WHERE id = '$id'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);
            
            return $db['pais'];
        }

        public function createCity(){
            global $link;

            $sql = "INSERT INTO city (name, pais) VALUES ('$this->name', '$this->pais')";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

        public function updateCity($id){
            global $link;

            $sql = "UPDATE city SET name = '$this->name', pais = '$this->pais' WHERE id = '$id'";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

        public function checkCity(){
            global $link;

            $sql = "SELECT name FROM city WHERE name LIKE '%$this->name%'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);
                
            if($db != null){
                return "1";
            }
            else{
                return "0";
            }
        }

        public function deleteCity($id){
            global $link;

            $sql = "DELETE FROM city WHERE id = '$id'";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

        public function tableCity($pais){
            global $link;

            $sql = "SELECT * FROM city WHERE pais = '$pais'";

            $show = mysqli_query($link, $sql);

            while($db = mysqli_fetch_assoc($show)) {
                $id = $db['id'];            
                $name = $db['name'];            
                echo "<tr>";
                echo "<th>{$id}</th>";
                echo "<td>{$name}</td>";
                echo "<td><a href=\"?id={$id}&class=0\">Editar</a></td>";
                echo "<td><a href=\"../controller/delete.php?id={$id}&class=0\">Deletar</a></form></td>";
                echo "</tr>";
            }
        }

        public function selectCity(){
            global $link;

            $sql = "SELECT * FROM city";

            $show = mysqli_query($link, $sql);

            while($db = mysqli_fetch_assoc($show)) {
                $id = $db['id'];            
                $name = $db['name'];            
                echo "<option value=\"{$id}\">{$name}</option>"; 
            }
        }

        public function selectedCity($idp){
            global $link;

            $sql = "SELECT * FROM city";

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
    }
?>

