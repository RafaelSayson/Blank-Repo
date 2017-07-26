<?php  
 $connect = mysqli_connect("localhost", "root", "root", "intrdbproj");  
 $output = '';  
 $sql = "SELECT ar.applicantNo, firstname, middlename, lastname, contactNo, address, email, moe.eduDescription, yearApplied
FROM intrdbproj.applicant_ref ar join modeofeducation_ref moe on ar.eduCode= moe.eduCode;";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table id="userTbl" class="table table-responsive table-striped">  
                <tr>  
                     <th width="10%">Id</th>  
                     <th width="40%">First Name</th>  
					 <th width="40%">Middle Name</th>
                     <th width="40%">Last Name</th>  
					 <th width="40%">Contact Number</th>
					 <th width="40%">Address</th>
					 <th width="40%">Email</th>
					 <th width="40%">Educational Level</th>
					 <th width="40%">Year Applied</th>
                     <th width="10%">Delete</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["applicantNo"].'</td>  
                     <td class="firstname" data-id1="'.$row["applicantNo"].'" contenteditable>'.$row["firstname"].'</td>  
                     <td class="middlename" data-id2="'.$row["applicantNo"].'" contenteditable>'.$row["middlename"].'</td>   
                     <td class="lastname" data-id3="'.$row["applicantNo"].'" contenteditable>'.$row["lastname"].'</td>
					 <td class="contactNo" data-id4="'.$row["applicantNo"].'" contenteditable>'.$row["contactNo"].'</td>
					 <td class="address" data-id5="'.$row["applicantNo"].'" contenteditable>'.$row["address"].'</td>
					 <td class="email" data-id6="'.$row["applicantNo"].'" contenteditable>'.$row["email"].'</td>
					 <td class="eduDescription" data-id7="'.$row["applicantNo"].'" contenteditable>'.$row["eduDescription"].'</td>
					 <td class="yearApplied" data-id8="'.$row["applicantNo"].'" contenteditable>'.$row["yearApplied"].'</td>
                     <td><button type="button" name="delete_btn" data-id9="'.$row["applicantNo"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="firstname" contenteditable></td>  
                <td id="middlename" contenteditable></td>  
				<td id="lastname" contenteditable></td> 
				<td id="contactNo" contenteditable></td> 
				<td id="address" contenteditable></td> 
				<td id="email" contenteditable></td>
				<td id="eduDescription" contenteditable></td>
				<td id="yearApplied" contenteditable></td>
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
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