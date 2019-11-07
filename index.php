<!DOCTYPE html>
<html>
<style>
input[type=text], select ,input[type=date] ,textarea{
	width: 70%;
	padding: 12px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
}

input[type=submit]{
	width: 20%;
	background-color: #4CAF50;
	color: white;
	padding: 14px 20px;
	margin: 8px 0;
	border: none;
	border-radius: 4px;
	cursor: pointer;
	float: right;
	clear: both;
}
input[type=file] {
	width: 20%;
	background-color: #4CAF50;
	color: white;
	padding: 14px 20px;
	margin: 8px 0;
	border: none;
	border-radius: 4px;
	cursor: pointer;
}
input[type=submit]:hover ,input[type=file]:hover{
	background-color: #45a049;

}

div {
	border-radius: 5px;
	background-color: #f2f2f2;
	padding: 20px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
</script>
<head>
	<script>
		var title;
		var type;
		var id;
		var date;
		var Attendance;
		var comments;
		var file;
		$(document).ready(function(){

			// $("#submit").click(function(){
				// $( "#form" ).submit(function( event ) {
					$('#form').on('submit', function (event) {

						event.preventDefault();

						title= $("#rtitle").val();
						type = $("#rtype").val();
						id= $("#rid").val();
						date = $("#rdate").val();
						points= $("#rpoints").val();
						attendance = $("#rattendance").val();
						comments= $("#rcomments").val();
						file= $("#rfile").val();
			//	alert(title+","+type+","+id+","+date+","+points+","+Attendance+","+comments);

				//alert("e1 , e2 " + e1 + " " + e2);
				var isvalid = true;
				if (title == "") {

					$("#ltitle").css({"color": "red","font-size": "100%"});
					//alert("1");
					$("#ltitle").text("this field is required");

					isvalid = false;
				}else{
					if (date == "") {
						$("#ldate").css({"color": "red","font-size": "100%"});

						$("#ldate").text("this field is required");
						isvalid = false;
					}
					else{
						if (type == "") {
							$("#ltype").css({"color": "red","font-size": "100%"});
							$("#ltype").text("you must select a type");
							isvalid = false;
						}
					}
				}
				if (isvalid) {
					console.log("=valid=");

					$(function() {  
//data: $('form').serialize(),
//alert(file);
//alert($('form').serialize());
$.ajax({
	type: 'POST',
	url: 'addMeeting.php',
	data: {rtitle: title, rdate: date, rattendance: attendance, rpoints: points,rtype: type,rfile:file},
							//data: $('form').serialize(),
							success: function(result){
								console.log(result);

								$("#ltype").css({"color": "black","font-size": "100%"});
								$("#ltype").text("(required)");
								$("#ltitle").css({"color": "black","font-size": "100%"});
								$("#ltitle").text("(required)");
								$("#ldate").css({"color": "black","font-size": "100%"});
								$("#ldate").text("(required)");

								$("#rtitle").val("");
								$("#rtype").val("");
								$("#rid").val("");
								$("#rdate").val("");
								$("#rpoints").val("");
								$("#rattendance").val("");
								$("#rcomments").val("");
								$("#rfile").val("");
							}});
});
				}
// 
});

				});


			</script>




		</head>
		<body>
			<form method="POST" action="showMeetings.php" >
				<input type="submit" value="view meetings" name="view" >

			</form>

			<h3>Archive New Report</h3>

			<div>
				<form  method="POST" id="form">
					
					<label>Report Title:</label><br>
					<input type="text" id="rtitle" name="rtitle"  placeholder="Report Title"><label id="ltitle">(required)</label>
					<br>
					<label>Report ID:</label><br>
					<input type="text" id="rid"  name="rid" placeholder="Report id"><label >(Optional)</label>
					<br>
					<label>Date</label><br>
					<input type="date" id="rdate" name="rdate" placeholder="mm/dd/yyyy"><label id="ldate">(required)</label>
					<br>

					<label>Report Type:</label><label id="ltype">(required)</label><br>
					<select id="rtype" name="rtype" >
						<!-- <option>select a meeting type </option> -->
						<option value="department_meeting">department meeting</option>
						<option value="section_of_faculty_meeting">section of faculty meeting</option>
						<option value="faculty_meeting">faculty meeting</option>
						<option value="university_council_meeting">university council meeting</option>
					</select>
					<hr>
					<label>Main Poinnts of Meeting:</label><br>
					<input type="text" id="rpoints" name="rpoints" placeholder="Provide tags"/>
					<br>
					<label>Attendance:</label><br>
					<input type="text" id="rattendance" name="rattendance" placeholder="Atttendance by user name"/>

					<hr>
					<textarea id="rcomments" name="rcomments" rows="6" placeholder="Additional Comments..."></textarea>
					<br>
					<input type="file" name="rfile" id="rfile"/>
					<input type="submit" id="submit" value="Archive" name="archive" />
				</form>
			</div>
		</body>
		</html>
