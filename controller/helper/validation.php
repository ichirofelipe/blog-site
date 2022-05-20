<?php

function validateRequests($requests, $rules){
    $errors = [];
    
    foreach($rules as $fillable => $rule){
        $rules_arr = explode(',', $rule);
        $input = clean_input($requests[$fillable]);

        foreach($rules_arr as $rule){
            switch($rule){
                case 'required':
                    if(empty($input))
                        array_push($errors, $fillable.' is required');
                        
                    break;
                case 'unique':
                    //PENDING FUNCTION
                    break;
                default:
                    if(count(explode(':', $rule)) != 2)
                        break;

                    $newrule = explode(':', $rule);

                    if(strlen($input) > $newrule[1] && $newrule[0] == 'max')
                        array_push($errors, $fillable.' must not be more than '.$newrule[1].' characters');

                    if(strlen($input) < $newrule[1] && $newrule[0] == 'min')
                        array_push($errors, $fillable.' must not be less than '.$newrule[1].' characters');

                    break;
            }
        }
    }

    return $errors;
}


function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>