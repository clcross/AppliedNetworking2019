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
    <h1>CSCI University Registration Page</h1>
    <hr />
    <div>
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
    ?>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        Student Name:<input type="text" name="SNAME"/><br/>
        Please pick at most 3 classes:<br/>

        <?php
            $sql="select * from Classes";
            $result=$conn->query($sql);

            if($result->num_rows > 0)
            {
                while($row=$result->fetch_assoc())
                {
        ?>
                    <input type="checkbox" name="classes[]" value=<?php $row["CID"];?> /><?php echo $row["Name"];?><br/>
        <?php
                }
            }
        ?>
        
        <input type="submit" name="submit" value="Register!"/>
    </form>
    <hr/>

    <?php
        echo"<table border='1' align='center'>
            <tr>
                <td>Enrollment ID</td>
                <td>Student Name</td>
                <td>Class Name</td>
                <td>Class Name</td>
                <td>Class Name</td>
            </tr>";
            
        if(isset($_POST["submit"]))
        {
            if($conn->query($sql))
            {
                echo "Record Created Successfully!<br/>";
            }
            else
            {
                echo "Error Creating a Record: " . $conn->error . "<br/>";
            }

            $checkbox1=$_POST["classes"];
            $iter=1;
            foreach($checkbox1 as $element)
            {
                switch($element)
                {
                    case "Applied Networking":
                        $class[$iter] = 'Applied Networking';
                        $iter++;
                        break;
                    case "Scripting":
                        $class[$iter] = 'Scripting';
                        $iter++;
                        break;
                    case "Data Structures":
                        $class[$iter] = 'Data Structures';
                        $iter++;
                        break;
                    case "Calculus II":
                        $class[$iter] = 'Calculus II';
                        $iter++;
                        break;
                    case "Network Pen Testing":
                        $class[$iter] = 'Network Pen Testing';
                        $iter++;
                        break;
                    case "Object Oriented":
                        $class[$iter] = 'Object Oriented';
                        $iter++;
                        break;
                }
            }

            $result = $conn->query("select EID from Schedule where SNAME = '" . $_POST["SNAME"] . "'");
            if($result->num_rows == 0)
            {
                $sql="insert into Schedule (SNAME, Class1, Class2, Class3) values ('" . $_POST["SNAME"] . "','" . $class[1] . "','" . $class[2] . "','" . $class[3] . "')";  
            }
            else
            {
                $sql="update Schedule set Class1='" . $class[1] . "', Class2='" . $class[2] . "', Class3='" . $class[3] . "' where SNAME = '" . $_POST["SNAME"] . "'";  
            }
        }

        $sql="select * from Schedule";

        $result=$conn->query($sql);

        if($result->num_rows > 0)
        {
            while($row=$result->fetch_assoc())
            {
                echo "<tr>
                        <td>" . $row["EID"] . "</td>
                        <td>" . $row["SNAME"] . "</td>
                        <td>" . $row["Class1"] . "</td>
                        <td>" . $row["Class2"] . "</td>
                        <td>" . $row["Class3"] . "</td>
                    </tr>";
            }
        }

        echo"</table>";
        $conn->close();
    ?>
    </div>
</body>
</html>