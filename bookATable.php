<?php 
    require_once __DIR__.'/bootstrap.php';
    require_once __DIR__.'/utils.php';   

    //The form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        //handle form submission
        $nameErr = $dateErr = $timeErr = $emailErr = $peopleErr = $mobileErr = $checkboxErr = "";
        $name = $date = $time = $email = $people = $mobile = "";
        $checkbox = false;
    
        //validating name
        if (!empty($_POST["name"])) {
            $name = clean_input($_POST["name"]);
        }
        else
        {
            $nameErr = "Name is required";
            $validations['nameError'] = $nameErr;
        }

        //validating people number
        if(!empty($_POST["people"])) {
            $people = clean_input($_POST["people"]);
            if($people < 0)
            {
                $peopleErr = "Number entered is not valid.";
                $validations['peopleError'] = $peopleErr;
            }
        }
        else{
            $peopleErr = "Number of People is required";
            $validations['peopleError'] = $peopleErr;
        }

        //validating date
        if(!empty($_POST["date"])) {
            $date = clean_input($_POST["date"]);
        }
        else{
            $dateErr = "Date is required.";
            $validations['dateError'] = $dateErr;
        }

        //validating time
        if(!empty($_POST["time"])) {
            $time = clean_input($_POST["time"]);
        }
        else{
            $timeErr = "Date is required.";
            $validations['timeError'] = $timeErr;
        }

        //validating cemail
        if (!empty($_POST["cemail"])) {
            $cemail = clean_input($_POST["cemail"]);
            //FILTER_VALIDATE_EMAIL is one of many validation filters: https://www.php.net/manual/en/filter.filters.validate.php
            if (!filter_var($cemail, FILTER_VALIDATE_EMAIL))
            {
                $emailErr= 'The email address entered is not valid.';
                $validations['emailError'] = $emailErr;
            }
        }
        else
        {
            $emailErr = "Email is required";
            $validations['emailError'] = $emailErr;
        }

         //validating mobile number
         if(!empty($_POST["mobile"])) {
            $mobile = clean_input($_POST["mobile"]);
            if(strlen($mobile) != 8)
            {
                $mobileErr = "Mobile number entered is not valid.";
                $validations['mobileError'] = $mobileErr;
            }
        }
        else{
            $mobileErr = "Mobile number is required";
            $validations['mobileError'] = $mobileErr;
        }
        
        if(isset($_POST['checkbox'])){
            $checkbox = clean_input($_POST['checkbox']);
        }else{
            //$checkbox = false;
            $checkboxErr = "Please agree to the Privacy Policy";
            $validations['checkboxError'] = $checkboxErr;
        }

        //If there are no errors
        if (empty($nameErr) && empty($peopleErr) && empty($dateErr) && empty($timeErr) && empty($emailErr) && empty($mobileErr) && empty($checkboxErr))
        {
            $validations['pagemessage'] = "Form submitted successfully. Thank you!";
        }
        else
        {
            $validations['pagemessage'] = "There are some issues with this form";
        }
            
        //Render view with validations
        echo $twig->render('bookATable.html', [ 
            'validations' => $validations]);
    }
    else
    {
        //Render view without validations
        echo $twig->render('bookATable.html');
    }
