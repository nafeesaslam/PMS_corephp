<?php
include("db.php");
extract($_POST);
echo $name;
echo $email;
echo $designation;
$fileType = $_FILES['prodImg']['type'];
$fileSize = $_FILES['prodImg']['size'];
if($fileSize/1024 > '2048') 
{
echo 'Filesize is not correct it should be less than 2 MB.';
exit();
} //FileSize Checking
if($fileType != 'image/png' && $fileType != 'image/gif' && $fileType != 'image/jpg' && $fileType != 'image/jpeg')     
{
echo 'Sorry this file type is not supported we accept only. Jpeg, Gif, PNG, or ';
exit();
} //file type checking ends here.
$upFile = 'uploads/'.date('Y_m_d_H_i_s').$_FILES['prodImg']['name'];
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
$query = "insert into tbl_mstr_emp_details (emp_name,emp_mailid,emp_img,emp_designation) VALUES ('$name','$email','$upFile','$designation')";
$result = mysqli_query($conn,$query);
if($result)
{
echo "<div class='form'><h3>User Added successfully.</h3><br/></div>";
}
else
{
echo "failure";
}
header("refresh:2;url=employees.html");
?>