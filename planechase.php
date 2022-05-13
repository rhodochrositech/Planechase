<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<head>
    <style>

    </style>
</head>
<body>
<?php

    function getSel(){
        $con=mysqli_connect("db.luddy.indiana.edu","i308s22_natcburk","my+sql=i308s22_natcburk","i308s22_natcburk");
        if(!$con){
            die("Connection failed: ".mysqli_connect_error());
        }
        $sql = "SELECT sel FROM server WHERE game =".getgid().";";
        $result = mysqli_query($con,$sql);
        $row=$result->fetch_assoc();
        return $row['sel'];

    }
    function getEvent(){
        $con=mysqli_connect("db.luddy.indiana.edu","i308s22_natcburk","my+sql=i308s22_natcburk","i308s22_natcburk");
        if(!$con){
            die("Connection failed: ".mysqli_connect_error());
        }
        $sel=getSel();
        $sql = "SELECT dir FROM planes WHERE pid = $sel;";
        $result = mysqli_query($con,$sql);
        $row=$result->fetch_assoc();
        echo "<img src='planes/".$row['dir']."' >"; 
    }
    

    if(array_key_exists("Planeswalk",$_POST)){
        sel();
        echo '<meta http-equiv="refresh" content="0; URL=/~natcburk/planechase/Planechase/planechase.php">';
    }
    getEvent();
    echo '<form method="POST"><input type="submit" name="Planeswalk" value="Planeswalk"></form>';

?>


</body>
</html>
