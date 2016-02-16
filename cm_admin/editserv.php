<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ServerManager - Admin Area</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="./dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="./dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
  <?php
	session_start();
	include("./includes/functions.php");
		if(isset($_SESSION['user'])) {
			} else {
			header("Location: login.php");
		}
	error_reporting(E_ALL);

	// Report all PHP errors
	error_reporting(-1);
	
	// includes for navbar, statusbar, etc
	include("./includes/navbar.php");
	include("./includes/notifications.php");
	include("./includes/tasks.php");
	include("./includes/userbar.php");
	include("./includes/toggle-sidebar.php");
	include("./includes/sidebar.php");
	$svr = getServ($_GET['id']);
	?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Server
            <small>Manage Servers</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Edit Server</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Server</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="editserv_c.php" method="post">
                  <div class="box-body">
				    <label for="svName">Name</label>
                    <div class="input-group">
                     <span class="input-group-addon"><i class="fa fa-terminal"></i></span> 
                    <input type="text" class="form-control" name="svName" value="<?php echo $svr['name']; ?>" />
                    </div><br />
					<label for="svPort">Port</label>
					<div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                      <input type="number" class="form-control" name="svPort" value="<?php echo $svr['port']; ?>" />
                    </div><br />
					<label for="svMP">Max Players</label>
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-users"></i></span> 
                      <input type="number" class="form-control" name="svMP" value="<?php echo $svr['maxplayers']; ?>" />
                    </div><br />
					 <label for="svDir">Server Folder</label>
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-folder"></i></span> 
                      <input type="text" class="form-control" name="svDir" value="<?php echo $svr['directory']; ?>" />
                    </div>
					
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-danger">Save</button><div><input type="hidden" name="id" value="<?php echo $_GET['id'];?>" /></div>
                  </div>
                </form>
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	<?php 
	  include("./includes/footer.php");
	  include("./includes/asidebar.php");
	 ?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="./plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="./bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="./plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="./plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="./dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="./dist/js/demo.js" type="text/javascript"></script>
  </body>
</html>
