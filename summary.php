<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
//if($_SESSION['user'])
//{
$name=$_SESSION['user'];
//include('org1.php');


//include'dbfiles/org.php';
//include'dbfiles/org_update.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include'template/headerfile.php'; ?>
    <style>
        strong{
            color:red;
        }
        strong {
        color: red;
    }

    body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            animation: fadeIn 1s ease-in-out;
        }

        .box {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
            animation: slideInUp 1s ease-in-out;
        }

        .box-header {
            background-color: #5bc0de;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .box-title {
            margin: 0;
            font-size: 1.5em;
        }

        .box-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            transition: transform 0.3s ease-in-out;
        }

        .form-group:hover {
            transform: scale(1.05);
        }

        label {
            display: inline-block;
            margin-bottom: 5px;
        }

        input[type="date"],
        button {
            padding: 10px;
            font-size: 16px;
        }

        button {
            background-color: #5bc0de;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover {
            background-color: #31b0d5;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideInUp {
            from {
                transform: translateY(20px);
            }

            to {
                transform: translateY(0);
            }
        }

    </style>
    <body class="no-skin">
        <?php include'template/logo.php'; ?>

        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {
                }
            </script>

            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <script type="text/javascript">
                    try {
                        ace.settings.loadState('sidebar')} catch (e) {
                    }
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
                                <a href="dashboard.php">Home</a>
                            </li>

                            <li>
                                <a href="date_excel.php">Bill Status Tracker</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                           Bill Status Report Excel Sheet

                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                               <div class="box box-info">
								<div class="box-header with-border">
								  <h3 class="box-title"> Bill Status Report Excel</h3>
								</div>
                               
                                <form class="form-horizontal" method="post" id="validation-form" role="form" method="post" action="excel_report.php"  autocomplete="off" target="_blank">
                                   
									<div class="box-body">
  <input type="hidden" class="form-control" id="username" name="username" required placeholder="From date"  value="<?php echo $name?>" /> 
								   <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> From Date </label>

                                        <div class="col-sm-9">
                                            <!-- <input type="date" class="form-control" id="fromdate" name="fromdate" required placeholder="From date"  value="<?php echo date('Y-m-d');?>" />  -->
                                            <input type="date" class="form-control" id="fromdate" name="fromdate" required placeholder="From date"  value="<?php echo date('Y-m-d');?>" /> 
                                            <strong><?php echo $errorName; ?></strong>
                                        </div>

                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> To Date </label>

                                        <div class="col-sm-9">
                                                <input type="date" class="form-control" id="todate" name="todate" required placeholder="To date"  value="<?php echo date('Y-m-d');?>" /> <strong> </strong>
                                        </div>

                                    </div>
                                  
                                    <div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Bill Status</label>
    <div class="col-sm-9">
        <select class="form-control" id="bill_status" name="bill_status">
            <option value="">All</option>
            <option value="Active">Active</option>
            <option value="Rejected">Rejected</option>
            <option value="Approved">Approved</option>
        </select>
    </div>
</div>
								  
                                    <div class="form-group">
                                        <div class="col-md-offset-4 col-md-8">
                                            <button class="btn btn-info" type="submit" name="filter" id="filter">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                Report
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                          
											&nbsp; &nbsp; &nbsp;
                                           <a href="dashboard.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
									
					</div>				
					
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- PAGE CONTENT BEGINS -->

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

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
                    if ('ontouchstart' in document.documentElement)
                        document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->

<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script>
                    $(document).ready(function () {
                        $("#success-alert").hide();
                        $("#success-alert").fadeTo(1000, 500).slideUp(500, function () {
                            $("#success-alert").alert('close');
                        });
                        
                    });

</script>	<!-- inline scripts related to this page -->
</body>
</html>
<?php 



?>