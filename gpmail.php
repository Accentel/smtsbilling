<?php 
include('dbconnection/connection.php');
$id=$_GET['id'];
$sno=$_GET['sno'];
$u=mysqli_query($link,"select * from add_gbill1 where service_no='$sno'") or die(mysqli_error($link));
$u1=mysqli_fetch_array($u);
$pno=$u1['po_no'];
$wcc_num=$u1['wcc_num'];
$wcc_rec_num=$u1['wcc_rec_num'];
$loc=$u1['location'];
$l1=mysqli_query($link,"select * from location where id='$loc'") or die(mysqli_error($link));
$l2=mysqli_fetch_array($l1);
$location=$l2['lname'];
$rnew=mysqli_query($link,"select * from ggallery where serviceno='$sno'") or die(mysqli_error($link));
/*$r1=mysqli_fetch_array($r);
$imgname=$r1['image'];*/
$from="ospsbilling@ospsindia.com";
$to ='sam241997@gmail.com'.',';
 $to .='billingosps@gmail.com'.',';
  $to .='ghousekhan@ospsindia.com'.',';
  $to .='ospshyd@yahoo.com';
 //$to;
 $checknr= mysqli_num_rows($rnew);
 
 if($checknr!=2)
 {
 print "<script>";
			print "alert('Only 2  attachments are allowed!Kindly check and delete Inapropriate attachements');";
			print "self.location='gbill_list.php';";
			print "</script>";
			exit;
 }

$subject = "Invoice Number:-".$sno." -Po:".$pno."-WCC:".$wcc_num."-Rec:".$wcc_rec_num."-".$location;


$separator = md5(time());

// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;

// attachment namezz


// main header
$headers  = "From: ".$from.$eol;
$headers .= "MIME-Version: 1.0".$eol; 
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

// no more headers after this, we start the body! //

$message = "<p>Dear Sir/Madam,</p></br><p>
Greeting from our side!</p></br>
<p>Please find the attached  Invoice with DSC</p></br>
<table border=1 ><tr><td>Invoice no: $sno</td></tr>
<tr><td>Purchase Order no: $pno</td></tr>
<tr><td>WCC no           : $wcc_num</td></tr>
<tr><td>Reciept no       : $wcc_rec_num</td></tr>
<tr><td>Circle           : $location</td></tr></table></br></br>
<p>Thanks and Regards</p></br>
<p>OSPSBILLING</p></br>
<p>*This is a system generated email! Do not reply!</p>
";
$body = "--".$separator.$eol;
$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;

// message
$body .= "--".$separator.$eol;
$body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$body .= $message.$eol;

// attachment
$r=mysqli_query($link,"select * from ggallery where serviceno='$sno'") or die(mysqli_error($link));
while($r1=mysqli_fetch_array($r)){
     $imgname=$r1['image'];
    
     if($r1['extension']!='pdf')
		{
		 print "<script>";
			print "alert('Only Pdf files supported ');";
			print "self.location='gbill_list.php';";
			print "</script>";
		exit;
		}
  $doc="uploads/guj/".$imgname;
$file = fopen($doc,"rb");
		$data = fread($file,filesize($doc));
		$countfs =$countfs + filesize($doc)/1000000; 
		if($countfs > 10)
		{
		 print "<script>";
			print "alert('File Size exceeding 10 Mb! Kindly reduce the file size and retry !');";
			print "self.location='gbill_list.php';";
			print "</script>";
		exit;
		}
		fclose($file);
    $filename = $imgname; 
//$pdfdoc is PDF generated by FPDF
$pdfdoc     = "uploads/guj/".$imgname;
$pdfdoc=file_get_contents($pdfdoc);
$attachment = chunk_split(base64_encode($pdfdoc));
$body .= "--".$separator.$eol;
$body .= "Content-Type: application/pdf; name=\"".$filename."\"".$eol; 
$body .= "Content-Transfer-Encoding: base64".$eol;
$body .= "Content-Disposition: attachment".$eol.$eol;
$body .= $attachment.$eol;
}
$body .= "--".$separator."--";
// send message
if (mail($to, $subject, $body, $headers)) {
    echo '<script language="javascript">';
echo 'alert("mail successfully sent")';
echo '</script>';
	print "<script>";
	print "self.location='gbill_list.php';";
	print "</script>";
} else {
echo "mail send ... ERROR";
}


?>
