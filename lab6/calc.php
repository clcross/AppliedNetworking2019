<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Calculator</title>
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
    <h1>Sales Tax Calculator</h1>

    <?php
    $DisplayForm=true;
    if(isset($_POST["return"]))
    {
        $DisplayForm=true;
    }
    if(isset($_POST["submittoself"]))
    {
        if(!is_numeric($_POST["amount"]))
        {
            $error1="<p>You did not enter a numeric value for 'Amount'</p><br/>";
        }
        if(!is_numeric($_POST["tax"]))
        {
            $error2="<p>You did not enter a numeric value for 'Tax Rate'</p><br/>";
        }
        if(!empty($error1))
        {
            $DisplayForm=false;
            echo $error1;
        }
        if(!empty($error2))
        {
            $DisplayForm=false;
            echo $error2;
        }
        if(!empty($error2) || !empty($error2))
        {
            $DisplayForm=false;
            echo "<p>Could Not Calculate!!</p>";
        }
        if(empty($error1) && empty($error2))
        {
            $DisplayForm=false;
            $money=$_POST["amount"];
            $rate=$_POST["tax"];
            $total=($money+($money*($rate/100)));

            echo "Entered Amount: $" . $money . "<br/>";
            echo "Entered Tax Rate: " . $rate . "%<br/>";
            echo "Calculated Tax Amount: $" . $total . "<br/>";
        }
    }
    if($DisplayForm){
    ?>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        Amount:<input type="text" name="amount"/><br/>
        Tax Rate:<input type="text" name="tax"/>%<br/>
        <input type="submit" value="Calculate" name="submittoself" />
    </form>
    <?php
    }
    if(!$DisplayForm){
    ?>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <input type="submit" value="Return to Calculate" name="return" />
    </form>

    <?php
    }
    ?>
</body>
</html>