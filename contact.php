<?php 
    require_once __DIR__.'/bootstrap.php';
    require_once __DIR__.'/utils.php';
    require_once __DIR__.'/database.php';
    
    //Get db object
    $db = new Db();    
    $result = $db -> select("SELECT addressl1, addressl2, addressl3, addressl4, op_hrs_mon, op_hrs_tues, op_hrs_wed, op_hrs_thurs, op_hrs_fri, op_hrs_sat, op_hrs_sun, email, phone FROM `business`");

    //Start from in-mem object
    $business = [
        'addressl1'   => $result[0]['addressl1'],
        'addressl2'   => $result[0]['addressl2'],
        'addressl3'   => $result[0]['addressl3'],
        'addressl4'   => $result[0]['addressl4'],
        'op_hrs_mon'  => $result[0]['op_hrs_mon'],
        'op_hrs_tues' => $result[0]['op_hrs_tues'],
        'op_hrs_wed'  => $result[0]['op_hrs_wed'],
        'op_hrs_thurs'=> $result[0]['op_hrs_thurs'],
        'op_hrs_fri'  => $result[0]['op_hrs_fri'],
        'op_hrs_sat'  => $result[0]['op_hrs_sat'],
        'op_hrs_sun'  => $result[0]['op_hrs_sun'],
        'email'       => $result[0]['email'],
        'phone'       => $result[0]['phone']
    ];

    //The form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        //handle form submission
        $typeErr = $nameErr = $emailErr = $subjectErr = $messageErr = $checkboxErr = "";
        $qtype = $cname = $cemail = $csubject = $cmessage = "";
        $checkbox = false;
    
        //validating qtype
        if (!empty($_POST["qtype"])) {
            $qtype = clean_input($_POST["qtype"]);
        }
        else
        {
            $typeErr = "Type is required";
            $validations['typeError'] = $typeErr;
        }
          
        //validating cname
        if (!empty($_POST["cname"])) {
            $cname = clean_input($_POST["cname"]);
        }
        else
        {
            $nameErr = "Name is required";
            $validations['nameError'] = $nameErr;
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

        //validating csubject
        if (!empty($_POST["csubject"])) {
            $csubject = clean_input($_POST["csubject"]);
            if(strlen($csubject)>100){
                $subjectErr=  "Subject cannot be longer than 100 characters.";
                $validations['subjectError'] = $subjectErr;
            }
        }
        else
        {
            $subjectErr = "Subject is required";
            $validations['subjectError'] = $subjectErr;
        }
            
        //validating cmessage
        if (!empty($_POST["cmessage"])) {
            $cmessage = clean_input($_POST["cmessage"]);
            if(strlen($cmessage)>150){
                $messageErr=  "Messages cannot be longer than 300 characters.";
                $validations['messageError'] = $messageErr;
            }
        }
        else
        {
            $messageErr = "Message is required";
            $validations['messageError'] = $messageErr;
        }

        if(isset($_POST['checkbox'])){
            $checkbox = clean_input($_POST['checkbox']);
        }else{
            //$checkbox = false;
            $checkboxErr = "Please agree to the Privacy Policy";
            $validations['checkboxError'] = $checkboxErr;
        }

        //If there are no errors
        if (empty($typeErr) && empty($nameErr) && empty($emailErr) && empty($subjectErr) && empty($messageErr) && empty($checkboxErr))
        {

            $formvalues = [];
            //Onward processing using PHPMailer using $qtype = $cname = $cemail = $csubject = $cmessage
            $validations['pagemessage'] = "Form submitted successfully. Thank you!";
        }
        else
        {
            //Repopulating the text fields with submitted data 
            $formvalues['cname'] = $cname;
            $formvalues['cemail'] = $cemail;
            $formvalues['csubject'] = $csubject;
            $formvalues['cmessage'] = $cmessage;
            $formvalues['checkbox'] = $checkbox;
            
            $validations['pagemessage'] = "There are some issues with this form";
        }
            

        //Render view with validations
        echo $twig->render('contact.html', [ 
            'validations' => $validations, 
            'formvalues' => $formvalues ,
            'business' => $business]);
    }
    else
    {
        //Render view without validations
        echo $twig->render('contact.html', ['business' => $business]);
    }