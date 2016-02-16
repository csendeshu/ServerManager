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
	?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Post
            <small>Manage Posts</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Add Post</li>
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
                  <h3 class="box-title">Add New Post</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="addpost_c.php" method="post">
                  <div class="box-body">
                    <div class="form-group">
                    <label for="PostName">Title</label>
                      <input type="text" class="form-control" name="PostName" placeholder="Ex:. My first blog post" />
                    </div>
					<div class="form-group">
					<label for="PostAuth">Author</label>
					  <input type="text" class="form-control" name="PostAuth" placeholder="<?php echo $_SESSION['user'];?>" value="<?php echo $_SESSION['user'];?>" />
					</div>
					 <div class="form-group">
                      <label for="PostCats">Category</label>
                      <select class="form-control" name="PostCats">
						<?php
							$result = mysql_query("SELECT * FROM cm_categories");
							while($cat = mysql_fetch_assoc($result)) {
						?>
							<option value="<?php echo $cat['ID']; ?>"><?php echo $cat['Title']; ?></option>
 						<?php
							}
						?>
                      </select>
                    </div>
				  
                  <br/>

				   <div class="row">
					<div class="col-md-12">
                <div class="box-body pad">
                  <form>
                    <textarea id="PostContent" name="PostContent" rows="10" cols="80">
                    </textarea>
                  </form>
                </div>
              </div><!-- /.box -->
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Post it</button>
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
	<!-- CK Editor -->
	<script src="//cdn.ckeditor.com/4.5.2/full/ckeditor.js"></script>
    <!-- AdminLTE App -->
    <script src="./dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="./dist/js/demo.js" type="text/javascript"></script>
	<script type="text/javascript">
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('PostContent');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
  </body>
</html>
