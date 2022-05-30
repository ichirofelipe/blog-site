<?php

$rules = [
    'username'      => 'required,max:50,unique:admin',
    'password'      => 'required,max:50,min:5',
];

?>