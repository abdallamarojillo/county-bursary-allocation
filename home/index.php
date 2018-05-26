<?php
require_once("../functions/authenticate.php");
require_once("../incs/conn.php");
$row= mysqli_fetch_assoc(mysqli_query($dbc, "SELECT * FROM personal WHERE email = '".$_SESSION['email']."'"));
$row1= mysqli_fetch_assoc(mysqli_query($dbc, "SELECT * FROM education WHERE email = '".$_SESSION['email']."'"));
$row6= mysqli_fetch_assoc(mysqli_query($dbc, "SELECT * FROM account WHERE email = '".$_SESSION['email']."'"));
$row7= mysqli_fetch_assoc(mysqli_query($dbc, "SELECT * FROM family WHERE email = '".$_SESSION['email']."'"));
$row8= mysqli_fetch_assoc(mysqli_query($dbc, "SELECT * FROM family WHERE email = '".$_SESSION['email']."' && parents='mother' "));
$row9= mysqli_fetch_assoc(mysqli_query($dbc, "SELECT * FROM family WHERE email = '".$_SESSION['email']."' && parents='father' "));
$row10= mysqli_fetch_assoc(mysqli_query($dbc, "SELECT * FROM family WHERE email = '".$_SESSION['email']."' && parents='guardian' "));
$row11= mysqli_fetch_assoc(mysqli_query($dbc, "SELECT * FROM submission WHERE email = '".$_SESSION['email']."' "));
?>

<!doctype html>
<html lang="en">
<head>
    <title>CBA | Application Portal</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link type="text/css" rel="stylesheet" href="../assets/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../assets/css/materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../assets/icons/MaterialIcons.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../assets/icons/style.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../assets/libs/sweet/sweetalert.css"  media="screen,projection"/>
      <style>
        #mum { width: 50% !important ; max-height: 100% !important } /* increase the width and height! */
      </style>
</head>
<body class="#eeeeee grey lighten-3">
<!--Show Finished Applying Modal if user already applied-->
<?php
$f = mysqli_num_rows(mysqli_query($dbc,"SELECT * FROM submission WHERE status='submitted' && email='".$_SESSION['email']."'"));
if($f > 0)
{
?>

<div id="finished" class="modal bottom-sheet">
    <div class="modal-content">
      <h4 class="teal-text">Hey <strong><?php echo $row['firstName'];?></strong>!</h4>
      <p>You have already applied for a bursary.
          Please check your
          <a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="<?php echo $row11['verification'] .' | '.$row6['awardStatus']; ?>">Application Status</a>
          to confirm your bursary progress
      </p>
    </div>
    <div class="modal-footer">
        <ul>
           <li class="left"><i class="material-icons left">phone</i><i class="material-icons left">forum</i>
           Call or SMS: <strong class="blue-text">0712345678</strong></li>
           <li class="right"><i class="material-icons left">email</i>Email through: <strong class="blue-text">info@countybursary.com</strong></li>
        </ul>
      
    </div>
  </div>
<?php
}
?>

<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
    <li><a href="#"><i class="prefix material-icons">settings</i>Change Password</a></li>
    <li><a href="../functions/logout.php"><i class="prefix material-icons">power_settings_new</i>Logout</a></li>
</ul>
<nav>
  <div class="nav-wrapper #43a047 green darken-1">
    <a href="#!" class="brand-logo">County Bursary Application</a>
    <ul class="right hide-on-med-and-down">
      <li><a class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="<?php echo $row11['verification'] .' ('.$row11['comment'].') | '.$row6['awardStatus']; ?>">Application Status</a></li>
      <!-- Dropdown Trigger -->
       <li><a class="dropdown-button yellow-text accent-4" href="#!" data-activates="dropdown1"><?php echo $_SESSION['email']; ?><i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
  </div>
