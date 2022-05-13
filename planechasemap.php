<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<head>
    <title>
        planechase
    </title>
    <style>

    </style>
</head>
<body style="background-color: 222222;">
<?php include 'func.php';
    $data = [];
    $loadboard = "";
    $builtboard = [];
    $sangameid;
    if($_POST){
        global $sangameid;
        $sangameid = $_POST['gamesel'];
        setgameid($sangameid);
        $con=mysqli_connect("db.luddy.indiana.edu","i308s22_natcburk","my+sql=i308s22_natcburk","i308s22_natcburk");
        if(!$con){
            die("Connection failed: ".mysqli_connect_error());
        }
        $sql = "SELECT * FROM server WHERE gid = ".$sangameid.";";
        $result = mysqli_query($con,$sql);
        $row=$result->fetch_assoc();
        if ($row['data'] == ' '){
            setBoard();
        }
        
    }
    else{
        echo "<div class='container'>";
        echo "<h1 style='color: white; padding-top: 20%;'>You need to select a game!</h1>";
        echo "</div>";
        echo "<meta http-equiv=\"Refresh\" content=\"2; url='https://cgi.luddy.indiana.edu/~natcburk/planechase/Planechase/menu.php'\" />";
        die();
    }
    echo "<div class='row'>";
    echo "<div class='col'>";
    echo "<form action='menu.php' method='post'>";
    echo "<input type='submit' value='Return to menu' style='background-color: BBBBBB;'>";
    echo "</input>";
    echo "</form>";
    echo "</div>";
    echo "<div class='col'>";
    echo "<form method='post'>";
    echo "<input type='submit' name='end' value='End the game' style='background-color: BBBBBB;'>";
    echo "</input>";
    echo "</div>";
    echo "</div>";
    loadBoard();
    if(array_key_exists("unveil",$_POST)){
        global $builtboard;
        global $loadboard;
        loadBoard();
        $coord = $_POST['coord'];
        $con=mysqli_connect("db.luddy.indiana.edu","i308s22_natcburk","my+sql=i308s22_natcburk","i308s22_natcburk");
        if(!$con){
            die("Connection failed: ".mysqli_connect_error());
        }
        $builtboard[$coord[0]][$coord[1]][3] = 1;
        $target = [[$coord[0]-1,$coord[1]],[$coord[0],$coord[1]-1],[$coord[0]+1,$coord[1]],[$coord[0],$coord[1]+1]];
        foreach ($target as $checker){
            if(checklegal($checker[0],$checker[1])){
                $builtboard[$checker[0]][$checker[1]][3] = 1;
            }
        }
        $sql = "SELECT data FROM server WHERE gid=".getgameid().";";
        mysqli_query($con,$sql);
        $sql = "UPDATE server SET data = '".serialize($builtboard)."' WHERE gid = ".getgameid().";";
        mysqli_query($con,$sql);
    }
    loadBoard();
    display();

    if(array_key_exists("end",$_POST)) {
        $con=mysqli_connect("db.luddy.indiana.edu","i308s22_natcburk","my+sql=i308s22_natcburk","i308s22_natcburk");
        if(!$con){
            die("Connection failed: ".mysqli_connect_error());
        }
        $sql = "DELETE FROM server WHERE gid=".getgameid().";";
        mysqli_query($con,$sql);
        echo "<meta http-equiv=\"Refresh\" content=\"0; url='https://cgi.luddy.indiana.edu/~natcburk/planechase/Planechase/menu.php'\" />";
    }

?>


</body>
</html>
