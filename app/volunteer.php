<?php
    $con = mysqli_connect('localhost','root','','BreakCovid19');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }
    if(isset($_POST["apply1"])){
        $service = $_POST['service'];
        $name = $_POST['name'];
        $year = $_POST['year'];
        //file name with random number so that similar dont get replaced
        /*$pname = rand(1000,10000)."-'".basename($_FILES['doc']["name"])."'";
        
        //temporary file name
        $tname = $_FILES["doc"]["tmp_name"];
        
        //upload directory path
        $upload = 'volunteer_doc';
        
        //upload file to directory
        move_uploaded_file($tname,$upload.'/'.$pname);*/
        
        if($name){
                #If preg_match = false, then return NULL(1) or else, then return empty string(0)
                    //echo $fname,$mname,$lname,$password,$phone,"\n";
                    //echo preg_match('/[^a-zA-Z0-9\s\-_\.\?\@\']/',$fname)." ".preg_match('/[^a-zA-Z0-9\s\-_\.\?\@\']/',$mname)." ".preg_match('/[^a-zA-Z0-9\s\-_\.\?\@\']/',$lname)." ".preg_match('/[^a-zA-Z0-9\s\-_\.\?\@\']/',$password)."\n";
                if(preg_match('/[^a-zA-Z0-9\s\-_\.\?\@]/',$service) || preg_match('/[^a-zA-Z0-9\s\-_\.\?\@]/',$name)){
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
                    
                    file_put_contents('credential.txt',filter_var($service,FILTER_SANITIZE_STRING)."\n".filter_var($name,FILTER_SANITIZE_STRING)."\n".filter_var($year,FILTER_SANITIZE_STRING), FILE_APPEND | LOCK_EX);
                    
                $arr = array();

                $dat = file_get_contents('credential.txt');
                #explode - split
                #FILTER_SANITIZE_FULL_SPECIAL_CHARS - remove special characters
                foreach(explode("\n",$dat) as $rec){
                    array_push($arr, filter_var($rec, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                }

                unlink("credential.txt");

                $service = "'".$arr[0]."'";
                $name = "'".$arr[1]."'";
                $year = "'".$arr[2]."'";

                $sql1="select registration_id from Registration where flag=1";
                $result1 = mysqli_query($con,$sql1);
                $value1="";
                while($row1 = mysqli_fetch_array($result1)){
                    $value1 = $row1['registration_id'];
                }

                $sql="INSERT INTO Volunteer (`registration_id`,`Service`, `Organization`,`Experience`) VALUES ($value1,$service,$name,$year)";

                if ($con->query($sql) === FALSE) {
                    echo "Error: " . $sql . "<br>" . $con->error;
                }else{

                ?>
                <script>
                    alert("Congratulations! You are gonna VOLUNTEER soon");
                    location.replace("http://localhost/BreakCOVID19/app/app.php");
                </script>
                <?php 
                }
            }
        }
        else{
            if(preg_match('/[^a-zA-Z0-9\s\-_\.\?\@]/',$service)){
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
                    
                    file_put_contents('credential.txt',filter_var($service,FILTER_SANITIZE_STRING)."\n".filter_var($name,FILTER_SANITIZE_STRING)."\n".filter_var($year,FILTER_SANITIZE_STRING), FILE_APPEND | LOCK_EX);
                    
                $arr = array();

                $dat = file_get_contents('credential.txt');
                #explode - split
                #FILTER_SANITIZE_FULL_SPECIAL_CHARS - remove special characters
                foreach(explode("\n",$dat) as $rec){
                    array_push($arr, filter_var($rec, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                }

                unlink("credential.txt");

                $service = "'".$arr[0]."'";
                $name = "'".$arr[1]."'";
                $year = "'".$arr[2]."'";

                $sql1="select registration_id from Registration where flag=1";
                $result1 = mysqli_query($con,$sql1);
                $value1="";
                while($row1 = mysqli_fetch_array($result1)){
                    $value1 = $row1['registration_id'];
                }

                $sql="INSERT INTO Volunteer (`registration_id`,`Service`, `Organization`,`Experience`) VALUES ($value1,$service,$name,$year)";

                if ($con->query($sql) === FALSE) {
                    echo "Error: " . $sql . "<br>" . $con->error;
                }else{

                ?>
                <script>
                    alert("Congratulations! You are gonna VOLUNTEER soon");
                    location.replace("http://localhost/BreakCOVID19/app/app.php");
                </script>
                <?php 
                }
            }
        }
        
    }

    //mysqli_select_db($con,"ajax_demo");
            
    
            
    mysqli_close($con);
?>