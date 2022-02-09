<html>
    <head>
        <title>Login</title>
        <link rel="icon" href="imgs/favicon.jpg" type="image/ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel = "stylesheet" type="text/css" href="style.css" >
       
        <style> 
            .container{
                    border: 3px double #842029;
                    padding: 30px;
                    position: relative;
                    top: 60px;
                    justify-content: center;
                    align-items: center;
                    display: flex;
    
            }
        </style>
    </head>
</html>
<body>

    <?php
        
        include('db_connect.php');
        if(isset($_POST['submit'])) 
        {
            $email = $_POST['email'];
            $password = $_POST['password']; 
            
            $sql = "SELECT * FROM professor WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
                   
            if($count == 1) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $pw = $row['password'];
                if (strcmp($password, $pw)){
                    echo "<div class='alert alert-danger'>Your Email or Password invalid!</div>";;
                }
                else{
                    session_start();
                    $_SESSION['login_user'] = $row['professor_id'];
                    header("location: records.php");
                }
            }
            else {
                echo "<div class='alert alert-danger'>Your Email or Password is invalid!</div>";
            }
        }
        mysqli_close($conn);
    ?>
    
    <div class="container">
        <h1> Attendance Portal</h1>
        
        <div class="card" style="width: 40rem;">
           
            <div class="card-body">
            <h2 class = "alert alert-danger">Login</h2>
            <form action="" method="post">
                    <div class="form-group">
                        <input autofocus class="form-control" type="email" name="email" placeholder="Email" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <br>
                    <input class="btn btn-danger" type="submit" name="submit" value="Login">
                </form>
            
            </div>
        </div>
        
           
            
        
    </div>
    

    </body>