<?php 
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
 $name=$_SESSION['user'];
include'dbfiles/org.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include'template/headerfile.php'; ?>
    <style>
        strong{
            color:red;
        }
        /* Add this CSS in a separate file, e.g., styles.css, and link it in your HTML file */

/* Add this CSS in a separate file, e.g., styles.css, and link it in your HTML file */

body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f8f8;
}

.container {
    max-width: 800px;
    margin: 0 auto;
}

.card {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 20px 0;
    animation: fadeIn 0.5s ease-out;
}

.page-header h1 {
    text-align: center;
    margin-top: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-control {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.btn {
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
}

.btn-info {
    background-color: #5bc0de;
    color: #fff;
    border: 1px solid #46b8da;
}

.btn-danger {
    background-color: #d9534f;
    color: #fff;
    border: 1px solid #d43f3a;
}

/* Add cool animation to the form */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Add styles for responsive design */
@media (max-width: 768px) {
    .container {
        width: 100%;
        padding: 0 20px;
    }
}


    </style>
	<script>
   
        function ConfirmDialog() {
  var x=confirm("Are you sure to delete record?")
  if (x) {
    return true;
  } else {
    return false;
  }
    }
    </script>
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
                
                 <script src="js/jquery.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
<script>
    function fetchEmployeeData(empID) {
        $.ajax({
            url: 'fetch_employee_data.php', // Modify this URL to the file handling database operations
            method: 'POST',
            data: { empID: empID },
            dataType: 'json',
            success: function(data) {
                $('#indus_id').val(data['Employee Name']);
                $('#mob').val(data['Mobile No']);
                $('#po_no').val(data['ACCOUNT NUMBER']);
                $('#district').val(data['IFSC CODE']);
            },
            error: function(xhr, status, error) {
                // Handle error if any
            }
        });
    }
</script>


    </script>


                <!-- /.sidebar-shortcuts -->
                <?php include'template/sidemenu.php' ?>
                <!-- /.nav-list -->
s
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
                                <i class="ace-icon fa fa-cog home-icon"></i>
                                <a href="#">SMTS Billing</a>
                            </li>
                            <li>
                                <a href="#"> Fund Request</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>
                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Raise Bill request

                            </h1>
                        </div>
                        
                       
<div class="row">
                            <div class="col-xs-12">
                    
                                <div class="row">
                                    <div class="col-xs-12">
                                    
                                    <div class="card">                         
 <!-- <form name="frm" method="post" id="register-form" action="bill_suc_smts.php"> -->
 <form name="frm" method="post" id="register-form" action="bill_suc_smts.php" enctype="multipart/form-data">

                                            <table class="table table-striped table-bordered table-hover">
                                            <tr><td align="right">Serial No</td><td align="left"><input type="text" id="service_no" class="form-control"  name="service_no"></td>
                                            <td align="right">Work Description</td><td align="left"><input type="text"  class="form-control" name="site_name" id="site_name"></td>
                                           
                                           
                                 </td>
                                          <tr>
                                          <!-- <td align="right">Employee ID</td><td>
                                            
                                          <input id=\"pname\" list=\"city1\" name="req_ref" required class="form-control"  > -->

                                          <td align="right">Employee ID</td>
<td>
    <input id="pname" list="city1" name="req_ref" required class="form-control" onchange="fetchEmployeeData(this.value)">
    <datalist id="city1">
        <!-- Options will be populated dynamically -->
    </datalist>
</td>
                                        <td align="right">Fund Req. Date</td><td align="left"><input type="date"  name="inv_date"  value="<?php echo date('Y-m-d')?>" class="form-control"></td></tr>
                                    </tr>
                                    <tr><td align="right">Employee Name </td><td align="left"><input type="text"  class="form-control" name="indus_id" id="indus_id"></td>
                                        <td align="right">Number</td><td align="left"><input type="text" name="mob" id="mob"   class="form-control"></td>
                                       
                                    </tr> 
                                        
                                        <tr><td align="right">Account No</td><td align="left"><input  type="text"  class="form-control" name="po_no" id="po_no"></td>
                                        <td align="right">IFSC Code</td><td><input type="text" name="district" id="district"  class="form-control"></td>
                                        
                                    </tr>
                                    <td align="right">Project</td>
<td>
    <select name="seeking_id" id="seeking_id" class="form-control">
        <option value="VIL">VIL</option>
        <option value="TTSL">TTSL</option>
        <option value="KOEL">KOEL</option>
        <option value="SMIL">SMIL</option>
        <option value="INDUS">INDUS</option>
        <option value="TVIL">TVIL</option>
    </select>
</td>   
                                       
                                         <td align="right">Project Name</td>
<td>
    <select name="proj_name" id="proj_name" class="form-control">
        <option value="C&E ">C&E </option>
        <option value=" IME DG"> IME DG</option>
        <option value="IME BB">IME BB</option>
        <option value="IME AC">IME AC</option>
        <option value="EB">EB</option>
        <option value="Off Expenditure">Off Expenditure</option>
        <option value="salary adv">salary adv</option>
        <option value="Reimbursement">Reimbursement</option>
        <option value="others">others</option>
    </select>
</td>

                
                                    
                                        </tr>
                                        <tr><td align="right">Site ID</td><td align="left"><input type="text"  class="form-control" name="seeking_opt" id="seeking_opt"></td>
                                        <td align="right">Site Name</td><td><input type="text" name="state" id="state"  class="form-control"></td>    
                                    </tr>
                                     
                                        <td align="right">Request Raised By</td>
<td>
    <select name="wcc_num" id="wcc_num" class="form-control">
        <option value="DTM HYD">DTM HYD</option>
        <option value="DTM KRM">DTM KRM</option>
        <option value="DTM NZB">DTM NZB</option>
        <option value="DTM ADB">DTM ADB</option>
    </select>
</td>
                                       
                                        <!-- <td align="right">Po Value </td><td><input type="text" name="wcc_rec_num" id="wcc_rec_num"  class="form-control"></td>    -->
                                    </tr>
                                    <tr>
                                    <td align="right">District Name</td><td align="left"><input type="text"  class="form-control" name="type_work" id="type_work"></td>         
                                    <td align="right"><strong>NET AMOUNT</strong> </td><td><input type="text" type="text"   name="net_amnt" id="net_amnt"  class="form-control"></td>
                                    </tr>
                                        <tr>
                                        <td align="right">Remarks</td><td><input type="text" name="pcw" id="pcw"  class="form-control"></td>
                                       
                                        <td align="right"><strong>REQUESTED AMOUNT</strong> </td><td><input type="text" type="text"   name="total_amnt" id="total_amnt" value="<?php echo $tot1; ?>" class="form-control"></td>
                                       </td>
                                        </tr>
                                        <!-- <tr>  <td align="right">Mail Date</td><td align="left"><input type="bill_submit_date"  name="bill_submit_date"  value="<?php echo date('Y-m-d')?>" class="form-control"></td> -->
                                        <!-- <td align="right">Po No</td><td><input type="text" name="pno" id="pno"  class="form-control"></td>     -->
                                    </tr>
                                     <!-- <tr><td align="right">Invoice No</td><td align="left"><input type="text"  class="form-control" name="ino" id="ino"></td>
                                        <td align="right">Invoice Value</td><td><input type="text" name="inv" id="inv"  class="form-control"></td>    
                                    </tr> -->
                                        <tr>
                                        <td align="right">Photo 1</td><td align="left">
										<input type="file" required    name="img1" id="img1" class="form-control"/></td>
                                        <td align="right">Photo 2</td><td><input type="file" name="img2" 
										id="img2"  class="form-control" value=""/></td>
                                        </tr>
										
										<tr><td align="right">Photo 3</td><td align="left">
										<input type="file"   name="img3" id="img3" class="form-control"/></td>
                                        
                                 
                                     <td align="right">Photo 4</td><td align="left">
										<input type="file"   name="img4" id="img4" class="form-control"/></td>
                                        
                                        </tr>
                                        </table>
                                    
										
										</tr>
										</tbody>
                                        </table>
                                        <input type="hidden" name="ses" value="<?php echo $_SESSION['user']?>">
                                        <div class="form-group">
                                        <div class="col-md-offset-5 col-md-3">
                                            <button class="btn btn-info" type="submit" name="submit" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Save
                                            </button>

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="dashboard.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
                                        </form>
                                        </div></div></div></div></div></div></div>
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- page specific plugin scripts -->
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
        <script src="assets/js/dataTables.buttons.min.js"></script>
        <script src="assets/js/buttons.flash.min.js"></script>
        <script src="assets/js/buttons.html5.min.js"></script>
        <script src="assets/js/buttons.print.min.js"></script>
        <script src="assets/js/buttons.colVis.min.js"></script>
        <script src="assets/js/dataTables.select.min.js"></script>
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script> 
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>
<?php mysqli_close($link); ?>
</body>
</html>
<?php 

}else
{
session_destroy();

session_unset();

header('Location:index.php?authentication failed');

}

?>
