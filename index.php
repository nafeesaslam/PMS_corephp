<!--  -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=yes, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>KPMS</title>
    <!-- Bootstrap Core CSS -->
    <!-- <link href="/PMS_corephp/css/bootstrap.min.css" rel="stylesheet"> -->
     <script type="text/javascript" src="/PMS_corephp/js/jquery.min.js"></script>
    <link href="/PMS_corephp/boot/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <script type="text/javascript" src="/PMS_corephp/boot/js/bootstrap.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="rzslider.css">
    <link href="/PMS_corephp/css/simple-sidebar.css" rel="stylesheet">
    <link href="/PMS_corephp/css/style.css" rel="stylesheet">
    <link href="/PMS_corephp/css/crop.css" rel="stylesheet">

    <!-- <link rel="stylesheet" type="text/css" href="/PMS_corephp/css/jasny-bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/PMS_corephp/css/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="/PMS_corephp/css/datepicker3.css" />
    <link rel="stylesheet" href="/PMS_corephp/css/angular-toastr.css" />
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js">
</script>
 -->

   
    <script src="/PMS_corephp/js/angular.min.js"></script>
    <script type="text/javascript" src="/PMS_corephp/js/angular-route.min.js"></script>
    <script src="/PMS_corephp/js/angular-ui-router.min.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"></script>
  <!-- Angular Material Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
  

    <script type="text/javascript" src="/PMS_corephp/js/shim.js"></script>
    <script type="text/javascript" src="/PMS_corephp/js/upload.js"></script>
    <script type="text/javascript" src="/PMS_corephp/js/crop.js"></script>




    <script type="text/javascript" src="./Angular/app.js"></script>
    <script type="text/javascript" src="./Angular/controllers/dashboardController.js"></script>
    <script type="text/javascript" src="./Angular/controllers/employeesController.js"></script>
    <script type="text/javascript" src="./Angular/controllers/WasController.js"></script>
    <script type="text/javascript" src="./Angular/controllers/visibilityController.js"></script>
    <script type="text/javascript" src="./Angular/controllers/slideController.js"></script>
    <script type="text/javascript" src="./Angular/directives/slider.js"></script>
    <script type="text/javascript" src="./Angular/controllers/kpimasterController.js"></script>
    <script type="text/javascript" src="./Angular/controllers/departmentController.js"></script>
	<script type="text/javascript" src="./Angular/controllers/designationController.js"></script>
    <script type="text/javascript" src="./Angular/controllers/adminController.js"></script>



    <script src="/PMS_corephp/js/angular-toastr.tpls.js"></script>
    <!-- <script type="text/javascript" src="/PMS_corephp/js/jasny-bootstrap.js"></script> -->
    <script type="text/javascript" src="Chart.min.js"></script>
   <!--  <script type="text/javascript" src="/PMS_corephp/js/bootstrap-rating.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.2.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script> -->
    <script type="text/javascript" src="rzslider.min.js"></script>    

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body ng-app="epms">
        <!--Top Navbar -->
  <nav class="navbar navbar-inverse navbar-fixed-top" id="main_navbar" style="z-index: 1000 !important;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://managementseye.com" target="_blank">KPMS</a>
       <ul class="nav navbar-nav">
        <li class="hidebar" style="float: left;"><a href="#menu-toggle" id="menu-toggle" style="color:#fff;"><i class="fa fa-bars" style="color:#fff;"></i></a></li>

        <li style="float: right;"><a href="./php/Logout.php" style="color: #fff;">Logout <i class="fa fa-sign-out" style="color: #fff;"></i></a></li>
      </ul>
    </div>
	<ul class="nav navbar-nav navbar-right">
          <li id="right-toggle"><a href=""><i class="fa fa-calendar" style="color:white;"></i></a></li>
      </ul>
    </div>
</nav>

