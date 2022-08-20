<div class="container">
<div class="well">
	<h3 align="left">Printing Report</h3>
			    <form action="controller.php?action=add" Method="POST">  					
				<table id="example" class="table table-striped" cellspacing="0">
					
				  <thead>
				  	<tr>
				  		<!--  <th>No.</th> -->
				  		<th >
<!-- 				  		 <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">  -->
				  		 Admin</th>
				  		
				  	<!--	 <th>Major</th>-->
				  		<th>Student</th>
				  		<!--  <th width="">Level</th> -->
				  	<!--	<th align="center">Department</th>-->
				 
				 		<th>Print Date</th>
				  	</tr>	
				  </thead>
				  <tbody>
				  	<?php
	  			  		$mydb->setQuery("SELECT * 
						FROM  `sys_report` c ORDER BY PRINT_DATE");
				  		
						  	loadresult();
					  	
					function loadresult(){
					  		global $mydb; 
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
						//echo '<td width="5%" align="center"></td>';
				  		// echo '<td><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->COURSE_ID. '"/>
				  		// 		<a href="index.php?view=edit&id='.$result->COURSE_ID.'">' . $result->COURSE_NAME.'</a></td>';
				  	
				  	    echo '<td>'. $result->ADMIN.'</td>';
				  		//echo '<td>'. $_SESSION.'</td>';
				  		//echo '<td>'. $result->STUDENT.'</td>';

				  		echo '<td><a href="../student/index.php?view=edit&id='.$result->STUDENT.'">' . $result->STUDENT.'</a></td>';



				  		echo '<td>'. $result->PRINT_DATE.'</td>';
				  		//echo '<td align="left">'. $result->COURSE_LEVEL.'</td>';
				  		//echo '<td>'. $result->DEPARTMENT_DESC.'</td>';
				  		echo '</tr>';
				  		} 

// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

				  	}	
				  	?>
				  </tbody>
				
				</table>
				<?php
				if($_SESSION['ACCOUNT_TYPE']=='Administrator'){
						echo '
				';
			}
			?>
				</form>
	  	</div><!--End of well-->

</div><!--End of container-->

<!-- 						<form action="controller.php?action=add" method="post"><input type="submit"></form> -->