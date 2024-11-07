<?php //include('config.php');
ob_start();
include('dbconnection/connection.php');
session_start();
//echo $_SESSION['user'];
if($_SESSION['user'])
{
$name=$_SESSION['user'];
//include('org1.php');


include'dbfiles/org.php'
?>

<!DOCTYPE html>
<html lang="en">
	<?php include'template/headerfile.php'; ?>

	<head>
	<style>
/* Add some basic styling to the table */
.table {
    width: 100%;
    margin-bottom: 20px;
    background-color: #fff;
    box-shadow: 0 1px 1px rgba(0,0,0,0.05);
    border-radius: 10px;
    overflow: hidden;
}

.table th, .table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

/* Add animation to the table rows */
.table tbody tr {
    transition: background-color 0.3s;
}

.table tbody tr:hover {
    background-color: #f5f5f5;
}

/* Add styles to the upload button */
.upload-btn-wrapper {
    position: relative;
    overflow: hidden;
    display: inline-block;
}

.upload-btn-wrapper input[type=file] {
    font-size: 100px;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
}

.upload-btn {
    background-color: #5bc0de;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.upload-btn:hover {
    background-color: #337ab7;
}

/* Add styles to the download link */
.download-link {
    color: #5bc0de;
    text-decoration: none;
    transition: color 0.3s;
}

.download-link:hover {
    color: #337ab7;
}

/* Add some overall page styling */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f8f8;
}
.card {
    margin: 20px;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.main-container {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
}

.breadcrumbs {
    background-color: #f5f5f5;
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.page-content {
    padding: 20px;
}

/* Customize other elements as needed */

		
		</style>
</head>


	<body class="no-skin">
		<?php include'template/logo.php'; ?>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<!-- /.sidebar-shortcuts -->
				<?php include'template/sidemenu.php' ?>
				<!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">Dashboard</a>
							</li>
							<!--<li class="active">Blank Page</li>-->
						</ul><!-- /.breadcrumb -->

						<!-- /.nav-search -->
					</div>

					<div class="page-content">
						<!-- /.ace-settings-container -->

						<div class="row">
							<div class="col-xs-12">
								     
								<!-- PAGE CONTENT BEGINS -->
                                <div class="col-xs-12" align="center" style="margin-bottom:10px;">
								<div class="card">   
                                <h2>Upload Bill Format</h2>
								<span style="font-size:16px;">(File extenstion must be <b style="color:red;">.xls</b> only)</span>
								<br/><br/>
								<div class="card">   
                             <table class="table table-bordered">
							 <tr>
							 <th>BILL NUMBER</th>
							 <th>Employee ID</th>
							 <th>Employee Name</th>
							 <th>Mobile No</th>
							 <th>Bank A/C No</th>
							 <th>IFSC CODE</th>
							 <th>Project</th>
							 <th>Project Name</th>
							 <th>Site ID</th>
							 <th>Site Name</th>
							 <th>District Name</th>
							 <th>Work Description</th>
							 <th>Amount</th>
							 <th>RequestRaised By</th>
							 <th>Po Value</th>
							 <th>Remarks</th>
							 </tr>
							 </table>
							 
							 </div>
                             
							<div class="col-xs-12" align="center" >
							<div class="card">   
							<div>Download Bill Format <a href="bill.xls">Download</a></div>
                             


							 </div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
								</div>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
					</div>
			<?php include('template/footer.php'); ?>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
	</body>
	<?php mysqli_close($link); ?>
</html>
<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>