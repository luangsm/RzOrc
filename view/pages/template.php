<?php 
    include_once '../../model/session.php';
    include_once "../../model/city.php";
    include_once "../../model/tour.php";
    include_once "../../model/hotel.php";

    class Template{

        public function inputText($id, $content, $class, $bool, $x){
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\">{$content}</label>";
            echo "<input type=\"text\" class=\"{$class}\" id=\"{$id}\" name=\"{$id}\""
            . ($bool == 0 ? "placeholder=\"{$content}\">" : "value=\"{$x}\">");
            echo "</div>";
        }
        
        public function inputTextV2($id, $content, $placeholder, $class, $bool, $x){
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\">{$content}</label>";
            echo "<input type=\"text\" class=\"{$class}\" id=\"{$id}\" name=\"{$id}\""
            . ($bool == 0 ? "placeholder=\"{$placeholder}\">" : "value=\"{$x}\">");
            echo "</div>";
        }

        public function inputDate($id, $content, $class, $bool, $x){
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\">{$content}</label>";
            echo "<input type=\"date\" class=\"{$class}\" id=\"{$id}\" name=\"{$id}\""
            . ($bool == 0 ? "placeholder=\"{$content}\">" : "value=\"{$x}\">");
            echo "</div>";
        }

        public function inputPass($id, $content, $class){
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\">{$content}</label>";
            echo "<input type=\"password\" class=\"{$class}\" id=\"{$id}\" name=\"{$id}\" placeholder=\"{$content}\">";
            echo "</div>";
        }

        public function inputHidden($name, $val){
            echo "<input type=\"text\" class=\"d-none\" name=\"{$name}\" id=\"{$name}\" value=\"$val\">";
        }

        public function inputNumber($id, $content, $class, $step, $bool, $x){
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\">{$content}</label>";
            echo "<input type=\"number\" class=\"{$class}\" id=\"{$id}\" step=\"{$step}\" name=\"{$id}\""
            . ($bool == 0 ? "placeholder=\"{$content}\">" : "value=\"{$x}\">");
            echo "</div>";
        }

        public function inputSelect($id, $content, $content2, $values, $number){
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\">{$content}: </label>";
            echo "<select class=\"selectpicker\" id=\"{$id}\" name=\"{$id}\" title=\"{$content}\" data-live-search=\"true\">";
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

        public function inputSelected($id, $content, $content2, $values, $number, $select){
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\">{$content}: </label>";
            echo "<select class=\"selectpicker\" id=\"{$id}\" name=\"{$id}\" title=\"{$content}\" data-live-search=\"true\">";
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

        public function inputTextarea($id, $content, $row, $val){
            echo "<div class=\"form-group\">";
            echo "<label>{$content}</label>";
            echo "<textarea class=\"form-control\" name=\"{$id}\" rows=\"{$row}\">{$val}</textarea>";
            echo "</div>";
        }

        public function inputImage($id, $content){
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\">{$content}</label>";
            echo "<textarea class=\"demo form-control demo-textarea\" id=\"{$id}\" placeholder=\"Cole aqui a(s) imagem/n(s)\"></textarea>";
            echo "</div>";
        }

        public function headingFaded($content, $content2){
            echo "<div class=\"form-group\">";
            echo "<h4>{$content}";
            echo "<small class=\"text-muted\">&nbsp{$content2}</small></h4>";
            echo "</div>";
        }

        public function showImage($id, $class, $content){
            $path = Roteiro::getPath($id, $class);
            echo "<div class=\"text-center\">";
            echo "<label for=\"{$id}\">{$content}</label>";
            echo "<img src=\"{$path}\" class=\"rounded\" id=\"{$id}\" alt=\"Tabela com todos áereos de sua viagem\">";
            echo "</div>";
        }

        public function Image($path){
            echo "<div class=\"text-center\">";
            echo "<img src=\"{$path}\" width=\"300\" height=\"300\" class=\"rounded\">";
            echo "</div>";
        }

        public function inputRadioInline($content, $number, $content2, $values, $name){
            echo "<div class=\"form-group\">";
            echo "<label for=\"\" class=\"h5\">{$content}&nbsp</label>";
            $ctts = explode(";", $content2);
            $val = explode(";", $values);
            $c = 0;
            while($c != $number){
                echo "<input type=\"radio\" name=\"{$name}\" value=\"{$val[$c]}\">{$ctts[$c]}&nbsp";
                $c++;
            }
            echo "</div>";
        }

        public function checkbox($id, $content, $val, $check){
            echo "<div class=\"form-check\">";
            echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"{$val}\" name=\"{$id}\" id=\"{$id}\" " . ($check == 1 ? "checked" : "") . ">";
            echo "<label class=\"form-check-label\">{$content}</label></div></br>";
        }

        public function inputRadioInlineChecked($content, $number, $content2, $values, $name, $ticket){
            echo "<div class=\"form-group\">";
            echo "<label for=\"\" class=\"h5\">{$content}&nbsp</label>";
            $ctts = explode(";", $content2);
            $val = explode(";", $values);
            $c = 0;
            while($c != $number){
                if($ticket == $val[$c]){
                    echo "<input type=\"radio\" name=\"{$name}\" value=\"{$val[$c]}\" checked=\"checked\">{$ctts[$c]}&nbsp";
                }
                else{
                    echo "<input type=\"radio\" name=\"{$name}\" value=\"{$val[$c]}\">{$ctts[$c]}&nbsp";
                }
                $c++;
            }
            echo "</div>";
        }

        public function selectCity($id, $content){
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\">{$content}: </label>";
            echo "<select class=\"selectpicker\" id=\"{$id}\" name=\"{$id}\" title=\"{$content}\" data-live-search=\"true\">";
            City::selectCity();
            echo "</select>";
            echo "</div>";
        }

        public function selectedCity($id, $content, $idp){
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\">{$content}: </label>";
            echo "<select class=\"selectpicker\" id=\"{$id}\" name=\"{$id}\" title=\"{$content}\" data-live-search=\"true\">";
            City::selectedCity($idp);
            echo "</select>";
            echo "</div>";
        }

        public function selectTourCity($id, $content, $city){
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\">{$content}: </label>";
            echo "<select class=\"selectpicker\" id=\"{$id}\" name=\"{$id}\" title=\"{$content}\" data-live-search=\"true\">";
            Tour::selectTourCity($city);
            echo "</select>";
            echo "</div>";
        }

        public function selectedTourCity($id, $content, $city, $idp){
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\">{$content}: </label>";
            echo "<select class=\"selectpicker\" id=\"{$id}\" name=\"{$id}\" title=\"{$content}\" data-live-search=\"true\">";
            Tour::selectedTourCity($city, $idp);
            echo "</select>";
            echo "</div>";
        }

        public function selectHotel($id, $content){
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\">{$content}: </label>";
            echo "<select class=\"selectpicker\" id=\"{$id}\" name=\"{$id}\" title=\"Selecione o Hotel\" data-live-search=\"true\">";
            Hotel::selectHotel();
            echo "</select>";
            echo "</div>";
        }

        public function selectedHotel($id, $content, $idp){
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\">{$content}: </label>";
            echo "<select class=\"selectpicker\" id=\"{$id}\" name=\"{$id}\" title=\"Selecione o Hotel\" data-live-search=\"true\">";
            Hotel::selectedHotel($idp);
            echo "</select>";
            echo "</div>";
        }

        public function selectTour($id, $content){
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\">{$content}: </label>";
            echo "<select class=\"selectpicker\" id=\"{$id}\" name=\"{$id}\" title=\"{$content}\" data-live-search=\"true\">";
            Tour::selectTour();
            echo "</select>";
            echo "</div>";
        }

        public function selectedTour($id, $content, $idp){
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\">{$content}: </label>";
            echo "<select class=\"selectpicker\" id=\"{$id}\" name=\"{$id}\" title=\"{$content}\" data-live-search=\"true\">";
            Tour::selectedTour($idp);
            echo "</select>";
            echo "</div>";
        }

        public function selectHotelCity($id, $content, $city){
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\">{$content}: </label>";
            echo "<select class=\"selectpicker\" id=\"{$id}\" name=\"{$id}\" title=\"Selecione o Hotel\" data-live-search=\"true\">";
            Hotel::selectHotelCity($city);
            echo "</select>";
            echo "</div>";
        }

        public function buttonCollapse($id, $content){
            echo "<button class=\"btn btn-primary\" type=\"button\" data-toggle=\"collapse\" data-target=\"#{$id}\" aria-expanded=\"false\">";
            echo "{$content}";
            echo "</button>";
        }

        public function selectedHotelCity($id, $content, $city, $idp){
            echo "<div class=\"form-group\">";
            echo "<label for=\"{$id}\">{$content}: </label>";
            echo "<select class=\"selectpicker\" id=\"{$id}\" name=\"{$id}\" title=\"Selecione o Hotel\" data-live-search=\"true\">";
            Hotel::selectedHotelCity($city, $idp);
            echo "</select>";
            echo "</div>";
        }

        public function OrcHeader($id){
            $path = "../view/img/fundos/" . $id . ".png";
            echo "<div class=\"card text-white\">";
            echo "<img src=\"{$path}\" class=\"card-img\">";
            echo "</div>";
            echo "</br>";
        }

        public function Header($id, $titulo){
            $path = "../view/img/fundos/" . $id . ".png";
            echo "<div class=\"row\">";
            echo "<div class=\"col-12\">";
            echo "<div class=\"card\">";
            echo "<img src=\"{$path}\" class=\"card-img\">";
            echo "<div class=\"card-img-overlay text-center\">";
            echo "<h3 class=\"card-title\">{$titulo}</h3>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }

        public function Introduçao($user, $tel, $whats, $agent, $email){
            $idp = Profile::getbyId($agent, "id");
            function formataTelefone($numero){
                if(strlen($numero) == 10){
                    $novo = substr_replace($numero, '(', 0, 0);
                    $novo = substr_replace($novo, '9', 3, 0);
                    $novo = substr_replace($novo, ')', 3, 0);
                }else{
                    $novo = substr_replace($numero, '(', 0, 0);
                    $novo = substr_replace($novo, ')', 3, 0);
                }
                return $novo;
            }
            echo "<div class=\"card\">";
            echo "<div class=\"row\">";
            echo "<div class=\"col-6\">";
            echo "<div class=\"card-body\">";
            echo "<div class=\"row\">";
            echo "<div class=\"col-5\">";
            echo "<h5>Agente da viagem</h5>";
            if(null !== ($path = Tour::getArrayPath($idp, 20))){
                echo "<img src=\"{$path[2]}\" height=\"160\" class=\"card-img\">";
            }
            echo "</div>";
            echo "<div class=\"col-7\">";
            echo "</br>";
            echo "<h5>{$user}</h5>";
            echo "<h6 class=\"text-muted\">Especialista em Patagônia</h6>";
            echo "<h6 class=\"text-muted\">{$email}</h6>";
            echo "<p>Telefones para contato direto:</br>" . formataTelefone($tel) . "</br>" . formataTelefone($whats) . "</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<div class=\"row align-items-center\">";
            echo "<div class=\"col align-self-center\">";
            echo "<div class=\"card-body \">";
            echo "<a target=\"_blank\" class=\"btn-lg text-dark btn btn-success\" href='https://wa.me/55{$whats}' role=\"button\"><strong>Clique aqui e fale direto com</br>seu agente no whatsapp</strong></a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }

        public function AgentInfo($agent, $val, $tel, $whats){
            function formataTelefone($numero){
                if(strlen($numero) == 10){
                    $novo = substr_replace($numero, '(', 0, 0);
                    $novo = substr_replace($novo, '9', 3, 0);
                    $novo = substr_replace($novo, ')', 3, 0);
                }else{
                    $novo = substr_replace($numero, '(', 0, 0);
                    $novo = substr_replace($novo, ')', 3, 0);
                }
                return $novo;
            }
            echo "<div class=\"row justify-content-center\">";
            echo "<div class=\"card col-10\">";
            echo "<div class=\"row\">";
            echo "<div class=\"col-4\">";
            echo "<div class=\"card-body\">";
            echo "<h4>{$agent}</h4>";
            echo "<h6 class=\"text-muted\">Especialista em Patagônia</h6>";
            echo "<p>Contato por ligação: " . formataTelefone($tel) . "</p>";
            echo "<p>Contato por WhatsApp: " . formataTelefone($whats) . "</p>";
            echo "</div>";
            echo "</div>";
            echo "<div class=\"col-8\">";
            echo "<div class=\"card-body\">";
            echo "<h4>Faça uma introdução ao roteiro apresentado</h4>";
            echo "<textarea class=\"form-control\" name=\"intro\" placeholder=\"Utilize esse espaço para conversar com o seu cliente e justificar porquê você fez as escolhas dos serviços inclusos, quais são os diferencias e vantagens deste roteiro. Esta mensagem será a introdução ao orçamento apresentado pro seu cliente\" rows=\"5\">{$val}</textarea>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</br>";
        }

        public function Infos($city, $in, $out, $name, $adt, $chd, $val){

            function inverteData($data){
                if(count(explode("/",$data)) > 1){
                    return implode("-",array_reverse(explode("/",$data)));
                }elseif(count(explode("-",$data)) > 1){
                    return implode("/",array_reverse(explode("-",$data)));
                }
            }
            $city = explode("|", $city);
            $in = explode("|", $in);
            $out = explode("|", $out);
            $ida = $in[0];
            $volta = end($out);
            echo "<div class=\"row justify-content-center\">";
            echo "<div class=\"card col-10\">";
            echo "<div class=\"row\">";
            echo "<div class=\"col-4\">";
            echo "<div class=\"card-body\">";
            echo "<h5>Cidades</h5>";
            $count = 0;
            while(isset($city["$count"])){
                echo "<h6>- " . City::getbyId($city["$count"]) . "</h6>";
                echo "<p>De " . inverteData($in["$count"]) . " até " . inverteData($out["$count"]) . "</p>";
                $count++;
            }
            echo "</div>";
            echo "</div>";
            echo "<div class=\"col-8\">";
            echo "<div class=\"card-body\">";
            if (strpos($name, ';') !== false) { 
                $name = explode(";", $name);
                echo "<h5> Pacote dos clientes {$name[0]} e {$name[1]}</h5>";
                echo "<h6 class=\"text-muted\">Informações Gerais</h6>";
            }
            else{
                echo "<h5>Pacote do cliente {$name}</h5>";
                echo "<h6 class=\"text-muted\">Informações Gerais</h6>";
            }
            if($chd > 0){
                if($adt > 1){
                    if($chd > 1){
                        echo "<p>Viagem para {$adt} adultos e {$chd} crianças</p";
                    }
                    else{
                        echo "<p>Viagem para {$adt} adultos e {$chd} criança</p";
                    }
                }
                else{
                    if($chd > 1){
                        echo "<p>Viagem para {$adt} adulto e {$chd} crianças</p";
                    }
                    else{
                        echo "<p>Viagem para {$adt} adulto e {$chd} criança</p";
                    }
                }
            }
            else{
                if($adt > 1){
                    echo "<p>Viagem para {$adt} adultos</p";
                }
                else{
                    echo "<p>Viagem para {$adt} adulto</p>";
                }
            }
            echo "<input type=\"text\" class=\"form-control\" name=\"titulo\" value=\"{$val}\" placeholder=\"Titulo deste orçamento\">";
            echo "<p>Com ida dia " . inverteData($ida) . " e volta dia " . inverteData($volta) . "</p";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</br>";
        }

        public function Geral($city, $in, $out, $name, $adt, $chd, $titulo, $intro){

            function inverteData($data){
                if(count(explode("/",$data)) > 1){
                    return implode("-",array_reverse(explode("/",$data)));
                }elseif(count(explode("-",$data)) > 1){
                    return implode("/",array_reverse(explode("-",$data)));
                }
            }
            $city = explode("|", $city);
            $in = explode("|", $in);
            $out = explode("|", $out);
            $ida = $in[0];
            $volta = end($out);
            echo "<div class=\"card\">";
            echo "<div class=\"row\">";
            echo "<div class=\"col-6\">";
            echo "<div class=\"card-body\">";
            if (strpos($name, ';') !== false) { 
                $name = explode(";", $name);
                echo "<h4 class=\"text-primary\"> Roteiro de viagem especial para {$name[0]} e {$name[1]}</h5>";
            }
            else{
                echo "<h4 class=\"text-primary\">Roteiro de viagem especial para {$name}</h5>";
            }
            echo "<p>Período da viagem: " . inverteData($ida) . " a " . inverteData($volta) . "";
            if($chd > 0){
                if($adt > 1){
                    if($chd > 1){
                        echo "</br>Número de pessoas: {$adt} adultos e {$chd} crianças";
                    }
                    else{
                        echo "</br>Número de pessoas: {$adt} adultos e {$chd} criança";
                    }
                }
                else{
                    if($chd > 1){
                        echo "</br>Número de pessoas: {$adt} adulto e {$chd} crianças";
                    }
                    else{
                        echo "</br>Número de pessoas: {$adt} adulto e {$chd} criança";
                    }
                }
            }
            else{
                if($adt > 1){
                    echo "</br>Número de pessoas: {$adt} adultos";
                }
                else{
                    echo "</br>Número de pessoas: {$adt} adulto";
                }
            }
            echo "</p>";
            echo "<h5>Destinos visitados</h5><p>";
            $count = 0;
            while(isset($city["$count"])){
                if(null !== City::getbyId($city["$count"])){
                    if($count >= 1){
                        echo "</br>";
                    }
                    echo "<b> " . City::getbyId($city["$count"]) . " </b> de " . substr(inverteData($in["$count"]), 0, -5) . " a " . substr(inverteData($out["$count"]), 0, -5) . "";
                    $count++;
                }
            }
            echo "</p>";
            echo "</div>";
            echo "</div>";
            echo "<div class=\"col-6\">";
            echo "<div class=\"card-body\">";
            echo "<p>" . nl2br($intro) . "</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }

        public function Serviço($city, $in, $out, $tour){
            function getNights($inn, $outt){
                $in = strtotime("$inn"); 
                $out = strtotime("$outt"); 
                $ng = $out - $in; 
                return round($ng / 86400);
            }
            echo "<div class=\"row justify-content-center\">";
            echo "<div class=\"card col-8\">";
            echo "<h4 class=\"text-center\">Serviços Inclusos:</h4>";
            echo "<h6 class=\"text-center text-danger\">Confira com atenção os serviços e marque e desmarque alguns serviços caso não esteja correto</h6>";
            $city = explode("|", $city);
            $in = explode("|", $in);
            $out = explode("|", $out);
            $count = 0;
            while(isset($city[$count])){
                echo "<h5 class=\"text-muted\">Serviços em " . City::getbyId($city["$count"]) . "</h5>";
                echo "<ul class=\"list-unstyled\">";
                if($count == 0){
                    echo "<li>- Passagem áerea no trecho: Brasil - " . City::getbyId($city["$count"]) . "</li>";
                }
                else{
                    $ct = $count - 1;
                    echo "<li>- Passagem áerea no trecho: " . City::getbyId($city["$ct"]) . " - " . City::getbyId($city["$count"]) . "</li>";
                }
                echo "<li>- " . getNights($in[$count], $out[$count]) . " Noites de hotel em " . City::getbyId($city["$count"]) . " conforme opções abaixo</li>";
                echo "<li>- Traslado do aeroporto ao hotel na chegada em " . City::getbyId($city["$count"]) . "</li>";
                echo "<li>- Traslado do hotel ao aeroporto na saída de " . City::getbyId($city["$count"]) . "</li>";
                foreach($tour as $tr){
                    $daytr = explode(";", $tr);
                    foreach($daytr as $tor){
                        if (strpos($tor, 's') === false) {
                            @$cy = Tour::getbyId($tor, "idCity");
                            if($cy == $city[$count]){
                                $string = Tour::getService($tor);
                                echo "<li>- " . $string . "</li>";
                            }
                        }
                    }
                }
                $count++;
                echo "</ul>";
            }
            echo "<h5 class=\"text-muted\">Serviços Gerais</h5>";
            echo "<ul class=\"list-unstyled\">";
            echo "<li><input class=\"form-check-input\" type=\"checkbox\" value=\"1\" name=\"ch0\" checked>";
            echo "<label class=\"form-check-label\">- Seguro de viagem válido por todo período</label></li>";
            echo "<li><input class=\"form-check-input\" type=\"checkbox\" value=\"2\" name=\"ch1\" checked>";
            echo "<label class=\"form-check-label\">- Adicional de franquia de até 32kg de bagagem</label></li>";
            echo "<li><input class=\"form-check-input\" type=\"checkbox\" value=\"3\" name=\"ch2\" checked>";
            echo "<label class=\"form-check-label\">- Assistência personalizada do nosso fornecedor local em todos os destinos</label></li>";           
            echo "</ul>";
            echo "<h5 class=\"text-muted\">Serviços Não inclusos</h5>";
            echo "<ul class=\"list-unstyled\">";
            echo "<li><input class=\"form-check-input\" type=\"checkbox\" value=\"4\" name=\"ch9\" checked>";
            echo "<label class=\"form-check-label\">- Early check-in</label></li>";
            echo "<li><input class=\"form-check-input\" type=\"checkbox\" value=\"5\" name=\"ch8\" checked>";
            echo "<label class=\"form-check-label\">- Late check-out</label></li>";
            echo "<li><input class=\"form-check-input\" type=\"checkbox\" value=\"6\" name=\"ch7\" checked>";
            echo "<label class=\"form-check-label\">- Serviços não mencionados acima</label></li>";
            echo "<li><input class=\"form-check-input\" type=\"checkbox\" value=\"7\" name=\"ch6\" checked>";
            echo "<label class=\"form-check-label\">- Alimentação e gastos de uso pessoal</label></li>";           
            echo "</ul>";
            echo "</div>";
            echo "</div>";
            echo "</br>";
        }

        public function ServiçoUpdate($city, $in, $out, $tour, $yes, $no){
            function getNights($inn, $outt){
                $in = strtotime("$inn"); 
                $out = strtotime("$outt"); 
                $ng = $out - $in; 
                return round($ng / 86400);
            }
            echo "<div class=\"row justify-content-center\">";
            echo "<div class=\"card col-8\">";
            echo "<h4 class=\"text-center\">Serviços Inclusos:</h4>";
            echo "<h6 class=\"text-center text-danger\">Confira com atenção os serviços e marque e desmarque alguns serviços caso não esteja correto</h6>";
            $city = explode("|", $city);
            $in = explode("|", $in);
            $out = explode("|", $out);
            $count = 0;
            while(isset($city[$count])){
                echo "<h5 class=\"text-muted\">Serviços em " . City::getbyId($city["$count"]) . "</h5>";
                echo "<ul class=\"list-unstyled\">";
                if($count == 0){
                    echo "<li>- Passagem áerea no trecho: Brasil - " . City::getbyId($city["$count"]) . "</li>";
                }
                else{
                    $ct = $count - 1;
                    echo "<li>- Passagem áerea no trecho: " . City::getbyId($city["$ct"]) . " - " . City::getbyId($city["$count"]) . "</li>";
                }
                echo "<li>- " . getNights($in[$count], $out[$count]) . " Noites de hotel em " . City::getbyId($city["$count"]) . " conforme opções abaixo</li>";
                echo "<li>- Traslado do aeroporto ao hotel na chegada em " . City::getbyId($city["$count"]) . "</li>";
                echo "<li>- Traslado do hotel ao aeroporto na saída de " . City::getbyId($city["$count"]) . "</li>";
                foreach($tour as $tr){
                    $daytr = explode(";", $tr);
                    foreach($daytr as $tor){
                        if (strpos($tor, 's') === false) {
                            @$cy = Tour::getbyId($tor, "idCity");
                            if($cy == $city[$count]){
                                $string = Tour::getService($tor);
                                echo "<li>- " . $string . "</li>";
                            }
                        }
                    }
                }
                $count++;
                echo "</ul>";
            }
            if((strpos($yes, '1') !== false)){ $ch1 = "checked";}else{ $ch1 = "";};
            if((strpos($yes, '2') !== false)){ $ch2 = "checked";}else{ $ch2 = "";};
            if((strpos($yes, '3') !== false)){ $ch3 = "checked";}else{ $ch3 = "";}
            if((strpos($no, '4') !== false)){ $ch4 = "checked";}else{ $ch4 = "";}
            if((strpos($no, '5') !== false)){ $ch5 = "checked";}else{ $ch5 = "";}
            if((strpos($no, '6') !== false)){ $ch6 = "checked";}else{ $ch6 = "";}
            if((strpos($no, '7') !== false)){ $ch7 = "checked";}else{ $ch7 = "";}
            echo "<h5 class=\"text-muted\">Serviços Gerais</h5>";
            echo "<ul class=\"list-unstyled\">";
            echo "<li><input class=\"form-check-input\" type=\"checkbox\" value=\"1\" name=\"ch0\" $ch1>";
            echo "<label class=\"form-check-label\">- Seguro de viagem válido por todo período</label></li>";
            echo "<li><input class=\"form-check-input\" type=\"checkbox\" value=\"2\" name=\"ch1\" $ch2>";
            echo "<label class=\"form-check-label\">- Adicional de franquia de até 32kg de bagagem</label></li>";
            echo "<li><input class=\"form-check-input\" type=\"checkbox\" value=\"3\" name=\"ch2\" $ch3>";
            echo "<label class=\"form-check-label\">- Assistência personalizada do nosso fornecedor local em todos os destinos</label></li>";           
            echo "</ul>";
            echo "<h5 class=\"text-muted\">Serviços Não inclusos</h5>";
            echo "<ul class=\"list-unstyled\">";
            echo "<li><input class=\"form-check-input\" type=\"checkbox\" value=\"4\" name=\"ch9\" $ch4>";
            echo "<label class=\"form-check-label\">- Early check-in</label></li>";
            echo "<li><input class=\"form-check-input\" type=\"checkbox\" value=\"5\" name=\"ch8\" $ch5>";
            echo "<label class=\"form-check-label\">- Late check-out</label></li>";
            echo "<li><input class=\"form-check-input\" type=\"checkbox\" value=\"6\" name=\"ch7\" $ch6>";
            echo "<label class=\"form-check-label\">- Serviços não mencionados acima</label></li>";
            echo "<li><input class=\"form-check-input\" type=\"checkbox\" value=\"7\" name=\"ch6\" $ch7>";
            echo "<label class=\"form-check-label\">- Alimentação e gastos de uso pessoal</label></li>";           
            echo "</ul>";
            echo "</div>";
            echo "</div>";
            echo "</br>";
        }

        public function Serviços($city, $in, $out, $tour, $yes, $no){
            function getNights($inn, $outt){
                $in = strtotime("$inn"); 
                $out = strtotime("$outt"); 
                $ng = $out - $in; 
                return round($ng / 86400);
            }
            echo "<div class=\"card\">";
            echo "<div class=\"row \">";
            echo "<div class=\"col\">";
            echo "<div class=\"card-body\">";
            echo "<h4 class=\"text-center text-primary\">Serviços inclusos:</h4>";
            $city = explode("|", $city);
            $in = explode("|", $in);
            $out = explode("|", $out);
            $count = 0;
            while(isset($city[$count])){
                echo "<h5 class=\"text-muted\">" . City::getbyId($city["$count"]) . ":</h5>";
                echo "<ul class=\"list-unstyled\">";
                if($count == 0){
                    echo "<li>- Passagem áerea no trecho: Brasil - " . City::getbyId($city["$count"]) . "</li>";
                }
                else{
                    $ct = $count - 1;
                    echo "<li>- Passagem áerea no trecho: " . City::getbyId($city["$ct"]) . " - " . City::getbyId($city["$count"]) . "</li>";
                }
                echo "<li>- " . getNights($in[$count], $out[$count]) . " Noites de hotel em " . City::getbyId($city["$count"]) . " conforme opções abaixo</li>";
                echo "<li>- Traslado do aeroporto ao hotel na chegada em " . City::getbyId($city["$count"]) . "</li>";
                echo "<li>- Traslado do hotel ao aeroporto na saída de " . City::getbyId($city["$count"]) . "</li>";
                foreach($tour as $tr){
                    $daytr = explode(";", $tr);
                    foreach($daytr as $tor){
                        if (strpos($tor, 's') === false) {
                            @$cy = Tour::getbyId($tor, "idCity");
                            if($cy == $city[$count]){
                                $string = Tour::getService($tor);
                                echo "<li>- " . $string . "</li>";
                            }
                        }
                    }
                }
                $count++;
                echo "</ul>";
            }
            if((strpos($yes, '1') !== false)){ $ch1 = "1";}else{ $ch1 = "";};
            if((strpos($yes, '2') !== false)){ $ch2 = "1";}else{ $ch2 = "";};
            if((strpos($yes, '3') !== false)){ $ch3 = "1";}else{ $ch3 = "";}
            if((strpos($no, '4') !== false)){ $ch4 = "1";}else{ $ch4 = "";}
            if((strpos($no, '5') !== false)){ $ch5 = "1";}else{ $ch5 = "";}
            if((strpos($no, '6') !== false)){ $ch6 = "1";}else{ $ch6 = "";}
            if((strpos($no, '7') !== false)){ $ch7 = "1";}else{ $ch7 = "";}
            echo "<h5 class=\"text-muted\">Geral:</h5>";
            echo "<ul class=\"list-unstyled\">";
            if($ch1 == 1){
                echo "<li>- Seguro de viagem válido por todo período</li>";
            }
            if($ch2 == 1){
                echo "<li>- Adicional de franquia de até 32kg de bagagem</li>";
            }
            if($ch3 == 1){
                echo "<li>- Assistência personalizada do nosso fornecedor local em todos os destinos</li>";
            }          
            echo "</ul>";
            echo "<h5 class=\"text-muted\">Serviços Não inclusos:</h5>";
            echo "<ul class=\"list-unstyled\">";
            if($ch4 == 1){
                echo "<li>- Early check-in</li>";
            }
            if($ch5 == 1){
                echo "<li>- Late check-out</li>";
            }
            if($ch6 == 1){
                echo "<li>- Serviços não mencionados acima</li>";
            } 
            if($ch7 == 1){
                echo "<li>- Alimentação e gastos de uso pessoal</li>";
            }            
            echo "</ul>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }

        public function Aereo($path){
            echo "<div class=\"card\">";
            echo "<div class=\"row justify-content-center\">";
            echo "<div class=\"col-7\">";
            echo "<h4 class=\"text-center text-primary\">Aéreo</h4>";
            echo "<a href=\"#\" id=\"link1\" data-toggle=\"modal\" data-target=\"#myModal\"><img src=\"{$path}\" class=\"card-img img-responsive\"></a>";    
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }

        public function Dayby($day, $tour, $text, $adt, $chd, $idday){
            $count = 0;
            while(isset($day[$count])){
                echo "<div class=\"row justify-content-center\">";
                echo "<div class=\"card col-10\">";
                echo "<div class=\"row\">";
                $tr = explode(";", $tour[$count]);
                $cx = 0;
                foreach($tr as $id){
                    if($id != null){
                        @$idtc = contentTour::getbyId($id, "id");
                        @$intro = contentTour::getbyId($id, "intro");
                        echo "<div class=\"col-8\">";
                        echo "<div class=\"card-body\">";
                        if($cx == 0){
                            echo "<h4>Dia " . inverteData($day[$count]) . "</h4>";
                            $cx = 1;
                        }
                        echo "<p>{$text[$count]}</p>";
                        if(strpos($id, "s") === false){
                            echo "<h6 class=\"text-muted\">" . Tour::getbyId($id, "name") . "</h6>";
                            echo "<p>{$intro}</p>";
                        }
                        else{
                            echo "<h6>Passeio sugerido para este pacote:</h6>";
                            echo "<input type=\"hidden\" name=\"sug[]\" value=\"{$idday[$count]}\">";
                            echo "<input type=\"text\" class=\"form-control\" name=\"adt[]\" placeholder=\"Preço desse passeio para adultos\"></br>";
                            if($chd > 0){
                                echo "<input type=\"text\" class=\"form-control\" name=\"chd[]\" placeholder=\"Preço desse passeio para crianças\"></br>";
                            }
                            echo "<h6 class=\"text-muted\">" . Tour::getbyId($id, "name") . "</h6>";
                            echo "<p>{$intro}</p>";
                        }
                        echo "</div>";
                        echo "</div>";
                        echo "<div class=\"col-4\">";
                        echo "<div class=\"card-body\">";
                        if(strpos($id, "s") === false){
                            if($idtc !== null){
                                if(null !== ($path = Tour::getArrayPath($idtc, 10))){
                                    echo "<img src=\"{$path[0]}\" class=\"card-img\">";
                                }
                            }
                        }
                        else{
                            if($idtc !== null){
                                if(null !== ($path = Tour::getArrayPath($idtc, 10))){
                                    echo "<img src=\"{$path[0]}\" class=\"card-img\">";
                                }
                            }
                        }
                        echo "</div>";
                        echo "</div>";
                    }
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</br>";
                $count++;
            }   
        }

        public function DaybyDay($day, $tour, $text, $adt, $chd, $idday, $rsug, $radt, $rchd, $cambio, $crr){
            $count = 0;
            $ctt = 0;
            $ct = 0;
            $tip = 1;
            foreach($day as $d){
                echo "<div class=\"card\">";
                echo "<div class=\"row\">";
                if($tip == 1){
                    echo "<div class=\"col-12\">";
                    echo "<div class=\"card-body\">";
                    echo "<h4 class=\"text-center text-primary\">Roteiro planejado</h4>";
                    echo "</div>";
                    echo "</div>";
                }
                echo "<div class=\"col-8\">";
                echo "<div class=\"card-body\">";
                echo "<h4>Dia {$tip} - " . substr(inverteData($d), 0, -5) . "</h4>";
                $tip++;
                echo "<p>{$text[$count]}</p>";
                if(isset($tour[$count]) && strlen($tour[$count]) > 1){
                    $collapse = "collapse" . $ctt;
                    @$idtc = contentTour::getbyId($tour[$count], "id");
                    @$intro = contentTour::getbyId($tour[$count], "intro");
                    @$body = contentTour::getbyId($tour[$count], "body");
                    if(strpos($tour[$count], "s") === false){
                        echo "<h6 class=\"text-muted\">" . Tour::getbyId($tour[$count], "name") . "</h6>";
                        echo "<p>{$intro}</p>";
                    }
                    else{
                        echo "<h5>Dia Livre. Para aproveitar esse dias sugerimos os seguintes passeios</h5>";
                        if(strpos($rsug, $idday[$count]) !== false){
                            echo "<input type=\"hidden\" name=\"sug[]\" value=\"{$idday[$count]}\">";
                            echo "<h6>Passeio Sugerido: <span class=\"text-muted\">" . Tour::getbyId($tour[$count], "name") . "</span></h6>";
                            $arrad = explode(";", $radt);
                            if($crr == 1){
                                $ad = $arrad[$ct] / $cambio;
                                echo "<p>Preço por adulto: U$ " .number_format($ad,  2, ',', '.'). "</br>";
                                if($chd > 0){
                                    $arrac = explode(";", $rchd);
                                    $cl = $arrac[$ct] / $cambio;
                                    echo "Preço por criança: U$ " .number_format($cl,  2, ',', '.');
                                }
                            }
                            else{
                                $ad = $arrad[$ct];
                                echo "<p>Preço por adulto: R$ " .number_format($ad,  2, ',', '.'). "</br>";
                                if($chd > 0){
                                    $arrac = explode(";", $rchd);
                                    $cl = $arrac[$ct];
                                    echo "Preço por criança: R$ " .number_format($cl,  2, ',', '.');
                                }
                            }
                            echo "</p>";
                            echo "<p>{$intro}</p>";
                            $ct++;
                        }
                    }
                    echo "<a class=\"btn btn-primary\" data-toggle=\"collapse\" href=\"#{$collapse}\" role=\"button\" aria-expanded=\"false\" aria-controls=\"{$collapse}\">Descritivo do passeio</a>";
                    echo "<div class=\"collapse\" id=\"{$collapse}\">";
                    echo "</br><p>" . nl2br($body) . "</p>";
                    echo "</div>";
                }
                else{
                    echo "<h5>Dia livre</h5>";
                }
                echo "</div>";
                echo "</div>";
                echo "<div class=\"col-4\">";
                echo "<div class=\"card-body\">";
                if(isset($tour[$count]) && strlen($tour[$count]) > 1){
                    @$idtc = contentTour::getbyId($tour[$count], "id");
                    if($idtc !== null){
                        if(null !== ($path = Tour::getArrayPath($idtc, 10))){
                            echo "<a href=\"#\" id=\"link1\" data-toggle=\"modal\" data-target=\"#myModal\"><img src=\"{$path[0]}\" height=\"150\" width=\"100\" class=\"card-img img-responsive\"></a>";
                        }
                    }
                    if($idtc !== null){
                        if(null !== ($path = Tour::getArrayPath($idtc, 10))){
                            echo "<a href=\"#\" id=\"link1\" data-toggle=\"modal\" data-target=\"#myModal\"><img src=\"{$path[1]}\" height=\"150\" width=\"100\" class=\"card-img img-responsive mt-2\"></a>";
                        }
                    }
                    $ctt++;
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                $count++;
            }  
        }

        public function DaybyUpdate($day, $tour, $text, $adt, $chd, $idday, $rsug, $radt, $rchd){
            $count = 0;
            $ct = 0;
            while(isset($day[$count])){
                echo "<div class=\"row justify-content-center\">";
                echo "<div class=\"card col-10\">";
                echo "<div class=\"row\">";
                $tr = explode(";", $tour[$count]);
                $cx = 0;
                foreach($tr as $id){
                    if($id != null){
                        @$idtc = contentTour::getbyId($id, "id");
                        @$intro = contentTour::getbyId($id, "intro");
                        echo "<div class=\"col-8\">";
                        echo "<div class=\"card-body\">";
                        if($cx == 0){
                            echo "<h4>Dia " . inverteData($day[$count]) . "</h4>";
                            $cx = 1;
                        }
                        echo "<p>{$text[$count]}</p>";
                        if(strpos($id, "s") === false){
                            echo "<h6 class=\"text-muted\">" . Tour::getbyId($id, "name") . "</h6>";
                            echo "<p>{$intro}</p>";
                        }
                        else{
                            echo "<h6>Passeio sugerido para este pacote:</h6>";
                            if(strpos($rsug, $idday[$count]) !== false){
                                echo "<input type=\"hidden\" name=\"sug[]\" value=\"{$idday[$count]}\">";
                                $arrad = explode(";", $radt);
                                echo "<input type=\"text\" class=\"form-control\" name=\"adt[]\" value=\"$arrad[$ct]\"  placeholder=\"Preço desse passeio para adultos\"></br>";
                                if($chd > 0){
                                    $arrac = explode(";", $rchd);
                                    echo "<input type=\"text\" class=\"form-control\" name=\"chd[]\" value=\"$arrac[$ct]\" placeholder=\"Preço desse passeio para crianças\"></br>";
                                }
                                echo "<h6 class=\"text-muted\">" . Tour::getbyId($id, "name") . "</h6>";
                                echo "<p>{$intro}</p>";
                                $ct++;
                            }
                            else{
                                echo "<input type=\"hidden\" name=\"sug[]\" value=\"{$idday[$count]}\">";
                                echo "<input type=\"text\" class=\"form-control\" name=\"adt[]\" placeholder=\"Preço desse passeio para adultos\"></br>";
                                if($chd > 0){
                                    echo "<input type=\"text\" class=\"form-control\" name=\"chd[]\" placeholder=\"Preço desse passeio para crianças\"></br>";
                                }
                                echo "<h6 class=\"text-muted\">" . Tour::getbyId($id, "name") . "</h6>";
                                echo "<p>{$intro}</p>";
                            }
                        }
                        echo "</div>";
                        echo "</div>";
                        echo "<div class=\"col-4\">";
                        echo "<div class=\"card-body\">";
                        if(strpos($id, "s") === false){
                            if($idtc !== null){
                                if(null !== ($path = Tour::getArrayPath($idtc, 10))){
                                    echo "<img src=\"{$path[0]}\" class=\"card-img\">";
                                }
                            }
                        }
                        else{
                            if($idtc !== null){
                                if(null !== ($path = Tour::getArrayPath($idtc, 10))){
                                    echo "<img src=\"{$path[0]}\" class=\"card-img\">";
                                }
                            }
                        }
                        echo "</div>";
                        echo "</div>";
                    }
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</br>";
                $count++;
            }   
        }

        public function Valores($hotel, $room, $cat, $price, $chd){
            $ct = 0;
            foreach($hotel as $hot){
                $fam = "fam" . $ct;
                $ht = explode(";", $hot);
                $rm = explode(";", $room[$ct]);
                $ctg = explode(";", $cat[$ct]);
                $pr = explode(";", $price[$ct]);
                if($ct == 0){
                    if(isset($pr[2])){
                        $taxa = $pr[2];
                    }
                    else{
                        $taxa = $pr[1];
                    }
                }
                $count = 0;
                echo "<div class=\"row justify-content-center\">";
                echo "<div class=\"card col-10\">";
                echo "<div class=\"row \">";
                echo "<div class=\"col-12 text-center\">";
                echo "<div class=\"card-body\">";
                echo "<input type=\"text\" class=\"form-control\" name=\"name[]\" placeholder=\"Nome do Pacote EX: Pacote Ecônomico\"></br>";
                echo "<h5>Preço por pessoa</h5>";
                echo "<input class=\"form-check-input\" type=\"checkbox\" name=\"{$fam}\">";
                echo "<label class=\"form-check-label\">Trocar por preço por família</label>";
                if($chd > 0){
                    echo "<h6>R$ {$pr[0]} por adulto, R$ {$pr[1]} por criança e mais R$ {$taxa} de taxa de embarque</h6>";
                }
                else{
                    echo "<h6>R$ {$pr[0]} por pessoa mais R$ {$taxa} de taxa de embarque</h6>";
                }
                echo "<input type=\"text\" class=\"form-control\" name=\"pay[]\" placeholder=\"Forma de Pagamento\" value=\"Entrada + saldo em até 10x sem juros\"></br>";
                echo "</div>";  
                echo "</div>";  
                while(isset($ht[$count])){
                    $idc = contentHotel::getbyId($ht[$count], "id");
                    echo "<div class=\"col-4\">";
                    echo "<div class=\"card-body\">";
                    echo "<h6>". Hotel::getbyId($ht[$count], "name") ." de ". Hotel::getbyId($ht[$count], "stars") ." estrelas</h6>";
                    echo "<h6>Hospedagem em quarto {$rm[$count]}</h6>";
                    echo "<h6>De categoria {$ctg[$count]}</h6>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class=\"col-4\">";
                    echo "<div class=\"card-body\">";
                    if($idc != null){
                        if(null !== ($path = Tour::getArrayPath($idc, 15))){
                            echo "<img src=\"{$path[0]}\" class=\"card-img\">";
                        }
                    }
                    echo "</div>";
                    echo "</div>";
                    echo "<div class=\"col-4\">";
                    echo "<div class=\"card-body\">";
                    if(null !== ($path = Tour::getArrayPath($idc, 15))){
                        echo "<img src=\"{$path[1]}\" class=\"card-img\">";
                    }
                    echo "</div>";
                    echo "</div>";
                    $count++;
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</br>";
                $ct++;
            }
        }

        public function ValoresUpdate($hotel, $room, $cat, $price, $chd, $fam, $name, $pay){
            $ct = 0;
            $ct1 = 1;
            $name = explode(";", $name);
            $pay = explode(";", $pay);
            if((strpos($fam, '1') !== false)){ $c1 = 1;}else{ $c1 = 0;}
            if((strpos($fam, '2') !== false)){ $c2 = 1;}else{ $c2 = 0;}
            if((strpos($fam, '3') !== false)){ $c3 = 1;}else{ $c3 = 0;}
            foreach($hotel as $hot){
                $fam = "fam" . $ct;
                $ht = explode(";", $hot);
                $rm = explode(";", $room[$ct]);
                $ctg = explode(";", $cat[$ct]);
                $pr = explode(";", $price[$ct]);
                if($ct == 0){
                    if(isset($pr[2])){
                        $taxa = $pr[2];
                    }
                    else{
                        $taxa = $pr[1];
                    }
                }
                $count = 0;
                echo "<div class=\"row justify-content-center\">";
                echo "<div class=\"card col-10\">";
                echo "<div class=\"row \">";
                echo "<div class=\"col-12 text-center\">";
                echo "<div class=\"card-body\">";
                if(isset($name[$ct])){
                    echo "<input type=\"text\" class=\"form-control\" name=\"name[]\" value=\"$name[$ct]\" placeholder=\"Nome do Pacote EX: Pacote Ecônomico\"></br>";
                }
                else{
                    echo "<input type=\"text\" class=\"form-control\" name=\"name[]\" value=\"\" placeholder=\"Nome do Pacote EX: Pacote Ecônomico\"></br>";
                }
                echo "<h5>Preço por pessoa</h5>";
                if($ct1 == 1){
                    if($c1 == 1){
                        echo "<input class=\"form-check-input\" type=\"checkbox\" name=\"{$fam}\" checked>";
                    }
                    else{
                        echo "<input class=\"form-check-input\" type=\"checkbox\" name=\"{$fam}\">";
                    }
                }
                elseif($ct1 == 2){
                    if($c2 == 1){
                        echo "<input class=\"form-check-input\" type=\"checkbox\" name=\"{$fam}\" checked>";
                    }
                    else{
                        echo "<input class=\"form-check-input\" type=\"checkbox\" name=\"{$fam}\">";
                    }
                }
                elseif($ct1 == 3){
                    if($c3 == 1){
                        echo "<input class=\"form-check-input\" type=\"checkbox\" name=\"{$fam}\" checked>";
                    }
                    else{
                        echo "<input class=\"form-check-input\" type=\"checkbox\" name=\"{$fam}\">";
                    }
                }
                echo "<label class=\"form-check-label\">Trocar por preço por família</label>";
                if($chd > 0){
                    echo "<h6>R$ {$pr[0]} por adulto, R$ {$pr[1]} por criança e mais R$ {$taxa} de taxa de embarque</h6>";
                }
                else{
                    echo "<h6>R$ {$pr[0]} por pessoa mais R$ {$taxa} de taxa de embarque</h6>";
                }
                if(isset($pay[$ct])){
                    echo "<input type=\"text\" class=\"form-control\" value=\"$pay[$ct]\" name=\"pay[]\" placeholder=\"Forma de Pagamento\"></br>";
                }
                else{
                    echo "<input type=\"text\" class=\"form-control\" value=\"\" name=\"pay[]\" placeholder=\"Forma de Pagamento\"></br>";
                }
                echo "</div>";  
                echo "</div>";  
                while(isset($ht[$count])){
                    $idc = contentHotel::getbyId($ht[$count], "id");
                    echo "<div class=\"col-4\">";
                    echo "<div class=\"card-body\">";
                    echo "<h6>". Hotel::getbyId($ht[$count], "name") ." de ". Hotel::getbyId($ht[$count], "stars") ." estrelas</h6>";
                    echo "<h6>Hospedagem em quarto {$rm[$count]}</h6>";
                    echo "<h6>De categoria {$ctg[$count]}</h6>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class=\"col-4\">";
                    echo "<div class=\"card-body\">";
                    if($idc != null){
                        if(null !== ($path = Tour::getArrayPath($idc, 15))){
                            echo "<img src=\"{$path[0]}\" class=\"card-img\">";
                        }
                    }
                    echo "</div>";
                    echo "</div>";
                    echo "<div class=\"col-4\">";
                    echo "<div class=\"card-body\">";
                    if(null !== ($path = Tour::getArrayPath($idc, 15))){
                        echo "<img src=\"{$path[1]}\" class=\"card-img\">";
                    }
                    echo "</div>";
                    echo "</div>";
                    $count++;
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</br>";
                $ct++;
                $ct1++;
            }
        }

        public function ValoresFinal($hotel, $room, $cat, $price, $chd, $fam, $name, $pay, $adt, $whats, $cambio, $crr){
            $ct = 0;
            $ct1 = 1;
            $ctl = 1;
            $name = explode(";", $name);
            $pay = explode(";", $pay);
            if((strpos($fam, '1') !== false)){ $c1 = 1;}else{ $c1 = 0;}
            if((strpos($fam, '2') !== false)){ $c2 = 1;}else{ $c2 = 0;}
            if((strpos($fam, '3') !== false)){ $c3 = 1;}else{ $c3 = 0;}
            foreach($hotel as $hot){    
                $fam = "fam" . $ct;
                $ht = explode(";", $hot);
                $rm = explode(";", $room[$ct]);
                $ctg = explode(";", $cat[$ct]);
                $pr = explode(";", $price[$ct]);
                if($ct == 0){
                    if(isset($pr[2])){
                        $taxa = $pr[2];
                        if($crr == 1){
                            $taxa = $taxa / $cambio;
                        }
                    }
                    else{
                        $taxa = $pr[1];
                        if($crr == 1){
                            $taxa = $taxa / $cambio;
                        }
                    }
                }
                $count = 0;
                echo "<div class=\"card\">";
                echo "<div class=\"row\">";
                if($ct == 0){
                    echo "</br><div class=\"col-12\">";
                    echo "<h4 class=\"text-center text-primary\">Investimento</h4>";
                    echo "</div>";
                }
                echo "<div class=\"col-12\">";
                echo "<div class=\"card-body\">";
                echo "<h4>Opção {$ctl}: {$name[$ct]}</h4>";
                echo "</div>";  
                echo "</div>";  
                echo "<div class=\"col-12 mb-4\">";
                echo "<div class=\"row justify-content-center\">";
                echo "<div class=\"col-8\">";
                echo "<div class=\"card-body align-items-center d-flex justify-content-center\"></br>";
                echo "<a href=\"#\" class=\"btn btn-dark text-center btn-lg disabled\" role=\"button\" aria-disabled=\"true\">";
                $ctl++;
                if($ct1 == 1){
                    if($c1 == 1){
                        echo "<h5 class=\"text-center\">Preço total por família</h5>";
                        if($chd > 0){
                            $tt = $pr[0] * $adt;
                            $ttt = $pr[1] * $chd;
                            $tttt = $tt + $ttt;
                            $cr = "R$";
                            if($crr == 1){
                                $tttt = $tttt / $cambio;
                                $cr = "U$";
                            }
                            echo "<h6 class=\"text-center\">$cr " .number_format($tttt,  2, ',', '.'). " + $cr " .number_format($taxa,  2, ',', '.'). " de taxas</h6>";
                        }
                        else{
                            $tt = $pr[0] * $adt;
                            $cr = "R$";
                            if($crr == 1){
                                $tt = $tt / $cambio;
                                $cr = "U$";
                            }
                            echo "<h6 class=\"text-center\">$cr " .number_format($tt,  2, ',', '.'). " + $cr " .number_format($taxa,  2, ',', '.'). " de taxas</h6>";
                        }
                    }
                    else{
                        echo "<h5 class=\"text-center\">Preço total por pessoa</h5>";
                        if($chd > 0){
                            $cr = "R$";
                            if($crr == 1){
                                $pr[0] = $pr[0] / $cambio;
                                $pr[1] = $pr[1] / $cambio;
                                $cr = "U$";
                            }
                            echo "<h6 class=\"text-center\">$cr " .number_format($pr[0],  2, ',', '.'). " por adulto, $cr " .number_format($pr[1],  2, ',', '.'). " por criança + $cr " .number_format($taxa,  2, ',', '.'). " de taxas</h6>";
                        }
                        else{
                            $cr = "R$";
                            if($crr == 1){
                                $pr[0] = $pr[0] / $cambio;
                                $cr = "U$";
                            }
                            echo "<h6 class=\"text-center\">$cr " .number_format($pr[0],  2, ',', '.'). " por adulto + $cr " .number_format($taxa,  2, ',', '.'). " de taxas</h6>";
                        }
                    }
                }
                elseif($ct1 == 2){
                    if($c2 == 1){
                        echo "<h5 class=\"text-center\">Preço total por família</h5>";
                        if($chd > 0){
                            $cr = "R$";
                            $tt = $pr[0] * $adt;
                            $ttt = $pr[1] * $chd;
                            $tttt = $tt + $ttt;
                            if($crr == 1){
                                $tttt = $tttt / $cambio;
                                $cr = "U$";
                            }
                            echo "<h6 class=\"text-center\">$cr " .number_format($tttt, 2, ',', '.'). " + $cr " .number_format($taxa,  2, ',', '.'). " de taxas</h6>";
                        }
                        else{
                            $cr = "R$";
                            $tt = $pr[0] * $adt;
                            if($crr == 1){
                                $tt = $tt / $cambio;
                                $cr = "U$";
                            }
                            echo "<h6 class=\"text-center\">$cr " .number_format($tt,  2, ',', '.'). " + $cr " .number_format($taxa,  2, ',', '.'). " de taxas</h6>";
                        }
                    }
                    else{
                        echo "<h5 class=\"text-center\">Preço total por pessoa</h5>";
                        if($chd > 0){
                            $cr = "R$";
                            if($crr == 1){
                                $pr[0] = $pr[0] / $cambio;
                                $pr[1] = $pr[1] / $cambio;
                                $cr = "U$";
                            }
                            echo "<h6 class=\"text-center\">$cr " .number_format($pr[0],  2, ',', '.'). " por adulto, $cr " .number_format($pr[1],  2, ',', '.'). " por criança + $cr " .number_format($taxa,  2, ',', '.'). " de taxas</h6>";
                        }
                        else{
                            $cr = "R$";
                            if($crr == 1){
                                $pr[0] = $pr[0] / $cambio;
                                $cr = "U$";
                            }
                            echo "<h6 class=\"text-center\">$cr " .number_format($pr[0],  2, ',', '.'). " por adulto + $cr " .number_format($taxa,  2, ',', '.'). " de taxas</h6>";
                        }
                    }
                }
                elseif($ct1 == 3){
                    if($c3 == 1){
                        echo "<h5 class=\"text-center\">Preço total por família</h5>";
                        if($chd > 0){
                            $cr = "R$";
                            $tt = $pr[0] * $adt;
                            $ttt = $pr[1] * $chd;
                            $tttt = $tt + $ttt;
                            if($crr == 1){
                                $tttt = $tttt / $cambio;
                                $cr = "U$";
                            }
                            echo "<h6 class=\"text-center\">$cr " .number_format($tttt,  2, ',', '.'). " + $cr " .number_format($taxa,  2, ',', '.'). " de taxas</h6>";
                        }
                        else{
                            $cr = "R$";
                            $tt = $pr[0] * $adt;
                            if($crr == 1){
                                $tt = $tt / $cambio;
                                $cr = "U$";
                            }
                            echo "<h6 class=\"text-center\">$cr " .number_format($tt,  2, ',', '.'). " + $cr " .number_format($taxa,  2, ',', '.'). " de taxas</h6>";
                        }
                    }
                    else{
                        echo "<h5 class=\"text-center\">Preço total por pessoa</h5>";
                        if($chd > 0){
                            $cr = "R$";
                            if($crr == 1){
                                $pr[0] = $pr[0] / $cambio;
                                $pr[1] = $pr[1] / $cambio;
                                $cr = "U$";
                            }
                            echo "<h6 class=\"text-center\">$cr " .number_format($pr[0],  2, ',', '.'). " por adulto, $cr " .number_format($pr[1],  2, ',', '.'). " por criança + $cr " .number_format($taxa,  2, ',', '.'). " de taxa de embarque</h6>";
                        }
                        else{
                            $cr = "R$";
                            if($crr == 1){
                                $pr[0] = $pr[0] / $cambio;
                                $cr = "U$";
                            }
                            echo "<h6 class=\"text-center\">$cr " .number_format($pr[0],  2, ',', '.'). " por adulto + $cr " .number_format($taxa,  2, ',', '.'). " de taxa de embarque</h6>";
                        }
                    }
                }
                echo "</a>";
                echo "</div>";  
                echo "</div>";
                echo "</div>";
                echo "</div>";
                while(isset($ht[$count])){
                    $idc = contentHotel::getbyId($ht[$count], "id");
                    echo "<div class=\"col-6\">";
                    echo "<div class=\"card-body\">";
                    $cyt = Hotel::getbyId($ht[$count], "idCity");
                    echo "<h6 class=\"text-center\">Hospedagem em " .City::getbyId($cyt). ": <b>". Hotel::getbyId($ht[$count], "name") ."</b></h6>";
                    echo "<p class=\"text-center\">";
                    if(strlen($rm[$count])>3){
                        echo "Apartamento {$rm[$count]}";
                    }
                    if(strlen($ctg[$count])>3){
                        echo "/ De categoria {$ctg[$count]}";
                    }
                    echo "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class=\"col-6\">";
                    echo "<div class=\"row justify-content-center\">";
                    if($idc != null){
                        if(null !== ($path = Tour::getArrayPath($idc, 15))){
                            echo "<div class=\"col-4\">";
                            echo "<a href=\"#\" id=\"link1\" data-toggle=\"modal\" data-target=\"#myModal\"><img src=\"{$path[0]}\" width=\"100\" height=\"100\" class=\"card-img img-responsive\"></a>";
                            echo "</div>";
                        }
                        if(null !== ($path = Tour::getArrayPath($idc, 15))){
                            echo "<div class=\"col-4\">";
                            echo "<a href=\"#\" id=\"link1\" data-toggle=\"modal\" data-target=\"#myModal\"><img src=\"{$path[1]}\" width=\"100\" height=\"100\" class=\"card-img img-responsive\"></a>";
                            echo "</div>";
                        }
                        if(null !== ($path = Tour::getArrayPath($idc, 15))){
                            echo "<div class=\"col-4\">";
                            echo "<a href=\"#\" id=\"link1\" data-toggle=\"modal\" data-target=\"#myModal\"><img src=\"{$path[2]}\" width=\"100\" height=\"100\" class=\"card-img img-responsive\"></a>";
                            echo "</div>";
                        }
                    }
                    echo "</div>";
                    echo "</div>";
                    $count++;
                }
                
                echo "</div>";
                echo "</br><h5 class=\"text-center\">Forma de pagamento: <span style=\"font-weight:normal;\">{$pay[$ct]}</span></h5>";
                echo "</div>";
                $ct++;
                $ct1++;
            }
            echo "<div class=\"card\">";
            echo "<div class=\"row\">";
            echo "<div class=\"col-12\">";
            echo "<div class=\"card-body\">";
            echo "<p>Atenção:</br>Valores calculados conforme câmbio do dia (U$ $cambio)</br>Estes valores são apenas referência com base nas disponibilidades do momento que foram cotadas.</br>Os valores podem sofrer alteração sem aviso prévio. Em geral, as tarifas costumam ser flutuantes de acordo com a disponibilidade.</br>Solicite uma reserva e garanta essas condições</p>";
            echo "<p class=\"text-center\"><a target=\"_blank\" class=\"btn-lg text-dark btn btn-success\" href='https://wa.me/55{$whats}' role=\"button\"><strong>APROVEITE ESSAS CONDIÇÕES AGORA MESMO</br>Clique aqui e fale com seu agente de viagens pelo whatsapp</strong></a></p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }

        public function Depoimento($agent, $clt1, $clt2, $setor, $whats){
            $tt1 = Profile::getbyId($agent, "tt1");
            $tt2 = Profile::getbyId($agent, "tt2");
            $idp = Profile::getbyId($agent, "id");
            echo "<div class=\"card\">";
            echo "<div class=\"row\">";
            echo "<div class=\"col-12 text-center\">";
            echo "<div class=\"card-body\">";
            echo "<h4 class=\"text-primary\">Veja a opinião de nossos clientes</h4>";
            echo "</div>";
            echo "</div>";
            echo "<div class=\"col-1\">";
            echo "</div>";
            echo "<div class=\"col-4\">";
            echo "<div class=\"card-body\">";
            if(null !== ($path = Tour::getArrayPath($idp, 20))){
                echo "<img src=\"{$path[0]}\" width=\"300\" height=\"300\" class=\"card-img\">";
            }
            echo "</div>";
            echo "</div>";
            echo "<div class=\"col-6\">";
            echo "<div class=\"card-body\">";
            echo "<h5>Passageiros: $clt1</h5>";
            echo "<p>$tt1</p>";
            echo "</div>";
            echo "</div>";
            echo "<div class=\"col-1\">";
            echo "</div>";
            echo "<div class=\"col-1\">";
            echo "</div>";  
            echo "<div class=\"col-4\">";
            echo "<div class=\"card-body\">";
            if(null !== ($path = Tour::getArrayPath($idp, 20))){
                echo "<img src=\"{$path[1]}\" width=\"300\" height=\"300\" class=\"card-img\">";
            }
            echo "</div>";
            echo "</div>";
            echo "<div class=\"col-6\">";
            echo "<div class=\"card-body\">";
            echo "<h5>Passageiros: $clt2</h5>";
            echo "<p>$tt2</p>";
            echo "</div>";
            echo "</div>";
            echo "<div class=\"col-1\">";
            echo "</div>";
            echo "<div class=\"col-6\">";
            echo "</div>";
            echo "<div class=\"col-6\">";
            echo "<h4>... Viva você também esta experiência</h4>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<div class=\"card\">";
            echo "<div class=\"row\">";
            if($setor == 0){
                $path = "../view/img/setor/patagonia.png";
                echo "<div class=\"col-3\">";
                echo "<div class=\"card-body\">";
                echo "<img src=\"{$path}\" width=\"150\" height=\"150\" class=\"card-img\">";
                echo "</div>";
                echo "</div>";
                echo "<div class=\"col-6 pt-5\">";
                echo "<h4>Patagônia Trips - RZ Turismo</h4>";
                echo "<p>Texto de </br>3 linhas de apresentação</br>da Patagonia Trips</p>";
                echo "</div>";
                echo "<div class=\"col-3\">";
                echo "</div>";
                echo "<div class=\"col-4\">";
                echo "<h5 class=\"text-center\">Acompanhe nossas</br>redes sociais:</h5>";
                echo "<p class=\"text-center\"><a class=\"text-dark\" target=\"_blank\" href='https://facebook.com/patagoniatrips'><img src=\"../view/img/fundos/face.png\" width=\"32\" height=\"32\">@patagoniatrips</a></p>";
                echo "<p class=\"text-center\"><a class=\"text-dark\" target=\"_blank\" href='https://instagram.com/patagoniatrips'><img src=\"../view/img/fundos/insta.png\" width=\"32\" height=\"32\">@patagoniatrips</a></p>";
                echo "</div>";
                echo "<div class=\"col-4\">";
                echo "<h5 class=\"text-center\">Veja mais informações</br>em nossos sites:</h5>";
                echo "<p class=\"text-center\"><a class=\"text-dark\" target=\"_blank\" href='https://patagoniatrips.com.br'>www.patagoniatrips.com.br</a></p>";
                echo "<p class=\"text-center\"><a class=\"text-dark\" target=\"_blank\" href='https://ushuaia.com.br'>www.ushuaia.com.br</a></p>";
                echo "<p class=\"text-center\"><a class=\"text-dark\" target=\"_blank\" href='https://rzturismo.com.br'>www.rzturismo.com.br</a></p>";
                echo "</div>";
            }
            elseif($setor == 1){
                $path = "../view/img/setor/rz.png";
                echo "<div class=\"col-3\">";
                echo "<div class=\"card-body\">";
                echo "<img src=\"{$path}\" width=\"150\" height=\"80\" class=\"card-img mt-5\">";
                echo "</div>";
                echo "</div>";
                echo "<div class=\"col-6 pt-5\">";
                echo "<h4>RZ Turismo</h4>";
                echo "<p>Texto de </br>3 linhas de apresentação</br>da RZ Turismo</p>";
                echo "</div>";
                echo "<div class=\"col-3\">";
                echo "</div>";
                echo "<div class=\"col-4\">";
                echo "<h5 class=\"text-center\">Acompanhe nossas</br>redes sociais:</h5>";
                echo "<p class=\"text-center\"><a class=\"text-dark\" target=\"_blank\" href='https://www.facebook.com/RZTurismo/'><img src=\"../view/img/fundos/face.png\" width=\"32\" height=\"32\">@RZTurismo</a></p>";
                echo "<p class=\"text-center\"><a class=\"text-dark\" target=\"_blank\" href='https://www.instagram.com/rz_turismo/'><img src=\"../view/img/fundos/insta.png\" width=\"32\" height=\"32\">@rz_turismo</a></p>";
                echo "</div>";
                echo "<div class=\"col-4\">";
                echo "<h5 class=\"text-center\">Veja mais informações</br>em nossos sites:</h5>";
                echo "<p class=\"text-center\"><a class=\"text-dark\" target=\"_blank\" href='https://rzturismo.com.br'>www.rzturismo.com.br</a></p>";
                echo "</div>";
            }
            elseif($setor == 2){
                $path = "../view/img/setor/surf.png";
                echo "<div class=\"col-3\">";
                echo "<div class=\"card-body\">";
                echo "<img src=\"{$path}\" width=\"150\" height=\"150\" class=\"card-img\">";
                echo "</div>";
                echo "</div>";
                echo "<div class=\"col-6 pt-5\">";
                echo "<h4>Surf Trips - RZ Turismo</h4>";
                echo "<p>Texto de </br>3 linhas de apresentação</br>da Surf Trips</p>";
                echo "</div>";
                echo "<div class=\"col-3\">";
                echo "</div>";
                echo "<div class=\"col-4\">";
                echo "<h5 class=\"text-center\">Acompanhe nossas</br>redes sociais:</h5>";
                echo "<p class=\"text-center\"><a class=\"text-dark\" target=\"_blank\" href='https://www.facebook.com/surftripsrzturismo/'><img src=\"../view/img/fundos/face.png\" width=\"32\" height=\"32\">@surftripsrzturismo</a></p>";
                echo "<p class=\"text-center\"><a class=\"text-dark\" target=\"_blank\" href='https://www.instagram.com/surftripsrzturismo/'><img src=\"../view/img/fundos/insta.png\" width=\"32\" height=\"32\">@surftripsrzturismo</a></p>";
                echo "</div>";
                echo "<div class=\"col-4\">";
                echo "<h5 class=\"text-center\">Veja mais informações</br>em nossos sites:</h5>";
                echo "<p class=\"text-center\"><a class=\"text-dark\" target=\"_blank\" href='https://surftrips.com.br'>www.surftrips.com.br</a></p>";
                echo "<p class=\"text-center\"><a class=\"text-dark\" target=\"_blank\" href='https://rzturismo.com.br'>www.rzturismo.com.br</a></p>";
                echo "</div>";
            }
            elseif($setor == 3){
                $path = "../view/img/setor/snow.png";
                echo "<div class=\"col-3\">";
                echo "<div class=\"card-body\">";
                echo "<img src=\"{$path}\" width=\"150\" height=\"80\" class=\"card-img mt-5\">";
                echo "</div>";
                echo "</div>";
                echo "<div class=\"col-6 pt-5\">";
                echo "<h4>Snow Trips - RZ Turismo</h4>";
                echo "<p>Texto de </br>3 linhas de apresentação</br>da Snow Trips</p>";
                echo "</div>";
                echo "<div class=\"col-3\">";
                echo "</div>";
                echo "<div class=\"col-4\">";
                echo "<h5 class=\"text-center\">Acompanhe nossas</br>redes sociais:</h5>";
                echo "<p class=\"text-center\"><a class=\"text-dark\" target=\"_blank\" href='https://facebook.com/snowtrips'>facebook/snowtrips</a></p>";
                echo "<p class=\"text-center\"><a class=\"text-dark\" target=\"_blank\" href='https://instagram.com/snowtrips'>instagram/snowtrips</a></p>";
                echo "</div>";
                echo "<div class=\"col-4\">";
                echo "<h5 class=\"text-center\">Veja mais informações</br>em nossos sites:</h5>";
                echo "<p class=\"text-center\"><a class=\"text-dark\" target=\"_blank\" href='https://snowtrips.com.br'>www.snowtrips.com.br</a></p>";
                echo "<p class=\"text-center\"><a class=\"text-dark\" target=\"_blank\" href='https://rzturismo.com.br'>www.rzturismo.com.br</a></p>";
                echo "</div>";
            }
            echo "<div class=\"col-4\">";
            echo "<h5 class=\"text-center\">Entre em contato</br>por telefone:</h5>";
            echo "<p class=\"text-center\">(48)99170 3421<img src=\"../view/img/fundos/whats.png\" width=\"32\" height=\"32\"></br>(11)4063 3940</br>(51)2797 0434</br>(48)3254 4035</br>(41)4063 9644</br>(21)4063 3153</p>";
            echo "</div>";
            echo "<div class=\"col-12\">";
            echo "</div>";
            echo "<div class=\"col-1\">";
            echo "</div>";
            echo "<div class=\"col-11\">";
            echo "<h5>Grupo RZ Turismo:</h5>";
            echo "</div>";
            echo "<div class=\"col-3 justify-content-center\">";
            echo "<div class=\"card-body\">";
            echo "<img src=\"../view/img/setor/rz.png\" width=\"150\" height=\"80\" class=\"card-img mt-5\">";
            echo "</div>";
            echo "<p class=\"text-center mt-4\"><a class=\"text-dark\" target=\"_blank\" href='https://rzturismo.com.br'>www.rzturismo.com.br</a></p>";
            echo "</div>";
            echo "<div class=\"col-3 justify-content-center\">";
            echo "<div class=\"card-body\">";
            echo "<img src=\"../view/img/setor/patagonia.png\" width=\"150\" height=\"150\" class=\"card-img\">";
            echo "</div>";
            echo "<p class=\"text-center\"><a class=\"text-dark\" target=\"_blank\" href='https://patagonia.com.br'>www.patagoniatrips.com.br</a></p>";
            echo "</div>";
            echo "<div class=\"col-3 justify-content-center\">";
            echo "<div class=\"card-body\">";
            echo "<img src=\"../view/img/setor/surf.png\" width=\"150\" height=\"150\" class=\"card-img\">";
            echo "</div>";
            echo "<p class=\"text-center\"><a class=\"text-dark\" target=\"_blank\" href='https://surftrips.com.br'>www.surfrips.com.br</a></p>";
            echo "</div>";
            echo "<div class=\"col-3 justify-content-center\">";
            echo "<div class=\"card-body\">";
            echo "<img src=\"../view/img/setor/snow.png\" width=\"150\" height=\"80\" class=\"card-img mt-5\">";
            echo "</div>";
            echo "<p class=\"text-center mt-4\"><a class=\"text-dark\" target=\"_blank\" href='https://snowtrips.com.br'>www.snowtrips.com.br</a></p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</br>";
        }
    }
?>