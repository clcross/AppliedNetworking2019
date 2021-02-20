<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 3</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "XSW@2wsx";
        $database = "Library";
        $conn = new mysqli($servername, $username, $password, $database);
        if(!$conn)
        {
            die("Connection Failed: " . $conn->connect_error);
        }

        $sql="update books set Auther='" . $_POST['auther'] . "', YearPublished='" . $_POST['year'] . "', Price='" . $_POST['price'] . "', PageCount='" . $_POST['page'] . "' Where Title='" . $_POST['title'] . "'";
        $conn->query($sql);

        echo $sql;
        if($conn->query($sql))
        {
            echo "Record Created Successfully!<br/>";
        }
        else
        {
            echo "Error Creating a Record: " . $conn->error . "<br/>";
        }
    ?>

<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        Title:<input type="text" name="title"/><br/>
        Author:<input type="text" name="auther"/><br/>
        Year Published:<input type="text" name="year"/><br/>
        Price:<input type="text" name="price"/><br/>
        Page Count:<input type="text" name="page"/><br/>
        <input type="submit" name="submit" value="Update!"/>
    </form>

</body>
</html>