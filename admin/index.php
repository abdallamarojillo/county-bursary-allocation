<?php
require_once("../incs/conn.php");
require_once("../functions/authenticate.php");
?>
<!DOCTYPE html>
<html>
<head>
  <link href="../assets/icons/MaterialIcons.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/customadmin.css">
	<link type="text/css" rel="stylesheet" href="../assets/libs/sweet/sweetalert.css"  media="screen,projection"/>
	 <style>
        .verify { width: 20% !important ; max-height: 100% !important } /* increase the width and height! */
      </style>
</head>

<body>

  <nav>
    <div class="nav-wrapper #33691e light-green darken-4">
      <a href="#!" class="brand-logo">County Bursary Allocation</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
				<?php
		if($_SESSION['level'] ==  "admin")
		{
			?>
			<li>
				<a class="modal-trigger waves-effect waves-light" href="#addFunds"><i class="material-icons left">monetization_on</i>Add Funds</a>
				
			</li>
		<?php
		}
		?>
		<?php
		if($_SESSION['level'] ==  "admin")
		{
			?>
			   <li>
			<a class="modal-trigger waves-effect waves-light" href="#awardFunds"><i class="material-icons left">person_add</i>Add Staff/Admin</a>
		</li>
			<?php
		}
		
		?>
		<li><a class="dropdown-button" href="#!" data-activates="dropdown2"><?php echo $_SESSION['email'];?><i class="material-icons left">account_circle</i><i class="material-icons right">arrow_drop_down</i></a></li>
		<!-- Dropdown Structure -->
			<ul id="dropdown2" class="dropdown-content">
				<li><a href="#!"><?php echo $_SESSION['level'];?></a></li>
				<li class="divider"></li>
				<li><a href="../functions/logout.php">Logout</a></li>
			</ul>

      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="users.php">Bursary Applications</a></li>
				<?php
		if($_SESSION['level'] ==  "admin")
		{
			?>
			<li>
				<a class="modal-trigger waves-effect waves-light btn" href="#addFunds">Add Funds</a>
				
			</li>
		<?php
		}
		?>
		<?php
		if($_SESSION['level'] ==  "admin")
		{
			?>
			   <li>
			<a class="modal-trigger waves-effect waves-light btn" href="#awardFunds"><i class="material-icons prefix">person_add</i>Add Staff/Admin</a>
		</li>
			<?php
		}
		
		?>
		<li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?php echo $_SESSION['email'];?><i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>
    </div>
  </nav>

			<!-- Modal Structure -->
			<div id="addFunds" class="modal">
				<div class="modal-content">
					<h4>Add Funds</h4>				
					<div class="row">
						<form class="col s12" id="amountForm">
							<div id="doneamount"></div>
							<div class="row">
								<div class="input-field col s12">
									<input id="amountAdded" name="amountAdded" type="text" class="validate">
									<label for="amountAdded" data-error="wrong" data-success="right">Enter amount in KES</label>
								</div>
							</div>
							<div class="row">
								 <div class="col s12">
                         <button class="btn waves-effect waves-light col s12 center" type="submit" name="action">Submit Amount
                            <i class="material-icons">send</i>
                          </button>
                    </div>
							</div>
						</form>
					</div>
        
				</div>
			</div>
			<!-- Modal Structure -->
			<div id="awardFunds" class="modal">
				<div class="modal-content">
					<h4 class="teal-text center">ADD USER</h4>
					    <div class="row">
                <div class="input-field col s12">
									<span id="error_empty3"></span>
									<span id="success_message3"></span>
                 </div>
              </div>
              <form id="adduserform">              
								<div class="row">
									 <div class="input-field col s3">
											 <input id="email" name="email" type="email" class="validate">
											 <label for="email">Email</label>
									 </div>
									 <div class="input-field col s3">
																<select id="userlevel" name="userlevel">		
																 <option value="" disabled selected>Choose your option</option>
																 <option value="admin">ADMIN</option>
																 <option value="staff">STAFF</option>
															 </select>
									
															 <label>Select User Level</label>
														</div>
									 <div class="input-field col s3">
											 <input id="password" name="password" type="password" class="validate">
											 <label for="password">Password</label>
									 </div>
									 <div class="input-field col s3">
											 <input id="cpassword" name="cpassword" type="password" class="validate">
												<label for="cpassword">Confirm Password</label>
									 </div>
								 </div>
						
									<div class="row col s12 m3">	
										 <input  type="submit" name="submit" id="submit" value="Add User" class="btn">
									</div>
							</form>
				</div>
			</div>
			
  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a href="#test1" class="active"><i class="material-icons prefix">dashboard</i>Dashboard</a></li>
        <li class="tab col s3"><a href="#test2"><i class="material-icons prefix">assignment</i>Bursary Applications</a></li>
      </ul>
    </div>
    <div id="test1" class="col s12">
    <div class="row">
      <div class="col s6">
        <div style="padding: 35px;" align="center" class="card">
          <div class="row">
            <div class="left card-title">
              <b>User Management</b>
            </div>
          </div>

          <div class="row">
            <a href="#!">
							<?php
							$s = mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM users"));
							?>
              <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                <i class="indigo-text text-lighten-1 large material-icons">person</i>
                <span class="indigo-text text-lighten-1"><h5><?php echo $s; ?> Users</h5></span>
              </div>
            </a>
            <div class="col s1">&nbsp;</div>
            <div class="col s1">&nbsp;</div>

            <a href="#!">
							<?php
							$b = mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM staff WHERE level='staff'"));
							$c = mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM staff WHERE level='admin'"));
							?>
              <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                <i class="indigo-text text-lighten-1 large material-icons">people</i>
                <span class="indigo-text text-lighten-1"><h6><?php echo $c; ?> Admins,<?php echo $b; ?> Staffs</h6></span>
              </div>
            </a>
          </div>
        </div>
      </div>

      <div class="col s6">
        <div style="padding: 35px;" align="center" class="card">
          <div class="row">
            <div class="left card-title">
              <b>Bursary Allocation</b>
            </div>
          </div>
          <div class="row">
            <a href="#!">
							<?php $a = mysqli_fetch_assoc(mysqli_query($dbc, "SELECT * FROM bursaries"));?>
              <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                <i class="indigo-text text-lighten-1 large material-icons">store</i>
                <span class="indigo-text text-lighten-1"><h6>Available Bursaries</h6></span>
								<?php echo "KES " .$a['amount'];?>
              </div>
            </a>

            <div class="col s1">&nbsp;</div>
            <div class="col s1">&nbsp;</div>

            <a href="#!">
							<?php $b = mysqli_fetch_assoc(mysqli_query($dbc, "SELECT SUM(amount) as a FROM account"));?>
              <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                <i class="indigo-text text-lighten-1 large material-icons">assignment</i>
                <span class="indigo-text text-lighten-1"><h6>Requested Bursaries</h6></span>
								<?php echo "KES " .$b['a']; ?>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col s6">
        <div style="padding: 35px;" align="center" class="card">
          <div class="row">
            <div class="left card-title">
              <b>Bursary Disbursement</b>
            </div>
          </div>

          <div class="row">
						<?php
						$c = mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM account WHERE awardStatus='awarded'"));
						$d = mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM account WHERE awardStatus='not awarded'"));
						
						?>
						
            <a href="#!">
              <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                <i class="indigo-text text-lighten-1 large material-icons">local_offer</i>
                <span class="indigo-text text-lighten-1"><h5> <?php echo $c;?> Awarded Bursaries</h5></span>
              </div>
            </a>

            <div class="col s1">&nbsp;</div>
            <div class="col s1">&nbsp;</div>

            <a href="#!">
              <div style="padding: 30px;" class="grey lighten-3 col s5 waves-effect">
                <i class="indigo-text text-lighten-1 large material-icons">loyalty</i>
                <span class="indigo-text text-lighten-1"><h5><?php echo $d;?> Pending Bursaries</h5></span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
		</div>
    <div id="test2" class="col s12">
			<?php
