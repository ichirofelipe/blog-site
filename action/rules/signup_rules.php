<?php

$rules = [
    'username'      => 'required,max:50,unique:users',
    'password'      => 'required,max:50,min:5',
];

?>