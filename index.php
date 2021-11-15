<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1>Gioco del pari e dispari</h1>
        <?php
            session_start();
            $_SESSION['volta']=0;
            echo"
                <form action=dati.php method=POST>
                    <label for=nome>Nome:</label>
                    <input type=text name=nome>
                    <select name=sceltaI>
                        <option value=pari>Pari</option>
                        <option value=dispari>Dispari</option>
                    </select>
                    <input type=submit value=GIOCA>
                </form>
            ";
        ?>
    </body>
</html>