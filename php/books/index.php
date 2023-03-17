<?php
/*
1) creare una pagina che visualizza tutti i record in una pagina
2) permettono l'inserimento

facoltativo:
3) visualizzano il campo isbn come link che una volta cliccato permette la modifica
4) cancellazione
*/

$conn = new mysqli("localhost", "admin", "admin", "exam");
    if($conn->connect_error){
        die("connessione non riuscita - ERRORE : " . $conn->connect_error);
    }else{
        echo"connessione riuscita <hr>";
    }
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>esame books</title>
</head>
<body>
    <?php
    echo "<h1>Manipolazione tabella books</h1>";


    if($_SERVER['REQUEST_METHOD'] === 'GET'){//GET
        //1) fare una pagina lista che mostrava tutti i libri nella pagina iniziale
        $sql = "SELECT * FROM books";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            ?>
            <table align=center>
            <td colspan=16 align=center>contenuto tabella : books</td>
            <tr>
                <th>ID</th>
                <td></td>
                <th>AUTHOR</th>
                <th></th>
                <th>TITLE</th>
                <td></td>
                <th>PUBLISHER</th>
                <th></th>
                <th>RANKING</th>
                <th></th>
                <th>year</th>
                <th></th>
                <th>price</th>
                <th></th>
                <th>ISBN</th>
                <th></th>
            </tr>
            <tr>
                <td colspan=16><hr color = blue></th></td>
            </tr>
            <?php
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>" . $row["id"]  . "</td>";
                echo "<td></td>";
                echo "<td>". $row["author"] . "</td>";
                echo "<td></td>";
                echo "<td>" . $row["title"]  . "</td>";
                echo "<td></td>";
                echo "<td>" . $row["publisher"]  . "</td>";
                echo "<td></td>";
                echo "<td>" . $row["ranking"]  . "</td>";
                echo "<td></td>";
                echo "<td>" . $row["year"]  . "</td>";
                echo "<td></td>";
                echo "<td>" . $row["price"]  . "</td>";
                echo "<td></td>";
                //3) fare in modo che l'isbn fosse un link ad una pagina che ti fa fare l'update del record
                ?>
                <td><a href="./modifica.php?isbn=<?php echo $row["isbn"];?>"> <?php echo $row["isbn"]; ?> </a></td><br>

                <!-- 4) mettere un tasto delete per farti cancellare il record-->
                <td><form action="/" method="POST">
                    <input type="hidden" name="isbn" value="<?php echo $row["isbn"];?>">
                    <input type="submit" name="cancella" value="CANCELLA">
                </form></td>
                </tr>
                <?php
            }
            echo "</table>";
        }else{
            echo "La tabella è vuota.";
        }

        //2) fare un form di inserimento per un nuovo libro e fare in modo che una volta inserito spuntava nella pagina aggiornata POST 
        echo "<br><br><p>Se vuoi modificare un record clicca il link isbn di quel libro.</p>";
        ?>
        <br><hr color=blue><br>

        <p>Vuoi inserire un nuovo libro?</p>

        <form action="/" method="POST">
            <input type="text" name="isbn" placeholder="isbn">
            <input type="text" name="author" placeholder="author">
            <input type="text" name="title" placeholder="title">
            <input type="text" name="publisher" placeholder="publisher">
            <input type="text" name="ranking" placeholder="ranking">
            <input type="text" name="year" placeholder="year">
            <input type="text" name="price" placeholder="price">
            <input type="submit" name="inserisci" value="INSERISCI">
        </form>
        <?php

    }else{//POST
        if(isset($_POST['inserisci'])){//inserire
            $isbn = $_POST['isbn'];
            $author = $_POST['author'];
            $title = $_POST['title'];
            $publisher = $_POST['publisher'];
            $ranking = $_POST['ranking'];
            $year = $_POST['year'];
            $price = $_POST['price'];

            $sql = "INSERT INTO books(isbn, author, title, publisher, ranking, year, price) VALUES ('$isbn', '$author', '$title', '$publisher', '$ranking', '$year', '$price')";

            if($conn->query($sql))
                header("location:index.php");
            else 
                echo "ERRORE in ". $sql ." : ". $conn->error;

            //header("location : index.php");
        }
        if(isset($_POST['cancella'])){//cancellare
            $isbn = $_POST['isbn'];

            $sql = "DELETE FROM books WHERE isbn ='". $isbn ."'";
            if($conn->query($sql))
                header("location:index.php");
            else 
                echo "ERRORE in ". $sql ." : ". $conn->error;
        }

    }

    ?>
   <br><br><a href="index.php">indietro</a>

</body>
</html>