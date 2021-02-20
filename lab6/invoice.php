<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Invoice</title>
    <link rel="stylesheet" type="text/css" href="/mystyle.css">
    <link rel="stylesheet" type="text/css" href="index.css">
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
    <h1>CSCI Store Invoice</h1>
    <table class="invoice">
        <tr><th>Item</th><th>Price</th></tr>
        <?php
            if(isset($_POST["submit"]))
            {
                $a=$_POST["merch"];
                $total=0;
                foreach($a as $element)
                {
                    switch($element)
                    {
                        case "0":
                            echo "<tr><td>Desktop</td><td>$1234</td></tr>";
                            $total+=1234;
                            break;
                        case "1":
                            echo "<tr><td>Laptop</td><td>$2345</td></tr>";
                            $total+=2345;
                            break;
                        case "2":
                            echo "<tr><td>Hard Drive</td><td>$246</td></tr>";
                            $total+=246;
                            break;
                        case "3":
                            echo "<tr><td>Ram Stick</td><td>$79</td></tr>";
                            $total+=79;
                            break;
                    }
                }
        ?>
        <tr>
            <td class="tot">
            <?php
                echo "Total: $" . $total . "<br/>";
            }
            ?>
            </td>
        </tr>
        
    </table>
</body>
</html>