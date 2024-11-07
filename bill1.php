<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
if($_SESSION['user'])
{
 $name=$_SESSION['user'];
//include('org1.php');
include'dbfiles/org.php';
//include'dbfiles/iqry_acyear.php';
?>
<!DOCTYPE html>
<html lang="en">
<style>
    
.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
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
</style>

    <?php include'template/headerfile.php'; ?>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	 <script src="js/jquery.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script> 

    <style>
        strong{
            color:red;
        }
    </style>
    <script>
	function s2(i){
	    var curval= document.getElementById("pname"+i).value;
	$.ajax({          
        	type: "GET",
        	url: "getkndescriptionauto.php",
        	data:{keyword: curval, id: i},
        	success: function(data){
        		$("#suggesstion-box"+i).show();
			$("#suggesstion-box"+i).html(data);
			$("#pname"+i).css("background","#FFF");
        	}
	});
}
	function selectCountry(val,i) {
document.getElementById("pname"+i).value=val;
$("#suggesstion-box"+i).hide();
}
	</script>
	
	<script>
	
	function deleteRow()
   {	
var rr=document.getElementById("rows1").value

if(rr!=0){
   // var oRow = rr.parentNode.parentNode;
    document.getElementById("dynamic-table1").deleteRow(rr);  
	var row=document.getElementById("rows1").value
	document.getElementById("rows").value=row-1;
total();
	}
	else{
	alert('Please Select Atleast One Row');
	return false;
	}
   }
function ConfirmDialog() {
  var x=confirm("Are you sure to delete record?")
  if (x) {
    return true;
  } else {
    return false;
  }
    }
    </script>
	<script>
function showHint22(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	//document.getElementById("supname").value=strar[2];
	
	//document.getElementById("state").value=strar[1];
	
	//document.getElementById("city").value=strar[2];
	
	document.getElementById("indus_id").value=strar[1];	
	document.getElementById("mob").value=strar[2];
    document.getElementById("po_no").value=strar[3];
	//document.getElementById("addr").value=strar[4];	
	// document.getElementById("gst_in").value=strar[4];
	document.getElementById("district").value=strar[4];
	
	// document.getElementById("supervisor").value=strar[6];
	// document.getElementById("cordinator").value=strar[7];
	// document.getElementById("afm").value=strar[8];
	// document.getElementById("company").value=strar[9];
    // document.getElementById("frm_type").value=strar[5];
    }
  }
xmlhttp.open("GET","get-apdata3.php?q="+str,true);
xmlhttp.send();
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
                                <i class="ace-icon fa fa-cog home-icon"></i>
                                <a href="qot_list"> Billing</a>
                            </li>
                            <li>
                                <a href=""> Add Billing</a>
                            </li>
                           
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                        <!-- /.nav-search -->
                    </div>
                    <div class="card">
                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                              Raise Request

                            </h1>
                        </div>
                        
                       
                        
                        
                        <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                           
                                 
                                        <!-- <a onclick="window.open('add_stock.php','mywindow','width=700,height=500,toolbar=no,menubar=no,scrollbars=yes')" ><b style="color:red;">Add Store</b></a> -->
                                        <form name="frm" method="post" id="register-form" action="bill_suc_smts.php" enctype="multipart/form-data">
 <input type="hidden" name="id" value="<?php echo $id?>">
  <input type="hidden" name="ses" value="<?php echo $name;?>">
                                            <table class="table table-striped table-bordered table-hover">
                                                
                                            <!-- <table class="table table-striped table-bordered table-hover">
                                            <?php
$query = "SELECT counter FROM bill_counter WHERE id = 1";
$result = mysqli_query($link, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $counter = $row['counter'];

    if ($counter !== null) {
        $newCounter = $counter + 1;

        $updateQuery = "UPDATE bill_counter SET counter = $newCounter WHERE id = 1";
        mysqli_query($link, $updateQuery);

        $serialNumber = 'SMTSBL' . str_pad($counter, 7, '0', STR_PAD_LEFT);
    } else {
        // Set a default counter value if it's null
        $defaultCounter = 1;
        $updateQuery = "UPDATE bill_counter SET counter = $defaultCounter WHERE id = 1";
        mysqli_query($link, $updateQuery);

        $serialNumber = 'SMTSBL' . str_pad($defaultCounter, 7, '0', STR_PAD_LEFT);
    }
} else {
    // Handle the case where there's no data in the table
    $serialNumber = 'SMTSBL0000001';
}

?> -->
                                            <tr><td align="right">Serial No</td><td align="left">   <input type="text"  required id="service_no" class="form-control" name="service_no" ></td>
                                            <td align="right">Work Description</td><td align="left"><input type="text"  class="form-control" name="site_name" id="site_name"></td>
                                           
                                           
                                 </td>
											</tr>
											  <tr><td align="right">Employee  ID</td><td align="left">
											
											 <input id=\"pname\" list=\"city1\" class="form-control" name="req_ref" onChange="showHint22(this.value)" >
<datalist id=\"city1\" >

<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('dbconnection/connection.php');
$sql="select emp_code from emp_bill ";  // Query to collect records
// $r1=mysqli_query($link,$sql) or die(mysqli_error());
$r1 = mysqli_query($link, $sql);
if (!$r1) {
    die("Query failed: " . mysqli_error($link));
}

// Close the database connection
mysqli_close($link);
while ($row=mysqli_fetch_array($r1)) {
echo  "<option value=\"$row[emp_code]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";
include_once('dbconnection/connection.php');
?>
</datalist>
											</td>
											
											  
                                        <td align="right">Fund Req. Date</td><td><input type="date" value="<?php echo date('Y-m-d');?>"  required name="inv_date" id="inv_date" class="form-control"></td>
                                        </tr>
											
                                            <tr>
											
											
                                      
											
											<td align="right">Employee Name</td><td align="left">
											<input type="text" class="form-control"  value="" id="indus_id" name="indus_id">
											
											</td>

<td align="right">Number</td><td align="left"><input  type="text" value=""  class="form-control" name="mob" id="mob"></td>
                                        <tr>
                                        <td align="right">Account Number </td><td><input type="text"  name="po_no" id="po_no" class="form-control"></td>

                                        <td align="right">IFSC CODE</td><td align="left">
										 <input  type="text"   class="form-control" name="district" id="district"></td>

                                        </tr>
                                        
										
										 <tr>  <td align="right">Project</td>
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
                                       
                                        <td align="right"><strong>REQUESTED AMOUNT</strong> </td><td><input type="text" type="text"   name="total_amnt" id="total_amnt"  class="form-control"></td>
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
										<input type="file"     name="img1" id="img1" class="form-control"/></td>
                                        <td align="right">Photo 2</td><td><input type="file" name="img2" 
										id="img2"  class="form-control" value=""/></td>
                                        </tr>
										
										<tr><td align="right">Photo 3</td><td align="left">
										<input type="file"   name="img3" id="img3" class="form-control"/></td>
                                        
                                 
                                     <td align="right">Photo 4</td><td align="left">
										<input type="file"   name="img4" id="img4" class="form-control"/></td>
                                        
                                        </tr>
                                        
                                        </table>
                                      
                                        </div>
                                        <div class="form-group">
                                        <div class="col-md-offset-5 col-md-8">
                                          
                                        
                                            <button class="btn btn-info" type="submit" name="submit" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Save
                                            </button>
										
										
			

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="knqot_list.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
                                        </form>
</div>
                                        </div></div></div></div></div></div></div>
                                    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>   
                                    <script src="assets/js/jquery-2.1.4.min.js"></script>  

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

        <!-- ace scripts -->
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>




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
