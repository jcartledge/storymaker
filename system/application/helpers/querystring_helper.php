<?php

/**
 * CodeIgniter doesn't believe in querystrings, and the 
 * recommended .htaccess for clean URLs clobbers $_GET.
 * This code reinstates $_GET.
 */

parse_str(array_pop(explode('?', $_SERVER['REQUEST_URI'], 2)), $_GET);
