
<?php
$error = NULL;
$error2 = NULL;
$update = false;
$username = "";
	$email = "";
    $phone = "";
	$seminar = "";
	$id = 0;
    $db = mysqli_connect('localhost', 'root', '', 'imoh');
if (isset($_POST['submit'])){
  //get form data
  $name = $_POST['username'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
   $seminar = $_POST['seminar'];

  if(strlen($name)<2){
    $error = "Your username must be at least 5 characters";
  }elseif(strlen($email<6)){
      $error = "Type in a valid email address";
  }elseif(strlen($phone<11)){
      $error = "Your username must be at least 11 characters";
  }else{
    //form is valid
    //connect to the database
    $mysqli = NEW MySQLi('localhost', 'root', '', 'imoh');

    //sanitised to strip any character that could be used for sql injection
    $name = $mysqli->real_escape_string($name);
    $email = $mysqli->real_escape_string($email);
    $phone = $mysqli->real_escape_string($phone);
     $seminar = $mysqli->real_escape_string($seminar);

    $insert = $mysqli->query("INSERT INTO accounts(username, email, phone, seminar) VALUES('$name','$email','$phone','$seminar')");

    if($insert){
      $error = "sucessfully registered";
    }else{
      $error = "Something went wrong try again";
    }

  }
}
if (isset($_POST['submitt'])){
  //get form data
  $name = $_POST['adminname'];
  $password = $_POST['password'];

  if(strlen($name)<2){
    $error2 = "Your username must be at least 5 characters";
  }elseif(strlen($password<6)){
      $error2 = "Your username must be at least 11 characters";
  }else{
    //form is valid
    //connect to the database
    $mysqli = NEW MySQLi('localhost', 'root', '', 'imoh');

    //sanitised to strip any character that could be used for sql injection
    $name = $mysqli->real_escape_string($name);
    $email = $mysqli->real_escape_string($email);
    $password = $mysqli->real_escape_string($password);

    $insert = $mysqli->query("INSERT INTO author(username, pass) VALUES('$name', '$password')");

    if($insert){
      $error2 = "sucessfully registered";
    }else{
      $error2 = "Something went wrong try again";
    }

  }
}

if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM accounts WHERE id=$id");

		if ($record->num_rows == 1) {
			$n = mysqli_fetch_array($record);
            $id = $n['id'];
			$username = $n['username'];
			$email = $n['email'];
            $phone = $n['phone'];
            $seminar = $n['seminar'];
		}
	}
if (isset($_POST['update'])) {
	$id = $_POST['id'];
    $username = $_POST['username'];
	$email = $_POST['email'];
    $phone = $_POST['phone'];
    $seminar = $_POST['seminar'];

    //stripping
    $username = $db->real_escape_string($username);
    $email = $db->real_escape_string($email);
    $phone = $db->real_escape_string($phone);
     $seminar = $db->real_escape_string($seminar);

	$insert = mysqli_query($db, "UPDATE accounts SET username='$username', email='$email', phone='$phone', seminar='$seminar' WHERE id=$id");
	
    if($insert){
        $update = false;
        $username = "";
	$email = "";
    $phone = "";
	$seminar = "";
      $error = "Successfully updated!"; 
      $id ="";
    }else{
         $update = false;
      $error = "Something went wrong try again";
    }
	// header('location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard 3</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a href="#">
                            <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                        </a>
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <li class="has-sub">
                                <a href="#">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                    <span class="bot-line"></span>
                                </a>
                                <ul class="header3-sub-list list-unstyled">
                                   
                                    <li>
                                        <a href="index.html">Dashboard</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <header class="header-mobile header-mobile-2 d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                     
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE -->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">You are here:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="#">Home</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Dashboard</li>
                                    </ul>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Welcome back
                                <span>John!</span>
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->

            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">Update</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">Add New Admin</div>
                                <div class="card-header"><?php echo $error2 ?></div>
                                <div class="card-body card-block">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" id="adminname" name="adminname" placeholder="New admin Username" class="form-control">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="password" id="password" name="password" placeholder="password"
                                                    class="form-control">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-asterisk"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions form-group">
                                            <button type="submit" name="submitt" class="btn btn-secondary btn-sm">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">Add New Candidate</div>
                                <div class="card-header"><?php echo $error ?></div>
                                <div class="card-body card-block">
                                    <form action="" method="POST">
                                         <div class="form-group">
                                            <div class="input-group">
                                                <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $id; ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" id="username" name="username" placeholder="Name" class="form-control" value="<?php echo $username; ?>" required>
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="email" id="email" name="email" placeholder="Email" class="form-control" value="<?php echo $email; ?>" required>
                                                <div class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" id="phone" name="phone" placeholder="phone Number" class="form-control" value="<?php echo $phone; ?>" required>
                                                <div class="input-group-addon">
                                                    <i class="fa fa-asterisk"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" id="seminar" name="seminar" placeholder="seminar" class="form-control" value="<?php echo $seminar; ?>" required>
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if ($update == true): ?>
                                            
                                         <div class="form-actions form-group">
                                            <button type="submit" name="update" class="btn btn-secondary btn-sm">Update</button>
                                        </div>
                                        <?php else: ?>
                                        <div class="form-actions form-group">
                                            <button type="submit" name="submit" class="btn btn-secondary btn-sm">Submit</button>
                                        </div>
                                        <?php endif ?>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">data table</h3>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>Phone Number</th>
                                            <th>Seminar</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                     <?php

                                                        require_once("getPost.php");
                                                        getMainPostHome();
                                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END DATA TABLE-->

            <!-- COPYRIGHT-->
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018. All rights reserved.</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END COPYRIGHT-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
