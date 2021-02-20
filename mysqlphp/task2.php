<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 2</title>
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

        echo"<table border='1'>
            <tr>
                <td>Title</td>
                <td>Auther</td>
                <td>Year Published</td>
                <td>Price</td>
                <td>Page Count</td>
            </tr>";

        $sql="select * from books";
        $result=$conn->query($sql);

        if($result->num_rows > 0)
        {
            while($row=$result->fetch_assoc())
            {
                echo "<tr>
                        <td>" . $row["Title"] . "</td>
                        <td>" . $row["Auther"] . "</td>
                        <td>" . $row["YearPublished"] . "</td>
                        <td>" . $row["Price"] . "</td>
                        <td>" . $row["PageCount"] . "</td>
                    </tr>";
            }
        }

        echo"</table>";
    ?>
    
</body>
</html>