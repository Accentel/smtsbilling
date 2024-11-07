<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
$name=$_SESSION['user'];

// $y=mysqli_query($link,"select * from employee where emp_name='$name'");
// $y1=mysqli_fetch_array($y);
// $email=$y1['emp_email'];
include'dbfiles/org.php';

?>
<!DOCTYPE html>
<html lang="en">
    <?php include'template/headerfile.php'; ?>
	 <script src="js/jquery.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
    <style>
        strong{
            color:red;
        }
          body {
            background: linear-gradient(to bottom, #87CEEB 0%, #ADD8E6 50%, #1E90FF 100%);
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        .login-layout {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(to bottom, #87CEEB, #ADD8E6, #1E90FF);
            animation: fadeInBackground ease 1.5s;
        }

        .card {
            background-color: whitesmoke;
            border: 1px solid #d2d6de;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 800;
            width: 100%;
            margin: auto;
            animation: fadeInAnimation ease 0.3s;
            animation-fill-mode: both;
            margin-top: 20px;
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeInAnimation ease 0.3s;
            animation-fill-mode: both;
            animation-delay: 0.3s;
            animation-iteration-count: 1;
        }

        @keyframes fadeInBackground {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeInAnimation {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        .btn-card {
            width: 100%;
            margin-top: 10px;
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

  
                <?php include'template/sidemenu.php' ?>
   

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
                                <a href="#">Settings</a>
                            </li>
                            <li>
                                <a href="bill_list.php"> Billing List</a>
                            </li>
                            <li>
                                <a href="">Edit Billing</a>
                            </li>
                    
                        </ul>

                  
                    </div>

                    <div class="page-content">
               
                        <div class="page-header">
                            <h1 align="center">
                                Edit Billing

                            </h1>
                        </div>
                        
                        <?php $id=$_GET['id'];
						$sq=mysqli_query($link,"select * from add_bill1 where id='$id'");
						$r=mysqli_fetch_array($sq);
						
						?>
                        
                        
                        <!-- PAGE CONTENT BEGINS -->
<div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="row">
                                    <div class="col-xs-12">
                                    <div class="card"> 
 <form name="frm" method="post" action="bill_suc_smts.php">
 <input type="hidden" name="id" value="<?php echo $id?>">
  <input type="hidden" name="location" value="<?php echo $r['location'];?>">
  <input type="hidden" name="email" value="<?php echo $email;?>">
                                            <table class="table table-striped table-bordered table-hover">
                                            <tr><td align="right">Serial No</td>
    <td align="left"><input type="text" class="form-control" value="<?php echo $service_no=$r['service_no'];?>" required name="service_no" readonly></td>
                                            <td align="right">Paid to</td><td><input type="text" name="req_ref" value="<?php echo $r['req_ref'];?>" onblur="showHint22(this.value)" required class="form-control" readonly></td>
                                           </tr>  
                                            <tr><td align="right">Work Description</td><td align="left"><input type="text" id="site_name" value="<?php echo $r['site_name'];?>" required class="form-control" name="site_name" readonly></td>
                                            <td align="right">Raise Date</td><td align="left">
											<input type="date" class="form-control"  value="<?php echo $r['date'];?>" required name="inv_date">
											</td>
                                            <tr><td align="right">A/C No</td><td align="left"><input  type="text" value="<?php echo $r['po_no'];?>"  class="form-control" name="po_no" readonly>
                                            <td align="right">IFSC Code</td><td><input type="text" name="district" id="district" value="<?php echo $r['district'];?>" required class="form-control" readonly></td>
										<input  type="hidden" value="<?php echo $bstatus=$r['bill_status'];?>"  class="form-control" name="bill_status">
										
										</td>
                    
                                        </tr>
                                        
                                       
                                        <tr><td align="right">A/C Name</td><td align="left"><input type="text" value="<?php echo $r['indus_id'];?>" required class="form-control" id="indus_id" name="indus_id" readonly></td>
                                        
                                        </tr>
                                         <tr><td align="right">Project</td><td align="left"><input type="text" value="<?php echo $r['seeking_id'];?>" required class="form-control" name="seeking_id" id="seeking_id" readonly></td>
                                         <td align="right">State</td><td><input type="text" name="type_work" id="type_work" value="<?php echo $r['type_work'];?>"   class="form-control" readonly></td>
                                       
                                        </tr>
                                        <tr><td align="right">Site ID</td><td align="left"><input type="text" value="<?php echo $r['seeking_opt'];?>" required class="form-control" name="seeking_opt" id="seeking_opt" readonly></td>
                                        <td align="right">Site Name</td><td><input type="text" name="state" id="state" required value="<?php echo $r['state'];?>" class="form-control" readonly></td>
                                        </tr>
                                        <td align="right">Responsible Person</td><td><input type="text" name="wcc_num" value="<?php echo $r['wcc_num'];?>" required class="form-control" readonly></td>
                                        <td align="right">Cluster</td><td><input type="text" value="<?php echo $r['wcc_rec_num'];?>" name="wcc_rec_num" id="wcc_rec_num" required class="form-control" readonly></td>
                                        
                                        </tr>
                                        <tr>
                                        <td align="right">Approval Date</td><td align="left"><input type="date"  name="payment_doc_date"  value="<?php echo date('Y-m-d')?>" class="form-control" ></td>
                                        <!-- <td align="right">Approval Date</td><td><input type="date" value="<?php echo $r['payment_doc_date'];?>" name="payment_doc_date"  class="form-control"></td> -->
                                        <td align="right"><b style="color:red;">Bill Status</b></td>
										 <td><select name="bill_status" id="bill_status" class="form-control">
            <option value="">Select Status</option> 
            <option value="Approved" <?php if($r['bill_status']=="Approved"){echo 'selected';} ?> >Approved</option>
            <option value="Rejected" <?php if($r['bill_status']=="Rejected"){echo 'selected';} ?> >Rejected</option> 
            <option value="Active" <?php if($r['bill_status']=="Active"){echo 'selected';} ?> >Active</option> 
        </select>
										 </td>
                                        </tr>
                                         <tr>
                                        <td align="right">Category</td><td><input type="text" name="pcw" id="pcw" value="<?php echo $r['pcw'];?>"  class="form-control" readonly></td>
                                        <td align="right"><strong>Total Amount</strong></td><td><input type="text" name="total_amnt" id="total_amnt" value="<?php echo $r['total_amnt'];?>"   class="form-control" readonly></td>
                                      
                                        </tr>
                                        </table>
                                    
                                       
										</tbody>
                                        </table>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-md-offset-5 col-md-5">
                                          
                                        
                                            <button class="btn btn-info" type="submit" name="approve" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Update
                                            </button>

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="apbill_list.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
                                        </form>
                                        </div></div></div></div></div></div></div>
                                    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>   
                                    <script src="assets/js/jquery-2.1.4.min.js"></script>  
                                    
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
