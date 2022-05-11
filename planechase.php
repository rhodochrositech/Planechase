<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<head>
    <style>

    </style>
</head>
<body>
<?php
    $con=mysqli_connect("db.luddy.indiana.edu","i308s22_natcburk","my+sql=i308s22_natcburk","i308s22_natcburk");
    if(!$con){
        die("Connection failed: ".mysqli_connect_error());
    }
    $sql = "SELECT dir WHERE pid = 5 FROM planes;";
    $result = mysqli_query($con,$sql);
    echo "<img src='planes/".$result['dir']."' >"; 
    echo 'hi';
    echo $result['dir'];
?>
</body>
</html>