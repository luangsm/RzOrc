<?php 
    include_once 'bd.php';
    class Day {
        
        public $id;
        public $day;
        public $text;
        public $tour;

        public function __construct($id, $day, $text, $tour){
            $this->id = $id;
            $this->day = $day;
            $this->text = $text;
            $this->tour = $tour;
        }

        public function createDay(){
            global $link;

            $sql = "INSERT INTO day (`idParent`, `day`, `text`, `tour`) VALUES ('$this->id', '$this->day', '$this->text', '$this->tour')";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

        public function inverteData($data){
            if(count(explode("/",$data)) > 1){
                return implode("-",array_reverse(explode("/",$data)));
            }elseif(count(explode("-",$data)) > 1){
                return implode("/",array_reverse(explode("-",$data)));
            }
        }

        public function getDays($start, $end, $format = 'Y-m-d') { 
      
            // Declare an empty array 
            $array = array(); 
              
            // Variable that store the date interval 
            // of period 1 day 
            $interval = new DateInterval('P1D'); 
          
            $realEnd = new DateTime($end); 
            $realEnd->add($interval); 
          
            $period = new DatePeriod(new DateTime($start), $interval, $realEnd); 
          
            // Use loop to store date into array 
            foreach($period as $date) {                  
                $array[] = $date->format($format);  
            } 
          
            // Return the array elements 
            return $array; 
        }


        public function getId(){
            return $this->id;
        }

        public function check($id){
            global $link;

            $sql = "SELECT * FROM day WHERE idParent = '$id'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);
            
            if($db != null){
                return 0;
            }
            else{
                return 1;
            }
        }


        public function getbyId($id, $campo, $day){
            global $link;

            $sql = "SELECT * FROM day WHERE idParent = '$id' AND day = '$day'";
            
            $show = mysqli_query($link, $sql);

            $db = mysqli_fetch_assoc($show);
            
            return $db["$campo"];
        }

        public function getArraybyId($id, $campo){
            global $link;

            $sql = "SELECT * FROM day WHERE idParent = '$id'";
            
            $show = mysqli_query($link, $sql);

            $count = 0;
            while($db = mysqli_fetch_assoc($show)){
                $data = $db["$campo"];
                $array[$count] = $data;
                $count++;
            }

            return $array;
        }

        public function updateDay($id){
            global $link;

            $sql = "UPDATE day SET idParent = '$this->id', day = '$this->day', tour = '$this->tour', text = '$this->text' WHERE id = '$id'";
            
            if (mysqli_query($link, $sql)) {
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
        }

    }
