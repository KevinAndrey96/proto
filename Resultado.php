<?php
session_start();
if (empty($_SESSION["Active"]))
{
?>
<script type="text/javascript">
    location.href = "index.php";
</script>
<?php
}
require "Tools/BD/PDO.php";
if(isset($_POST["Code"]))
{
    $U = (int)$_POST["Code"];
    $Ganador = false;
    $Secret = getenv('WINNING_CODE_HASH') ?: "67e29d8e70cdd6247211eeba9a12bc64d181bc82";
    $WinningPlain = getenv('WINNING_CODE') ?: 'WINNER';

    $C1 = $_POST["C1"] ?? '';
    $C2 = $_POST["C2"] ?? '';
    $C3 = $_POST["C3"] ?? '';
    $C4 = $_POST["C4"] ?? '';
    $C5 = $_POST["C5"] ?? '';
    $C6 = $_POST["C6"] ?? '';

    $Codigo = sha1($C1."-".$C2."-".$C3."-".$C4."-".$C5."-".$C6);
    $Codigo2 = $C1.$C2.$C3.$C4.$C5.$C6;

    if ($Codigo == $Secret || strtoupper($Codigo2) === strtoupper($WinningPlain))
    {
        $Ganador = true;
    }
    $Q = "SELECT * from Participants where Id_Participant='$U'";
    foreach ($db->query($Q) as $Row) {
        if ($Row["Codigo"] != "NO" && !empty($Row["Codigo"]))
        {
            ?>
            <script type="text/javascript">
                window.alert("El participante ya realizo un intento previamente");
                location.href = "LoginCode.php";
            </script>
            <?php
        }
        else
        {
            $stmt = $db->prepare("UPDATE Participants SET Codigo = ? WHERE Id_Participant = ?");
            if ($stmt->execute([$Codigo2, $U]))
            {
                ?>
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <title>Vísita, registra y gana!</title>

                        <!-- Font Icon -->
                        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

                        <!-- Main css -->
                        <link rel="stylesheet" href="css/style.css">
                    </head>
                    <body>

                        <div class="main">

                            <section class="signup">
                                <!-- <img src="images/signup-bg.jpg" alt=""> -->
                                <div class="container">
                                    <div class="signup-content">
                                        <?php
                                        if($Ganador==true)
                                        {
                                            ?>
                                            <audio autoplay src="sounds/Gana.mp3"></audio>
                                            <h2 class="form-title">¡Felicitaciones!</h2>
                                            <h2 class="form-title">Has sido el afortunado ganador del concurso ¡vísita, registra y gana!...</h2>
                                            <center><p>Gracias por participar</p></center>
                                            <br>
                                            <center><img height="100" width="100" src="images/gana.png"></center>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <audio autoplay src="sounds/Pierde.mp3"></audio>
                                            <h2 class="form-title">¡Lo sentimos!</h2>
                                            <h2 class="form-title">No has sido el ganador del concurso ¡vísita, registra y gana!...</h2>
                                            <center><p>Gracias por participar</p></center>
                                            <br>
                                            <center><img height="100" width="100" src="images/pierde.png"></center>
                                            <?php
                                        }
                                        ?>
                                        <button onclick="location.href = 'LoginCode.php';"  class="form-submit" >Regresar</button>
                                    </div>
                                </div>
                            </section>

                        </div>

                        <!-- JS -->
                        <script src="vendor/jquery/jquery.min.js"></script>
                        <script src="js/main.js"></script>
                    </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
                    </html>
                    <?php
            }
            else
            {
                ?>
                <script type="text/javascript">
                    window.alert("Ha ocurrido un error, por favor intentelo de nuevo");
                </script>
                <?php
            }
        }
    }
}
?>
