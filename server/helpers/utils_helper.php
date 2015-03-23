<?php

if ( ! function_exists('format_response'))
{
    function format_response($response = array(), $error = array())
    {
        
        $result = '{"response": '. json_encode($response) .', "errors": '. json_encode($error) .'}';
        
        return $result;
    }
}

if ( ! function_exists('complete_decimal'))
{
    function complete_decimal($num)
    {
        $new_number = $num;
        
        if (has_dot($num)) {
            $number_of_decimal = get_number_of_decimal($num);
          
          if ($number_of_decimal == 0) {
            $new_number = $new_number.'00';
          }
          else if ($number_of_decimal == 1) {
            $new_number = $new_number.'0';
          }
        }
        else {
          $new_number = $new_number.'.00';
        }
        
        return $new_number;
    }
}

if ( ! function_exists('has_dot'))
{
    function has_dot($num)
    {
        $pos = strpos($num, '.');
        
        if ($pos === false) {
            return false;
        }
        
        return true;
    }
}

if ( ! function_exists('get_number_of_decimal'))
{
    function get_number_of_decimal($num)
    {
        $decimal = explode(".", $num);
        return strlen($decimal[1]);
    }    
}

if ( ! function_exists('format_number_with_comma'))
{
    function format_number_with_comma($num) {
        $is_negative_number = false;
        
        if ($num * 1 < 0) {
          $is_negative_number = true;
          $num = substr($num, 1);
        }
        
        $number = explode(".", $num);
        
        $int_part = $number[0];
        $decimal_part = $number[1];
        
        $number_with_comma = '';
        
        $int_part_reversed = strrev($int_part);
        $int_part_in_splited = str_split($int_part_reversed);
        
        for ($i = 0; $i < strlen($int_part_reversed); $i++) {
          $number_with_comma = $number_with_comma . $int_part_in_splited[$i];
          
          $val = $i + 1;
          
          if ($val % 3 == 0 && $val != strlen($int_part_reversed)) {
            $number_with_comma = $number_with_comma.',';
          }
        }
        
        $number_with_comma = strrev($number_with_comma).'.'.$decimal_part;
        
        if ($is_negative_number) {
          $number_with_comma = '-' . $number_with_comma;
        }
        
        return $number_with_comma;
    }
}

if ( ! function_exists('format_number'))
{
    function format_number($num = '')
    {
        $number = '0.00';
        
        if ($num != '') {
            $number = complete_decimal($num);
            $number = format_number_with_comma($number);
        }
        
        return $number;
    }
}

if ( ! function_exists('format_date'))
{
    function format_date($date = '')
    {
        $formated_date = '';
        
        if ($date != '') {
            $exploded_date_by_blank_space = explode(" ", $date);
            
            $exploded_date_by_hyphen = explode("-", $exploded_date_by_blank_space[0]);
            $formated_date = $exploded_date_by_hyphen[0].'/'.$exploded_date_by_hyphen[1].'/'.$exploded_date_by_hyphen[2];
        }
        
        return $formated_date;
    }
}

if ( ! function_exists('get_next_ocurrency'))
{
    function get_next_ocurrency($ocurrency = '')
    {
        $next_ocurrency = '0000';
        
        if ($ocurrency != '') {
            $next_ocurrency_in_number = intval($ocurrency) + 1;
            
            $cantidad_de_dijitos = strlen($next_ocurrency_in_number);
            
            switch ($cantidad_de_dijitos) {
                case 1:
                    $next_ocurrency = '000'.$next_ocurrency_in_number;
                    break;
                case 2:
                    $next_ocurrency = '00'.$next_ocurrency_in_number;
                    break;
                case 3:
                    $next_ocurrency = '0'.$next_ocurrency_in_number;
                    break;
                default:
                    $next_ocurrency = strval($next_ocurrency_in_number);
            }
        }
        
        return $next_ocurrency;
    }
}