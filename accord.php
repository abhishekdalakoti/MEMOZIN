
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script src="https://use.fontawesome.com/8b09d5ebcd.js"></script>

<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="accord.css">

</head>

<body>
  
    <ul class="accordion">
      <li class="tabs" onclick="openCity(event, 'newemployee')" id="defaultOpen">
        <div class="social-links newemp-icon">
          <a href="#" class="active"> </a>
        </div>
        <div class="paragraph">
          <h1>Twitter</h1>
          <p>My thoughts in 140 characters or less. Sometimes, I do not know how to correctly use Twitter.</p>
        </div>
      </li>
      <li class="tabs" onclick="openCity(event, 'experience')">
        <div class="social-links qualification-icon">
          <a href="#"> </a>
        </div>
        <div class="paragraph">
          <h1>Facebook</h1>
          <p>Where I get to stalk my friends and let them stalk me. A place to get people to stroke your ego.</p>
        </div>
      </li>
      <li class="tabs">
        <div class="social-links experience-icon">
          <a href="#"> </a>
        </div>
        <div class="paragraph">
          <h1>LinkedIn</h1>
          <p>I act totally professional on this one. It is what the recruiters see, you see.</p>
        </div>
      </li>
   
   
    </ul>
    <div id="newemployee" class="tabcontent">
    Hello
   </div>
    <div id="experience" class="tabcontent">
    <i class="fa fa-building-o" aria-hidden="true"></i>

   </div>
  
</body>

<script type="text/javascript">
	 function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
              tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tabs");
          for (i = 0; i < tablinks.length; i++) {
              tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
      }
      
      // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click();
      $("defaultOpen").addClass('active');
</script>
