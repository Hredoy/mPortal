<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

function getLocation()
{
    $country = null;
    $value = Session::get('country');
    if($value){
        $country = $value;
    }

    return $country;

    // return 'some';
}



?>
