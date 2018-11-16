
<?php
$search=$_POST['search'];

?>

<html>
<head>
<title>Universities</title>
<script src="jquery-3.3.1.min.js"></script>

<link href="styleSheet.css" rel="stylesheet" type="text/css">
</head>
<div class="topnav" id="myTopnav">

  <a href="index.html" class="active">Home</a>
  <a href="universities.html">Universities</a> 
  <div class="dropdown">
    <button class="dropbtn">Statistics
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="overallStats">Overall</a>
      <a href="agricultureStats">Agriculture</a>
	  <a href="educationStats">Education</a>
	  <a href="engineeringStats">Engineering, Manufacturing & Construction</a>
	  <a href="healthStats">Health & Welfare</a>
	  <a href="humanitiesStats">Humanities & Arts</a>
	  <a href="scienceStats">Science</a>
	  <a href="servicesStats">Services</a>
	  <a href="socialStats">Social Sciences, Business & Law</a>
    </div>
  </div> 
  <a href="opportunities.html">Opportunities</a>
  <a href="javascript:void(0);" class="icon" onclick="navbar()">&#9776;</a>
</div>
<body>


<div class = "row" id = "content" style="padding: 10px;">
</div>

</body>

</html>
<script>
$.ajax({
	url: "https://api.lmiforall.org.uk/api/v1/vacancies/search?keywords="+<?php echo "\""; echo $search; echo "\""; ?>,
	type: "get",
	dataType: "json",
	success: function(data)
	{
		data.forEach(function(result)
		{
			var contentDiv = document.getElementById("content");
			var job = document.createElement("div");
			job.className = "jobDiv col-4";
			contentDiv.appendChild(job);
			
			var header = document.createElement("p");
			header.innerHTML = result.title;
			header.className = "jobHeader";
			job.appendChild(header);
			
			var body = document.createElement("p");
			body.innerHTML = result.summary;
			body.className = "jobBody";
			job.appendChild(body);
			
			var link = document.createElement("a");
			link.innerHTML = "Link to Site";
			link.target = "_blank";
			link.href=result.link;
			link.className = "jobLink";
			job.appendChild(link);
			
		});
	
	
	}
	
});

/* NAVBAR */
	function navbar() {
    var i = document.getElementById("myTopnav");
    if (i.className === "topnav") {
        i.className += " responsive";
    } else {
        i.className = "topnav";
    }
}
</script>