<?php
if(isset($_POST['ok_upload'])){
 $num=$_GET['file'];
 echo "<h3>Demo Images Script - Copyright by QHOnline.Info</h3>";
 $conn=mysqli_connect("localhost","gryphon","123456","piclib") or die("Failed to connect to MySQL: " . mysqli_connect_error());
 for($i=0; $i< $num; $i++){
  move_uploaded_file($_FILES['img']['tmp_name'][$i],"../bai18/data/".$_FILES['img']['name'][$i]);
  $url="../bai18/data/".$_FILES['img']['name'][$i];
  $name=$_FILES['img']['name'][$i];
  $sql="insert into images(img_url,img_name) values('../bai18/data','$name')";
  mysqli_query($conn,$sql);
  echo "Upload Thanh cong file <b>$name</b><br />";
  echo "<img src='$url' width='120' /><br />";
  echo "Images URL: <input type='text' name='link' value='$url' size='35' /><br />";
   
 }
 mysqli_close($conn);
}
else
{
 echo "Vui long chon hinh truoc khi truy cap vao trang nay";
}
?>