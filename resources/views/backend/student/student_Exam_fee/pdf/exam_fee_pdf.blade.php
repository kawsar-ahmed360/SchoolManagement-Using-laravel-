<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	

<div class="container">

	 <div class="row">
	 	<div class="col-md-12">
	 		<table width="80%">
	 			  <tr>
                     <td style="width: 33%;text-align: center"><img src="{{ url('public/backend/school.jpg') }}" width="100px" alt=""></td>
                     <td style="width: 63%;text-align: center">
                     	<h4><strong>ABCD School</strong></h4>
                     	<h5><strong>Dhaka, Notun Bajar</strong></h5>
                     	<h6><strong>www.isoftinclu.bd.com</strong></h6>
                     </td>
                     <td style="text-align: center"><img src="{{ (@$edite)?url('public/backend/student_profile/'.$edite->image):'' }}" width="100px" style="border-radius: 7px;" alt=""></td>
	 			  </tr>

	 		</table>
	 	</div>

	 	<div class="col-md-12" style="text-align: center">
	 		 <h4 style="font-weight: bold; padding-top: -13px">Student Exam Fee Slip</h4>
	 	</div>

	 	<div class="col-md-12">
	 		<table style="width: 100%;" border="1" cellpadding="0" cellspacing="0">
	 			<tr>
	 				<td  style="text-align: center;padding:3px" width="50%">Student Name</td>
	 				<td  style="text-align: center;padding:3px">{{ $edite->name }}</td>
	 			</tr>
	 			<tr>
	 				<td  style="text-align: center;padding:3px" width="50%">Father Name</td>
	 				<td  style="text-align: center;padding:3px">{{ $edite->fname }}</td>
	 			</tr>


	 			<tr>
	 				<td  style="text-align: center;padding:3px" width="50%">Session</td>
	 				<td  style="text-align: center;padding:3px">{{ $edite->session }}-{{ $edite->session+1 }}</td>
	 			</tr>

	 			<tr>
	 				<td  style="text-align: center;padding:3px" width="50%">Class Name</td>
	 				<td  style="text-align: center;padding:3px">{{ $edite->class_name }}</td>
	 			</tr>

	 			<tr>
	 				<td  style="text-align: center;padding:3px" width="50%">ID N0</td>
	 				<td  style="text-align: center;padding:3px">{{ $edite->id_no }}</td>
	 			</tr>


	 			<tr>
	 				<td  style="text-align: center;padding:3px" width="50%">Mobile N0</td>
	 				<td  style="text-align: center;padding:3px">{{ $edite->number }}</td>
	 			</tr>

	 			<!-- <tr>
	 				<td  style="text-align: center;padding:3px" width="50%">Address</td>
	 				<td  style="text-align: center;padding:3px">{{ $edite->address }}</td>
	 			</tr> -->
	 			<tr>
	 				<td  style="text-align: center;padding:3px" width="50%">Exam Name</td>
	 				<td  style="text-align: center;padding:3px">{{$examname['exam_name']}}</td>
	 			</tr>

	 			<tr>
	 				<td  style="text-align: center;padding:3px" width="50%">Exam Fee</td>
	 				<td  style="text-align: center;padding:3px">{{ $examname->ammount }} Taka</td>
	 			</tr>


	 			<tr>
	 				<td  style="text-align: center;padding:3px" width="50%">Discount</td>
	 				<td  style="text-align: center;padding:3px">{{ $edite->discount }} %</td>
	 			</tr>

	 			<tr>
	 				<td  style="text-align: center;padding:3px" width="50%">Deiscount Fee Ammount</td>
	 				<td  style="text-align: center;padding:3px">{{ $finalfee }} Taka</td>
	 			</tr>

	 		</table>
	 		<i style="font-size: 10px;float: right;">Printing Time: {{ date('d m Y') }}</i>
	 	</div>
	 	<br>

	 	<div class="col-md-12">
	 		 <table border="0" width="100%">
	 		 	<tr>
	 		 		<td style="width: 30%"></td>
	 		 		<td style="width: 30%"></td>
	 		 		<td style="width: 40%" style="text-align: center">
	 		 			<hr style="border:solid 1px;width: 60%;color:#000;margin-bottom: 0px">
	 		 			<p style="text-align: center;">Principal/Headmaster</p>
	 		 		</td>
	 		 	</tr>
	 		 </table>
	 	</div>
	 </div>

	 <hr>


	 	 <div class="row">
	 	<div class="col-md-12">
	 		<table width="80%">
	 			  <tr>
                     <td style="width: 33%;text-align: center"><img src="{{ url('public/backend/school.jpg') }}" width="100px" alt=""></td>
                     <td style="width: 63%;text-align: center">
                     	<h4><strong>ABCD School</strong></h4>
                     	<h5><strong>Dhaka, Notun Bajar</strong></h5>
                     	<h6><strong>www.isoftinclu.bd.com</strong></h6>
                     </td>
                     <td style="text-align: center"><img src="{{ (@$edite)?url('public/backend/student_profile/'.$edite->image):'' }}" width="100px" style="border-radius: 7px;" alt=""></td>
	 			  </tr>

	 		</table>
	 	</div>

	 	<div class="col-md-12" style="text-align: center">
	 		 <h4 style="font-weight: bold; padding-top: -13px">Student Exam Fee Slip</h4>
	 	</div>

	 	<div class="col-md-12">
	 		<table style="width: 100%;" border="1" cellpadding="0" cellspacing="0">
	 			<tr>
	 				<td  style="text-align: center;padding:3px" width="50%">Student Name</td>
	 				<td  style="text-align: center;padding:3px">{{ $edite->name }}</td>
	 			</tr>
	 			<tr>
	 				<td  style="text-align: center;padding:3px" width="50%">Father Name</td>
	 				<td  style="text-align: center;padding:3px">{{ $edite->fname }}</td>
	 			</tr>


	 			<tr>
	 				<td  style="text-align: center;padding:3px" width="50%">Session</td>
	 				<td  style="text-align: center;padding:3px">{{ $edite->session }}-{{ $edite->session+1 }}</td>
	 			</tr>

	 			<tr>
	 				<td  style="text-align: center;padding:3px" width="50%">Class Name</td>
	 				<td  style="text-align: center;padding:3px">{{ $edite->class_name }}</td>
	 			</tr>

	 			<tr>
	 				<td  style="text-align: center;padding:3px" width="50%">ID N0</td>
	 				<td  style="text-align: center;padding:3px">{{ $edite->id_no }}</td>
	 			</tr>


	 			<tr>
	 				<td  style="text-align: center;padding:3px" width="50%">Mobile N0</td>
	 				<td  style="text-align: center;padding:3px">{{ $edite->number }}</td>
	 			</tr>

	 			<!-- <tr>
	 				<td  style="text-align: center;padding:3px" width="50%">Address</td>
	 				<td  style="text-align: center;padding:3px">{{ $edite->address }}</td>
	 			</tr> -->
	 			<tr>
	 				<td  style="text-align: center;padding:3px" width="50%">Exam Name</td>
	 				<td  style="text-align: center;padding:3px">{{$examname['exam_name']}}</td>
	 			</tr>

	 			<tr>
	 				<td  style="text-align: center;padding:3px" width="50%">Exam Fee</td>
	 				<td  style="text-align: center;padding:3px">{{ $examname->ammount }} Taka</td>
	 			</tr>


	 			<tr>
	 				<td  style="text-align: center;padding:3px" width="50%">Discount</td>
	 				<td  style="text-align: center;padding:3px">{{ $edite->discount }} %</td>
	 			</tr>

	 			<tr>
	 				<td  style="text-align: center;padding:3px" width="50%">Deiscount Fee Ammount</td>
	 				<td  style="text-align: center;padding:3px">{{ $finalfee }} Taka</td>
	 			</tr>

	 		</table>
	 		<i style="font-size: 10px;float: right;">Printing Time: {{ date('d m Y') }}</i>
	 	</div>
	 	<br>

	 	<div class="col-md-12">
	 		 <table border="0" width="100%">
	 		 	<tr>
	 		 		<td style="width: 30%"></td>
	 		 		<td style="width: 30%"></td>
	 		 		<td style="width: 40%" style="text-align: center">
	 		 			<hr style="border:solid 1px;width: 60%;color:#000;margin-bottom: 0px">
	 		 			<p style="text-align: center;">Principal/Headmaster</p>
	 		 		</td>
	 		 	</tr>
	 		 </table>
	 	</div>
	 </div>



</div>

</body>
</html>