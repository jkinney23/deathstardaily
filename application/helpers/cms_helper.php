<?php

function add_meta_title($string) {
	$CI =& get_instance();
	$CI->data['meta_title'] = e($string) . ' - ' . $CI->data['meta_title'];
}

function btn_edit($uri) {
	return anchor($uri, '<i class="fa fa-edit"></i>');
}

function btn_delete($uri) {
	return anchor($uri, '<i class="fa fa-remove"></i>', array(
		'onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are you sure?')"
	));
}


function article_link($article) {
	return 'article/' . intval($article->id) . '/' . e($article->slug);
}

function article_links($articles) {
	$string = '<ul>';
	foreach($articles as $article) {
		$url = article_link($article);
		$string .= '<li>';
		$string .= '<h3>' . anchor($url, e($article->title)) .  ' ›</h3>';
		$string .= '<p class="pubdate">' . e($article->pubdate) . '</p>';
		$string .= '</li>';
	} 
	$string .= '</ul>';
	return $string;

}

function get_excerpt($article, $numwords = 50) {
	$string = '';
	$url = 'article/' . intval($article->id) . '/' . e($article->slug);
	$string .= '<h2>' . anchor($url, e($article->title)) . '</h2>';
	$string .= '<p class="pubdate">' . e($article->pubdate) . '</p>';
	$string .= '<p>' . e(limit_to_numwords(strip_tags($article->body), $numwords)) . '</p>';
	$string .= '<p>' . anchor($url, 'Read more ›', array('title' => e($article->title))) . '</p>';
	return $string;
}

function limit_to_numwords($string, $numwords) {
	$excerpt = explode(' ', $string, $numwords + 1);
	if (count($excerpt) >= $numwords) {
		array_pop($excerpt);
	}
	$excerpt = implode(' ', $excerpt);
	return $excerpt;
}

function e($string) {
	return htmlentities($string);
}

function get_menu($array, $child = FALSE) {
	
	$CI =& get_instance();
	
	$str = '';
	
	if (count($array)) {
		$str .= $child == FALSE 
					? '<ul class="navbar-nav">' . PHP_EOL 
					: '<div class="dropdown-menu">' . PHP_EOL;
		
		foreach ($array as $item) {
			
			$active = $CI->uri->segment(1) == $item['slug'] ? TRUE : FALSE;
			
			if (isset($item['children']) && count($item['children'])) {				
				// This nav item has children/a dropdown
				$str .= $active ? '<li class="nav-item dropdown active">' : '<li class="nav-item dropdown">';
				$str .= '<a class="dropdown-toggle nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown"';
				$str .= 'aria-haspopup="true" aria-expanded="false" href="' . site_url(e($item['slug'])) . '">';
				$str .= e($item['title']) . '</a>' . PHP_EOL;
				// Get the dropdown menu items
				$str .= get_menu($item['children'], TRUE);

			}
			else {
				if ($child) {
					// This item is in the dropdown
					$str .= $active ? '<a class="dropdown-item active"' : '<a class="dropdown-item"';
					$str .= 'href="' . site_url(e($item['slug'])) . '">';
					$str .= e($item['title']) . '</a>';
				}
				else {	
					// This is a normal nav item
					$str .= $active ? '<li class="nav-item active">' : '<li class="nav-item">';
					$str .= '<a class="nav-link" href="' . site_url(e($item['slug'])) . '">' . e($item['title']) . '</a>';
					$str .= '</li>';
				}
			}
			$str .= PHP_EOL;	
		}
		if ($child) return $str;
		
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
