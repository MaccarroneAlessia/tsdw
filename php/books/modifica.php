<?php
    $conn = new mysqli("localhost", "admin", "admin", "exam");
    if($conn->connect_error){
        die("connessione non riuscita - ERRORE : " . $conn->connect_error);
    }else{
        echo"connessione riuscita";
    }
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICA record</title>
</head>
<body>

    <?php
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        $isbn = $_GET['isbn'];
        //echo $titolo ."<br>";

        //cerchiamo il record con isbn il valore passato per url
        $sql = "SELECT * FROM books WHERE isbn='". $isbn ."'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $author = $row["author"];
            $title = $row["title"];
            $publisher = $row["publisher"];
            $ranking = $row["ranking"];
            $year = $row["year"];
            $price = $row["price"];

            ?>
            <hr color=blue><br><br>
            <form action="modifica.php" method="POST">
            <input type="hidden" name="isbnprec" value="<?php echo $isbn; ?>">
            <input type="text" name="isbn" value="<?php echo $isbn; ?>">
            <input type="text" name="author" value="<?php echo $author; ?>">
            <input type="text" name="title" value="<?php echo $title; ?>">
            <input type="text" name="publisher" value="<?php echo $publisher; ?>">
            <input type="text" name="ranking" value="<?php echo $ranking; ?>">
            <input type="text" name="year" value="<?php echo $year; ?>">
            <input type="text" name="price" value="<?php echo $price; ?>">
            <input type="submit" name="modifica" value="MODIFICA">
        </form>
        
        <br><br>
        <?php
        }else{
            echo "Qualcosa è andato storto.";
        }

    }else{//POST
        if(isset($_POST['modifica'])){
            $isbnprec = $_POST['isbnprec'];
            $isbn = $_POST['isbn'];
            $author = $_POST['author'];
            $title = $_POST['title'];
            $publisher = $_POST['publisher'];
            $ranking = $_POST['ranking'];
            $year = $_POST['year'];
            $price = $_POST['price'];

            $sql = "UPDATE books SET isbn='$isbn', author='$author', title='$title', publisher='$publisher', ranking=$ranking, year=$year, price=$price WHERE isbn ='$isbnprec'" ;
            
            if($conn->query($sql)){
                header("location:./index.php?ris=OK");
                //header("location:./modifica.php?ris=OK");
            }
            else
                echo "ERRORE : ". $sql ." - ". $conn->error;
            
        }
    }
    ?>
    <a href="./index.php">torna alla pagina precedente</a>
</body>
</html>