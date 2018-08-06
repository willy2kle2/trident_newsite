    <?php include('head2.php'); ?>
  <body>
  
    
	<div class="container-fluid">
	
	<div class="card  ">
  <div class="card-body p-0">
  
 <?php include('header.php'); ?>
<?php include('nav.php'); ?>

<?php include('dateline.php'); ?>

  <div class="row p-0 m-0">
  <?php include('left-col.php'); ?>
  <?php include('excel_content.php'); ?>
  
 <?php include('right-col.php'); ?>
  
 

</div>
  
  <script type="text/javascript">

//variable that will increment through the images
var step=0
var whichimage = 0

function slideit(){
 //if browser does not support the image object, exit.
 if (!document.images)
  return
 document.getElementById('slide').src = slideimages[step].src
 whichimage = step
 if (step<9)
  step++
 else
  step=0
 //call function "slideit()" every 2.5 seconds
 setTimeout("slideit()",3500)
}

slideit()
function slidelink(){
 if (whichimage == 0)
  window.location = "driving_school.php"
 else if (whichimage == 1)
  window.location = "driving_school.php"
 else if (whichimage == 2)
  window.location = "http://www.tridentelect.com/driving_school.php"
}

</script>
<?php include('footer.php'); ?>
  </div>

  
</div>
	
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	
	<?php include('foot.php'); ?>
      </body>
</html>