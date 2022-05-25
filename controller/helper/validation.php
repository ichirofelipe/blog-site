<?php

require_once(dirname(__FILE__).'/../base/jwt_utils.php');
require_once(dirname(__FILE__).'/../base/db_config.php');

function validateRequests($requests, $rules, $encrypt = false){
    $data['errors'] = [];
    
    foreach($rules as $fillable => $rule){
        $rules_arr = explode(',', $rule);
        $data[$fillable] = clean_input($requests[$fillable]);

        foreach($rules_arr as $rule){
            switch($rule){
                case 'required':
                    if(empty($data[$fillable]))
                        array_push($data['errors'], $fillable.' is required');
                    break;
                case 'unique':
                    if(!empty($data[$fillable]) && userExistsQuery($data[$fillable]))
                        array_push($data['errors'], $fillable.' is already in use.');
                    break;
                default:
                    if(count(explode(':', $rule)) != 2)
                        break;

                    $newrule = explode(':', $rule);

                    if(strlen($data[$fillable]) > $newrule[1] && $newrule[0] == 'max')
                        array_push($data['errors'], $fillable.' must not be more than '.$newrule[1].' characters');

                    if(strlen($data[$fillable]) < $newrule[1] && $newrule[0] == 'min')
                        array_push($data['errors'], $fillable.' must not be less than '.$newrule[1].' characters');

                    break;
            }
        }

        if($fillable == 'password' && $encrypt)
            $data[$fillable] = password_hash($data[$fillable], PASSWORD_BCRYPT);
    }

    return $data;
}

function generateToken($id, $name = "_token", $exp = 86400){
    $headers = array('alg'=>'HS256','typ'=>'JWT');
    $payload = array('id'=>$id, 'exp' => time() + $exp);

    $jwt = generate_jwt($headers, $payload);

    setcookie($name, $jwt, time() + $exp, '/');
}


function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

?>