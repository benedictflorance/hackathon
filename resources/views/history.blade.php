<!DOCTYPE html>
<html>
<head>
	<title>Medical History</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
  <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
</head>
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Raleway');
	.wrapper{
  width:50%;
  position:absolute;
  top:15%;
  background-color:white;
  left:25%;
  border-radius : 10px;
  box-shadow: 2px 6px 6px 6px grey;
  margin-top: 1.5vh;
}
body{
  background-color:#FCE3D2;
  font-family: 'Raleway', sans-serif;
}
.box p{
	  font-family: 'Raleway', sans-serif;
}
.heading
{
  background:linear-gradient(to right,red 50%, white 50%);
  width:50%;
  height:15%;
  position:absolute;
  top:0%;
  left:25%;
  border:0.1px solid grey;
  border-radius:45px;
  font-size:220%;
  margin-top: 0.5vh;
}
span:nth-child(2)
{
  position:absolute;
  left:60%;
  top:25%;
  color:red;
}
span:nth-child(1)
{
  position:absolute;
  left:20%;
  top:25%;
  color:white;
}
.details{
	width:100%;
	position: absolute;
	background-color:black;
	color:white;
	padding: 20px;
	text-align: center;
}
.records{
	margin-top: 15vh !important;
}
.box {
  width:80%;
  background-image: url("https://c.pxhere.com/photos/2e/52/cloth_blue_modern_background_art_abstract_design_backdrop-1087225.jpg!d");
  background-repeat: no-repeat;
  background-size: cover;
  margin:40px auto;
  position: relative;
  text-align: left;
  padding: 15px;
  line-height: 1.8em;
  font-size: 20px;
  font-family: 'Satisfy', cursive;
}
.box h2,h3,h5{
  text-align:center !important;
}
.box:before, .box:after
{
  z-index: -1;
  position: absolute;
  content: "";
  bottom: 15px;
  left: 10px;
  width: 50%;
  top: 80%;
  max-width:300px;
  background: #777;
  -webkit-box-shadow: 0 15px 10px #777;
  -moz-box-shadow: 0 15px 10px #777;
  box-shadow: 0 15px 10px #777;
  -webkit-transform: rotate(-3deg);
  -moz-transform: rotate(-3deg);
  -o-transform: rotate(-3deg);
  -ms-transform: rotate(-3deg);
  transform: rotate(-3deg);
}
.box:after
{
  -webkit-transform: rotate(3deg);
  -moz-transform: rotate(3deg);
  -o-transform: rotate(3deg);
  -ms-transform: rotate(3deg);
  transform: rotate(3deg);
  right: 10px;
  left: auto;
}
.logout{
    	position: absolute;
    	top:90%;
    	right:3%;
    }
.box > form{
		position:relative;
		left: 45%;
	}
</style>
<body>
<div class="heading">
  <span>List Of</span><span>Medical Records</span>
</div>
<div class="wrapper">
	<div class="details">
		<h3>{{$user->name}}</h3>
		<h3>{{$user->email}}</h3>
	</div>
	<div class="records">
	@foreach($checkups->all() as $checkup)
	<div class="box">
		<h2>{{$checkup->created_at}}</h2>
		<h3>{{$checkup->doctor->name}} , {{$checkup->doctor->hname}}</h3>
		<p>{{$checkup->questions}}</p>
		<form action="{{url('/checkups/getbyid')}}" method="POST">
			<input type="hidden" name="aadhar" value="{{$user->aadhar}}"></input>
			<input type="hidden" name="id" value="{{$checkup->id}}"></input>
			<input type="submit" class="btn btn-primary" value="View this"></input>
		</form>
	</div>
	@endforeach
</div>
</div>
<div class="logout">
<a href={{url('logout')}}><img src="https://cdn0.iconfinder.com/data/icons/large-glossy-icons/512/Logout.png" width="70" height="90"></a>
</div>
</body>
</html>