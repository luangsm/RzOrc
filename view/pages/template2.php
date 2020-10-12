<?php 
    include_once '../../model/session.php';
    include_once "../../model/city.php";
    include_once "../../model/tour.php";
    include_once "../../model/hotel.php";

    class Template2{

        public function FormTextEmpty($id, $content, $siz, $class, $place){
            $size = "h" . $siz;
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\"><$size>{$content}</$size></label>";
            echo "<input type=\"text\" class=\"{$class}\" id=\"{$id}\" name=\"{$id}\" placeholder=\"{$place}\">"; 
            echo "</div>";
        }

        public function FormText($id, $content, $siz, $class, $value, $place){
            $size = "h" . $siz;
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\"><$size>{$content}</$size></label>";
            echo "<input type=\"text\" class=\"{$class}\" id=\"{$id}\" name=\"{$id}\" value=\"{$value}\" placeholder=\"{$place}\">"; 
            echo "</div>";
        }

        public function FormNumberEmpty($id, $content, $siz, $class, $step, $place){
            $size = "h" . $siz;
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\"><$size>{$content}</$size></label>";
            echo "<input type=\"number\" class=\"{$class}\" id=\"{$id}\" step=\"{$step}\" name=\"{$id}\" placeholder=\"{$place}\">";
            echo "</div>";
        }

        public function FormNumber($id, $content, $siz, $class, $step, $value, $place){
            $size = "h" . $siz;
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\"><$size>{$content}</$size></label>";
            echo "<input type=\"number\" class=\"{$class}\" id=\"{$id}\" step=\"{$step}\" name=\"{$id}\" value=\"{$value}\" placeholder=\"{$place}\">";
            echo "</div>";
        }

        public function FormSelectEmpty($id, $siz, $content, $content2, $place, $values, $number){
            $size = "h" . $siz;
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\"><$size>{$content}</$size></label></br>";
            echo "<select class=\"selectpicker\" id=\"{$id}\" name=\"{$id}\" title=\"{$place}\" data-live-search=\"true\">";
            $ctts = explode(";", $content2);
            $val = explode(";", $values);
            $c = 0;
            while($c != $number){
                echo "<option value=\"{$val[$c]}\">{$ctts[$c]}</option>";
                $c++;
            }
            echo "</select>";
            echo "</div>";
        }

        public function FormSelected($id, $siz, $content, $content2, $place, $values, $number, $select){
            $size = "h" . $siz;
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\"><$size>{$content}</$size></label></br>";
            echo "<select class=\"selectpicker\" id=\"{$id}\" name=\"{$id}\" title=\"{$place}\" data-live-search=\"true\">";
            $ctts = explode(";", $content2);
            $val = explode(";", $values);
            $c = 0;
            while($c != $number){
                if($select == $val[$c]){
                    echo "<option value=\"{$val[$c]}\" selected>{$ctts[$c]}</option>";
                }
                else{
                    echo "<option value=\"{$val[$c]}\">{$ctts[$c]}</option>";
                }
                $c++;
            }
            echo "</select>";
            echo "</div>";
        }

        public function FormImage($id, $content, $siz){
            $size = "h" . $siz;
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\"><$size>{$content}</$size></label>";
            echo "<textarea class=\"demo form-control demo-textarea\" id=\"{$id}\" placeholder=\"Cole aqui a(s) imagem/n(s)\"></textarea>";
            echo "</div>";
        }

        public function ShowImage($id, $class, $content, $siz){
            $size = "h" . $siz;
            $path = Roteiro::getPath($id, $class);
            echo "<div class=\"text-center\">";
            echo "<label for=\"{$id}\"><$size>{$content}</$size></label>";
            echo "<img src=\"{$path}\" class=\"rounded\" id=\"{$id}\">";
            echo "</div>";
        }

        public function FormSelectCity($id, $content, $siz, $place){
            $size = "h" . $siz;
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\"><$size>{$content}</$size></label></br>";
            echo "<select class=\"selectpicker\" id=\"{$id}\" name=\"{$id}\" title=\"{$place}\" data-live-search=\"true\">";
            City::selectCity();
            echo "</select>";
            echo "</div>";
        }
        
        public function FormSelectedCity($id, $content, $siz, $place, $idp){
            $size = "h" . $siz;
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\"><$size>{$content}</$size></label></br>";
            echo "<select class=\"selectpicker\" id=\"{$id}\" name=\"{$id}\" title=\"{$place}\" data-live-search=\"true\">";
            City::selectedCity($idp);
            echo "</select>";
            echo "</div>";
        }

        public function FormSelectTourCity($id, $content, $siz, $place, $city){
            $size = "h" . $siz;
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\"><$size>{$content}</$size></label></br>";
            echo "<select class=\"selectpicker\" id=\"{$id}\" name=\"{$id}\" title=\"{$place}\" data-live-search=\"true\">";
            Tour::selectTourCity($city);
            echo "</select>";
            echo "</div>";
        }

        public function FormSelectedTourCity($id, $content, $siz, $place, $city, $idp){
            $size = "h" . $siz;
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\"><$size>{$content}</$size></label></br>";
            echo "<select class=\"selectpicker\" id=\"{$id}\" name=\"{$id}\" title=\"{$place}\" data-live-search=\"true\">";
            Tour::selectedTourCity($city, $idp);
            echo "</select>";
            echo "</div>";
        }

        public function FormCheckbox($id, $content, $siz, $val, $check){
            $size = "h" . $siz;
            echo "<div class=\"form-check\">";
            echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"{$val}\" name=\"{$id}\" id=\"{$id}\" " . ($check == 1 ? "checked" : "") . ">";
            echo "<label class=\"form-check-label\"><$size>{$content}</$size></label></div></br>";
        }

        public function FormTextArea($id, $content, $siz, $place, $row, $val){
            $size = "h" . $siz;
            echo "<div class=\"form-group\">";
            echo "<label><$size>{$content}</$size></label>";
            echo "<textarea class=\"form-control\" placeholder=\"{$place}\" name=\"{$id}\" rows=\"{$row}\">{$val}</textarea>";
            echo "</div>";
        }


        public function FormDateEmpty($id, $content, $siz, $class){
            $size = "h" . $siz;
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\"><$size>{$content}</$size></label>";
            echo "<input type=\"date\" class=\"{$class}\" id=\"{$id}\" name=\"{$id}\">";
            echo "</div>";
        }

        public function FormDate($id, $content, $siz, $class, $value){
            $size = "h" . $siz;
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\"><$size>{$content}</$size></label>";
            echo "<input type=\"date\" class=\"{$class}\" id=\"{$id}\" value=\"{$value}\" name=\"{$id}\">";
            echo "</div>";
        }

        public function FormSelectHotelCity($id, $content, $siz, $city){
            $size = "h" . $siz;
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\"><$size>{$content}</$size></label></br>";
            echo "<select class=\"selectpicker\" id=\"{$id}\" name=\"{$id}\" title=\"Selecione o Hotel\" data-live-search=\"true\">";
            Hotel::selectHotelCity($city);
            echo "</select>";
            echo "</div>";
        }

        public function FormSelectedHotelCity($id, $content, $siz, $city, $idp){
            $size = "h" . $siz;
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\"><$size>{$content}</$size></label></br>";
            echo "<select class=\"selectpicker\" id=\"{$id}\" name=\"{$id}\" title=\"Selecione o Hotel\" data-live-search=\"true\">";
            Hotel::selectedHotelCity($city, $idp);
            echo "</select>";
            echo "</div>";
        }

    }