if($_SESSION['level'] == 'admin')
{
	?>
	<div class="row">
	 <form id="awardForm" class="center">
		<div id="doneawarded" class="teal-text"></div>
		<div class="row">
			<div class="col s12 m5"></div>
			 <div class="input-field col s12 m2">
					<input id="disburseAmount" name="disburseAmount" type="text" class="validate">
					<label for="disburseAmount" data-error="wrong" data-success="right">Amount for Each student</label>
			</div>
			 <div class="col s12 m5"></div>
		</div>
		<div class="row">
			<button class="btn btn-large waves-effect waves-light green" type="submit" name="action">DISBURSE BURSARY
         <i class="material-icons right">send</i>
      </button>
		</div>
	 </form>
   </div>
	<div class="row">
		<h3 class="teal-text center">Bursary Applications</h3>
	</div>
	<?php
}
?>

 <?php
          $select = "SELECT * FROM personal
				  INNER JOIN education
				  INNER JOIN perfomance
				  INNER JOIN family
				  INNER JOIN account
				  INNER JOIN submission
				  WHERE personal.email=education.email
				  && perfomance.email=education.email
				  && family.email=perfomance.email
				  && account.email=family.email
				  && submission.email=account.email";
                    if($selected = mysqli_query($dbc,$select)){
											$number = 1;
                      while($row = mysqli_fetch_array($selected,MYSQLI_BOTH))
                      {
                       ?>
  <ul class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><?php echo $number++;?>
	  <a class="modal-trigger waves-effect waves-light btn" href="#verify-<?php echo $row['id'];?>"><?php echo $row['verification'];?> | <?php echo $row['awardStatus'];?></a>
	   <div id="verify-<?php echo $row['id'];?>" class="modal verify">
                        <div class="modal-content">
                        	<div class="row">
                        		<form id="verifyform-<?php echo $row['id'];?>">
										<div class="row">
											<div class="input-field">
		                             <select id="v-<?php echo $row['id'];?>" name="status">		
		                              <option value="" disabled selected>Choose your option</option>
		                              <option value="verified">VERIFIED</option>
		                              <option value="pending">PENDING</option>
		                            </select>
									 
		                            <label>Verify User</label>
                         		  </div>
										</div>
										<div class="row">
											<div class="input-field">
												<textarea id="comment-<?php echo $row['id'];?>" name="comment" class="materialize-textarea"></textarea>
												<label for="comment">Comment</label>
											</div>
										</div>

										
	                            <div class="col s12">
	                              <button onclick="verifyUser(<?php echo $row['id'];?>)" class="btn waves-effect waves-light col s12 center" type="submit" name="update">VERIFY USER
	                                 <i class="material-icons">send</i>
	                              </button>
	                            </div>
                          	</form>
                        	</div>
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
						<?php
						$info = pathinfo('../uploads/'.$row['transcript'] .'');
						if($info["extension"] == 'pdf')
						{?>
							<a href="<?php echo ' ../uploads/'.$row['transcript'] .' '; ?>" class="waves-effect waves-light btn"><i class="material-icons right">assignment</i>View Transcript (pdf)</a>
							<?php
						}
						else
						{?>
							<img class="square responsive-img materialboxed col s5 m7"  src="<?php echo ' ../uploads/'.$row['transcript'] .' '; ?>">
							<?php
						}
						?>

				  
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
					<span class="teal-text">Registration No / Admission No<br/>
					<h6 class="blue-text"><?php echo $row['adminNo'];?></h6>
					</span>
					
					</div>
					
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
				<div class="col s3">
					<span>COMMENT</span><br/>
					<?php echo $row['comment'];?>
					</div>
				</div>
					
			</div>
        </div>  
      </div>
    </li>
  </ul>
      <?php       
          ;
          }
     }
	
 ?>
		</div>
  </div>

  <footer class="#1b5e20 green darken-4 page-footer">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <ul id='credits'>
						<li>
							County Bursary Allocation System
						</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright ">
      <div class="container">
        <span>Copyright &copy 2018</span>
      </div>
    </div>
  </footer>

  <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript">
$(document).ready(function(){
    
    $(".button-collapse").sideNav();
        
});

  </script>
  <script type="text/javascript" src="../assets/js/materialize.min.js"></script>
  <script src="../assets/js/init.js"></script>
	<script src="../assets/js/select.js"></script>
	<script src="../assets/js/modal.js"></script>
	<script src="../functions/addAmount.js"></script>
	<script src="../functions/addUser.js"></script>
	<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
    <script src="../assets/libs/sweet/sweetalert.min.js"></script>
	<script src="../assets/js/select.js"></script>
	<script src="../functions/addAmount.js"></script>
	<script src="../functions/verifyUser.js"></script>
	<script src="../functions/award.js"></script>


</body>
</html>
