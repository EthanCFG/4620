<?php

    include_once "../session.php";

    function inputEmpty($name, $email, $username, $pwd, $pwdRepeat)
    {
        $result;
        if(empty($name) || empty($email)  || empty($username)  || empty($pwd) ||  empty($pwdRepeat))
        {
            $result = true;
        }
        else
        {
            $result = false;
        }
        return $result;
    }

    function leaveComment($conn, $comment, $user, $path)
    {
        $sql = "INSERT INTO comments (comment, author, media) VALUES (?, ?, ?);";

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("location: ../videoPlay.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "sss", $comment, $user, $path);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("location: ../videoPlay.php?commentSuccess");
        exit();
    }

    function emailInvalid($email)
    {
        $result;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $result = true;
        }
        else
        {
            $result = false;
        }
        return $result;
    }

    function changeUN($conn, $cur, $new, $pass)
    {
        if((empty($cur) || empty($new)))
        {
            //header("location: ../editprofile.php?error=users");
            return false;
            exit();
        }
        
        $uidExists = userExistsLogin($conn, $cur);
    
        if ($uidExists == false) {
            header("location: ../editprofile.php?error=usernoexists");
            exit();
        }
        

        $uidExists2 = userExistsLogin($conn, $new);
    
        if ($uidExists2 !== false) {
            header("location: ../editprofile.php?error=userTaken1");
            exit();
        }

        $sql = "UPDATE users SET usersUid ='$new' WHERE usersUid = '$cur'";
        $pwdHashed = $uidExists["usersPwd"];
        $checkPwd = password_verify($pass, $pwdHashed);

        if ($checkPwd === false) {
                header("location: ../editprofile.php?error=test3");
                exit();
        } 
        else if($checkPwd === true){
            if ($result = mysqli_query($conn, $sql)) {
                echo "Record updated successfully";
                exit();
            }
        }
        mysqli_close($conn);
    }

    function emailExists($conn, $email)
    {
        $sql = "SELECT * FROM users WHERE usersEmail = ?;";
        $state = mysqli_stmt_init($conn);

        if(!mySqli_stmt_prepare($state, $sql))
        {
            header("location: ../signup.php?error=statefailed2");
            exit();
        }
        
        mysqli_stmt_bind_param($state, "s", $email);
        mysqli_stmt_execute($state);

        $resultsData = mysqli_stmt_get_result($state);

        if($r = mysqli_fetch_assoc($resultsData))
        {
            return $r;
        }
        else
        {
            $result = false;
            return $result;
        }
        mysqli_stmt_close($state);
    }

    function changeEmail($conn, $cur, $newEmail, $curEmail, $pass)
    {
        $uidExists = userExistsLogin($conn, $cur);
        if((empty($curEmail) || empty($newEmail)))
        {
            //header("location: ../editprofile.php?error=emails");
            return false;
            exit();
        }
        else if ($uidExists === false) {
            header("location: ../editprofile.php?error=usernotinEmail");
            exit();
        }
        else if(emailInvalid($newEmail) || emailInvalid($curEmail))
        {
            header("location: ../editprofile.php?error=emailNoval");
            exit();
        }
        else if(emailExists($conn, $curEmail) == false)
        {
            header("location: ../editprofile.php?error=emailnoexist");
            exit();
        }
        else if(emailExists($conn, $newEmail) !== false)
        {
            header("location: ../editprofile.php?error=emailExist");
            exit();
        }

 
        $sql = "UPDATE users SET usersEmail ='$newEmail' WHERE usersUid = '$cur'";

        $pwdHashed = $uidExists["usersPwd"];
        $checkPwd = password_verify($pass, $pwdHashed);
        if ($checkPwd === false) {
            header("location: ../editprofile.php?error=test2");
            exit();
        }
        else if($checkPwd === true){
            if ($result = mysqli_query($conn, $sql)) {
                header("location: ../editprofile.php?error=passSuccess4");   
                exit();
            }
        }
        mysqli_close($conn);
    }

    function passChange($conn, $cur, $pass, $newPass)
    { 
        $uidExists = userExistsLogin($conn, $cur);
    
        if ($uidExists === false) {
            header("location: ../editprofile.php?error=usernotin");
            exit();
        }
        $passHashed = $uidExists["usersPwd"];
        $checkPass = password_verify($passHashed, $newPass);
        $hashedPwd = password_hash($newPass, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET usersPwd ='$hashedPwd' WHERE usersUid = '$cur'";

        if ($checkPass === false) {
            if ($result = mysqli_query($conn, $sql)) {
                header("location: ../editprofile.php?error=passSuccess2");   
                exit();
            }
        }
        else if ($checkPass === true) {
            header("location: ../editprofile.php?error=test");
            exit();
        }
        mysqli_close($conn);
    }

    function emptyInputLogin($username, $pwd)
    {
        $result;
        if(empty($username)  || empty($pwd))
        {
            $result = true;
        }
        else
        {
            $result = false;
        }
        return $result;
    }

    function usernameInvalid($username)
    {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $username))
        {
            $result = true;
        }
        else
        {
            $result = false;
        }
        return $result;
    }

    function passMatch($pwd, $pwdRepeat)
    {
        $result;
        if($pwd !== $pwdRepeat)
        {
            $result = true;
        }
        else
        {
            $result = false;
        }
        return $result;
    }

    function userExists($conn, $username, $email)
    {
        $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
        $state = mysqli_stmt_init($conn);

        if(!mySqli_stmt_prepare($state, $sql))
        {
            header("location: ../signup.php?error=statefailed1");
            exit();
        }
        
        mysqli_stmt_bind_param($state, "ss", $username, $email);
        mysqli_stmt_execute($state);

        $resultsData = mysqli_stmt_get_result($state);

        if($r = mysqli_fetch_assoc($resultsData))
        {
            return $r;
        }
        else
        {
            $result = false;
            return $result;
        }
        mysqli_stmt_close($state);
    }

    function makeUser($conn, $name, $email, $username, $pwd)
    {
        $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";

        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
             header("location: ../signup.php?error=stmtfailed");
            exit();
        }
    
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("location: ../signup.php?error=none");
        exit();
    }

    function uploadMedia($conn, $username, $title, $description, $keywords, $category, $path)
    {
        $sql = "INSERT INTO uploadData (userName, title, descrip, keywords, category, filePath) VALUES (?, ?, ?, ?, ?, ?);";

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("location: ../filemanager.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ssssss", $username, $title, $description, $keywords, $category, $path);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("location: ../index.php?success");
        exit();
    }

    function loginUser($conn, $username, $pwd) {
        $uidExists = userExistsLogin($conn, $username);
    
        if ($uidExists === false) {
            header("location: ../login.php?error=wronguid");
            exit();
        }
    
        $pwdHashed = $uidExists["usersPwd"];
        $checkPwd = password_verify($pwd, $pwdHashed);
    
        if ($checkPwd === false) {
            header("location: ../login.php?error=wrongpass");
            exit();
        }
        else if ($checkPwd === true) {
            session_start();
            $_SESSION["userid"] = $uidExists["usersId"];
            $_SESSION["useruid"] = $uidExists["usersUid"];
            header("location: ../index.php?error=none");
            exit();
        }
    }

    function userExistsLogin($conn, $username)
    {
        $sql = "SELECT * FROM users WHERE usersUid = ?;";
        $state = mysqli_stmt_init($conn);

        if(!mySqli_stmt_prepare($state, $sql))
        {
            header("location: ../login.php?error=statefailed1");
            exit();
        }

        mysqli_stmt_bind_param($state, "s", $username);
        mysqli_stmt_execute($state);

        $resultsData = mysqli_stmt_get_result($state);

        if($r = mysqli_fetch_assoc($resultsData))
        {
            $result = $r;
            return $result;
        }
        else
        {
            $result = false;
            return $result;
        }
        mysqli_stmt_close($state);
    }

    function getVideo($conn)
    {
        $sql = "SELECT filePath FROM uploadData";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) 
        {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) 
            {
                $path = $row["filePath"];
                return $path;
            }
        } 
        mysqli_close($conn);

    }





