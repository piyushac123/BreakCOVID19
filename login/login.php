<!doctype html>
<html>
    <body>
        <?php
        $con = mysqli_connect('localhost','root','','BreakCovid19');
            if (!$con) {
                die('Could not connect: ' . mysqli_error($con));
            }
        if(isset($_POST['signin'])){
            $email= $_POST['Email'];
            $pass= $_POST['Password'];
            
            if($email && $pass){
                #If preg_match = false, then return NULL(1) or else, then return empty string(0)
                if(preg_match('/[^a-zA-Z0-9\s\-_\.\?\@]/',$email) || preg_match('/[^a-zA-Z0-9\s\-_\.\?\@]/',$pass)){
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
                    file_put_contents('credential.txt',filter_var($email,FILTER_SANITIZE_STRING)."\n".filter_var($pass,FILTER_SANITIZE_STRING), FILE_APPEND | LOCK_EX);
                }
            }
            
            $arr = array();

            $dat = file_get_contents('credential.txt');
            #explode - split
            #FILTER_SANITIZE_FULL_SPECIAL_CHARS - remove special characters
            foreach(explode("\n",$dat) as $rec){
                array_push($arr, filter_var($rec, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            }

            unlink("credential.txt");
            /*for($i=0;$i<count($arr);$i++){
                echo $arr[$i]."\n";
            }*/
            
            $sql="select email,password from Registration";
            $result = mysqli_query($con,$sql);
            $flag=0;
            while($row = mysqli_fetch_array($result)){
                if($row['email']==$arr[0] && $row['password']==$arr[1]){
                    $flag=1;
                        $sql1="UPDATE `Registration` SET `flag`=1 WHERE email='".$arr[0]."'";
                     $result1 = mysqli_query($con,$sql1);
                     $sqlupdate="UPDATE `Registration` SET `flag`=0 WHERE email<>'".$arr[0]."'";
                     $result2 = mysqli_query($con,$sqlupdate);
                    ?>
                    <script>
                        alert("Logged In Successfully");
                        location.replace("http://localhost/BreakCOVID19/app/app.php");
                    </script>
                    <?php
                       break;
                    }
                }
                
            if($flag!=1&&$email!=''&&$pass!='')
                {
                ?>
                <script>
                    alert("Match not found");
                    window.history.go(-1);
                </script>
                <?php
                }
            else if($flag!=1){
                ?>
                <script>
                window.history.go(-1);
                </script>
            <?php
            }
        }
        
        mysqli_close($con);
        
        ?>
    </body>
</html>
        