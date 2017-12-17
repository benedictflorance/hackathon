<!DOCTYPE html>
<html>
<head>
	<title>A Particular Medical Record</title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
  <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<body class="lighten-3">
	<style type="text/css">
		@import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);

ol, li, p, h4 {
  margin: 0;
}

body {
  background: #EEE2A0;
  max-width: 80%;
  width: 500px;
  margin: 40px auto;
  font: normal 16px/24px "Montserrat", "Helvetica Neue", sans-serif;
}

h3 {
  font-size: 1.65rem;
  margin: 15px 0;
  text-align: center;
}

ol {
  counter-reset: section;
}

li { 
  list-style-type: none;
  position: relative;
  font-size: 1.5rem;
  padding: 15px;
  margin-bottom: 15px;
  background: #93bcff;
  color: #fff;
  border: 1px #0960ef;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
}
li:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

h4 {
  position: relative;
  padding-bottom: 10px;
}

h4:after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 25px;
  height: 2px;
  background: white;
}

p {
  font-size: 1.3rem; 
  line-height: 1.5rem;
  margin-top: 15px;
}

li::before {
    counter-increment: section;
    content: counter(section);
    text-align: center;
    display: inline-block;
    color: #000;
    border-radius: 50%;
    position: absolute;
    left: -65px;
    top: 50%;
    transform: translateY(-50%);
    padding: 12px;
    font-size: 2rem;
    width: 50px;
    height: 50px;
    border: 2px solid #000;
}
h1{
	text-align: center;
}
.mainpage{
	border-radius: 10px;
	border:1px solid black;
	padding: 35px;
	 box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
    -moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
    -webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);
    width: 700px;
	}
  .logout{
      position: fixed;
      top:90%;
      right:3%;
    }
	</style>
<div  class="mainpage">	
	<h1>Details of the selected medical record: </h1>
<ol>
  <li>
    <h4><b>Date of the checkup :</b></h4>
    <p>{{$checkup->created_at}}</p>
  </li>
  <li>
    <h4><b>Patient Details:</b></h4>
    <p>{{$user->name}} - {{$user->aadhar}}</p>
    <p>{{$user->address}} - {{$user->officialuser->mobile}}</p>
  </li>
  <li>
    <h4><b>Questions :</b></h4>
    <p>{{$checkup->questions}}</p>
  </li>
  <li>
    <h4><b>Advice :</b></h4>
    <p>{{$checkup->advice}}</p>
  </li>
  <li>
    <h4><b>Medicines : </b></h4>
    <p>
    	{{$checkup->medicines}}
    </p>
  </li>
  <li>
    <h4><b>Doctor Details : </b></h4>
    <p>
      {{$checkup->doctor->name}}, {{$checkup->doctor->hname}}, {{$checkup->doctor->haddress}} - {{$checkup->doctor->mobile}}
    </p>
  </li>
  <li>
    <h4><b>Emergency? </b></h4>
    @if($checkup->emergency)
        <p>Yes</p>
      @else
        <p>No</p>
      @endif
  </li>
  <li>
    <h4><b>Was vaccination provided? </b></h4>
   @if($checkup->vaccination)
        <p>Yes</p>
      @else
        <p>No</p>
      @endif
  </li>
  <li>
  	<h4><b>Was a surgery done? </b></h4>
      @if($checkup->surgery)
        <p>Yes</p>
      @else
        <p>No</p>
      @endif
  </li>
  <li>
  	<h4><b>In case of an emergency, name of the accompanier if any?</b></h4>
  	<p>{{$checkup->accompany}}</p>
  </li>
  <li>
  	<h4><b>Contact of the accompanier if any:</b></h4>
  	<p>{{$checkup->accmobile}}</p>
  </li>
  <li>
  	<h4><b>Extra information regarding surgery if any :</b></h4>
  	<p>{{$checkup->surgdetail}}</p>
  </li>
  <li>
  	<h4><b>Extra information regarding vaccination if any:</b></h4>
  	<p{{$checkup->vaccdetail}}</p>
  </li><li>
  	<h4><b>Extra information regarding emergency if any :</b></h4>
  	<p>{{$checkup->emergdetail}}	</p>
  </li>
  <li>
  	<h4><b>Remarks:</b></h4>
  	<p>{{$checkup->remarks}}</p>
  </li>
</ol>
</div>
<div class="logout">
<a href={{url('logout')}}><img src="https://cdn0.iconfinder.com/data/icons/large-glossy-icons/512/Logout.png" width="70" height="90"></a>
</div>
</body>
</html>