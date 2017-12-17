<!DOCTYPE html>
<html>
<head>
	<title>A New Checkup</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
  <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

  <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Neucha" rel="stylesheet">
</head>
<body>
	<style type="text/css">
		.mainform{
			transform: scale(0.88);
			box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
    -moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
    -webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);
    padding: 30px;
    background-color: #FFF;
		}
		.mainform > h2{
			text-align: center;
			background-color: black;
			color: white;
			padding: 5px;
			font-family:  "Neucha";
		}	
		input,textarea,select {
    border: 5px solid white; 
    -webkit-box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.15),
            0 0 16px rgba(0,0,0,0.15); 
    -moz-box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.15),
            0 0 16px rgba(0,0,0,0.15); 
    box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.15),
            0 0 16px rgba(0,0,0,0.15); 
    padding: 15px;
    background: rgba(255,255,255,0.5);
    margin: 0 0 10px 0;
}
.medium
{
	position:relative;
	left: 40vw;
}
.logout{
    	position: fixed;
    	bottom:3%;
    	right:3%;
    }
body{
	background-color: #FCE3D2;
	}
.image{
	text-align:center;
}
	</style>

<body>
 <div class="image">
<img src="https://upload.wikimedia.org/wikipedia/en/thumb/c/cf/Aadhaar_Logo.svg/1200px-Aadhaar_Logo.svg.png" width="500" height="300" />
 </div>
<div class="mainform">
<h2>A New CheckUp Form For A Patient : </h2>	
<br>
<form method="POST" action="{{url('/storecheckup')}}">
	{{csrf_field()}}
	@if ($errors->any())
    <div class="alert alert-danger p-1 mt-2">
            @foreach ($errors->all() as $error)
                <strong>{{ $error }}</strong>
            @endforeach
    </div>
    @endif
	<div class="form-group">
		<label for="questions"><b>Questions : </b></label>
		<textarea class="form-control" id="questions" name="questions" placeholder="Enter the patient's questions and diseases" required></textarea>
	</div>
	<div class="form-group">
		<label for="advice"><b>Advice : </b></label>
		<textarea class="form-control" id="advice" name="advice" placeholder="Enter Your Advice For the patient" required></textarea>
	</div>
	<div class="form-group">
		<label for="medicines"><b>Medicines : </b></label>
		<textarea class="form-control" id="medicines" name="medicines" placeholder="Enter The Medicines For the patient" required></textarea>
	</div>
	<div class="form-group">
		<label for="emergency"><b>Is it an Emergency : </b></label>
		<select class="form-control" name="emergency">
			<option value="0">No</option>
			<option value="1">Yes</option>
		</select>
	</div>
	<div class="form-group">
		<label for="vaccination"><b>Is Vaccination Required : </b></label>
		<select class="form-control" name="vaccination">
			<option value="0">No</option>
			<option value="1">Yes</option>
		</select>
	</div>
	<div class="form-group">
		<label for="surgery"><b>Is Surgery Required : </b></label>
		<select class="form-control" name="surgery">
			<option value="0">No</option>
			<option value="1">Yes</option>
		</select>
	</div>
	<div class="form-group">
		<label for="accompany"><b>Any Companions : </b></label>
		<input type="text" name="accompany" class="form-control" placeholder="Enter the Name of any companions accompanying the patient">
	</div>
	<div class="form-group">
		<label class="accmobile"><b>Mobile Number Of Companion :</b></label>
		<input type="number" name="accmobile" class="form-control" placeholder="Enter the Mobile Number Of the companion">
	</div>
	<div class="form-group">
		<label class="surgedetail"><b>Any Extra Information regarding surgery if needed : </b></label>
		<textarea class="form-control" name="surgedetail" id="surgedetail" placeholder="Enter any extra data about the surgery"></textarea>
	</div>
	<div class="form-group">
		<label class="vaccdetail"><b>Any Extra Information regarding vaccination if needed : </b></label>
		<textarea class="form-control" name="vaccdetail" id="vaccdetail" placeholder="Enter any extra data about the vaccination"></textarea>
	</div>
	<div class="form-group">
		<label class="emergencydetail"><b>Any Extra Information regarding the emergency : </b></label>
		<textarea class="form-control" name="emergencydetail" id="emergencydetail" placeholder="Enter any extra data regarding the Emergency"></textarea>
	</div>
	<div class="form-group">
		<label class="remarks"><b>Any Remarks for the patient : </b></label>
		<textarea class="form-control" name="remarks" id="remarks" placeholder="Enter any remarks"></textarea>
	</div>
	<input type="hidden" name="aadhar" value="{{$aadhar}}"></input>
	<input type="submit" name="submit" class="btn-lg btn-outline-primary medium"></input>
</div>
</form>
<div class="logout">
<a href={{url('logout')}}><img src="https://cdn0.iconfinder.com/data/icons/large-glossy-icons/512/Logout.png" width="70" height="90"></a>
</div>
</body>
</html>