<?php 
require_once ("../../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;


	}
function doInsert(){
		
		$report = new SysReport();

		$admin   	= 'admin1';
		$student   	= 'student1';
		
			$report->ADMIN = $_SESSION['ACCOUNT_NAME'];
			$report->STUDENT = $student;
			 $istrue = $report->create(); 
			 if ($istrue == 1){			 	
			 	//message("New [". $coursename ."] course created successfully!","success");
			 	redirect('index.php');
			 }
		

		

}
function doEdit(){
	$courseid = $_GET['id'];
	$singledept = new Course();
	$object = $singledept->single_course($courseid);


	if (isset($_POST['savecourse'])){

		if ($_POST['coursename'] == "" OR $_POST['coursedesc'] == "") {
			
			message("All field is required!", "error");

		}else{
			$course = new Course();
			$courseid		= $_GET['id'];
			$coursename   	= $_POST['coursename'];
			$courselevel   	= $_POST['level'];
			$coursemajor   	= $_POST['major'];
			$coursedesc 	= $_POST['coursedesc'];
			$coursedept		= $_POST['dept'];
					
			$course->COURSE_NAME = $coursename;
			$course->COURSE_LEVEL = $courselevel;
			$course->COURSE_MAJOR = $coursemajor;
			$course->COURSE_DESC = $coursedesc;
			$course->DEPT_ID 	 = $coursedept;	
			$course->update($courseid);
			

			message($coursename. " has updated successfully!", "info");
			redirect('index.php');

		}
	}
		
}

function doDelete(){
	  @$id=$_POST['selector'];
	  $key = count($id);
	//multi delete using checkbox as a selector
	
	for($i=0;$i<$key;$i++){
 
		$Course = new Course();
		$Course->delete($id[$i]);
	}
	message("Course(s) already Deleted!","info");
	redirect('index.php');
}
?>