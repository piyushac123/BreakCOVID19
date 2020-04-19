<!doctype html>
<html>
    <head>
        <title>Application</title>
        <link rel="stylesheet" href="signup.css">
        <script src="signup.js"></script>
    </head>
    <body>
        <?php
            $con = mysqli_connect('localhost','root','','BreakCovid19');
            if (!$con) {
                die('Could not connect: ' . mysqli_error($con));
            }
            if(isset($_POST['signup'])){
                $fname= $_POST['fname'];
                $mname= $_POST['mname'];
                $lname= $_POST['lname'];
                $email= $_POST['email'];
                $phone= $_POST['phone'];
                $dob= $_POST['dob'];
                $password= $_POST['pass'];
                $fullName= $fname." ".$mname." ".$lname;
                //echo $phone+456,"\n";
                
                if($fname && $mname && $lname && $password){
                #If preg_match = false, then return NULL(1) or else, then return empty string(0)
                    //echo $fname,$mname,$lname,$password,$phone,"\n";
                    //echo preg_match('/[^a-zA-Z0-9\s\-_\.\?\@\']/',$fname)." ".preg_match('/[^a-zA-Z0-9\s\-_\.\?\@\']/',$mname)." ".preg_match('/[^a-zA-Z0-9\s\-_\.\?\@\']/',$lname)." ".preg_match('/[^a-zA-Z0-9\s\-_\.\?\@\']/',$password)."\n";
                if(preg_match('/[^a-zA-Z0-9\s\-_\.\?\@]/',$fname) || preg_match('/[^a-zA-Z0-9\s\-_\.\?\@]/',$mname) || preg_match('/[^a-zA-Z0-9\s\-_\.\?\@]/',$lname) || preg_match('/[^a-zA-Z0-9\s\-_\.\?\@]/',$password)){
                    ?>
                    <script>
                        alert("Only letter, number, dash, underscore question mark and periods are allowed.");
                        window.history.go(-1);
                    </script>
                    <?php
                }
                else{
                    #file_put_contents('credential.txt', "hello\n", FILE_APPEND | LOCK_EX);
                    # file_put_contents(file, data, mode, context)
                    # filter_var(var, filtername, options)
                    #FILTER_SANITIZE_STRING - filter any tag in var
                    #FILE_APPEND - go to end of file
                    #LOCK_EX - lock the file
                    
                    file_put_contents('credential.txt',filter_var($fullName,FILTER_SANITIZE_STRING)."\n".filter_var($dob,FILTER_SANITIZE_STRING)."\n".filter_var($phone,FILTER_SANITIZE_STRING)."\n".filter_var($email,FILTER_SANITIZE_STRING)."\n".filter_var($password,FILTER_SANITIZE_STRING), FILE_APPEND | LOCK_EX);
                    
                    $arr = array();

            $dat = file_get_contents('credential.txt');
            #explode - split
            #FILTER_SANITIZE_FULL_SPECIAL_CHARS - remove special characters
            foreach(explode("\n",$dat) as $rec){
                array_push($arr, filter_var($rec, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            }

            unlink("credential.txt");
                
                //echo $fname.$lname.$email.$password.$channel;
        
                $sqlupdate="UPDATE `Registration` SET `flag`=0 WHERE 1";
                    if ($con->query($sqlupdate) === FALSE) {
                    echo "Error: " . $sqlupdate . "<br>" . $con->error;
                    }

                //mysqli_select_db($con,"ajax_demo");
                $fullName="'".$arr[0]."'";
                $dob= "'".$arr[1]."'";
                $phone= "'".$arr[2]."'";
                $email= "'".$arr[3]."'";
                $password= "'".$arr[4]."'";
                
                $sql="INSERT INTO Registration (`Name`,`DOB`, `Registration_date`,`Phone`,`Email`,`Password`,`Flag`)
                VALUES ($fullName,$dob,NOW(),$phone,$email,$password,1)";

                if ($con->query($sql) === FALSE) {
                    echo "Error: " . $sql . "<br>" . $con->error;
                }else{

                   ?>
                    <script>
                        location.replace("http://localhost/BreakCOVID19/app/app.php");
                    </script>
                    <?php 
                }
                }
            }
            
            
            }
            
            
            
            mysqli_close($con);
        ?>
    </body>
</html>
<!--ALTER TABLE tablename AUTO_INCREMENT = 1-->