<!-- Top Navbar Ends -->
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" ng-controller="visibilityController">
            <ul class="sidebar-nav">
                
                <li style="margin-top: 35px;">
                    <a ui-sref="dashboard"> <i class="fa fa-tachometer"></i> My Dashboard</a>
                </li>
                <li ng-show="me">
                    <a ui-sref="employees"> <i class="fa fa-users"></i> My Reportees</a>
                </li>
                <!--<li>
                    <a href="#Overview"> <i class="fa fa-tachometer"></i> Overview</a>
                </li>
                <li>
                    <a href="#home"> <i class="fa fa-tachometer"></i> Events
                    <ul class="sub-menu">
                        <li><a href="#">ABC</a></li>
                        <li><a href="#">ABC</a></li>
                        <li><a href="#">ABC</a></li>
                        <li><a href="#">ABC</a></li>
                        <li><a href="#">ABC</a></li> 
                    </ul>
                    </a>
                </li>-->
                <li>
                    <a href="#home"> <i class="fa fa-book"></i> Knowledge Base <label class="badge" style="font-size:7px;background-color:#009933">coming soon</label></a>
                </li>
                 <li ng-show="me">
                    <a  id="gaurd"><i class="fa fa-key"></i> Masters
                    <i class="fa fa-angle-down" style="color:#fff;float:right;margin-top:5%;margin-left=-15%;"></i></a>

                    <ul id="childish" style="list-style: none;display: none;">
                        <li style="margin-left: -20%;text-indent: 25px;"><a ui-sref="kpimaster"><i class="fa fa-key"></i> KPI Master </a> </li>
                        <li style="margin-left: -20%;text-indent: 25px;"><a ui-sref="department"><i class="fa fa-key"></i> Department Master</a></li>
                        <li style="margin-left: -20%;text-indent: 25px;"><a ui-sref="designation"><i class="fa fa-key"></i> Designation Master</a></li>
						<li style="margin-left: -20%;text-indent: 25px;"><a ui-sref="form.interests"><i class="fa fa-key"></i> Employee Master</a></li>
                        <!-- <li><a href="">Department Master</a></li> -->
                    </ul>
                </li>
                 <li>
                    <a href="#home"> <i class="fa fa-bullhorn"></i> Announcement <label class="badge" style="font-size:7px;background-color:#009933">coming soon</label></a>
                </li>
                <!--<li>
                    <a href="#home"> <i class="fa fa-tachometer"></i> Services</a>
                </li>
                <li>
                    <a href="#home"> <i class="fa fa-tachometer"></i> Contact</a>
                </li>-->
                <div style="margin-top: 85%;color:#fff">
                <center>&copy; Alignassociate  2017</center></div>
                
            </ul>
        </div>
     <!--    <div id="side_logo">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div style="padding:7px;">
            <h5><i class="fa fa-eye"></i></h5>
            <h5>M</h5>
            <h5>E</h5>
            <h5>Y</h5>
            <h5>E</h5>
            <h5><i class="fa fa-eye"></i></h5>
        </div>    
        </div> -->
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
           <div class="main_container" ui-view> </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
  <!--   <script src="js/jquery.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
	<div id="right-sidebar" class="navbar-fixed-top my-container" style="height: 25%;width: 300px;float:right;/*position:absolute;*/background-color: #fff;z-index:10 !important;margin-left:77%;padding: 3px;display: none;box-shadow: 5px 5px 15px black;">
     <div style="margin-top: 70px;margin-left: 10px;"> 
        <h6>DATE FILTER</h6>
        <form name="date-is" action="" method="post">
        <select name="year" class="form-control" style="width:60px;float: left;padding: 0px !important;">
       
          <option value="">Year</option>
          <option value="2017">2017</option>
          <option value="2016">2016</option>
          <option value="2015">2015</option>
        </select>
        <select name="half_year" class="form-control" style="width:50px;float: left;padding: 0px !important;">
          <option value="">HY</option>
         <option value="H1">H1</option>
          <option value="H2">H2</option>
        </select>
        <select name="month" class="form-control" style="width:80px;float: left;padding: 0px !important;">
          <option value="">Month</option>
                  <option value="January">January</option>
                  <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
         
        </select>
        <select name="q_year" class="form-control" style="width:50px;float: left;padding: 0px !important;">
          <option value="">QY</option>
         <option value="Q1">Q1</option>
          <option value="Q2">Q2</option>
        </select>
        <button type="submit" name="getData" class="btn btn-default"><i class="fa fa-refresh"></i></button>
        </form>
      </div>
</div>
</body>
<!-- <script src="js/bootstrap.min.js"></script> -->

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        //$("sidebar-wrapper").css({'transition':'300ms all'});
    });
    $('#gaurd').click(function(e){
        e.stopImmediatePropagation();
        $('#childish').toggle('slow');
    });
	 $("#right-toggle").click(function(){
        $("#right-sidebar").toggle();
    })
   /* $('.fa-chevron-up').click(function(){
        $('#main_navbar, #side_logo').toggle();
       
    });*/
    </script>
</html>

