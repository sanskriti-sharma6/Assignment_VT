<html>
    <head>
        <title>Login</title>
        <link rel="icon" href="imgs/favicon.jpg" type="image/ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel = "stylesheet" type="text/css" href="style.css" >
        
    </head>
        <body>
            <?php
                include('navbar.php');
                include('db_connect.php');
                if(!isset($_SESSION['login_user'])){
                    header("location: login.php");
                }
                if(isset($_POST['mark']))
                {
                    $div = $_POST['div'];
                    $date = $_POST['dt'];
                    $sql = "SELECT * from student where division = '$div'";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $rollno = $row['roll_no'];
                        $sql2 = "SELECT * from attendance where date = '$date' and roll_no ='$rollno'";
                        $result2 = mysqli_query($conn, $sql2);
                        $count = mysqli_num_rows($result2);
                        if($count == 1)
                        {
                            echo "<div class='alert alert-danger'>Attendance Already Marked!</div>";
                            break;
                        }
                        if(isset($_POST['s'.$rollno]))
                        {
                            $sql1 = "INSERT into attendance (roll_no,date,status) VALUES ('$rollno','$date','1')";
                        }
                        else
                        {
                            $sql1 = "INSERT into attendance (roll_no,date,status) VALUES ('$rollno','$date','0')";
                        }
                        $result1 = mysqli_query($conn, $sql1);
                    }
                    echo "<div class='alert alert-success'>Attendance Marked!</div>";
                }
            ?>
            <div class="container">
            <h2>Attendance</h2>
            
                <div class="card" style="width: 40rem;">
                <form action="" method="post">
                    <div class="form-group">
                    <label class="form-check-label">Select Date to Mark Attendance</label>
                    <input autofocus class="form-control" type="date" name="date" required>
                    </div>
                    <br>
                    <label class="form-check-label">Select division</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="division" value="A" id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">Division A</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="division" value="B" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">Division B</label>
                    </div>
                    <br>
                    <input class="btn btn-danger" type="submit" name="show" value="Show Students">
                </form>
                </div>
    
            <div class="row">
                <form action="" method="post">
                    <?php
                        if(isset($_POST['show']))
                        {
                            $division = $_POST['division'];
                            $date = $_POST['date'];
                            $sql = "SELECT * from student where division = '$division'";
                            $result = mysqli_query($conn, $sql);
                            echo "<input type='hidden' name='div' value = '".$division."'>";
                            echo "<input type='hidden' name='dt' value = '".$date."'>";
                            echo "<div class='alert alert-success'>Division ".$division."</div>";
                            echo "<table class='table'><tr>
                            <th>Roll Number</th>
                            <th>Name</th>
                            <th>Status</th>
                            </tr>";
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $rollno = $row['roll_no'];
                                $name = $row['full_name'];
                                echo "<tr><td>".$rollno."</td><td>".$name."</td><td>
                                <div class='form-check form-switch'>
                                <input class='form-check-input' name='s".$rollno."' type='checkbox' role='switch' id='flexSwitchCheckChecked' checked>
                                </div></td></tr>";
                            }
                            echo "</table>";
                            echo"<input class='btn btn-danger' type='submit' name='mark' value='Mark Attendance'>";
                        } 
                    ?>
                </form>
            </div>
        </div>
    </body>
</html>