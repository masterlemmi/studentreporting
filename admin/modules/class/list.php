
<div class="container">
<h3 align="left">List of Class</h3>
    <form action="#.php" Method="POST"> 

		<table id="example" class="display" cellspacing="0" width="100%">
	
	  <thead>
	 	<tr>
	 		 <th>No.</th>
	  		<th> Class Code</th>
	  		<th>Instructor</th> 
<!-- 	  		<th>Days And Time</th>  -->
	  		<th>Room</th> 
	  		<th>Section</th> 
	  		<th>Students</th>
	 	</tr>	
	  </thead>
	  <tbody>
	  	<?php
	  		global $mydb;
	
	

	 	$mydb->setQuery("SELECT * 
				FROM  `instructor` i,  `class` c
				WHERE i.`INST_ID` = c.`INST_ID` ");
		 	loadresult();


	  		function loadresult(){
		  		global $mydb;
		  		$cur = $mydb->loadResultlist();
				foreach ($cur as $result) {
			  		echo '<tr>';
			  		echo '<td width="5%" align="center"></td>';
			  		echo '<td> ' . $result->CLASS_CODE.' </td>';
			  		echo '<td>'. $result->INST_FULLNAME.'</td>';
			  		// echo '<td><a href="index.php?view=time&classId='.$result->CLASS_ID.'">'. $result->DAY.' /'. $result->C_TIME.'</a></td>'; 
			  		echo '<td>'.$result->ROOM.'</a></td>'; 
			  		echo '<td>'.$result->SECTION.'</a></td>'; 
			  		echo '<td><a href="index.php?view=class&classId='.$result->CLASS_ID.'">View List</a></td>';
			  	 	echo '</tr>';
		  		}
		  	} 
	  	?>
	  </tbody>
	 
	</table>
	</span>



<!-- 	<div class="btn-group">
	  <a href="index.php?view=add" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> New</a>
	  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
	</div> -->
	</form>


</div><!--End of container-->
