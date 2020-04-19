<!DOCTYPE html>
<html lang="en">
<head>
  <title>HOME</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="app.css">
  <link rel="stylesheet" href="../res/res.css">
  <!--<link href='https://fonts.googleapis.com/css?family=Aclon' rel='stylesheet'>-->
  <link rel="stylesheet" href="../bootstrap.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="app.js"></script>
    <script src="../res/res.js"></script>
</head>
<body>
     <?php
            $con = mysqli_connect('localhost','root','','BreakCovid19');
            if (!$con) {
                die('Could not connect: ' . mysqli_error($con));
            }
    ?>
    <div class="container"> 
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-2"><a href="../home/home.html"><img src="../images/images.png" alt="Image" width="200" height="200"></a></div>
        <div class="col-lg-2 heading">reak</div>
          <div class="col-lg-1 heading"><img src="../images/covid.jpeg" alt="Image" height="30" width="150"></div>
      </div>
    </div><br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
              <ul class="nav nav-tabs" style="margin:auto;">
                  <!--<li><a href="../feedback/feedback.html" class="pills-features">FEEDBACK</a></li>-->
                <li id="sec1" class="sec1 active"><a href="#section1">VOLUNTEER</a></li>
                <li id="sec2" class="sec2"><a href="#section2">HACKATHON</a></li>
                  <li id="sec3" class="sec3"><a href="#section3">COVID GUIDELINES</a></li>
              </ul>
            </div>
            <div class="col-lg-3">
                <ul class="nav nav-pills" style="text-align: right;">
                  <!--<li><a href="../feedback/feedback.html" class="pills-features">FEEDBACK</a></li>-->
                <li id="sec4" class="sec4"><a href="logout.php"><acronym title="SIGN OUT">
                    <?php
                        $sql = "select Email from Registration where flag=1";
                        $result = mysqli_query($con,$sql);
                        $value = "";
                        while($row = mysqli_fetch_array($result)){
                            $value = $row['Email'];
                        }
                        echo $value;
                    ?>
                </acronym></a></li>
              </ul>
                </div>
        </div>
    </div>
    <div class="container">
    <div class="row" id="section1">
    
    <?php
            //mysqli_select_db($con,"ajax_demo");
            
            $sql1="select registration_id from Registration where flag=1";
            $result1 = mysqli_query($con,$sql1);
    
            $sql2="select registration_id from Volunteer";
            $result2 = mysqli_query($con,$sql2);
    
            $sql3="select registration_id from Hackathon";
            $result3 = mysqli_query($con,$sql3);
            $value1="";
            $flag1=0;
                while($row1 = mysqli_fetch_array($result1)){
                    $value1 = $row1['registration_id'];
                }
            while($row2 = mysqli_fetch_array($result2)){
                if($row2['registration_id'] == $value1){
                    $flag1 = 1;
                    break;
                }
            }
            if($flag1 == 1){
                ?>
                <center>
                    <br><span class="smallHead" style="color:red;">You have already applied for the VOLUNTEER. We will soon contact you.</span>
                </center>
                <?php
            }
            else{
                ?>
                <h1 style="padding: 5px;text-align: center;font-size: 35px;">VOLUNTEER TO HELP!</h1>
                    <form id="myform1" method="post" action="volunteer.php" onSubmit="return validateForm()" style="border:1px solid #000" size:100px>
                        <div class="formclass">
                        <h1>Share your DETAILS</h1>
                        <hr>
                        <h4>Type of Service* :</h4>
                        <input type="text" placeholder="Service Type" name="service" >
                        <h4>Any organization/individual* :</h4>
                        <input type="radio" id="ind" name="work" onclick="ind()">
                        <label for="ind">Individual</label><br>
                        <input type="radio" id="org" name="work" onclick="org()">
                        <label for="org">Organization</label><br>
                        <div id="showOrg">
                            <h4>Name of Organization :</h4>
                            <input type="text" placeholder="Name of Organization" id="exp" name="name">
                            <h4>Year of Experience :</h4>
                            <input type="number" placeholder="Year of Experience" id="exp" name="year">
<!--
                            <h4>Document of work experience:</h4>
                            <input type="file" placeholder="Document of work experience" id="doc" name="doc">
-->
                        </div>
                        <div class="clearfix">
                            <button type="reset" class="cancelbtn1">Reset</button>
                            <button type="submit" class="signupbtn1" name="apply1">Apply</button>
                        </div>
                        </div>
                    </form>
                <?php
            }
        ?>           
        </div><br>
        <div class="row" id="section2">
            <hr style="height: 1px;background-color: #ccc;border: none;">
                <center><img src="../images/hackathon.jpg" alt="HACKATHON"></center>
            <hr style="height: 1px;background-color: #ccc;border: none;">
        <?php
            $flag2=0;
            while($row3 = mysqli_fetch_array($result3)){
                if($row3['registration_id'] == $value1){
                    $flag2 = 1;
                    break;
                }
            }
            if($flag2 == 1){
                  ?>
                    <center>
                        <span class="smallHead" style="color:red;">You have already registered for the HACKATHON. We will soon contact you.</span>
                    </center>
                    <?php
                }
                else{
                    ?>
                        <!--<i class='fas fa-angle-double-right' style='font-size:24px; color:red'></i>-->
                        <center><span class="smallHead" style="color:red; margin:auto">Not only changing, its all about boosting your developing skills to save this world from this pandemic.</span><br>
                            <button class="register">Register Now!</button></center>
                            <form id="myform2" method="post" action="hackathon.php" onSubmit="return validateForm()" style="border:1px solid #000;width:30%;margin-left:33.5%">
                                <div class="formclass">
                                    <h3>APPLICATION FORM</h3>
                                    <hr>
                                    <h4>Topic* :</h4>
                                    <input type="text" placeholder="Topic" name="topic" >
<!--
                                    <h4>Upload Presentation(*.pdf)*:</h4>
                                    <input type="file" placeholder="Document of presentation" id="ppt" name="ppt">
-->
                                        <h4>College :</h4>
                                        <input type="text" placeholder="Name of College" id="college" name="college">
                                        <h4>Degree :</h4>
                                        <input type="text" placeholder="Degree" id="deg" name="deg">
                                        <h4>Branch :</h4>
                                        <input type="text" placeholder="Branch" id="branch" name="branch">
                                    <div class="clearfix">
                                        <button type="reset" class="cancelbtn2">Reset</button>
                                        <button type="submit" class="signupbtn2" name="apply2">Register</button>
                                    </div>
                                </div>
                            </form>
                    <?php
            }
            mysqli_close($con);
    ?>
            <div class="hackathon-details" style="font-weight:bold">ANNOUNCEMENTS</div>
            <p>All the Team leader mail their ideas as an abstract at event@cucoders.tech. So, that we can start judging from starting of the contest which will make the declaration of result in no time.</p>
            <div class="hackathon-details" style="font-weight:bold">ABOUT THE HACKATHON</div>
            <p>Ever had a brilliant idea to improve the community? Well, this is your chance. Put your thinking caps on and use the most of this hackathon to build something exciting to create solutions against the sprea of COVID-19.<br>This is a team participation hackathon and you can have at most 6 members in your team.</p>
            <div class="hackathon-details" style="font-weight:bold">HACKATHON DETAILS</div>
            <ul>
                <li><b>Organiser:</b> The hackathon is hosted by CU-Coders</li>
                <li><b>Duration:</b> 8 day 12 hours</li>
                <li><b>Start time:</b> 2nd April 2020, 08:00 hrs IST</li>
                <li><b>End time:</b> 09th April 2020, 20:00 hrs IST</li>
            </ul>
            <div class="hackathon-details" style="font-weight:bold">ELIGIBILITY CRITERIA</div>
            <p>This contest is open to all the programmers across India. However, all the participants are expected to abide to CodeChef Code Of Conduct.</p>
            <div class="hackathon-details" style="font-weight:bold">RULES AND REGULATION</div>
            <ul>
                <li>Discussing CodeChef's problems or any aspect of problem, on any other platform on web, on identification, could lead to disabling of respective account and banning from the community.</li>
                <li>Please contact admin@ankitraj.in for any queries during the contest.</li>
                <li>The decision of the organizers in declaring the results will be final. No queries in this regard will be entertained.</li>
                <li>Any participant found to be indulging in any form of malpractice will be immediately disqualified.</li>
            </ul>
            <div class="hackathon-details" style="font-weight:bold">GUIDELINES</div>
            <ul>
                <li><b>Formation of team:</b> This is a team participation hackathon. You can have at most 6 members in your team. There is no restriction on who the members can be. A single person can be part of at most 1 team.</li>
                <li>Your submitted app should be in working condition till April 9th 2020 at least, for judging to take place.</li>
                <li>Participants are expected to come up with new and innovative ideas.</li>
                <li>You have to develop the application on your local system and submit the GitHub URL where you have hosted it, along with instructions to run the application. The source code should be included. A presentation or video explaining your submission should also be included.</li>
                <li>Participants are free to use any publicly accessible API for the purpose of data collection.</li>
                <li>If you use any database like MySQL, you should also submit a database dump along with your submission.</li>
                <li>There is no restriction to use any language, technology stack, or libraries.</li>
                <li>The hacks/solutions developed as part of the hackathon will be owned by the individuals and teams who create them.</li>
                <li>By participating in the hackathon, you agree to CU-Coders terms and conditions.</li>
                <li>The hackathon organizers will have the right at their sole discretion to determine whether an entrant is eligible for the Contest.</li>
            </ul>
    </div>
        <div class="row" id="section3" style="font-family: 'Times New Roman', Times, serif;">
            <h3>WHO Strategic Objectives</h3>
            <ul><h4>
                <li>Interrupt human-to-human transmission including reducing secondary infections among close contacts and health care workers, preventing transmission amplification events, and preventing further international spread.</li>
                <li>Identify, isolate and care for patients early, including providing optimized care for infected patients.</li>
                <li>Identify and reduce transmission from the animal source.</li>
                <li>Address crucial unknowns regarding clinical severity, extent of transmission and infection, treatment options, and accelerate the development of diagnostics, therapeutics and vaccines.</li>
                <li>Communicate critical risk and event information to all communities and counter misinformation.</li>
                <li>Minimize social and economic impact through multisectoral partnerships.</li>
            </h4></ul><br>
            <h3>Symptoms</h3>
            <h4>Common Symptoms:
            <ul>
                <li>fever</li>
                <li>tiredness</li>
                <li>dry cough</li>
            </ul></h4>
            <h4>Other symptoms include:
            <ul>
                <li>shortness of breath</li>
                <li>aches and pains</li>
                <li>sore throat</li>
                <li>very few people will report diarrhoea, nausea or a runny nose</li>
                </ul></h4><br>
            <h3>Prevention</h3>
                <h4>STAY HOME. SAVE LIVES.</h4>
                <ol>
                    <li><b>STAY</b> home</li>
                    <li><b>KEEP</b> a safe distance</li>
                    <li><b>WASH</b> hands often</li>
                    <li><b>COVER</b> your cough</li>
                    <li><b>SICK?</b> Call the helpline</li>
                </ol>
        </div>
    </div>
    
    </body>
</html>