<?php
    $loadboard = "";
    $builtboard = [];
    $gid = 1;

    function getgameid(){
        global $gid;
        return $gid;
    }
    function setgameid($ngid){
        global $gid;
        $gid = $ngid;
    }
    function checkgameid(){
        global $gid;
        $con=mysqli_connect("db.luddy.indiana.edu","i308s22_natcburk","my+sql=i308s22_natcburk","i308s22_natcburk");
        if(!$con){
            die("Connection failed: ".mysqli_connect_error());
        }
        $sql = "SELECT * FROM server WHERE gid= ".$gid.";";
        $result = mysqli_query($con,$sql);
        $row = $result->fetch_assoc();
        if ($row['gid']!=$gid){
            global $data;
            global $loadboard;
            global $builtboard;
            loadData();
            setBoard();
        }
    }

    function loadData() {
        global $data;
        $con=mysqli_connect("db.luddy.indiana.edu","i308s22_natcburk","my+sql=i308s22_natcburk","i308s22_natcburk");
        if(!$con){
            die("Connection failed: ".mysqli_connect_error());
        }
        $sql = "SELECT * FROM planes;";
        $result = mysqli_query($con,$sql);
        while($row = $result->fetch_assoc()){
            array_push($data, [$row['pid'],$row['name'],$row['dir']]);
        }
    }
    function loadBoard(){
        global $loadboard;
        global $builtboard;
        global $gid;
        $con=mysqli_connect("db.luddy.indiana.edu","i308s22_natcburk","my+sql=i308s22_natcburk","i308s22_natcburk");
        if(!$con){
            die("Connection failed: ".mysqli_connect_error());
        }
        $sql = "SELECT * FROM server WHERE gid = ".$gid.";";
        $result = mysqli_query($con,$sql);
        $row=$result->fetch_assoc();
        $loadboard = $row['data'];
        $builtboard = unserialize($loadboard);
    }
    function setBoard(){
        global $builtboard;
        global $loadboard;
        global $data;
        global $gid;
        loadData();
        $size = 6;
        for ($row = 0; $row < $size; $row++){
            $builtrow = [];
            for ($col = 0; $col < $size; $col++){
                $key = array_rand($data);
                if($row==($size/2)-1 && $col==($size/2)-1){
                    array_push($builtrow, [$data[$key][0],$row,$col,1]);
                } else {           
                    array_push($builtrow, [$data[$key][0],$row,$col,0]);
                }
                unset($data[$key]);
            }
            array_push($builtboard, $builtrow);
        }
        $con=mysqli_connect("db.luddy.indiana.edu","i308s22_natcburk","my+sql=i308s22_natcburk","i308s22_natcburk");
        if(!$con){
            die("Connection failed: ".mysqli_connect_error());
        }
        $sql = "UPDATE server SET data = '".serialize($builtboard)."' WHERE gid = ".$gid.";";
        mysqli_query($con,$sql);

    }

    function sqlupdate() {
        $con=mysqli_connect("db.luddy.indiana.edu","i308s22_natcburk","my+sql=i308s22_natcburk","i308s22_natcburk");
        $sql = "UPDATE server SET data = '".serialize($builtboard)."' WHERE gid = ".getgameid().";";
        mysqli_query($con,$sql);
    }
    
    function getEvent($val,$xcoord,$ycoord,$flag){
        $con=mysqli_connect("db.luddy.indiana.edu","i308s22_natcburk","my+sql=i308s22_natcburk","i308s22_natcburk");
        if(!$con){
            die("Connection failed: ".mysqli_connect_error());
        }
        $sql = "SELECT dir FROM planes WHERE pid = $val;";
        $result = mysqli_query($con,$sql);
        $row=$result->fetch_assoc();
        if($flag) {
            echo "<form method='post'>";
            echo "<button type='submit' name='unveil' style='background-color: 000000;'>";
            //$builtboard[$rows][$cols][1]." ".$builtboard[$rows][$cols][2].
            echo "<input type='hidden' name='coord' value=".$xcoord.$ycoord.">";
            echo "<input type='hidden' name='gamesel' value=".getgameid().">";
            echo "<img style='width: 100%; object-fit: contain;', src='planes/".$row['dir']."' >"; 
            echo "</button>";
            echo "</form>";
        } else {
            echo "<form method='post'>";
            echo "<button type='submit' name='unveil' style='background-color: 000000;'>";
            //$builtboard[$rows][$cols][1]." ".$builtboard[$rows][$cols][2].
            echo "<input type='hidden' name='coord' value=".$xcoord.$ycoord.">";
            echo "<input type='hidden' name='gamesel' value=".getgameid().">";
            echo "<img style='opacity: 0.2; width: 100%; object-fit: contain;', src='planes/"."hidden.jpg"."' >";
            echo "</button>";
            echo "</form>";
        }
    }

    function setboardstates($bb,$lb){
        global $builtboard;
        global $loadboard;
        $builtboard = $bb;
        $loadboard = $lb;

    }

    if(array_key_exists("re/start",$_POST)){
        setBoard();
    }

    function display() {
        global $builtboard;
        global $loadboard;
        loadBoard();
        echo "<div>";
            for ($rows = 0; $rows < 5; $rows++){
                echo "<div class='row'>";
                    for ($cols = 0; $cols < 5; $cols++){
                        echo "<div class='col' style='foreground: blue;'>";
                            //echo $builtboard[$rows][$cols][1]." ".$builtboard[$rows][$cols][2]." ".$builtboard[$rows][$cols][3];
                            getEvent($builtboard[$rows][$cols][0],$builtboard[$rows][$cols][1],$builtboard[$rows][$cols][2],$builtboard[$rows][$cols][3]);
                        echo "</div>";
                    }
                echo "</div>";
            }
        echo "</div>";
    }

    function checklegal($x,$y){
        if ($x >= 0 && $x <= 4){
            if ($y >= 0 && $y <= 4){
                return true;
            }
        }
        return false;
    }

?>