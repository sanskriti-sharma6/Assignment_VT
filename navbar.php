<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="navbar.css" rel="stylesheet">
<link rel = "stylesheet" type="text/css" href="style.css" >
<div class="nav flexbox navbg">
   

    <?php
        require("db_connect.php");
        session_start();
        if(isset($_SESSION['login_user'])){
            $usr = $_SESSION['login_user'];
            echo '
            <div style = "background-color:#f8d7da; width:100%;">
                <nav class= "navbar navbar-light">
                    <ul class="nav nav-tabs">
                        
                        <li class="nav-item">
                            <a class="nav-link" href="markattendance.php"> MARK ATTENDANCE</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="records.php">ATTENDANCE RECORDS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add_remove.php"> ADD/REMOVE STUDENT</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">LOG OUT</a></li>
                    </ul>
                </nav>
            </div>';
        }
        else{
            echo '
            <ul class="nav nav-tabs">
                <li class="nav-item">
                <a class="nav-link" href="login.php">Log In</a></li>
            </ul>';
        }
    ?>
</div>