<?php
session_start();
if(isset($_SESSION['email']))
{
  header("Location:home");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>CBA | Portal</title>

  <!-- CSS  -->
    <link rel="stylesheet" href="assets/css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="assets/css/materialize.css"  media="screen,projection"/>
    <link rel="stylesheet" href="assets/css/indexcss.css">
        <!--Import Google Icon Font-->
    <link href="assets/icons/MaterialIcons.css" rel="stylesheet">
</head>
<body>
                 <!-- Modal Structure -->
              <form id="signinForm" class="col s12 m12">
                <div id="login" class="modal">
                  <div class="modal-content center">
                    <h6 class="teal-text">User Login</h6>
                    <i class="material-icons large teal-text">perm_identity</i>
                    <h6 id="feedback_message" class="red-text"></h6>
                    <div id="load0"></div>
                        <div class="row">
                          <div class="input-field col s12 m12 ">
                            <i class="material-icons prefix">email</i>
                            <input id="uemail" name="uemail" type="email" class="validate" required>
                            <label for="uemail">Email</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12 m12">
                            <i class="material-icons prefix">vpn_key</i>
                            <input id="upassword" name="upassword" type="password" class="validate" required>
                            <label for="upassword">Password</label>
                          </div>
                          <input type="checkbox" id="toggle" onclick="togglePass1();" />
                          <label for="toggle">Show Password</label>
                        </div>
                        
                        <div class="row">
                          <div class="col s12">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Login
                              <i class="material-icons right">send</i>
                            </button>
                          </div>
                        </div>
                  </div>
                </div>
              </form>
               <!-- Modal Structure -->
               <form id="signupForm">
                <div id="signup" class="modal">
                  <div class="modal-content center">
                    <h5 class="teal-text">Sign Up</h5>
                    <div id="success_message" class="green-text center"></div>
                        <div class="row">
                          <div class="input-field col s12">
                            <div id="error_email"></div>
                            <i class="material-icons prefix">email</i>
                            <input id="email" name="email" type="email" class="validate" required>
                            <label for="email">Email</label>
                          </div>
                        </div>
                        <div class="row">
                          <div id="error_password"></div>
                          <div class="input-field col s12">
                            <i class="material-icons prefix">vpn_key</i>
                            <input id="password" name="password" type="password" class="validate" required>
                            <label for="password">Password</label>
                          </div>
                          <input type="checkbox" id="toggle1" onclick="togglePass2();" />
                          <label for="toggle1">Show Password</label>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">vpn_key</i>
                            <input id="password1" name="password1" type="password" class="validate" required>
                            <label for="password1">Confirm Password</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col s12">
                            <button class="btn waves-effect waves-light" type="submit" name="action">submit
                              <i class="material-icons right">send</i>
                            </button>
                          </div>
                        </div>
                  </div>
                </div>
                </form>
                 <!-- Modal Structure -->
              <form id="staffsigninForm">
                <div id="staff" class="modal">
                  <div class="modal-content center">
                    <h6 class="teal-text">Staff Login</h6>
                    <i class="material-icons large teal-text">person_pin</i>
                    <h6 id="feedback_message1"></h6>
                       
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input id="semail" name="semail" type="email" class="validate" required>
                            <label for="semail">Email</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">vpn_key</i>
                            <input id="spassword" name="spassword" type="password" class="validate" required>
                            <label for="spassword">Password</label>
                          </div>
                          <input type="checkbox" id="toggle3" onclick="togglePass3();" />
                          <label for="toggle3">Show Password</label>
                        </div>
                        <div class="row">
                          <div class="col s12">
                            <button class="btn waves-effect waves-light" type="submit" name="action">STAFF LOGIN
                              <i class="material-icons right">send</i>
                            </button>
                          </div>
                        </div>             
                  </div>
                </div>
                </form>
  <nav class="#43a047 green darken-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">County Bursary Allocation</a>
      <ul class="right hide-on-med-and-down">
           <li>
                <a class="modal-trigger waves-effect waves-#43a047 green darken-1 btn" href="#login">Login</a>  
           </li>
         <li>
            <a class="modal-trigger waves-effect waves-#43a047 green darken-1 btn" href="#signup">SignUp</a>
        </li>
          <li>
            <a class="modal-trigger waves-effect waves-#43a047 green darken-1 btn" href="#staff">Staff</a>
        </li>
      </ul>
      

      <ul id="nav-mobile" class="side-nav">
        <li>
                <a class="modal-trigger waves-effect waves-#1565c0 blue darken-3 btn" href="#login">Login</a>  
           </li>
         <li>
            <a class="modal-trigger waves-effect waves-l#1565c0 blue darken-3 btn" href="#signup">SignUp</a>
        </li>
          <li>
            <a class="modal-trigger waves-effect waves-#1565c0 blue darken-3 btn" href="#staff">Staff</a>
        </li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
      <div class="slider hide-on-med-and-down">  
          <ul class="slides hide-on-med-and-down">
            <li>
              <img src="assets/img/students.jpeg"> <!-- random image -->
              <div class="caption center-align">
                <h3 class="teal-text">Limitless Learning</h3>
                <h5 class="light grey-text text-lighten-3">With bursary funds, you are assured of staying in school and sharing ideas with others</h5>
              </div>
            </li>
            <li>
              <img src="assets/img/students1.jpg"> <!-- random image -->
              <div class="caption center-align">
                <h3 class="teal-text">Achieve your dreams</h3>
                <h5 class="light grey-text text-lighten-3">You can successfully achieve your dreams with the help of bursary funds</h5>
              </div>
            </li>
            <li>
              <img src="assets/img/students2.jpg"> <!-- random image -->
              <div class="caption left-align">
                <h3 class="teal-text">Soar Higher!</h3>
                <h5 class="light grey-text text-lighten-3">Want to expand your knowledge and have no funds? Don't worry. Bursary funds are here to help</h5>
              </div>
            </li>
            <li>
              <img src="assets/img/students3.jpg"> <!-- random image -->
              <div class="caption right-align">
                <h3 class="teal-text">Start Building Your Dreams</h3>
                <h5 class="light grey-text text-lighten-3">From lower level to higher level, bursary funds will help start building your dreams</h5>
              </div>
            </li>
            <li>
              <img src="assets/img/students4.jpg"> <!-- random image -->
              <div class="caption right-align">
                <h3 class="teal-text">Win</h3>
                <h5 class="light grey-text text-lighten-3">When you stay in school, you learn, and when you learn, you WIN!</h5>
              </div>
            </li>
          </ul>
     </div>   

  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">Quick, Simplified Application</h5>

            <p class="light">
              The tedious paper work that involves sending the physical application documents to the
              county offices will be replaced by the system that allows you to apply and submit online.
            </p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
            <h5 class="center">User Experience Focused</h5>

            <p class="light">
              The system offers a convenient way of applying. Every element is clear, thus the
              user shall have maximum user experience.
            </p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Easy to work with</h5>

            <p class="light">
              The system is designed to fit every user. All components are self explanatory, and with
              the instructions given, the user will easily interact with the application
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <h5 class="teal-text center">Play the video to learn how to use the system
        </h5>
        <div class="video-container">
              <img class="responsive-img" src="assets/img/demo.gif">
        </div>
      </div>

    </div>
    <br><br>
  </div>

  <footer class="page-footer #1b5e20 green darken-4">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">About CBAS</h5>
          <p class="grey-text text-lighten-4">
            
          </p>
        </div>
      </div>
    </div>
    <div class="footer-copyright #2e7d32 green darken-3">
      <div class="container center">
      Copyright &copy 2018
      </div>
    </div>
  </footer>


  <!--  Scripts-->
        <!-- jQuery -->
        <script src="assets/js/jquery.min.js"></script>
        <!-- Materializecss compiled and minified JavaScript -->
        <script src="assets/js/materialize.min.js"></script>
        <script src="assets/js/slider.js"></script>
        <script src="assets/js/modal.js"></script>
        <script src="functions/signup.js"></script>
        <script src="functions/signin.js"></script>
        <script src="functions/togglePass.js"></script>
        <script src="functions/staffsignin.js"></script>
        <script>
          $(".button-collapse").sideNav();
        </script>


  </body>
</html>
