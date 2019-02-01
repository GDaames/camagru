<?php
    include_once 'config/session.php';
    include_once 'config/database.php';

    
    $email = isset($_POST['email']) ? tim($_POST['email']) : '';            //Get the name that is being searched for.
    $sql = "SELECT 'id', 'email' FROM 'users' WHERE 'email; = :email";      //The simple SQL query that we will be running.
    $statement = $pdo->prepare($sql);                                       //Prepare our SELECT statement.
    $statement->bindValue(':email',$email);                                 //Bind the $name variable to our :name parameter.
    $statement->execute();                                                  //Execute the SQL statement.
    $usersInfo = $statement->fetch(PDO::FETCH_ASSOC);                       //Fetch our result as an associative array.

    if(empty($userInfo)){   //If $userInfo is empty, it means that the submitted email address has not been found in our users table.
        echo 'that email address was not found in our system!';  
        exit;
    }

    $userEmail = $userInfo['email'];                                        //The user's email address and id.
    $userId = $userInfo['id'];
    $token = openssl_random_pseudo_bytes(16);                               //Create a secure token for this forgot password request.
    $token = bin2hex($token);

                                                                            //Insert the request information into our password_reset_request table.
                                                                            //The SQL statement.
    $insertSql = "INSERT INTO password_reset_request
                (user_id, date_requested, token)
                VALUES
                (:user_id, :date_requested, :token)";


    $statement = $pdo->prepare($insertSql);                                 //Prepare our INSERT SQL statement.
    $statement->execute(array(                                              //Execute the statement and insert the data.
        "user_id" => $userId,
        "date_requested" => date("Y-m-d-H:i:s"),
        "token" => $token
    ));

    $passwordRequestId = $pdo->lastInsertId();                              //Get the ID of the row we just inserted.
    $verifyScript = 'https://your-website.com/forgot-pass.php';             //Create a link to the URL that will verify the forgot password request and allow the user to change their password.
    $linkToSend = $verifyScript . '?uid=' . $userId . '&id=' . $passwordRequestId . '&t=' . $token;    //The link that we will send the user via email.
    echo $linkToSend;    //Print out the email for the sake of this tutorial.