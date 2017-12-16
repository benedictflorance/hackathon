<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
  <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Raleway');

	.profile{
		height:100vh;
		width: 100%;

	}
	.profile-card
	{
		width:80%;
		height:90%;
		position: absolute;
		top:5%;
	}
	.rest{
		width: 100%;
		height: 100vh;
	}
	body{
		background-color: #FBE8C2;
		font-family: 'Raleway', sans-serif;

	}
	.profile-header
	{
		height:40%;
		width: 100%;
		background-color:#D00BF6;
		box-shadow: 1px 4px 10px 1px #8F8A88;

	}
	.doctor-pic
	{
		position: absolute;
		top: 50px;
		left: 180px;
	
		background-color:#FD7842;
	}
	.introText{
		text-align: center;
		font-size: 60%;
		position: absolute;
		top: 160px;
		color: white;
	}
	.details{
		position: absolute;
		top:42%;
        width: 100%;
        height: 55%;
        background-color: teal;
	}
	#heading{
		text-align: center;
		margin-top: 10px;
		color: white;
		background-color:#D00BF6;
	}
	.info{
		position: absolute;
		top:20%;
		left: 5%;
		width: 90%;
		height: 70%;
		background-color: #FFF;
	}
	h5{
		margin: 10px;
		padding: 5px;
	}
	.actions-card{
		width: 85%;
		height: 90%;
		position: absolute;
		top: 5%;
		left: 0%;
		background-color: #F3B790;
		box-shadow: 2px 8px 8px 2px #8F8A88; 
	}
	#actions-heading{
		text-align: center;
		margin-top: 5px;
		background-color: teal;
		padding: 10px;
		border:0.5px solid grey;
		font-size: 230%;
	}
	.patients-list
	{
		width:90%;
		height: 75%;
		position: relative;
		background-color: #FFF;
		top:5%;
		left: 5%;
		overflow-y: scroll;
	}
	.patient{
		display: inline-block;
		border:0.5px solid grey;
		width: 100%;
		padding: 15px;
		cursor: pointer;
	}
	.patient > form{
		position:relative;
		left: 30%;
	}
    .logout{
    	position: absolute;
    	top:90%;
    	right:3%;
    }
    form{
    	display: inline-block;
    }
	
	</style>
<body>
<div class="wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-4 profile">
				<div class="profile-card">
					<div class="profile-header">
						<div class="doctor-pic">
						  <img src="https://upload.wikimedia.org/wikipedia/en/thumb/c/cf/Aadhaar_Logo.svg/1200px-Aadhaar_Logo.svg.png" / width="100" height="100">
					    </div> 
					    <div class="introText">
					    	<h4>Welcome Back, {{$doctor}}!</h1>
					    	<h6>Thanks for getting involved in the mission of digitising the healthcare system of our nation!</h3>
					    </div>
					</div>
					<div class="profile-details">
						<div class="details">
							<h4 id="heading">Your Account Info:</h4>
							<div class="info">
								<h5><b>Name :</b> {{$doctor}}</h5>
								<h5><b>Register ID :</b> {{$registerid}}</h5>
								<h5><b>Hospital Name :</b> {{$hname}}</h5>
								<h5><b>Hopital Address :</b> {{$haddress}}</h5>
								<h5><b>Contact Number :</b> {{$mobile}}</h5>
								<h5><b>Email :</b> {{$email}}</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-8">
				<div class="actions-card">
					<h2 id="actions-heading">Your List Of Trusted Patients :</h2>
					<div class="patients-list">
						@foreach($patients->all() as $patient)
						<div class="patient">
							<h3><b>Name : </b> {{$patient->name}}</h3>
							<h3><b>Email : </b> {{$patient->email}}</h3>
							<h3><b>Mobile Number : </b> {{$patient->officialuser->mobile}}</h3>
							<h3><b>DOB :</b> {{$patient->dob}}</h3>
							<form action="{{url('addcheckup')}}" method="POST">
							{{csrf_field()}}
							<input type="hidden" name="aadhar" value="{{$patient->aadhar}}">
							<input type="submit" class="btn btn-outline-primary" value="Add a new Checkup"></input>
							</form>
							<form action="{{url('checkups/getall')}}" method="POST">
							{{csrf_field()}}
							<input type="hidden" name="aadhar" value="{{$patient->aadhar}}">
							<input type="submit" class="btn btn-outline-info" value="View Medical History"></input>
							</form>
						</div>
						@endforeach
					</div>
				</div>
				<div class="logout">
					<a href={{url('logout')}}><img src="https://cdn0.iconfinder.com/data/icons/large-glossy-icons/512/Logout.png" width="70" height="90"></a>
				</div>
			</div>
		</div>
	</div>
</div>



</body>
</html>