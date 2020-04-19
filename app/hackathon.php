<?php
            /*$con = mysqli_connect('localhost','root','','BreakCovid19');
            if (!$con) {
                die('Could not connect: ' . mysqli_error($con));
            }

            //mysqli_select_db($con,"ajax_demo");
            
            $sql1="select registration_id from Registration where flag=1";
            $result1 = mysqli_query($con,$sql1);*/
?>
<?php
    
    $con = mysqli_connect('localhost','root','','BreakCovid19');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }
    if(isset($_POST["apply2"])){
        $topic = $_POST['topic'];
        $college = $_POST['college'];
        $deg = $_POST['deg'];
        $branch = $_POST['branch'];
        /*echo $_FILES["ppt"]["name"]," ",$_FILES["ppt"]["tmp_name"]," ",$topic;
        //file name with random number so that similar dont get replaced
        $pname = rand(1000,10000)."-'".basename($_FILES["ppt"]["name"])."'";
        
        //temporary file name
        $tname = $_FILES["ppt"]["tmp_name"];
        
        //upload directory path
        $upload = 'hackathon_doc';*/
        
        //echo $pname." ".$tname."\n".$upload;
    //}
        //upload file to directory
        //move_uploaded_file($tname,$upload.'/'.$pname);
        
                #If preg_match = false, then return NULL(1) or else, then return empty string(0)
                if(preg_match('/[^a-zA-Z0-9\s\-_\.\?]/',$topic) || preg_match('/[^a-zA-Z0-9\s\-_\.\?]/',$college) || preg_match('/[^a-zA-Z0-9\s\-_\.\?]/',$deg) || preg_match('/[^a-zA-Z0-9\s\-_\.\?]/',$branch)){
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
                    
                    file_put_contents('credential.txt',filter_var($topic,FILTER_SANITIZE_STRING)."\n".filter_var($college,FILTER_SANITIZE_STRING)."\n".filter_var($deg,FILTER_SANITIZE_STRING)."\n".filter_var($branch,FILTER_SANITIZE_STRING), FILE_APPEND | LOCK_EX);
                    
                    $arr = array();

            $dat = file_get_contents('credential.txt');
            #explode - split
            #FILTER_SANITIZE_FULL_SPECIAL_CHARS - remove special characters
            foreach(explode("\n",$dat) as $rec){
                array_push($arr, filter_var($rec, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            }

            unlink("credential.txt");
            
            $topic = "'".$arr[0]."'";
            $college = "'".$arr[1]."'";
            $deg = "'".$arr[2]."'";
            $branch = "'".$arr[3]."'";
        
        $sql1="select registration_id from Registration where flag=1";
        $result1 = mysqli_query($con,$sql1);
        $value1="";
        while($row1 = mysqli_fetch_array($result1)){
            $value1 = $row1['registration_id'];
        }
        //echo $value1,$topic,$pname,$college,$deg,$branch;
        $sql="INSERT INTO Hackathon (`registration_id`,`Topic`,`College`,`Degree`,`Branch`) VALUES ($value1,$topic,$college,$deg,$branch)";

        if ($con->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $con->error;
        }else{

        ?>
        <script>
            alert("Registered Successfully for Hackathon");
            location.replace("http://localhost/BreakCOVID19/app/app.php");
        </script>
        <?php 
        }
        }
    }

    //mysqli_select_db($con,"ajax_demo");
            
    
            
    mysqli_close($con);
?>