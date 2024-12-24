<?php 
	defined("BASEPATH") OR exit("No direct script access allowed");

	if ( ! function_exists("formatted_date") )
	{
		function formatted_date($date, $formats = "Y-m-d")
	    {
	    	$date = strtotime($date);
	    	return date($formats, $date);
	    }
	}

	if ( !function_exists("capitalize") )
	{
		function capitalize($string)
		{
			$ucwords = ucwords(mb_strtolower($string));
			return stripslashes($ucwords);
		}
	}

	if ( !function_exists("uppercase") )
	{
		function uppercase($string)
		{
			$strtoupper = strtoupper(mb_strtolower($string));
			return stripslashes($strtoupper);
		}
	}

	if ( !function_exists("lowercase") )
	{
		function lowercase($string)
		{
			$strtolower = mb_strtolower($string);
			return stripslashes($strtolower);
		}
	}

	if ( !function_exists("stripped_tags") )
	{
		function stripped_tags($string)
		{
			$strip_tags = strip_tags(($string));
			return stripslashes($strip_tags);
		}
	}