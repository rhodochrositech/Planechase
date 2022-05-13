<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<head>
    <title>
        Start a game
    </title>
    <style>

    </style>
</head>
<body style="background-color: 999999;">
<?php
    
?>
<div class='container' style='padding-top: 10%;'>
    <div class='row'>
    <div class='col'>
        <div class='row'>
            <h2>Begin a new game</h2>
        </div>
        <div class='row'>
            <?php include 'func.php';
                echo '<form method="post">
                <input type="text" name="name" maxlength = "50" value="">
                <input type="submit" name="create" value="Create a new game">
                </form>';
                if(array_key_exists("create",$_POST)) {
                    $con=mysqli_connect("db.luddy.indiana.edu","i308s22_natcburk","my+sql=i308s22_natcburk","i308s22_natcburk");
                    if(!$con){
                        die("Connection failed: ".mysqli_connect_error());
                    }

                    $sql = "INSERT INTO server (data, name) VALUES (' ','".mysqli_real_escape_string($con, $_POST['name'])."');";
                    mysqli_query($con,$sql);
                }

            ?>
        </div>
    </div>
    <div class='col'>
        <div class='row'>
            <h2>Games in progress</h2>
        </div>
        <div class='row'>
            <?php
                $con=mysqli_connect("db.luddy.indiana.edu","i308s22_natcburk","my+sql=i308s22_natcburk","i308s22_natcburk");
                if(!$con){
                    die("Connection failed: ".mysqli_connect_error());
                }
                echo "<form action='planechasemap.php' method='post'>
                <select name='gamesel' id='gamesel'>
                <option value='none' selected disabled hidden>Select an Option</option>";
                $result = mysqli_query($con, "SELECT gid, name FROM server;");
                while ($row = mysqli_fetch_assoc($result)){
                    $id = $row['gid'];
                    $name =$row['name'];
                    echo "<option value=" . $id." "  ."name=". $name. ">".$name."</option>";
                }
                echo "</select>
                <input type='submit' value='Join Game'>
                </form>";
            ?>
        </div>
    </div>
    </div>
</div>
</body>
</html>