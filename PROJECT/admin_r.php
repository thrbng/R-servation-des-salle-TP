<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="styles/style header footer.css">
    <link rel="stylesheet" href="styles/style admin.css">
    <link rel="stylesheet" href="styles/style admin_ar.css">
    <link rel="icon" href="images/logo-trs.png">
    <title>Tawjihi admin</title>
</head>
<body>
    <header>
        <a href="admin.html" class="tawjihi">TAWJIHI</a>
    </header>

    <nav>
        <a href="admin_s.php">Statistics</a>
        <a href="admin_t.php">Teachers</a>
        <a href="admin_g.php">Groups</a>
        <a style="background-color: rgb(110, 110, 110);" href="admin_r.php">Rooms</a>
    </nav>

    <?php
    include("php/server.php");
    $sql = "SELECT * FROM rooms";
    $result = mysqli_query($connection, $sql);
    ?>
    <main>
        <div class="addt art">
            <form action="php/add_room.php" method="post">
                <h2 class="hadd">add room</h2>
                <input class="inpt" placeholder="room name" type="text" name="rname" id="rname">
                <input class="inpt" placeholder="number of machines" type="number" name="nmachine" id="nmachine">
                <button class="btnt">add</button>
            </form>
        </div>
        <div class="removet art">
            <form action="php/remove_room.php" method="post">
                <h2 class="hremo">remove room</h2>
                <select class="inpt" name="rname" id="rname">
                    <option value="" disabled selected>-- Select group --</option>
                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <option value="<?php echo $row['rname'];?>"><?php echo $row['rname'];?> : <?php echo $row['nmachine'];?> machines</option>
                    <?php } ?>
                </select>
                <button class="btnt">remove</button>
            </form>
            <form action="php/room_toPDF.php">
                <button class="btntt">rooms list</button>
            </form>
        </div>
    </main>
    <?php
    mysqli_close($connection);
    ?>

    <footer>
        <p class="copyright">Copyright © 2023</p>
        <p class="univf">University of Mustapha Stambouli Mascara</p>
    </footer>
</body>
</html>