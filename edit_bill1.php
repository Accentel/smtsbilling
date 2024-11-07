<?php //include('config.php');
session_start();
include('dbconnection/connection.php');
if($_SESSION['user'])
{
 $name=$_SESSION['user'];
//include('org1.php');


include'dbfiles/org.php';
//include'dbfiles/iqry_acyear.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include'template/headerfile.php'; ?>
	 <script src="js/jquery.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script>// AJAX for deleting images
$(document).ready(function() {
    $(".delete-image").on("click", function(e) {
        e.preventDefault();
        var imageSrc = $(this).attr("data-image");
        
        $.ajax({
            type: "POST",
            url: "delete_image.php", // PHP script to delete the image
            data: { image: imageSrc },
            success: function(response) {
                if (response === "success") {
                    // Update respective image reference in the database
                    // You need to implement the PHP code in 'delete_image.php' to remove the image reference from the database
                    // Here, you can trigger a reload of the images or handle as needed
                    // For instance, if you're updating a specific image container after deletion:
                    $("#imageContainer_" + imageSrc).html(""); // Assuming you have containers for images with unique IDs
                } else {
                    alert("Failed to delete the image.");
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});

    </script>
    <style>
        strong{
            color:red;
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
            animation: fadeInAnimation ease 0.4s;
            animation-fill-mode: both;
            margin-top: 20px;
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeInAnimation ease 0.4s;
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

            .image-container img {
      max-width: 100%; /* Scale images to fit container */
      height: auto;
      display: block;
      width: 100%; /* Ensure images fill the cell width */
      max-height: 400px; /* Set a maximum height for the images */
      object-fit: cover; /* Maintain aspect ratio and crop if needed */
    }
    </style>
    <!-- Assuming you have HTML structure similar to the one you provided -->

<!-- ... Your HTML code ... -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                                <a href="#">SMTS Billing</a>
                            </li>
                            <li>
                                <a href="edit_bill1.php"> Billing List</a>
                            </li>
                            <li>
                                <a href="">Edit Billing</a>
                            </li>
                            <!--<li class="active">Blank Page</li>-->
                        </ul><!-- /.breadcrumb -->

                    </div>

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                                Edit Billing

                            </h1>
                        </div>
                        
                        <?php $id=$_GET['id'];
						$sq=mysqli_query($link,"select * from add_bill1 where id='$id'");
						$r=mysqli_fetch_array($sq);
						
						?>
                        
                        
                       
<div class="row">
                            <div class="col-xs-12">
                              
                                <div class="row">
                                    <div class="col-xs-12">
                                    <div class="card"> 
 <form name="frm" method="post" action="bill_suc_smts.php" enctype="multipart/form-data">
 <input type="hidden" name="id" value="<?php echo $id?>">
                                            <table class="table table-striped table-bordered table-hover">
                                            <tr><td align="right">Serial No</td>
    <td align="left"><input type="text" class="form-control" value="<?php echo $service_no=$r['service_no'];?>" required name="service_no" readonly></td>
    <td align="right">Work Description</td><td align="left"><input type="text" id="site_name" value="<?php echo $r['site_name'];?>"  class="form-control" name="site_name"></td>
                                           </tr>  
                                         
                                           <tr>
                                           <td align="right">Employee ID </td><td><input type="text" name="req_ref" value="<?php echo $r['req_ref'];?>" onblur="showHint22(this.value)"  class="form-control"></td>
                                           <td align="right">Raise Date</td><td align="left">
											<input type="date" class="form-control"  value="<?php echo $r['date'];?>" required name="inv_date" readonly>
											</td>
                </tr>
                <tr><td align="right">Employee Name</td><td align="left"><input type="text" value="<?php echo $r['indus_id'];?>"  class="form-control" id="indus_id" name="indus_id"></td>
                                           <td align="right">Employee Number</td><td align="left"><input type="text" value="<?php echo $r['mob'];?>"  class="form-control" id="mob" name="mob"></td><tr>
                                            <tr><td align="right">A/C No</td><td align="left"><input  type="text" value="<?php echo $r['po_no'];?>"  class="form-control" name="po_no">
                                            <td align="right">IFSC Code</td><td><input type="text" name="district" id="district" value="<?php echo $r['district'];?>"  class="form-control"></td>
										<input  type="hidden" value="<?php echo $bstatus=$r['bill_status'];?>"  class="form-control" name="bill_status">
										
										</td>
                    
                                        </tr>
                                        
                                       
                                       
                                        
                                        </tr>
                                        <tr><td align="right">Project Name</td><td align="left"><input type="text" value="<?php echo $r['proj_name'];?>"  class="form-control" name="proj_name" id="proj_name"></td>
                                         <td align="right">Project</td><td align="left"><input type="text" value="<?php echo $r['seeking_id'];?>"  class="form-control" name="seeking_id" id="seeking_id"></td>
                                        </tr>
                                        <tr><td align="right">Site ID</td><td align="left"><input type="text" value="<?php echo $r['seeking_opt'];?>"  class="form-control" name="seeking_opt" id="seeking_opt"></td>
                                        <td align="right">Site Name</td><td><input type="text" name="state" id="state"  value="<?php echo $r['state'];?>" class="form-control"></td>
                                        </tr>
                                        <td align="right">Approval raised By</td><td><input type="text" name="wcc_num" value="<?php echo $r['wcc_num'];?>"  class="form-control"></td>
                                        <td align="right">Po Value	</td><td><input type="text" value="<?php echo $r['wcc_rec_num'];?>" name="wcc_rec_num" id="wcc_rec_num"  class="form-control"></td>
                                        
                                        </tr>
                                         <tr>
                                         <td align="right">District Name</td><td><input type="text" name="type_work" id="type_work" value="<?php echo $r['type_work'];?>"   class="form-control"></td>
                                         <td align="right"><strong>NET Amount</strong></td><td><input type="text" name="net_amnt" id="net_amnt" value="<?php echo $r['net_amnt'];?>"   class="form-control"></td>
                </tr>
                <tr>
                                        <td align="right">Remarks</td><td><input type="text" name="pcw" id="pcw" value="<?php echo $r['pcw'];?>"  class="form-control"></td>
                                        <td align="right"><strong>REQUESTED Amount</strong></td><td><input type="text" name="total_amnt" id="total_amnt" value="<?php echo $r['total_amnt'];?>"   class="form-control"></td>
                                      
                                        </tr>
                                        <tr>
                                        <td align="right">Mail Date</td><td align="left">
											<input type="date" class="form-control"  value="<?php echo $r['bill_submit_date'];?>" required name="bill_submit_date" readonly>
											</td>
                                         <td align="right">Po No	</td><td align="left"><input type="text" value="<?php echo $r['pno'];?>"  class="form-control" name="pno" id="pno"></td>
                                        </tr>
                                        <tr><td align="right">Invoice No</td><td align="left"><input type="text" value="<?php echo $r['ino'];?>"  class="form-control" name="ino" id="ino"></td>
                                         <td align="right">Invoice Value</td><td align="left"><input type="text" value="<?php echo $r['inv'];?>"  class="form-control" name="inv" id="inv"></td>
                                        </tr>
                                        </tbody>
                                        </table>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-md-offset-5 col-md-5">
                                          
                                        
                                            <?php if($bstatus!="approved" ){?>
                                            <button class="btn btn-info" type="submit" name="update" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Update
                                            </button>
										<?php }else{?>
										
										<?php if($name!="admin"){?>
										
										<button class="btn btn-info" type="submit" name="update1" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Update
                                            </button>
											
										<?php }else{?>
										<button class="btn btn-info" type="submit" name="update" id="submit">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Update
                                            </button>
										
										<?php }?>
										
										<?php }?>

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="ebill_list.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
                                        </form>
                                        </div></div>	&nbsp; &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp;	&nbsp; &nbsp; &nbsp;
                                        <div class="card"> 
                                        <form name="imageForm" method="post" action="update_images.php" enctype="multipart/form-data">
                                        <table class="table table-striped table-bordered table-hover">
                                            
                                        <?php
// Assuming $row contains the data retrieved for a specific record
$image1 = $r['image_1']; // Retrieve image file name from the database for image 1
$image2 = $r['image_2']; // Retrieve image file name from the database for image 2
$image3 = $r['image_3']; // Retrieve image file name from the database for image 3
$image4 = $r['image_4']; // Retrieve image file name from the database for image 4

$imagePath = 'smtspic/'; // Path where your images are stored
?>
<!-- Display images if they exist -->

    <td align="left"><input type="hidden" class="form-control" value="<?php echo $service_no=$r['service_no'];?>" required name="service_no" readonly></td></tr>
<tr>
    <td align="right"></td>
    <td align="left" class="image-container">
    <a href="#" class="delete-image" data-image="<?php echo $image1; ?>">Delete Image 1</a>

    <?php
    if ($image1 !== null && file_exists($imagePath . $image1)) {
        echo '<img src="' . $imagePath . $image1 . '" alt="">';
        // echo '<a href="delete_image.php?image=' . $image1 . '">Delete</a>'; // Delete link for image 1
    } else {
        echo '';
    }
    ?>
        <input type="file" name="new_image_1" accept="image/*"> <!-- New image input -->
        <!-- <button type="button" class="edit-image-btn" data-image="1">Edit</button> Edit button -->
    </td>
    <td align="right"></td>
    <td align="left" class="image-container">
        <?php
        if ($image2 !== null && file_exists($imagePath . $image2)) {
            echo '<img src="' . $imagePath . $image2 . '" alt="">';
        } else {
            echo '';
        }
        ?>
        <input type="file" name="new_image_2" accept="image/*"> <!-- New image input -->
        <!-- <button type="button" class="edit-image-btn" data-image="2">Edit</button> Edit button -->
    </td>
</tr>
<tr>
    <td align="right"></td>
    <td align="left" class="image-container">
        <?php
        if ($image3 !== null && file_exists($imagePath . $image3)) {
            echo '<img src="' . $imagePath . $image3 . '" alt="">';
        } else {
            echo '';
        }
        ?>
        <input type="file" name="new_image_3" accept="image/*"> <!-- New image input -->
        <!-- <button type="button" class="edit-image-btn" data-image="3">Edit</button> Edit button -->
    </td>
    <td align="right"></td>
    <td align="left" class="image-container">
        <?php
        if ($image4 !== null && file_exists($imagePath . $image4)) {
            echo '<img src="' . $imagePath . $image4 . '" alt="">';
        } else {
            echo '';
        }
        ?>
        <input type="file" name="new_image_4" accept="image/*"> <!-- New image input -->
        <!-- <button type="button" class="edit-image-btn" data-image="4">Edit</button> Edit button -->
    </td>
</tr>


                                     
										</tbody>
                                        </table>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-md-offset-5 col-md-5">
                                          
                                        
                                        <?php if ($bill_status != 'Approved') { ?>
                                            <button class="btn btn-info" type="submit" name="" id="">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Update Images
                                            </button>
									
											
										<?php }else{?>
										<button class="btn btn-info" type="submit" name="submit_images" id="submit_images">
                                                <i class="ace-icon fa fa-save bigger-110"></i>
                                                Update Images
                                            </button>
										
									
										
										<?php }?>

                                            
											&nbsp; &nbsp; &nbsp;
                                           <a href="ebill_list.php"><button class="btn btn-danger" type="button" name="button" id="Close">
                                                <i class="ace-icon fa fa-close bigger-110"></i>
                                                Close
                                            </button></a>
                                        </div>
                                    </div>
                                        </form>
                                        </div></div></div></div>
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
		<script type="text/javascript">
</script> 
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
