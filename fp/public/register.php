<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        redirect("index.html");
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {

        // validate email submission
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
        {
            apologize("Please enter a valid email."); 
        }
        
        // validate username-pwd submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }
        if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("Your password and confirmation do not match.");
        }
        
        // add user to database with hashed pwd
        $queried = CS50::query("INSERT IGNORE INTO users (name, email, username, hash) VALUES(?, ?, ?, ?)", 
                                    $_POST["name"],         // name
                                    $_POST["email"],        // email
                                    $_POST["username"],     // username
                                    password_hash($_POST["password"], PASSWORD_DEFAULT)); // password
        
        // creates new user
        if(1 == $queried)
        {
            // queries id and stores in global variable
            $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];
            $_SESSION["id"] = $id;
            $_SESSION["username"] = $_POST["username"];
            
            // redirects to index
            redirect("index.php");
        }
        else
        {
            // else user cannot be created
            apologize("The username or email already exists. Sorry!");
        }
    }

?>