<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('backend/auth/login');
});



route::group(['middleware'=>'auth'],function(){
	route::get('userprofile','UserProfileController@user_profile')->name('user_profile');
	route::get('userprofileajax','UserProfileController@user_profileajax')->name('user_profileajax');
	route::post('userprofileupdate','UserProfileController@profile_update')->name('profile_update');
	route::post('password_change','UserProfileController@pass_change')->name('pass_change');
	route::post('profile','UserProfileController@profileChange')->name('profileChange');
});

route::group(['middleware'=>['auth','Admin']],function(){

	route::post('add_user','UserProfileController@AddUser')->name('AddUser');

	route::get('alluser','UserProfileController@userList')->name('userList');
	route::get('alluserajax','UserProfileController@userListajax')->name('userListajax');
	route::get('alluserDelete','UserProfileController@userListDelete')->name('userListDelete');

	//.....................Student Class...................

	route::get('student_classview','StudentClass@studentClassview')->name('studentClassview');
	route::get('student_classviewajax','StudentClass@studentClassviewajax')->name('studentClassviewajax');
	route::post('student_classSave','StudentClass@studentClassSave')->name('studentClassSave');
	route::get('student_classActiveajax','StudentClass@studentClassActiveajax')->name('studentClassActiveajax');
	route::get('student_classDeactiveajax','StudentClass@studentClassDeactiveajax')->name('studentClassDeactiveajax');
	route::get('student_classDeleteajax','StudentClass@studentClassDeleteajax')->name('studentClassDeleteajax');
	route::post('student_classEditeajax','StudentClass@studentClassEditeajax')->name('studentClassEditeajax');	

      //.......................Student Session.........................
	route::get('student_yearview','StudentYear@studentyearview')->name('studentyearview');
	route::get('student_yearviewajax','StudentYear@studentyearviewajax')->name('studentyearviewajax');
	route::post('student_yearSave','StudentYear@studentyearSave')->name('studentyearSave');
	route::get('student_yearActiveajax','StudentYear@studentyearActiveajax')->name('studentyearActiveajax');
	route::get('student_yearDeactiveajax','StudentYear@studentyearDeactiveajax')->name('studentyearDeactiveajax');
	route::get('student_yearDeleteajax','StudentYear@studentyearDeleteajax')->name('studentyearDeleteajax');
	route::post('student_yearEditeajax','StudentYear@studentyearEditeajax')->name('studentyearEditeajax');	

//..............................Student Group...............

	route::get('student_Groupview','StudentGroup@studentGroupview')->name('studentGroupview');
	route::get('student_Groupviewajax','StudentGroup@studentGroupviewajax')->name('studentGroupviewajax');
	route::post('student_GroupSave','StudentGroup@studentGroupSave')->name('studentGroupSave');
	route::get('student_GroupActiveajax','StudentGroup@studentGroupActiveajax')->name('studentGroupActiveajax');
	route::get('student_GroupDeactiveajax','StudentGroup@studentGroupDeactiveajax')->name('studentGroupDeactiveajax');
	route::get('student_GroupDeleteajax','StudentGroup@studentGroupDeleteajax')->name('studentGroupDeleteajax');
	route::post('student_GroupEditeajax','StudentGroup@studentGroupEditeajax')->name('studentGroupEditeajax');	

 //............................Student Shift...........................
	route::get('student_Shiftview','StudentShift@studentShiftview')->name('studentShiftview');
	route::get('student_Shiftviewajax','StudentShift@studentShiftviewajax')->name('studentShiftviewajax');
	route::post('student_ShiftSave','StudentShift@studentShiftSave')->name('studentShiftSave');
	route::get('student_ShiftActiveajax','StudentShift@studentShiftActiveajax')->name('studentShiftActiveajax');
	route::get('student_ShiftDeactiveajax','StudentShift@studentShiftDeactiveajax')->name('studentShiftDeactiveajax');
	route::get('student_ShiftDeleteajax','StudentShift@studentShiftDeleteajax')->name('studentShiftDeleteajax');
	route::post('student_ShiftEditeajax','StudentShift@studentShiftEditeajax')->name('studentShiftEditeajax'); 

	//............................Fee Category...........................
	route::get('Fee_categoryview','FeeCategory@FeeCategoryview')->name('FeeCategoryview');
	route::get('Fee_categoryviewajax','FeeCategory@FeeCategoryviewajax')->name('FeeCategoryviewajax');
	route::post('Fee_categorySave','FeeCategory@FeeCategorySave')->name('FeeCategorySave');
	route::get('Fee_categoryActiveajax','FeeCategory@FeeCategoryActiveajax')->name('FeeCategoryActiveajax');
	route::get('Fee_categoryDeactiveajax','FeeCategory@FeeCategoryDeactiveajax')->name('FeeCategoryDeactiveajax');
	route::get('Fee_categoryDeleteajax','FeeCategory@FeeCategoryDeleteajax')->name('FeeCategoryDeleteajax');
	route::post('Fee_categoryEditeajax','FeeCategory@FeeCategoryEditeajax')->name('FeeCategoryEditeajax');	

	//............................Fee Category ammount...........................
	route::get('fee_ammount','FeeCategoryAmmount@FeeAmmountview')->name('FeeAmmountview');
	route::get('fee_ammountadd','FeeCategoryAmmount@FeeAmmountadd')->name('FeeAmmountadd');
	route::get('fee_ammountviewajax','FeeCategoryAmmount@FeeAmmountviewajax')->name('FeeAmmountviewajax');
	route::post('fee_ammountSave','FeeCategoryAmmount@FeeAmmountSave')->name('FeeAmmountSave');
	route::get('fee_ammountActiveajax','FeeCategoryAmmount@FeeAmmountActiveajax')->name('FeeAmmountActiveajax');
	route::get('fee_ammountDeactiveajax','FeeCategoryAmmount@FeeAmmountDeactiveajax')->name('FeeAmmountDeactiveajax');
	route::get('fee_ammountDeleteajax','FeeCategoryAmmount@FeeAmmountDeleteajax')->name('FeeAmmountDeleteajax');
	route::get('fee_ammountEditeajax/{fee_category_id}','FeeCategoryAmmount@FeeAmmountEditeajax')->name('FeeAmmountEditeajax');
	route::post('fee_ammountupdate/{fee_category_id}','FeeCategoryAmmount@FeeAmmountupdate')->name('FeeAmmountupdate');
	route::get('fee_ammounteye/{fee_category_id}','FeeCategoryAmmount@FeeAmmounteye')->name('FeeAmmounteye');

	//..........................Exam Type....................

	route::get('exam_typeview','ExamTypeController@ExamTypeview')->name('ExamTypeview');
	route::get('exam_typeviewajax','ExamTypeController@ExamTypeviewajax')->name('ExamTypeviewajax');
	route::post('exam_typeSave','ExamTypeController@ExamTypeSave')->name('ExamTypeSave');
	route::get('exam_typeActiveajax','ExamTypeController@ExamTypeActiveajax')->name('ExamTypeActiveajax');
	route::get('exam_typeDeactiveajax','ExamTypeController@ExamTypeDeactiveajax')->name('ExamTypeDeactiveajax');
	route::get('exam_typeDeleteajax','ExamTypeController@ExamTypeDeleteajax')->name('ExamTypeDeleteajax');
	route::post('exam_typeEditeajax','ExamTypeController@ExamTypeEditeajax')->name('ExamTypeEditeajax');	


		//..........................Subject Manage....................

	route::get('subject_view','SubjectManagement@Subjectview')->name('Subjectview');
	route::get('subject_viewajax','SubjectManagement@Subjectviewajax')->name('Subjectviewajax');
	route::post('subject_Save','SubjectManagement@SubjectSave')->name('SubjectSave');
	route::get('subject_Activeajax','SubjectManagement@SubjectActiveajax')->name('SubjectActiveajax');
	route::get('subject_Deactiveajax','SubjectManagement@SubjectDeactiveajax')->name('SubjectDeactiveajax');
	route::get('subject_Deleteajax','SubjectManagement@SubjectDeleteajax')->name('SubjectDeleteajax');
	route::post('subject_Editeajax','SubjectManagement@SubjectEditeajax')->name('SubjectEditeajax');


	//..........................Assign Subject Manage....................

	route::get('Assignsubject_view','AssignSubjectController@AssignSubjectview')->name('AssignSubjectview');
	route::get('Assignsubject_add','AssignSubjectController@add_subject')->name('add_subject');
	route::get('Assignsubject_viewajax','AssignSubjectController@AssignSubjectviewajax')->name('AssignSubjectviewajax');
	route::post('Assignsubject_Save','AssignSubjectController@AssignSubjectSave')->name('AssignSubjectSave');
	route::get('Assignsubject_eye/{class_id}','AssignSubjectController@AssignSubjectEye')->name('AssignSubjectEye');
	route::get('Assignsubject_Deactiveajax','AssignSubjectController@AssignSubjectDeactiveajax')->name('AssignSubjectDeactiveajax');
	route::get('Assignsubject_Deleteajax','AssignSubjectController@AssignSubjectDeleteajax')->name('AssignSubjectDeleteajax');
	route::get('Assignsubject_Edit/{class_id}','AssignSubjectController@AssignSubjectEditeajax')->name('AssignSubjectEditeajax');	
	route::post('Assignsubject_update/{class_id}','AssignSubjectController@AssignSubjectupdate')->name('AssignSubjectupdate');


	//..........................Designation Manage....................

	route::get('Designation_view','DesignationController@Designationview')->name('Designationview');
	route::get('Designation_viewajax','DesignationController@Designationviewajax')->name('Designationviewajax');
	route::post('Designation_Save','DesignationController@DesignationSave')->name('DesignationSave');
	route::get('Designation_Activeajax','DesignationController@DesignationActiveajax')->name('DesignationActiveajax');
	route::get('Designation_Deactiveajax','DesignationController@DesignationDeactiveajax')->name('DesignationDeactiveajax');
	route::get('Designation_Deleteajax','DesignationController@DesignationDeleteajax')->name('DesignationDeleteajax');
	route::post('Designation_Editeajax','DesignationController@DesignationEditeajax')->name('DesignationEditeajax');


		//..........................Student Manage....................

	route::get('Student_reg_view','StudentRegistationController@Student_regview')->name('Student_regview');
	route::get('Student_reg_add','StudentRegistationController@Student_regadd')->name('Student_regadd');
	route::post('Student_reg_Save','StudentRegistationController@Student_regSave')->name('Student_regSave');
	route::get('Student_Class_Year','StudentRegistationController@Student_ClassYear')->name('Student_ClassYear');
	route::get('Student_sessionajax','StudentRegistationController@Student_Sessionajax')->name('Student_Sessionajax');
	route::get('Student_reg_Deleteajax','StudentRegistationController@Student_regDeleteajax')->name('Student_regDeleteajax');
	route::get('Student_reg_Editeajax/{student_id}','StudentRegistationController@Student_regEditeajax')->name('Student_regEditeajax');
	route::post('Student_update/{student_id}','StudentRegistationController@Student_regupdate')->name('Student_regupdate');		
	route::get('Student_promotion/{student_id}','StudentRegistationController@Student_promotion')->name('Student_promotion');
	route::post('Student_promo_up/{student_id}','StudentRegistationController@Student_promUpda')->name('Student_promUpda');
	route::get('Student_details/{student_id}','StudentRegistationController@Student_details')->name('Student_details');

//............................Student Roll Genarate........................................
   
   route::get('Student_role_view','StudentRoleGenarate@Student_Rollview')->name('Student_Rollview');
	route::get('Student_rollajax','StudentRoleGenarate@StudentRollJax')->name('StudentRollJax');
	route::post('Student_rollpost','StudentRoleGenarate@StudentRollPost')->name('StudentRollPost');

//...............................Registation fee controller.............	
      
    route::get('Student_regis_fee','RegistationFeeCcontroller@Student_RegisFee')->name('Student_RegisFee');
	route::get('Student_refisfeeajax','RegistationFeeCcontroller@StudentRegisAjax')->name('StudentRegisAjax');
	route::get('Student_pay_slip','RegistationFeeCcontroller@payslip')->name('payslip');

	//................................Student Monthly Fee................................
   route::get('Student_Monthly_fee','MonthlyFeeController@Student_MonthlyFee')->name('Student_MonthlyFee');
	route::get('Student_Monthlyfeeajax','MonthlyFeeController@StudentMonthlyAjax')->name('StudentMonthlyAjax');
	route::get('Student_Monthlyfee_slip','MonthlyFeeController@Monthlyfeepayslip')->name('Monthlyfeepayslip');	


	//................................Mid Exam Monthly Fee................................
   route::get('Student_Exam_fee','ExamfeeController@Student_ExamFee')->name('Student_ExamFee');
	route::get('Student_Examfeeajax','ExamfeeController@StudentExamAjax')->name('StudentExamAjax');
	route::get('Student_Examfee_slip','ExamfeeController@Examfeepayslip')->name('Examfeepayslip');

	//...........................Employe Registation.................................

	route::get('Employ_reg_view','EmployRegistationController@Employ_regview')->name('Employ_regview');
	route::get('Employ_reg_add','EmployRegistationController@Employ_regadd')->name('Employ_regadd');
	route::post('Employ_reg_Save','EmployRegistationController@Employ_regSave')->name('Employ_regSave');
	route::get('Employ_reg_Edite/{id}','EmployRegistationController@Employ_regEdite')->name('Employ_regEdite');
	route::post('Employ_reg_Update/{employ_id}','EmployRegistationController@Employ_regUpdate')->name('Employ_regUpdate');
	route::get('Employ_reg_Eye/{id}','EmployRegistationController@Employ_regEye')->name('Employ_regEye');

	//.............................EmploySalary Increment.....................................
    route::get('Employ_Salary_view','EmploySalaryController@Employ_Salaryview')->name('Employ_Salaryview');
	route::get('Employ_Salary_increment/{id}','EmploySalaryController@Employ_Salaryincrement')->name('Employ_Salaryincrement');
	route::post('Employ_Salary_Save','EmploySalaryController@Employ_SalarySave')->name('Employ_SalarySave');
	// route::get('Employ_Salary_Edite/{id}','EmploySalaryController@Employ_SalaryEdite')->name('Employ_SalaryEdite');
	// route::post('Employ_Salary_Update/{employ_id}','EmploySalaryController@Employ_SalaryUpdate')->name('Employ_SalaryUpdate');
	route::get('Employ_Salary_Eye/{id}','EmploySalaryController@Employ_SalaryEye')->name('Employ_SalaryEye');

		//.............................EmployLeave Controller.....................................
    route::get('Employ_Leave_view','EmployLeaveController@Employ_Leaveview')->name('Employ_Leaveview');
	route::get('Employ_Leave_add','EmployLeaveController@Employ_Leaveadd')->name('Employ_Leaveadd');
	route::post('Employ_Leave_Save','EmployLeaveController@Employ_LeaveSave')->name('Employ_LeaveSave');
	route::get('Employ_Leave_Edite/{id}','EmployLeaveController@Employ_Leaveedite')->name('Employ_Leaveedite');
	route::post('Employ_Leave_Update','EmployLeaveController@Employ_LeaveUpdate')->name('Employ_LeaveUpdate');
	route::get('Employ_Leave_Eye/{id}','EmployLeaveController@Employ_LeaveEye')->name('Employ_LeaveEye');

		//.............................EmployAttendance Controller.....................................
route::get('Employ_Attendance_view','EmployAttendanceController@Employ_Attendanceview')->name('Employ_Attendanceview');
route::get('Employ_Attendance_add','EmployAttendanceController@Employ_Attendanceadd')->name('Employ_Attendanceadd');
route::post('Employ_Attendance_Save','EmployAttendanceController@Employ_AttendanceSave')->name('Employ_AttendanceSave');
route::get('Employ_Attendance_Edite/{date}','EmployAttendanceController@Employ_Attendanceedite')->name('Employ_Attendanceedite');
route::post('Employ_Attendance_Update','EmployAttendanceController@Employ_AttendanceUpdate')->name('Employ_AttendanceUpdate');
route::get('Employ_Attendance_Eye/{date}','EmployAttendanceController@Employ_AttendanceEye')->name('Employ_AttendanceEye');

		//.............................EmployLeave Monthly Salary Controller.....................................
route::get('Employ_monthSalary_view','EmpolyMonthSalary@Employ_monthSalaryview')->name('Employ_monthSalaryview');
route::get('Employ_monthSalary_add','EmpolyMonthSalary@Employ_monthSalaryadd')->name('Employ_monthSalaryadd');
route::post('Employ_monthSalary_Save','EmpolyMonthSalary@Employ_monthSalarySave')->name('Employ_monthSalarySave');
route::get('Employ_monthSalary_Edite/{id}','EmpolyMonthSalary@Employ_monthSalaryedite')->name('Employ_monthSalaryedite');
route::post('Employ_monthSalary_Update','EmpolyMonthSalary@Employ_monthSalaryUpdate')->name('Employ_monthSalaryUpdate');
route::get('Employ_monthSalary_ajax','EmpolyMonthSalary@Employ_monthSalaryajax')->name('Employ_monthSalaryajax');
route::get('Employ_monthSalary_payslip','EmpolyMonthSalary@Employ_monthSalarypayslip')->name('Employ_monthSalarypayslip');


  //.............................Mark Entry Controller.....................................
route::get('Employ_markEnty_view','MarksController@Employ_markEntyview')->name('Employ_markEntyview');
route::get('Employ_markEnty_add','MarksController@Employ_markEntyadd')->name('Employ_markEntyadd');
route::post('Employ_markEnty_Save','MarksController@Employ_markEntySave')->name('Employ_markEntySave');
route::get('Employ_markEnty_Edit','MarksController@Employ_markEntyedite')->name('Employ_markEntyedite');
route::get('Employ_markEnty_Update','MarksController@Employ_markEntyUpdate')->name('Employ_markEntyUpdate');
route::post('Employ_markEnty_Updateroute','MarksController@Employ_markEntyUpdateroute')->name('Employ_markEntyUpdateroute');
route::get('Employ_assign_subject_ajax','MarksController@Employ_assign_subjectajax')->name('Employ_assign_subjectajax');
route::get('Employ_assign_student_ajax','MarksController@Employ_assign_studentajax')->name('Employ_assign_studentajax');
route::get('Employ_markEnty_payslip','MarksController@Employ_markEntypayslip')->name('Employ_markEntypayslip');



  //.............................Grade Point Controller.....................................

route::get('GrapdePoint_view','GradePointController@GrapdePointview')->name('GrapdePointview');
route::get('GrapdePoint_add','GradePointController@GrapdePointadd')->name('GrapdePointadd');
route::post('GrapdePoint_Save','GradePointController@GrapdePointSave')->name('GrapdePointSave');
route::get('GrapdePoint_Edit/{id}','GradePointController@GrapdePointedite')->name('GrapdePointedite');
route::post('GrapdePoint_Update','GradePointController@GrapdePointUpdate')->name('GrapdePointUpdate');
route::post('GrapdePoint_Updateroute','GradePointController@GrapdePointUpdateroute')->name('GrapdePointUpdateroute');
route::get('GrapdePoint_payslip','GradePointController@GrapdePointpayslip')->name('GrapdePointpayslip');



});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
