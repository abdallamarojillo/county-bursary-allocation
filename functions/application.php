<?php
require_once("../incs/conn.php");
require_once("../functions/authenticate.php");
$output = '';
if(isset($_POST["query1"]))
{
 $search = mysqli_real_escape_string($dbc, $_POST["query1"]);
 $query = "
  SELECT * FROM personal 
  WHERE firstName LIKE '%".$search."%'
  OR middleName LIKE '%".$search."%'
  OR lastName LIKE '%".$search."%'
  OR email LIKE '%".$search."%'
  OR IDNumber LIKE '%".$search."%'
  OR phoneNumber LIKE '%".$search."%'
  OR constituency LIKE '%".$search."%'
  OR ward LIKE '%".$search."%'
  OR town LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM personal
				  INNER JOIN education
				  INNER JOIN perfomance
				  INNER JOIN family
				  INNER JOIN account
				  INNER JOIN submission
				  WHERE personal.email=education.email
				  && perfomance.email=education.email
				  && family.email=perfomance.email
				  && account.email=family.email
				  && submission.email=account.email;
 ";
}
 $result = mysqli_query($dbc, $query);
 if(mysqli_num_rows($result) > 0)
 {
    $number = 1;
 while($row = mysqli_fetch_array($result))
 {
    ?>
      <ul class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><?php echo $number++;?>
	  <a class="modal-trigger waves-effect waves-light btn" href="#verify-<?php echo $row['id'];?>"><?php echo $row['verification'];?> | <?php echo $row['awardStatus'];?></a>
	   <div id="verify-<?php echo $row['id'];?>" class="modal">
                        <div class="modal-content">
                           <form id="verifyform-<?php echo $row['id'];?>">
													<div class="input-field">
                             <select id="v-<?php echo $row['id'];?>" name="status">		
                              <option value="" disabled selected>Choose your option</option>
                              <option value="verified">VERIFIED</option>
                              <option value="pending">PENDING</option>
                            </select>
							 
                            <label>Verify User</label>
                         </div>
                            <div class="col s12">
                              <button onclick="verifyUser(<?php echo $row['id'];?>)" class="btn waves-effect waves-light col s12 center" type="submit" name="update">VERIFY USER
                                 <i class="material-icons">send</i>
                              </button>
                            </div>
                          </form>
                         </div>
                  </div>
	  <?php echo $row['firstName'];?></div>
      <div class="collapsible-body">
        <div class="row">
            <div class="col s12">
              <ul class="tabs">
                <li class="tab col s3"><a href="#id-<?php echo $row['id'] ;?>" class="active">Personal Information</a></li>
                <li class="tab col s3"><a href="#id1-<?php echo $row['id'] ;?>">Education Background</a></li>
                <li class="tab col s3"><a href="#id2-<?php echo $row['id'] ;?>">Perfomance</a></li>
                <li class="tab col s3"><a href="#id3-<?php echo $row['id'] ;?>">Family</a></li>
                <li class="tab col s3"><a href="#id4-<?php echo $row['id'] ;?>">Account Information</a></li>
                <li class="tab col s3"><a href="#id5-<?php echo $row['id'] ;?>">Submission</a></li>
              </ul>
            </div>
			<div id="id-<?php echo $row['id'] ;?>" class="col s12">
					<h4 class="teal-text center">Personal Information</h4>
				<div class="row">
					<div class="col s3">
					<span class="teal-text">First Name<br/>
					<h6 class="blue-text"><?php echo $row['firstName'];?></h6>
					</span>
					
					</div>
					<div class="col s3">
					<span class="teal-text">Middle Name<br/>
					<h6 class="blue-text"><?php echo $row['middleName'];?></h6>
					</span>
					
					</div>
					<div class="col s3">
					<span class="teal-text">Last Name<br/>
					<h6 class="blue-text"><?php echo $row['lastName'];?></h6>
					</span>
					
					</div>
					<div class="col s3">
					<span class="teal-text">Email<br/>
					<h6 class="blue-text"><?php echo $row['email'];?></h6>
					</span>
					
					</div>
					<div class="col s3">
					<span class="teal-text">ID Number<br/>
					<h6 class="blue-text"><?php echo $row['IDNumber'];?></h6>
					</span>
					
					</div>
					<div class="col s3">
					<span class="teal-text">Phone Number<br/>
					<h6 class="blue-text"><?php echo $row['phoneNumber'];?></h6>
					</span>
					
					</div>
					<div class="col s3">
					<span class="teal-text">Disability<br/>
					<h6 class="blue-text"><?php echo $row['disability'];?></h6>
					</span>
					
					</div>
					<div class="col s3">
					<span class="teal-text">Constituency<br/>
					<h6 class="blue-text"><?php echo $row['constituency'];?></h6>
					</span>
					
					</div>
					<div class="col s3">
					<span class="teal-text">Ward<br/>
					<h6 class="blue-text"><?php echo $row['ward'];?></h6>
					</span>
					
					</div>
					<div class="col s3">
					<span class="teal-text">Town<br/>
					<h6 class="blue-text"><?php echo $row['town'];?></h6>
					</span>
					
					</div>
				
				</div>
				
			</div>
      <div id="id1-<?php echo $row['id'] ;?>" class="col s12">
					<h4 class="teal-text center">Educational Background</h4>
				<div class="row">
					<div class="col s3">
					<span>Primary School</span><br/>
					<?php echo $row['primaryschool'];?>
					</div>
					<div class="col s3">
					<span>Institution Type</span><br/>
					<?php echo $row['ptype'];?>
					</div>
					<div class="col s3">
					<span>High School</span><br/>
					<?php echo $row['highschool'];?>
					</div>
					<div class="col s3">
					<span>Institution Type</span><br/>
					<?php echo $row['htype'];?>
					</div>
					<div class="col s3">
					<span>College / University</span><br/>
					<?php echo $row['college'];?>
					</div>
					<div class="col s3">
					<span>Institution Type</span><br/>
					<?php echo $row['ctype'];?>
					</div>
				
				</div>
			</div>
      <div id="id2-<?php echo $row['id'] ;?>" class="col s12">
					<h4 class="teal-text center">Academic Perfomance</h4>
				<div class="row">
					<div class="col s3">
								<span class="teal-text">Level<br/>
								<h6 class="blue-text"><?php echo $row['level'];?></h6>
								</span>
								
					</div>
					<div class="col s3">
								<span class="teal-text">Year<br/>
								<h6 class="blue-text"><?php echo $row['year'];?></h6>
								</span>
								
					</div>
					<div class="col s5">
						<span class="teal-text">Transcript<br/>
              <img class="square responsive-img materialboxed col s5 m7"  src="<?php echo ' ../uploads/'.$row['transcript'] .' '; ?>">
          </div>
				
				</div>
			</div>
      <div id="id3-<?php echo $row['id'] ;?>" class="col s12">
					<h4 class="teal-text center">Family</h4>
				<div class="row">
					<?php
					$parents = $row['parents'];
					if($parents == 'both')
					{
						?>
							<div class="row">
								<div class="col s3">
								<span class="teal-text">Parents<br/>
								<h6 class="blue-text"><?php echo $row['parents'];?></h6>
								</span>
								
								</div>
								
								<div class="col s3">
								<span class="teal-text">Mothers First Name<br/>
								<h6 class="blue-text"><?php echo $row['mothersFname'];?></h6>
								</span>
								
								</div>
								<div class="col s3">
								<span class="teal-text">Mothers Last Name<br/>
								<h6 class="blue-text"><?php echo $row['mothersLname'];?></h6>
								</span>
								
								</div>
								<div class="col s3">
								<span class="teal-text">Mothers ID Number<br/>
								<h6 class="blue-text"><?php echo $row['mothersID'];?></h6>
								</span>
								
								</div>
								<div class="col s3">
								<span class="teal-text">Mothers Phone Number<br/>
								<h6 class="blue-text"><?php echo $row['motherPhone'];?></h6>
								</span>
								
								</div>
								<div class="col s3">
								<span class="teal-text">Mothers Income<br/>
								<h6 class="blue-text"><?php echo $row['mothersIncome'];?></h6>
								</span>
								
								</div>
								<div class="col s3">
								<span class="teal-text">Fathers First Name<br/>
								<h6 class="blue-text"><?php echo $row['fathersFname'];?></h6>
								</span>
								
								</div>
								<div class="col s3">
								<span class="teal-text">Fathers Last Name<br/>
								<h6 class="blue-text"><?php echo $row['fathersLname'];?></h6>
								</span>
								
								</div>
								<div class="col s3">
								<span class="teal-text">Fathers ID Number<br/>
								<h6 class="blue-text"><?php echo $row['fathersID'];?></h6>
								</span>
								
								</div>
								<div class="col s3">
								<span class="teal-text">Fathers Phone Number<br/>
								<h6 class="blue-text"><?php echo $row['fathersPhone'];?></h6>
								</span>
								
								</div>
								<div class="col s3">
								<span class="teal-text">Fathers Income<br/>
								<h6 class="blue-text"><?php echo $row['fathersIncome'];?></h6>
								</span>
								
								</div>
							
							</div>
						<?php
					}
					elseif($parents == 'father')
					{
						?>
						<div class="row">
							<div class="col s3">
								<span class="teal-text">Parents<br/>
								<h6 class="blue-text"><?php echo $row['parents'];?></h6>
								</span>
								
								</div>
							<div class="col s3">
								<span class="teal-text">Fathers First Name<br/>
								<h6 class="blue-text"><?php echo $row['fathersFname'];?></h6>
								</span>
								
								</div>
								<div class="col s3">
								<span class="teal-text">Fathers Last Name<br/>
								<h6 class="blue-text"><?php echo $row['fathersLname'];?></h6>
								</span>
								
								</div>
								<div class="col s3">
								<span class="teal-text">Fathers ID Number<br/>
								<h6 class="blue-text"><?php echo $row['fathersID'];?></h6>
								</span>
								
								</div>
								<div class="col s3">
								<span class="teal-text">Fathers Phone Number<br/>
								<h6 class="blue-text"><?php echo $row['fathersPhone'];?></h6>
								</span>
								
								</div>
								<div class="col s3">
								<span class="teal-text">Fathers Income<br/>
								<h6 class="blue-text"><?php echo $row['fathersIncome'];?></h6>
								</span>
								
								</div>
						</div>
						<?php
					}
					elseif($parents == 'mother')
					{
						?>
						<div class="row">
							   <div class="col s3">
								<span class="teal-text">Parents<br/>
								<h6 class="blue-text"><?php echo $row['parents'];?></h6>
								</span>
								
								</div>
								
								<div class="col s3">
								<span class="teal-text">Mothers First Name<br/>
								<h6 class="blue-text"><?php echo $row['mothersFname'];?></h6>
								</span>
								
								</div>
								<div class="col s3">
								<span class="teal-text">Mothers Last Name<br/>
								<h6 class="blue-text"><?php echo $row['mothersLname'];?></h6>
								</span>
								
								</div>
								<div class="col s3">
								<span class="teal-text">Mothers ID Number<br/>
								<h6 class="blue-text"><?php echo $row['mothersID'];?></h6>
								</span>
								
								</div>
								<div class="col s3">
								<span class="teal-text">Mothers Phone Number<br/>
								<h6 class="blue-text"><?php echo $row['motherPhone'];?></h6>
								</span>
								
								</div>
								<div class="col s3">
								<span class="teal-text">Mothers Income<br/>
								<h6 class="blue-text"><?php echo $row['mothersIncome'];?></h6>
								</span>
								
								</div>
						</div>
						<?php
					}
					elseif($parents == 'guardian')
					{
						?>
						<div class="row">
							   <div class="col s3">
								<span class="teal-text">Parents<br/>
								<h6 class="blue-text"><?php echo $row['parents'];?></h6>
								</span>
								
								</div>
								
								<div class="col s3">
								<span class="teal-text">Guardians First Name<br/>
								<h6 class="blue-text"><?php echo $row['guardiansFname'];?></h6>
								</span>
								
								</div>
								<div class="col s3">
								<span class="teal-text">Guardians Last Name<br/>
								<h6 class="blue-text"><?php echo $row['guardiansLname'];?></h6>
								</span>
								
								</div>
								<div class="col s3">
								<span class="teal-text">Guardians ID Number<br/>
								<h6 class="blue-text"><?php echo $row['guardiansID'];?></h6>
								</span>
								
								</div>
								<div class="col s3">
								<span class="teal-text">Guardians Phone Number<br/>
								<h6 class="blue-text"><?php echo $row['guardiansPhone'];?></h6>
								</span>
								
								</div>
								<div class="col s3">
								<span class="teal-text">Guardians Income<br/>
								<h6 class="blue-text"><?php echo $row['guardiansIncome'];?></h6>
								</span>
								
								</div>
						</div>
						<?php
					}
					?>

				
				</div>
			</div>
      <div id="id4-<?php echo $row['id'] ;?>" class="col s12">
					<h4 class="teal-text center">Account Information</h4>
				<div class="row">
					<div class="col s3">
					<span class="teal-text">Account Name<br/>
					<h6 class="blue-text"><?php echo $row['accountName'];?></h6>
					</span>
					
					</div>
					
					<div class="col s3">
					<span class="teal-text">Account Number<br/>
					<h6 class="blue-text"><?php echo $row['accountNumber'];?></h6>
					</span>
					
					</div>
					
					<div class="col s3">
					<span class="teal-text">Amount Requested<br/>
					<h6 class="blue-text"><?php echo $row['amount'];?></h6>
					</span>
					
					</div>
					
					<div class="col s3">
					<span class="teal-text">Amount Received<br/>
					<h6 class="blue-text"><?php echo $row['amountReceived'];?></h6>
					</span>
					
					</div>
					<div class="col s3">
					<span class="teal-text">Disburse Status<br/>
					<h6 class="blue-text"><?php echo $row['awardStatus'];?></h6>
					</span>
					
					</div>
				
				</div>
			</div>
      <div id="id5-<?php echo $row['id'] ;?>" class="col s12">
					<h4 class="teal-text center">Submission</h4>
				<div class="row">
					<div class="col s3">
					<span>STATUS</span><br/>
					<?php echo $row['status'];?>
					</div>
				
				</div>
			</div>
        </div>  
      </div>
    </li>
  </ul>
  <?php
 }

 }
else
{
 echo 'Data Not Found';
}

?>