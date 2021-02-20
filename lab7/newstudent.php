<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Lab 7</title>
    <link rel="stylesheet" type="text/css" href="/mystyle.css">
    <link rel="stylesheet" type="text/css" href="/lab7/index.css">
</head>

<body>
    <h1 align="center">
        <a href="/index.html">Cameron's Website</a>
    </h1>
    <nav>
        <ul>
            <li><a href="/lab1/index.html">Lab 1</a></li>
            <li><a href="/lab2/index.html">Lab 2</a></li>
            <li><a href="/lab3/index.html">Lab 3</a></li>
            <li><a href="/lab4/index.html">Lab 4</a></li>
            <li><a href="/lab5/index.html">Lab 5</a></li>
            <li><a href="/lab6/index.html">Lab 6</a></li>
            <li><a href="/lab7/index.html">Lab 7</a></li>
            <li><a href="/lab8/index.html">Lab 8</a></li>
        </ul>

    </nav>
    <hr />
    <h1>CSCI University New Student Page</h1>
    <hr />
    <div>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        Student Name:<input type="text" name="Name"/>
        <input type="submit" name="submit" value="Enroll"/>
    </form>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "XSW@2wsx";
        $database = "Registrations";
        $conn = new mysqli($servername, $username, $password, $database);
        if(!$conn)
        {
            die("Connection Failed: " . $conn->connect_error);
        }

        if(isset($_POST["submit"]))
        {
            $sql="insert into Students (Name) values ('" . $_POST["Name"] . "')";

            if($conn->query($sql))
            {
                echo "Record Created Successfully!<br/>";
            }
            else
            {
                echo "Error Creating a Record: " . $conn->error . "<br/>";
            }

        }

        $sql="select * from Students";
        echo"<table border='1' align='center'>
            <tr>
                <td> SID</td>
                <td>Name</td>
            </tr>";

        $result=$conn->query($sql);

        if($result->num_rows > 0)
        {
            while($row=$result->fetch_assoc())
            {
                echo "<tr>
                        <td>" . $row["SID"] . "</td>
                        <td>" . $row["Name"] . "</td>
                    </tr>";
            }
        }

        echo"</table>";
        $conn->close();
    ?>
    </div>
</body>
</html>