<?php /*
    require_once __DIR__.'/bootstrap.php';
    require_once __DIR__.'/utils.php';
    require_once __DIR__.'/database.php';
    require_once __DIR__.'/menu.php';
    require_once __DIR__.'/utils.php';
    
    //The form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        //handle form submission
        $typeErr = $emailErr = $messageErr = "";
        $type = $email = $message = "";
    
        if (!empty($_POST["type"])) {
            $type = clean_input($_POST["type"]);
        }
        else
        {
            $typeErr = "Type is required";
            $validations['typeError'] = $typeErr;
        }
            
        if (!empty($_POST["email"])) {
            $email = clean_input($_POST["email"]);
            //FILTER_VALIDATE_EMAIL is one of many validation filters: https://www.php.net/manual/en/filter.filters.validate.php
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $emailErr= 'You did not enter a valid email.';
                $validations['emailError'] = $emailErr;
            }
        }
        else
        {
            $emailErr = "Email is required";
            $validations['emailError'] = $emailErr;
        }
            
        if (!empty($_POST["message"])) {
            $message = clean_input($_POST["message"]);
            if(strlen($message)>150){
                $messageErr=  "Messages cannot be longer than 150 characters.";
                $validations['messageError'] = $messageErr;
            }
        }
        else
        {
            $messageErr = "Message is required";
            $validations['messageError'] = $messageErr;
        }

        //If all's ok
        if (empty($emailErr) && empty($typeErr) && empty($messageErr))
        {
             //Repopulate text fields with submitted data 
            $formvalues = [];
            //Onward processing using PHPMailer using $type = $email = $message
            $validations['pagemessage'] = "Form submitted successfully. Thank you!";
        }
        else
        {
            //Repopulate text fields with submitted data 
            $formvalues['email'] = $email;
            $formvalues['message'] = $message;
            $validations['pagemessage'] = "There are some issues with this form";
        }

        //Render view with validations
        echo $twig->render('contact.html', [ 
            'validations' => $validations, 
            'formvalues' => $formvalues,
            'menuTypes' => $menuTypes] );
        
    }
    else
    {
        //Render view without validations
        echo $twig->render('contact.html', ['menuTypes' => $menuTypes] );
    }*/

    require_once __DIR__. '/bootstrap.php';
 
    echo $twig->render('contact.html');