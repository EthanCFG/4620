<?php
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
            header("location: ../User/signup.php?error=statefailed1");
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
             header("location: ../User/signup.php?error=stmtfailed");
            exit();
        }
    
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("location: ../User/signup.php?error=none");
        exit();
    }

    function uploadMedia($conn, $username, $title, $description, $keywords, $category, $path)
    {
        $sql = "SELECT usersId FROM users WHERE usersUid= ?;";

        $sql .= "INSERT INTO uploadData (userId, title, descrip, keywords, catagory, filePath) VALUES (?, ?, ?, ?, ?, ?);";

        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("location: ../filemanager.php?error=stmtfailed");
            exit();
        }
        echo "<p>post upload</p>";
        mysqli_stmt_bind_param($stmt, "ssssss", $userid, $title, $description, $keywords, $category, $path);
        echo "<p>post upload</p>";
        mysqli_stmt_execute($stmt);
        echo "<p>post upload</p>";
        mysqli_stmt_close($stmt);
        echo "<p>post upload</p>";
        mysqli_close($conn);
        header("location: ../index.php?success");
        exit();
    }

    function loginUser($conn, $username, $pwd) {
        $uidExists = userExists($conn, $username, $email);
    
        if ($userExists === false) {
            header("location: ../login.php?error=wrongid");
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
        $sql = "SELECT * FROM users WHERE usersName = ?;";
        $state = mysqli_stmt_init($conn);

        if(!mySqli_stmt_prepare($state, $sql))
        {
            header("location: ../signup.php?error=statefailed1");
            exit();
        }

        mysqli_stmt_bind_param($state, "s", $username);
        mysqli_stmt_execute($state);

        $resultsData = mysqli_stmt_get_result($state);

        if($r = mysqli_fetch_assoc($resultsData))
        {
            $result = true;
            return $result;
        }
        else
        {
            $result = false;
            return $result;
        }
        mysqli_stmt_close($state);
    }

    /*
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
    function changeBio($conn, $bio)
    {
        $mysql = "SELECT * FROM "
    }

    function changeGen($conn, $gender)
    {
        $mysql = "SELECT * FROM "
    }
    */





