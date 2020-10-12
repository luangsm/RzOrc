<?php 
    $lvl = 1;  
    if (!isset($_SESSION['UserId']) OR ($_SESSION['UserLevel'] <$lvl)) {
        session_destroy();
        include 'login.php';
        ?>  

        <script>
        $(document).ready(function(){    
            $(function () {
                $('#login').on('submit', function (e) {
                    e.preventDefault();
                    $.ajax({
                        type: 'post',
                        url: '../controller/validation.php',
                        data: $('form').serialize(),
                        success: function () {
                            $(window).attr('location', "./");
                        }
                    });
                });
            });
        });
        </script>

        <?php
        exit;
    }
?>