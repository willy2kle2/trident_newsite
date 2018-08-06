 <div class="col-md-7 col-sm-12 mr-0 ml-0 p-0">
   
<div class='row  pt-1'>
<div class='col-sm-12'>
<p class="h5"> <strong>Trident Training Registration Form</strong></p>
 <div id="scorners">Please read the <a href="javascript:newWindow102()">
 <strong> terms and conditions</strong></a> before filling this form.</div>


<p class=" pr-2 pl-2">When you submit this registration form, a proforma invoice and payment options would be sent to your email box (please ensure your phone number and email is entered correctly).
</p>
 <!-- form user info -->
                    <div class="card card-outline-secondary p-3">
                        
                        <div class="card-block">
                            <form class="form-horizontal" role="form" method="post" 
			action="training_registration.php">
							 <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"><strong>Course</strong>
									</label>
                                    <div class="col-lg-9">
                                        <select name="id" id="id" class="form-control" size="0">
                                           <option value="">Select Course</option>
                                <?php
do {  
?>
                                <option value="<?php echo $row_course['id']?>"><?php echo $row_course['course']?> - N<?php echo number_format($row_course['price'])?></option>
                                <?php
} while ($row_course = mysql_fetch_assoc($course));
  $rows = mysql_num_rows($course);
  if($rows > 0) {
      mysql_data_seek($course, 0);
	  $row_course = mysql_fetch_assoc($course);
  }
?>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"><strong>Registration Fee</strong></label>
                                    <div class="col-lg-9">
                                        
										 <p class="form-control-static">N5,000</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"><strong>Surname
									</strong>
									</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name = "surname" type = "text" id="surname">
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"><strong>Other Names
									</strong>
									</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name = "othernames" type = "text" id="othernames">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"><strong>Email
									</strong>
									</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="email" name = "email" type = "text" id="email" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"><strong>Phone
									
									</strong></label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name = "phone">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"><strong>Please Select Your Training Location</strong>
									</label>
                                    <div class="col-lg-9">
                                        <select id="location" name="location" class="form-control" size="0">
                                            <option>Please Select Location</option>
											<option value="Abuja">ABUJA</option>
                                            <option value="Lagos">LAGOS</option>
                                            <option value="Kaduna">KADUNA</option>
                                            
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"><strong>
									Questions & Enquiries

									
									</strong>
									
									<p class="text-justify">
									
									Let us know any questions you have about 
									this training or the course you are 
									interested in ?
									</p>
									
									</label>
									<div class="col-lg-9">
                                   <textarea class="form-control" rows="5" id="message" name = "message"></textarea>
								    </div>
                                </div>
                                <input type="checkbox" name="check" value="checked" />
                                I have read , understood &amp; agreed with the<br />
                                <a href="javascript:newWindow102()"> <font color="blue"><u> terms and conditions</u></font></a> for this training.
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <input  id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
							
							
							
								
							
							
							
							
							
							
                        </div>
						
						
                    </div>
                    <!-- /form user info -->
 </div>
 
</div>

	
</div>
<script language ="JavaScript">

function newWindow102(){
terms= window.open("terms.html");}
 
function newWindow103(){
window.close();}

</script>