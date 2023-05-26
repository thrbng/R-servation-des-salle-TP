<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="styles/style header footer.css">
    <link rel="stylesheet" href="styles/style teacher.css">
    <link rel="stylesheet" href="styles/style teacher_b.css">
    <link rel="icon" href="images/logo-trs.png">
    <title>Tawjihi home-teacher</title>
</head>
<body>
    <header>
        <a href="teacher.html" class="tawjihi">TAWJIHI</a>
    </header>

    <nav>
        <a href="teacher_b.php" style="background-color: rgb(110, 110, 110);">Booking</a>
        <a href="teacher_s.html">Schedule</a>
    </nav>

    <?php
    session_start();
    include("php/server.php");
    $sql = "SELECT * FROM groups";
    $idus=$_SESSION['id'];
    $result = mysqli_query($connection, $sql);
    ?>
    <main>
        <div class="book">
            <form class="booka" action="php/booking.php" method="post">
                <h2 class="h2a">Add Booking</h2>
                <select class="slct" name="group" id="group">
                    <option value="" disabled selected>-- Select group --</option>
                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['ngroup'];?></option>
                    <?php } ?>
                </select>
                <select class="slct" name="module" id="module">
                    <option value="" disabled selected>-- Select module --</option>
                    <option value="Algo">Algorithm</option>
                    <option value="DB">Data bases</option>
                    <option value="OS">Operationg system</option>
                    <option value="WEB">WEB</option>
                </select>
                <select class="slct" name="day" id="day">
                    <option value="" disabled selected>-- Select day --</option>
                    <option value="Sunday">Sunday</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                </select>
                <select name="time" id="time">
                    <option value="" disabled selected>-- Select time --</option>
                    <option value="8">08:00</option>
                    <option value="10">10:00</option>
                    <option value="13">13:00</option>
                    <option value="15">15:00</option>
                </select>
                <button type="submit">Book</button>
            </form>
            <form class="bookr" action="php/debooking.php" method="post">
                <h2>Remove booking</h2>
                <select class="slct" name="group" id="group">
                    <?php
                    $sql="SELECT * FROM courses WHERE idu=$idus";
                    $result=mysqli_query($connection, $sql);
                    ?>
                    <option value="" disabled selected>-- Select booking --</option>
                    <?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <option value="<?php echo $row['id'];?>"><?php echo ($row['name']);?>/<?php echo ($row['dayc']);?>/<?php echo ($row['timec']);?>:00</option>
                    <?php } ?>
                </select>
                <button type="submit">Remove</button>
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