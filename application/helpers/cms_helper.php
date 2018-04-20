<?php
function btn_edit($uri) {
	return anchor($uri, '<i class="fa fa-edit"></i>');
}

function btn_delete($uri) {
	return anchor($uri, '<i class="fa fa-remove"></i>', array(
		'onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are you sure?')"
	));
}

function e($string) {
	return htmlentities($string);
}

function get_menu($array, $child = FALSE) {
	
	$CI =& get_instance();
	
	$str = '';
	
	if (count($array)) {
		$str .= $child == FALSE ? '<ul class="navbar-nav">' . PHP_EOL : '<ul class="dropdown-menu">' . PHP_EOL;
		
		foreach ($array as $item) {
			
			$active = $CI->uri->segment(1) == $item['slug'] ? TRUE : FALSE;
			if (isset($item['children']) && count($item['children'])) {
				$str .= $active ? '<li class="nav-item dropdown active">' : '<li class="nav-item dropdown">';
				$str .= '<a class="dropdown-toggle nav-link" data-toggle="dropdown" href="' . site_url(e($item['slug'])) . '">' . e($item['title']);
				$str .= '</a>' . PHP_EOL;
				$str .= get_menu($item['children'], TRUE);
			}
			else {
				$str .= $active ? '<li class="nav-item active">' : '<li class="nav-item">';
				$str .= '<a class="nav-link" href="' . site_url(e($item['slug'])) . '">' . e($item['title']) . '</a>';
			}
			$str .= '</li>' . PHP_EOL;	
		}
		
		$str .= '</ul>' . PHP_EOL;
	}
	
	return $str;
}

/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable 
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        
        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
        
        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}


if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}
