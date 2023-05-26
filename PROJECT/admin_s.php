<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="styles/style header footer.css">
    <link rel="stylesheet" href="styles/style admin.css">
    <link rel="stylesheet" href="styles/style admin_ar.css">
    <link rel="stylesheet" href="styles/style admin_s.css">
    <link rel="icon" href="images/logo-trs.png">
    <title>Tawjihi admin</title>
</head>
<body>
    <header>
        <a href="admin.html" class="tawjihi">TAWJIHI</a>
    </header>

    <nav>
        <a href="admin_s.php" style="background-color: rgb(110, 110, 110);">Statistics</a>
        <a href="admin_t.php">Teachers</a>
        <a href="admin_g.php">Groups</a>
        <a href="admin_r.php">Rooms</a>
    </nav>

    <?php
    include("php/server.php");
    $sql="SELECT * FROM courses c INNER JOIN rooms r ON c.idr=r.id GROUP BY c.idr HAVING COUNT(c.idr);";
    $result=mysqli_query($connection, $sql);
    $row=mysqli_fetch_assoc($result);
    $sql2="SELECT COUNT(r.id) FROM courses c INNER JOIN rooms r ON c.idr=r.id GROUP BY c.idr HAVING COUNT(c.idr);";
    $result2=mysqli_query($connection, $sql2);
    $row2=mysqli_fetch_assoc($result2);
    $sql3="SELECT * FROM rooms;";
    $result3=mysqli_query($connection, $sql3);
    ?>
    <main>
        <div class="addt art">
            <h2 class="af">Room the most<br>booked</h2>
            <?php
                $num_rows=mysqli_num_rows($result);
                if($num_rows==0){
                    $html='<h1 class="aff">There is no<br>room available</h1>';
                    echo $html;
                }
                else{
                    $html='<h1 class="aff">ROOM:'.$row['rname'].'<br>Booked '.$row2['COUNT(r.id)'].' times</h1>';
                    echo $html;
                }
            ?>
        </div>
        <div class="removet art">
            <h2 class="afc">Days of rooms ready<br>to book</h2>
            <form action="php/dayfreeweek.php" method="post">
                <select class="inpt" name="idroom" id="idroom">
                    <option value="" disabled selected>-- Select group --</option>
                    <?php while($row3 = mysqli_fetch_assoc($result3)){ ?>
                    <option value="<?php echo $row3['id'];?>"><?php echo $row3['rname'];?> : <?php echo $row3['nmachine'];?> machines</option>
                    <?php } ?>
                </select>
                <button class="btnt">SHOW</button>
            </form>
        </div>
    </main>

    <footer>
        <p class="copyright">Copyright © 2023</p>
        <p class="univf">University of Mustapha Stambouli Mascara</p>
    </footer>
</body>
</html>