<?php  
$connect = mysqli_connect("localhost", "root", "1234", "sysintg");
$output = '';
$sql = "SELECT studentID, firstName, lastName, university from student";
$result = mysqli_query($connect, $sql);

$output .= '
<div class="table-responsive">
 <table id="userTbl" class="table table-responsive table-striped">
   <tr>
     <th>Id</th>
     <th>First Name</th>
     <th>Last Name</th>
     <th>University</th>
   </tr>';


   if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
     $output .= '
     <tr>
       <td>'.$row["studentID"].'</td>
       <td>'.$row["firstName"].'</td>
       <td>'.$row["lastName"].'</td>
       <td>'.$row["university"].'</td>
     </tr>';}
     
   $output .= '
   <tr>
    <td></td>
    <td id="firstName"></td>
    <td id="lastName"></td>
    <td id="university"></td>
  </tr>
  ';
  }

else
{
  $output .= '<tr>
  <td colspan="4">Data not Found</td>
</tr>';
}
$output .= '</table>
</div>';
echo $output;
?>