<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1>Gioco del pari e dispari</h1>
        <?php
            session_start();
            error_reporting(0);
            if($_SESSION['volta']==0){
                $_SESSION['nome']=$_POST['nome'];
                $_SESSION['turno']=1;
                $_SESSION['sceltaI']=$_POST['sceltaI'];
                $_SESSION['punteggioU']=0;
                $_SESSION['punteggioC']=0;
                $_SESSION['volta']++;
                $sceltaC=rand(1,5);
            }
            else{
                $_SESSION['turno']++;
            }

            echo"
                GIOCATORE:$_SESSION[nome]
                <br>
                TIPO SCELTO:$_SESSION[sceltaI]
                <br>
                TURNO:$_SESSION[turno]
                <br>
            ";

            if($_SESSION['turno']>1){
                $sceltaC=rand(1,5);
                echo"
                    <br>
                    <br>
                    hai giocato:$_POST[sceltaU]
                    <br>
                    io gioco:$sceltaC
                    <br>
                ";
            }

            if($_SESSION['turno']==5){
                if($_SESSION['punteggioU']>$_SESSION['punteggioC']){
                    echo"
                        Hai vinto la partita
                        <br>
                        <form action=index.php method=POST>
                            <input type=submit value=RIGIOCA>
                        </form>
                    ";
                    session_destroy();
                }
                else{
                    echo"
                        hai perso la partita
                        <br>
                        <form action=index.php method=POST>
                            <input type=submit value=RIGIOCA>
                        </form>
                    ";
                    session_destroy();
                }
            }
            else{
                print_r($_POST);
                echo $sceltaC;
                echo"
                    <form action=dati.php method=POST>
                        <label for=sceltaU>scegli quanto vuoi giocare:</label>
                        <select name=sceltaU>
                            <option value=1>1</option>
                            <option value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                            <option value=5>5</option>
                        </select>
                        <br>
                        <input type=submit value=GIOCA>
                    </form>
                ";
                if(($_POST['sceltaU']+$sceltaC)%2==0 && $_SESSION['sceltaI']=='pari'){
                    echo"
                        hai vinto il turno
                    ";
                    $_SESSION['punteggioU']++;
                }
                else if(($_POST['sceltaU']+$sceltaC)%2!=0 && $_SESSION['sceltaI']=='dispari'){
                    echo"
                        hai vinto il turno
                    ";
                    $_SESSION['punteggioU']++;
                }
                else{
                    echo"
                        hai perso il turno
                    ";
                    $_SESSION['punteggioC']++;
                }
            }
        ?>
    </body>
</html>