</nav>
        
    <div class="row">
    <div class="col s12 m12">
      <ul class="tabs">
        <li  id="1" class="tab col s3  teal-text"><a href="#step1">
            <div class="card card-stats">
                <div id="d1" class="card-header teal-text">
                     Personal<sup class="#616161 grey-text darken-2-text">step 1</sup><i class="material-icons">assignment_ind</i>
                 </div>
            </div>
        </a></li>
        <li  id="2" class="tab col s3"><a href="#step2">
            <div class="card card-stats">
                <div id = "d2" class="card-header teal-text" data-background-color="orange">
                     Education<sup class="#616161 grey-text darken-2-text">step 2</sup><i class="material-icons">school</i>
                 </div>
            </div>
        </a></li>
        <li  id="3" class="tab col s3"><a href="#step3">
            <div class="card card-stats">
                <div id="d3" class="card-header teal-text" data-background-color="orange">
                     Family<sup class="#616161 grey-text darken-2-text">step 3</sup><i class="material-icons">wc</i>
                 </div>
            </div>
        </a></li>
        <li  id="4" class="tab col s3"><a href="#step4">
            <div class="card card-stats">
                <div id="d4" class="card-header teal-text" data-background-color="orange">
                     Account<sup class="#616161 grey-text darken-2-text">step 4</sup><i class="material-icons">credit_card</i>
                 </div>
            </div>
        </a></li>
        <li  id="5" class="tab col s3"><a href="#step5">
            <div class="card card-stats">
                <div id="d5" class="card-header teal-text" data-background-color="orange">
                    Finish<sup class="#616161 grey-text darken-2-text">step 5</sup><i class="material-icons">done_all</i>
                 </div>
            </div>
        </a></li>
      </ul>
    </div>
    <div id="step1" class="col s12 m12">       
        <div class="row">
          <form class="col s12 m12" id="personalForm">
            <div id="done" class="center"></div>
            <h4 class="teal-text center">Personal Information</h4>
            <div id="load"></div>
            <div class="row">  
                <div class="input-field col s12 m3">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="fname" name="fname" type="text" class="validate" value="<?php echo $row['firstName'];?>" required>
                  <label for="fname">First Name</label>
                </div>
                <div class="input-field col s12 m3">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="mname" name="mname" type="text" class="validate" value="<?php echo $row['middleName'];?>" required>
                  <label for="mname">Middle Name</label>
                </div>
                <div class="input-field col s12 m3">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="lname" name="lname" type="text" class="validate" value="<?php echo $row['lastName'];?>" required>
                  <label for="lname">Last Name</label>
                </div>
                <div class="input-field col s12 m3">
                  <i class="material-icons prefix">email</i>
                  <input id="email" name="email" type="text" class="validate" disabled value="<?php echo $row['email'];?>" required>
                  <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m3">
                  <i class="material-icons prefix">featured_video</i>
                  <input id="idno" name="idno" type="text" class="validate" value="<?php echo $row['IDNumber'];?>" required>
                  <label for="idno">ID Number</label>
                </div>
                 <div class="input-field col s12 m3">
                  <i class="material-icons prefix">phone</i>
                  <input id="phone" name="phone" type="text" class="validate" value="<?php echo $row['phoneNumber'];?>" required>
                  <label for="idno">Phone Number</label>
                </div>
                <div class="input-field col s12 m3">
                    <i class="material-icons prefix">accessible</i>
                    <select name="disability" id="disability">
                      <option value="" disabled selected>Disability</option>
                      <option value="none" data-icon="../assets/img/cancel.png">none</option>
                      <option value="visual" data-icon="../assets/img/eye.png">visual</option>
                      <option value="hearing" data-icon="../assets/img/hear.png">hearing</option>
                      <option value="physical" data-icon="../assets/img/physical.jpg">physical</option>
                    </select>
                    <label for="disability">Disability</label>
                </div>
                <div class="input-field col s12 m3">
                    <i class="material-icons prefix">place</i>
                    <select name="constituency" id="constituency" onchange=populate(this.id,"ward") >
                      <option value="" disabled selected>Constituency</option>
                      <option value="Bura Constituency">Bura Constituency</option>
                      <option value="Galole Constituency">Galole Constituency</option>
                      <option value="Garsen Constituency">Garsen Constituency</option>
                    </select>
                    <label for="disability">Constituency</label>
                </div>
                <div class="input-field col s12 m3">
                    <i class="material-icons prefix">pin_drop</i>
                    <select name="ward" id="ward">
                      <option value="" disabled selected>Ward</option>
                    </select>
                    <label for="ward">Ward</label>
                </div>
                <div class="input-field col s12 m3">
                  <i class="material-icons prefix">home</i>
                  <input id="town" name="town" type="text" class="validate" value="<?php echo $row['town'];?>"  required>
                  <label for="town">Village / Town</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m3 center">
                   <button class="btn waves-effect waves-light" type="submit" name="action">SAVE
                     <i class="material-icons right">send</i>
                    </button>
                </div>

            </div>
          </form>
        </div>
        
    </div>
    <div id="step2" class="col s12">
        <div class="col s12 m6">
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                  <div class="collapsible-header teal-text center"><i class="material-icons">business</i>Education Background</div>
                  <div class="collapsible-body col s12">
                    <form id="educationForm">
                        <div id="done1"></div>
                        <div id="load1"></div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                              <i class="material-icons prefix">business</i>
                              <input id="primary" name="primary" type="text" class="validate" value="<?php echo $row1['primaryschool'];?>"  required>
                              <label for="primary">Primary School</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <select name="ptype" id="ptype">
                                  <option value="" disabled selected>Institution Type</option>
                                  <option value="public">PUBLIC</option>
                                  <option value="private">PRIVATE</option>
                                </select>
                                <label for="ptype">Institution Type</label>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                              <i class="material-icons prefix">business</i>
                              <input id="high" name="high" type="text" class="validate" value="<?php echo $row1['highschool'];?>"  required>
                              <label for="high">High School</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <select name="htype" id="htype">
                                  <option value="" disabled selected>Institution Type</option>
                                  <option value="public">PUBLIC</option>
                                  <option value="private">PRIVATE</option>
                                </select>
                                <label for="htype">Institution Type</label>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                              <i class="material-icons prefix">business</i>
                              <input id="college" name="college" type="text" class="validate" value="<?php echo $row1['college'];?>"  required>
                              <label for="college">College / University / Tertiary</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <select name="ctype" id="ctype">
                                  <option value="" disabled selected>Institution Type</option>
                                  <option value="public">PUBLIC</option>
                                  <option value="private">PRIVATE</option>
                                </select>
                                <label for="ctype">Institution Type</label>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col s12 m3 center">
                               <button class="btn waves-effect waves-light" type="submit" name="action">SAVE
                                 <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                  </div>
                </li>
            </ul>
        </div>
        <div class="col s12 m6">          
            <ul class="collapsible" data-collapsible="accordion">
              <li>
                <div class="collapsible-header teal-text center"><i class="material-icons">library_books</i>Academic Perfomance</div>
                <div class="collapsible-body">
                    <div class="row">
                        <form id="academicForm" enctype="multipart/form-data">
                            <div id="response"></div>
                            <div id="load2"></div>
                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <select name="level" id="level" onchange="populateYear(this.id,'year');">
                                      <option value="" disabled selected>Level of Study</option>
                                      <option value="primary">Primary School</option>
                                      <option value="highschool">High School</option>
                                      <option value="collegeuni">College / University / Tertiary</option>
                                    </select>
                                    <label for="level">Select Level of Study</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <select name="year" id="year">
                                      <option value="" disabled selected>Year of Study</option>
                                    </select>
                                    <label for="year">Select Year of Study</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="file-field input-field col s12 m12">
                                    <div class="btn">
                                      <span>Upload Recent Transcript</span>
                                      <input type="file" name="fileName" id="fileName">
                                    </div>
                                    <div class="file-path-wrapper">
                                      <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 center">
                                   <button class="btn waves-effect waves-light" type="submit" name="action">SAVE
                                     <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
              </li>
            </ul>
        
        </div>
    </div>
    <div id="step3" class="col s12">
        <h4 class="teal-text center">Family Details</h4>
        <div class="row">
            <div class="input-field col s12 m3">
               <select id="familyinfo" name="familyinfo" onchange="showFamily(this.id);">
                 <option value="" disabled selected>Parents Marital Status</option>
                 <option value="both" data-icon="../assets/img/both.png">Both Parents</option>
                 <option value="mother" data-icon="../assets/img/woman.png">Mother</option>
                 <option value="father" data-icon="../assets/img/man.png">Father</option>
                 <option value="guardian" data-icon="../assets/img/guardian.png">Guardian</option>
              </select>
              <label for="level">Select Parents Marital Status</label>
            </div>
        </div>
        <div class="row" id="both">
            <!-- Modal Trigger -->
            <a class="modal-trigger waves-effect waves-light btn" href="#mum">Parents Details</a>
          
            <!-- Modal Structure -->
            <div id="mum" class="modal">
              <div class="modal-content">
                <h6 class="teal-text center">Mother's Details</h6>
                <div class="row">
                    <div id="donemum"></div>
                    <div id="load3"></div>
                    <form id="mumForm">
                        <div class="row">
                            <div class="input-field col s12 m4">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="fname1" name="fname1" type="text" class="validate" value="<?php echo $row7['mothersFname'];?>"  required>
                                <label for="fname1">First Name</label>
                            </div>
                            <div class="input-field col s12 m4">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="lname1" name="lname1" type="text" class="validate" value="<?php echo $row7['mothersLname'];?>"  required>
                                <label for="lname1">Last Name</label>
                            </div>
                            <div class="input-field col s12 m4">
                                <i class="material-icons prefix">featured_video</i>
                                <input id="idno1" name="idno1" type="text" class="validate" value="<?php echo $row7['mothersID'];?>"  required>
                                <label for="idno1">National ID</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m4">
                                <i class="material-icons">work</i>
                                <select id="employed1" name="employed1">
                                  <option value="" disabled selected>employed?</option>
                                  <option value="no">NO</option>
                                  <option value="yes">YES</option>
                               </select>
                               <label for="level">Select Parents Employment Status</label>
                             </div>
                            <div class="input-field col s12 m4">
                                <i class="material-icons prefix">phone</i>
                                <input id="phone1" name="phone1" type="text" class="validate" value="<?php echo $row7['motherPhone'];?>"  required>
                                <label for="phone1">Phone Number</label>
                            </div>
                            <div class="input-field col s12 m4">
                                <i class="material-icons prefix">monetization_on</i>
                                <input id="income" name="income" type="text" class="validate" value="<?php echo $row7['mothersIncome'];?>"  required>
                                <label for="income">Income</label>
                            </div>
                            
                        </div>
                        <h6 class="teal-text center">Father's Details</h6>
                        <div class="row">
                            <div class="input-field col s12 m4">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="fname2" name="fname2" type="text" class="validate" value="<?php echo $row7['fathersFname'];?>"  required>
                                <label for="fname2">First Name</label>
                            </div>
                            <div class="input-field col s12 m4">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="lname2" name="lname2" type="text" class="validate" value="<?php echo $row7['fathersLname'];?>"  required>
                                <label for="lname2">Last Name</label>
                            </div>
                            <div class="input-field col s12 m4">
                                <i class="material-icons prefix">featured_video</i>
                                <input id="idno2" name="idno2" type="text" class="validate" value="<?php echo $row7['fathersID'];?>"  required>
                                <label for="idno2">National ID</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m4">
                                <i class="material-icons">work</i>
                                <select id="employed2" name="employed2">
                                  <option value="" disabled selected>employed?</option>
                                  <option value="no">NO</option>
                                  <option value="yes">YES</option>
                               </select>
                               <label for="employed2">Select Parents Employment Status</label>
                             </div>
                            <div class="input-field col s12 m4">
                                <i class="material-icons prefix">phone</i>
                                <input id="phone2" name="phone2" type="text" class="validate" value="<?php echo $row7['fathersPhone'];?>"  required>
                                <label for="phone2">Phone Number</label>
                            </div>
                            <div class="input-field col s12 m4">
                                <i class="material-icons prefix">monetization_on</i>
                                <input id="income2" name="income2" type="text" class="validate" value="<?php echo $row7['fathersIncome'];?>"  required>
                                <label for="income2">Income</label>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col s12 center">
                                <button class="btn waves-effect waves-light" type="submit" name="action">SAVE
                                  <i class="material-icons right">send</i>
                                 </button>
                             </div>
                        </div>
                    </form>
                </div>
              </div>
            </div>
        </div>
        <div class="row" id="mother">
             <!-- Modal Trigger -->
            <a class="modal-trigger waves-effect waves-light btn" href="#mum1">Mother's Details</a>
            <div id="mum1" class="modal">
                <div class="modal-content">
                    <h6 class="teal-text center">Mother's Details</h6>
                    <div class="row">
                        <div id="donemum1"></div>
                        <div id="load4"></div>
                        <form id="mumonly">
                            <div class="row">
                                <div class="input-field col s12 m4">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="fname3" name="fname3" type="text" class="validate" value="<?php echo $row8['mothersFname'];?>"  required>
                                    <label for="fname3">First Name</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="lname3" name="lname3" type="text" class="validate" value="<?php echo $row8['mothersLname'];?>"  required>
                                    <label for="lname3">Last Name</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <i class="material-icons prefix">featured_video</i>
                                    <input id="idno3" name="idno3" type="text" class="validate" value="<?php echo $row8['mothersID'];?>"  required>
                                    <label for="idno3">National ID</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m4">
                                    <i class="material-icons prefix">work</i>
                                    <select id="employed3" name="employed3">
                                      <option value="" disabled selected>employed?</option>
                                      <option value="no">NO</option>
                                      <option value="yes">YES</option>
                                   </select>
                                   <label for="employed3">Select Parents Employment Status</label>
                                 </div>
                                <div class="input-field col s12 m4">
                                    <i class="material-icons prefix">phone</i>
                                    <input id="phone3" name="phone3" type="text" class="validate" value="<?php echo $row8['motherPhone'];?>"  required>
                                    <label for="phone3">Phone Number</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <i class="material-icons prefix">monetization_on</i>
                                    <input id="income3" name="income3" type="text" class="validate" value="<?php echo $row8['mothersIncome'];?>"  required>
                                    <label for="income3">Income</label>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col s12 center">
                                    <button class="btn waves-effect waves-light" type="submit" name="action">SAVE
                                      <i class="material-icons right">send</i>
                                     </button>
                                 </div>
                            </div>
                        </form>
                    </div>
                  </div>
            </div>
            </div>
          <div class="row" id="father">
             <!-- Modal Trigger -->
            <a class="modal-trigger waves-effect waves-light btn" href="#dad1">Father's Details</a>
            <div id="dad1" class="modal">
                <div class="modal-content">
                    <h6 class="teal-text center">Father's Details</h6>
                    <div class="row">
                        <div id="donedad1"></div>
                        <div id="load5"></div>
                        <form id="dadonly">
                            <div class="row">
                                <div class="input-field col s12 m4">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="fname4" name="fname4" type="text" class="validate" value="<?php echo $row9['fathersFname'];?>"  required>
                                    <label for="fname4">First Name</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="lname4" name="lname4" type="text" class="validate" value="<?php echo $row9['fathersLname'];?>"  required>
                                    <label for="lname4">Last Name</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <i class="material-icons prefix">featured_video</i>
                                    <input id="idno4" name="idno4" type="text" class="validate" value="<?php echo $row9['fathersID'];?>"  required>
                                    <label for="idno4">National ID</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m4">
                                    <i class="material-icons prefix">work</i>
                                    <select id="employed4" name="employed4">
                                      <option value="" disabled selected>employed?</option>
                                      <option value="no">NO</option>
                                      <option value="yes">YES</option>
                                   </select>
                                   <label for="employed4">Select Parents Employment Status</label>
                                 </div>
                                <div class="input-field col s12 m4">
                                    <i class="material-icons prefix">phone</i>
                                    <input id="phone4" name="phone4" type="text" class="validate" value="<?php echo $row9['fathersPhone'];?>"  required>
                                    <label for="phone4">Phone Number</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <i class="material-icons prefix">monetization_on</i>
                                    <input id="income4" name="income4" type="text" class="validate" value="<?php echo $row9['fathersIncome'];?>"  required>
                                    <label for="income4">Income</label>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col s12 center">
                                    <button class="btn waves-effect waves-light" type="submit" name="action">SAVE
                                      <i class="material-icons right">send</i>
                                     </button>
                                 </div>
                            </div>
                        </form>
                    </div>
                  </div>
              </div>
            </div>
          <div class="row" id="guardian">
             <!-- Modal Trigger -->
            <a class="modal-trigger waves-effect waves-light btn" href="#guardian1">Guardian's Details</a>
            <div id="guardian1" class="modal">
                <div class="modal-content">
                    <h6 class="teal-text center">Guardian's Details</h6>
                    <div class="row">
                        <div id="doneguardian"></div>
                        <div id="load6"></div>
                        <form id="guardianForm">
                            <div class="row">
                                <div class="input-field col s12 m4">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="fname5" name="fname5" type="text" class="validate" value="<?php echo $row10['guardiansFname'];?>"  required>
                                    <label for="fname5">First Name</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="lname5" name="lname5" type="text" class="validate" value="<?php echo $row10['guardiansLname'];?>"  required>
                                    <label for="lname5">Last Name</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <i class="material-icons prefix">featured_video</i>
                                    <input id="idno5" name="idno5" type="text" class="validate" value="<?php echo $row10['guardiansID'];?>"  required>
                                    <label for="idno5">National ID</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m4">
                                    <i class="material-icons prefix">work</i>
                                    <select id="employed5" name="employed5">
                                      <option value="" disabled selected>employed?</option>
                                      <option value="no">NO</option>
                                      <option value="yes">YES</option>
                                   </select>
                                   <label for="employed5">Select Parents Employment Status</label>
                                 </div>
                                <div class="input-field col s12 m4">
                                    <i class="material-icons prefix">phone</i>
                                    <input id="phone5" name="phone5" type="text" class="validate" value="<?php echo $row10['guardiansPhone'];?>"  required>
                                    <label for="phone5">Phone Number</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <i class="material-icons prefix">monetization_on</i>
                                    <input id="income5" name="income5" type="text" class="validate" value="<?php echo $row10['guardiansIncome'];?>"  required>
                                    <label for="income5">Income</label>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col s12 center">
                                    <button class="btn waves-effect waves-light" type="submit" name="action">SAVE
                                      <i class="material-icons right">send</i>
                                     </button>
                                 </div>
                            </div>
                        </form>
                    </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
    <div id="step4" class="col s12">
        <h4 class="teal-text center">Account Information</h4>
        <form id="accountForm">
            <div id="doneaccount"></div>
            <div id="load7"></div>
            <div class="row">
                <div class="input-field col s12 m3">
                      <i class="material-icons prefix">attach_money</i>
                      <input id="adminNo" name="adminNo" type="text" class="validate" value="<?php echo $row6['adminNo'];?>"  required>
                      <label for="adminNo">Registration No / Admission No</label>
                  </div>
                  <div class="input-field col s12 m3">
                      <i class="material-icons prefix">attach_money</i>
                      <input id="feeBalance" name="feeBalance" type="text" class="validate" value="<?php echo $row6['feeBalance'];?>"  required>
                      <label for="feeBalance">Remaining Fee Balance</label>
                  </div>
                   <div class="input-field col s12 m3">
                      <i class="material-icons prefix">account_balance</i>
                      <input id="acName" name="acName" type="text" class="validate" value="<?php echo $row6['accountName'];?>"  required>
                      <label for="acName">Account Name</label>
                  </div>
                    <div class="input-field col s12 m3">
                      <i class="material-icons prefix">account_balance_wallet</i>
                      <input id="acNumber" name="acNumber" type="text" class="validate" value="<?php echo $row6['accountNumber'];?>"  required>
                      <label for="acNumber">Account Number</label>
                  </div>
                     <div class="input-field col s12 m3">
                      <i class="material-icons prefix">attach_money</i>
                      <input id="amount" name="amount" type="text" class="validate" value="<?php echo $row6['amount'];?>"  required>
                      <label for="amount">Amount Requesting</label>
                  </div>
                     
            </div>
            <div class="row">
                 <div class="col s12 center">
                     <button class="btn waves-effect waves-light" type="submit" name="action">SAVE
                          <i class="material-icons right">send</i>
                      </button>
                  </div>
            </div>
        </form>
    </div>
    <div id="step5" class="col s12">
       <h2>Please <strong>Review</strong> the previous steps</h2>
         <p>Re-check the previous steps to ensure information submitted is correct</p>
          <form id="submitApplication">
            <div id="load8"></div>
             <div id="submitted" class="text-center"></div>
               <div class="row">
                  <div class="col-md-12 center">
                       <button type="submit" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">check</i></button>
                   </div>
               </div>
          </form>
    </div>
  </div>
      <!-- Include jQuery -->
    <script src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="../assets/js/init.js"></script>
     <script type="text/javascript" src="../assets/js/select.js"></script>
     <script type="text/javascript" src="../assets/js/modal.js"></script>
    <script src="../functions/wards.js"></script>
    <script src="../functions/family.js"></script>
    <script src="../functions/combined.js"></script>
    <script src="../functions/selectLevel.js"></script>
    <script src="../functions/personalForm.js"></script>
    <script src="../functions/transcriptInput.js"></script>
    <script src="../functions/education.js"></script>
    <script src="../functions/parents.js"></script>
    <script src="../functions/account.js"></script>
    <script src="../functions/submitapplications.js"></script>
    <script src="../assets/libs/sweet/sweetalert.min.js"></script>
    <script>
        <?php

        if($f > 0)
        {?>
          $('#finished').openModal('open');
          <?php
        }?>
          
    </script>



</body>
</html>
