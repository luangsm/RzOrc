<?php 
    include_once 'bd.php';  
    include_once 'roteiro.php';
    class clientInfo {
        
        public $agent;
        public $name;
        public $email;
        public $adt;
        public $chd;
        public $type;
        public $city;
        public $setor;
        public $cb;
        public $crr;
        public $timestamp;


        public function __construct($agent, $name, $email, $adt, $chd, $type, $city, $setor, $cb, $crr){
            $this->agent = $agent;
            $this->name = $name;
            $this->email = $email;
            $this->adt = $adt;
            $this->chd = $chd;
            $this->type = $type;
            $this->city = $city;
            $this->setor = $setor;
            $this->cb = $cb;
            $this->crr = $crr;
        }

        public function createClient(){
            global $link;

            $sql = "INSERT INTO clientinfo (agent, name, email, adt, chd, type, time, city, setor, cambio, crr) VALUES ('$this->agent', '$this->name', '$this->email', '$this->adt', '$this->chd', '$this->type', '$this->timestamp', '$this->city', '$this->setor', '$this->cb', '$this->crr')";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

        public function tableClient(){
            global $link;

            $sql = "SELECT * FROM clientinfo";

            $show = mysqli_query($link, $sql);
            
            while($db = mysqli_fetch_assoc($show)) {
                $id = $db['id'];
                $userid = $db['agent'];
                $agentname = Profile::getbyId($userid, "name");            
                $inarray = Roteiro::getbyId($id, "in");            
                $inarray = explode("|", $inarray);           
                $outarray = Roteiro::getbyId($id, "out");
                $outarray = explode("|", $outarray);
                $in = Day::inverteData($inarray[0]);           
                $out = Day::inverteData(end($outarray));           
                $agent = $db['agent'];            
                $name = $db['name'];
                $time = $db['time'];
                $nm = explode(";", $name);
                $countnm = 0;
                foreach($nm as $n){
                    $countnm++;
                }
                $email = $db['email'];    
                $em = explode(";", $email);
                $countem = 0;
                foreach($em as $m){
                    $countem++;
                }      
                echo "<tr>";
                echo "<td>{$agentname}</td>";
                echo "<td>" . $in . " a " . $out . "</td>";
                if($countnm >= 2){
                    echo "<td>";
                    $b = 0;
                    foreach($nm as $n){
                        if($b == 0){
                            echo "{$n}";
                            $b++;
                        }
                        else{
                            echo "</br>{$n}";
                        }
                    }
                }
                else{
                    echo "<td>{$name}</td>";
                }
                if($countem >= 2){
                    echo "<td>";
                    $b = 0;
                    foreach($em as $m){
                        if($b == 0){
                            echo "{$m}";
                            $b++;
                        }
                        else{
                            echo "</br>{$m}";
                        }
                    }
                }
                else{
                    echo "<td>{$email}</td>";
                }
                echo "<td>{$time}</td>";
                echo "<td><a href=\"?id={$id}&class=3\">Editar</a></td>";
                echo "<td><a href=\"../controller/delete.php?id={$id}&class=3\">Deletar</a></form></td>";
                echo "<td><a target=\"_blank\" href=\"https://sistema.rzturismo.com.br/view/orcamento.php?id={$id}\">Ir Para</a></form></td>";
                echo "</tr>";
            }
        }

        public function getId(){
            global $link;

            $sql = "SELECT id FROM clientinfo WHERE agent = '$this->agent' AND name = '$this->name' AND email = '$this->email' AND adt = '$this->adt' AND chd = '$this->chd' AND type = '$this->type' AND time = '$this->timestamp' AND city = '$this->city'";

            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);

            return $db["id"];
        }

        public function deleteClient($id){
            global $link;

            $sql = "DELETE FROM clientinfo WHERE id = '$id'";
            
            mysqli_query($link, $sql);

            $sql = "DELETE FROM roteiro WHERE idClient = '$id'";
            
            mysqli_query($link, $sql);

            $sql = "DELETE FROM day WHERE idParent = '$id'";
            
            mysqli_query($link, $sql);

            $sql = "DELETE FROM price WHERE idParent = '$id'";
            
            mysqli_query($link, $sql);

            $sql = "DELETE FROM images WHERE idParent = '$id'";
            
            mysqli_query($link, $sql);
        }

        public function getbyId($id, $campo){
            global $link;

            $sql = "SELECT $campo FROM clientinfo WHERE id = '$id'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);
            
            return $db["$campo"];
        }

        public function timestamp(){

            function inverteData($data){
                if(count(explode("/",$data)) > 1){
                    return implode("-",array_reverse(explode("/",$data)));
                }elseif(count(explode("-",$data)) > 1){
                    return implode("/",array_reverse(explode("-",$data)));
                }
            }

            global $link;

            $sql = "SELECT CURRENT_TIMESTAMP()";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);
            
            $c = $db["CURRENT_TIMESTAMP()"];
            $ca = explode(" ", $c);
            $ca[0] = inverteData($ca[0]);
            $ca[1] = substr($ca[1], 0, -3);
            $ca = implode("-", $ca);
            $this->timestamp = $ca;
        }

        public function updateClient($id){
            global $link;

            $sql = "UPDATE clientinfo SET agent = '$this->agent', name = '$this->name', email = '$this->email', adt = '$this->adt', chd = '$this->chd', type = '$this->type', time = '$this->timestamp', city = '$this->city', setor = '$this->setor', cambio = '$this->cb', crr = '$this->crr' WHERE id = '$id'";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

    }
