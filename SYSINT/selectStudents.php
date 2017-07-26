<?php  
 $connect = mysqli_connect("localhost", "root", "", "sysint");  
 $output = '';  
 $sql = "SELECT studentID, firstName, lastName, university from student";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table id="userTbl" class="table table-responsive table-striped">  
                <tr>  
                     <th >Id</th>  
                     <th>First Name</th>  
                     <th>Last Name</th>  
					 <th>University</th>
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["studentID"].'</td>  
                     <td class="firstName" data-id1="'.$row["studentID"].'" contenteditable>'.$row["firstName"].'</td>     
                     <td class="lastName" data-id3="'.$row["studentID"].'" contenteditable>'.$row["lastName"].'</td>
					 <td class="university" data-id4="'.$row["studentID"].'" contenteditable>'.$row["university"].'</td>
					 
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="firstName" contenteditable></td>   
				<td id="lastName" contenteditable></td> 
				<td id="university" contenteditable></td> 
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