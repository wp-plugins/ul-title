<?php
/*
Plugin Name: ul Title
Plugin URI: http://johnluetke.net/ultitle
Description: Returns wp_title() as an unordered list
Version: 1.1
Author: John Luetke
Author URI: http://johnluetke.net

/*  Copyright 2007 John Luetke < john@johnluetke.net >

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*
 * print_location() - recursive function to parse an array into a hierarchical <ul>
 *
 *
 * @package WordPress
 * @since 2.3.0
 *
 * @param	$sep	the seperator to be added in front of every item
 * @param	$count	the initial size of $array. acts as a counter
 * @param	$array	the array containing the elements to be placed into the ul
 * @param	$str	the parsed string up to the point in time when this function is called.
 *
 */
function print_location ( $sep, $count, $array, $str ) {
			
	// since this function is recursvie, we need a base case. theoretically, $count should never be equal to zero, but just in case.
	if ( $count == 0 ) 
		return "";
	
	// basic ul formatting
	$str .= "<li>\n";
	$str .= "<ul>\n";
	// print the title
	$str .= "<li>$sep ".$array[(count($array) - $count)]."</li>\n";
	// if count == 1, we have reached the last title, so dont do anything. else, decrement count and recurse
	$str = ( $count == 1 ) ? $str : print_location ($sep, $count - 1, $array, $str);
	// more basic ul formatting, except this one coses tags opened by the first one.
	$str .= "</ul>\n";
	$str .= "</li>\n";
	
	// return the string
	return $str;

}

function wp_title_ul ( $sep = "&raquo;", $display = true ) {

	// get the title with a special seperator.
	$path = wp_title('||',false); 
	// array-ify it
	$path = explode("||", $path);
	// 'pop' off the first element
	array_shift($path);
	
	// its go time, grandma!
	$ret = print_location ("&raquo;", count($path) , $path, "");
			
	if ($display)
		echo $ret;
	else 
		return $ret;
	
}

?>