<?php

include '../App/Db/connPoo.php';

$id = $_POST['id'];
$sql = "SELECT * FROM subpasta WHERE id_pasta = $id";
$result = mysqli_query($conn, $sql);

$out='';
while($row = mysqli_fetch_assoc($result)) 
{   
   $out .=  '<option value='.$row['id_subpasta'].'>'.$row['nome'].'</option>'; 
}
 echo $out;
?>