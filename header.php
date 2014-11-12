<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><?php session_start(); echo "STORE ".$_SESSION['store'];?></a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                <?php
                    if($_SESSION['type']=='a'){
                        echo "Welcome Admin ";
                    }
                    else if($_SESSION['type']=='m'){
                        echo "Welcome Manager ";
                    }
                    else{
                        echo "Welcome ";
                    }
                    echo $_SESSION['username'];

                ?>
                 <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse" style="height:100em;">
            <ul class="nav navbar-nav side-nav" style="background-color:#">
                <li>
                    <a href="purchase.php"><i class="fa fa-fw"></i> Purchases</a>
                </li>
                <li>
                    <a href="products.php"><i class="fa fa-fw"></i> Products</a>
                </li>
                <li>
                    <a href="delivery.php"><i class="fa fa-fw"></i> Deliever Product</a>
                </li>
                <li>
                    <a href="feedback.php"><i class="fa fa-fw"></i> Feedbacks</a>
                </li>
                <li>
                    <a href="employees.php"><i class="fa fa-fw"></i> Employees</a>
                </li>
                <li>
                    <a href="customers.php"><i class="fa fa-fw"></i> Customers</a>
                </li>
                <li>
                    <a href="store.php"><i class="fa fa-fw"></i> Stores</a>
                </li>
                <li>
                    <a href="doctors.php"><i class="fa fa-fw"></i> Doctors</a>
                </li>
                <li style="height:30em;">
                   
                </li>
                
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
    
<!-- jQuery -->
<script src="static/js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="static/js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="static/js/plugins/morris/raphael.min.js"></script>
<script src="static/js/plugins/morris/morris.min.js"></script>
<script src="static/js/plugins/morris/morris-data.js"></script>