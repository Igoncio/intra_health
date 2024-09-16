<?php

include '../App/Db/connPoo.php';

$id = $_POST['id'];
$sql = "SELECT * FROM pasta WHERE id_grupo = $id";
$result = mysqli_query($conn, $sql);

$out='';
while($row = mysqli_fetch_assoc($result)) 
{   
   $out .=  '<option value='.$row['id_pasta'].'>'.$row['nome'].'</option>'; 
}
 echo $out;
?>