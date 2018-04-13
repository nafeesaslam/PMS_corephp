<?php
session_start();
include("../dbconfig.php");
extract($_POST);
$fileType = $_FILES['prodImg']['type'];
$fileSize = $_FILES['prodImg']['size'];
if($fileSize/1024 > '2048') 
{
echo 'Filesize is not correct it should be less than 2 MB.';
 exit();
 } //FileSize Checking
 
if($fileType != 'image/png' &&
 $fileType != 'image/gif' &&
 $fileType != 'image/jpg' &&
 $fileType != 'image/jpeg'
)     
 {
 echo 'Sorry this file type is not supported we accept only. Jpeg, Gif, PNG, or ';
 exit();
 } //file type checking ends here.
 $upFile = 'uploads/'.date('Y_m_d_H_i_s').$_FILES['prodImg']['name'];
 $path="views/".$upFile;
 
if(is_uploaded_file($_FILES['prodImg']['tmp_name'])) 
{
 if(!move_uploaded_file($_FILES['prodImg']['tmp_name'], $upFile)) 
 {
 echo 'Problem could not move file to destination. Please check again later. <a href="index.php">Please go back.</a>';
 exit;
 }
 } 
 else 
 {
 echo 'Problem: Possible file upload attack. Filename: ';
 echo $_FILES['prodImg']['name'];
 exit;
 }
 $prodImg = $upFile;
 //File upload ends here.
$query = "insert into employees (name,email,ppImage,designation) VALUES ('$name','$email','$path','$designation')";
$result = mysqli_query($conn,$query);
if($result)
{
header("location:../index.php#!/employees");
}
else
{
echo "failure";
}
 ?>
<!--   <html>
 <head>
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
  <body>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!- Modal content
    <!- <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</body>
   </html> --> 