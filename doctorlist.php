<?php
        include 'includes/connection.php';
        
        session_start();
        
        if(isset($_GET['q'])){
        
                $dept_name = $_GET['q'];
                
                $sql = "select distinct(doctor_id),first_name,last_name,Doctor.image_url from Doctor join Doctor_department using(doctor_id) where dept_name = '".$dept_name."'"; 
        
                $result = $conn->query($sql);
               
        
        }
        

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href='https://fonts.googleapis.com/css?family=Balthazar' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="css/JiSlider.css">
  <link href='https://fonts.googleapis.com/css?family=Stalinist One' rel='stylesheet'>
  <script src = "js/JiSlider.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Autour One' rel='stylesheet'>
  <script src = "js/jquery.min.js"></script>
</head>
<body>
<div class = "mynav">
	 <nav class="navbar navbar-inverse navbar-fix navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" style = "color:black; font-size:1.5em" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Home</a></li>
        <li><a href="Departments.php">Departments</a></li>
        <!--
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
        -->
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if(isset($_SESSION['login_user'])){ ?>
       <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php   echo $_SESSION['login_user']; ?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
      <?php  }else{ ?>
        <li><a href="./PHP-login_sign_up/sign_up.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="./PHP-login_sign_up/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <?php   } ?>
      </ul>
      </div>
      </div>
      </nav>
 <div class="banner1 jarallax">
		<div class="container">
		</div>
	</div>

<div class="services-breadcrumb" style="padding-top: 1%">
		<div class="container">
			<ul>
				<li><a href="index.html" style="font-family: Balthazar; font-size: 1.4em">Home</a><i>|</i></li>
				<li style="font-family: Balthazar; font-size: 1.4em"><?php echo $_GET['q']; ?></li>
			</ul>
		</div>
	</div>
</div>
  <div class = "container-fluid">
  <!-- dep name card -->
  <?php if($result && $result->num_rows > 0){
        while(($row = $result->fetch_assoc())){
?>
  <div class="col-sm-3">
  <div class = "card card-1">
  <div style="margin-right: 4%; margin-left: 4%; padding-top: 4%">
  <img width="100%" src="<?php  echo $row['image_url']; ?>">
  <div style="text-align: center;"><h4><a href="doctorbook.php?q=<?php echo $row['doctor_id']?>"><?php  echo $row['first_name']." ".$row['last_name'];  ?></a></h4></div>
  </div>
  </div>
  </div>
  <?php }
     }
  ?>
  <!-- end -->
</div>
</body>
</html>
