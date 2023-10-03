<?php
session_start();
error_reporting(0);
include("include/config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>WWW.facebook.com</title>
	<link rel="stylesheet" type="text/css" href="font/css/all.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head><br><br>
<body style="= color: white;">
<div  id="container">
	
<table>
<tbody>
<?php
$uid=$_SESSION['id'];
$query= "SELECT * FROM reg";
$sql=mysqli_query($con, $query);
$cnt=1;
if (mysqli_num_rows($sql)>0) 
{
 foreach ($sql as $reg) {
      
?>
<tr>
  <td style="padding-left: 4em;"><img src="img/<?= $reg['image'];?>" width="80" height="80"></td>
  <td style="padding-left: 4em;"><?= $reg['firstname']?></td>
  <td style="padding-left: 4em;"><?= $reg['lastname']?></td>
  <td style="padding-left: 4em;">
     <a href="uppay.php?id=<?=$reg['ID'];?>"   title="view"><i class="fa fa-eye" style="color: blue;"></i></a>
    </td> 
</tr>
<?php 
$cnt=$cnt+1;
 }
   }
      ?>
</tbody>
</table>








</div>
</body>
</html>