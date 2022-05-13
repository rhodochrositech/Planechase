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
<body style="background-color: FFFFFF;">
<?php include 'func.php';
    $data = [];
    $loadboard = "";
    $builtboard = [];
    $sangameid = 1;
    setgameid($sangameid);
    
    
    //echo $sangameid;
    
    
    //checkgameid();
    //reload();
    //setBoard();
    //setBoard();
    //sqlupdate();
    loadBoard();
    
    display();
    if(array_key_exists("unveil",$_POST)){
        //setboardstates($builtboard,$loadboard);
        global $builtboard;
        global $loadboard;
        loadBoard();
        $coord = $_POST['coord'];
        echo $coord[0].$coord[1];
        echo "<pre>";
        print_r ($builtboard);
        echo "</pre>";
        $sql = "SELECT data FROM server WHERE gid=17";
        $result = mysqli_query($con,$sql);
        $row=$result->fetch_assoc();
        $boardstate = unserialize($row);
    }
    /* echo '<form action="menu.php" method="post">
        <br><input type="submit" name="end" value="End game">
        </form>';
    if(array_key_exists("end",$_POST)) {
        $con=mysqli_connect("db.luddy.indiana.edu","i308s22_natcburk","my+sql=i308s22_natcburk","i308s22_natcburk");
        if(!$con){
            die("Connection failed: ".mysqli_connect_error());
        }
        $sql = "DELETE FROM server WHERE gid=".getgameid().";";
        mysqli_query($con,$sql);
    } */

?>


</body>
</html>
