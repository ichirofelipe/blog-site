<?php

$rules = [
    'username'      => 'required,max:32,unique:users',
    'password'      => 'required,max:64,min:5',
];

?>