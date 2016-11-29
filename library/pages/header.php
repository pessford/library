
<?php
include('dbcon.php');
if(!isset($_SESSION['login_user'])) {
?>
<script>window.location.href='index.php';</script>
    <?php
   // header("Location: index.php");
    exit;
}
$select = "select * from client_detail where username='".$_SESSION['login_user']."'";
 $quer = mysqli_query($conn, $select);
$results = mysqli_fetch_array($quer);
 
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Library management</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/customstyle.css" rel="stylesheet" type="text/css">

      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   
    


</head>

<body>

    <div id="wrapper">
        
            
    
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top cnavbar-default" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header cnavbar-header" >
               
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <a class="navbar-brand" href="#">Online Real Time Library Management System</a>
            </div>
        
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo "<img style='width: 20px;height: 20px;'' src='http://pessford.com/wsadeveloper.in/super_admin_library/pages/upload/".$results['company_logo']."' alt='Cinque Terre'>"; ?>
                        <span><?php
                                    echo $results['client_title'];
                                ?></span> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            

            <div class="navbar-default sidebar sidebarnavbar-default" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li style="border-top: 0.5px solid #e7e7e7; padding:10px 2px;">
                                  <?php
                        

                          echo "<img src=http://pessford.com/wsadeveloper.in/super_admin_library/pages/upload/".$results['company_logo']." class='img-thumbnail' alt='Cinque Terre' width='100px' height='100px'>";
                          echo "<a class='navbar-brand' href='index.html' style='float:right'>".$results['username']."</a>";

                          
                            
                            
                            ?>
                        </li>
                        <li>
                            <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users"></i> Students<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="students.php">Register Student</a>
                                </li>
                                <li>
                                    <a href="student_view.php">View Students</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                      

                         <li>
                            <a href="forms.php"><i class="fa fa-book"></i> Books<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="Book.php">Add New Book</a>
                                </li>
                                <li>
                                    <a href="book_view.php">View Book</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="forms.php"><i class="fa fa-book"></i> Books Issue<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="issue_book.php">Issue Book</a>
                                </li>
                                <li>
                                    <a href="book_issue_view.php">View Issue Book</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="add_standard.php"><i class="fa fa-plus"></i> Add New Standard</a>
                        </li>
                        
                        <li>
                            <a href="add_subject.php"><i class="fa fa-plus"></i> Add New Subject </a>
                        </li>

                        <li>
                            <a href="add_session.php"><i class="fa fa-plus"></i> Add New Session</a>
                        </li>

                        <li>
                            <a href="add_batch.php"><i class="fa fa-plus"></i> Add New Batch</a>
                        </li>

                     
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>

            <!-- /.navbar-static-side -->
        </nav>

        <?php
           
                 ?>
