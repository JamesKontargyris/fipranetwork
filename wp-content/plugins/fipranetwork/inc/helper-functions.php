<?php

function remove_symbols($string) {
	return preg_replace('/[^\p{L}\p{N}\s]/u', '', $string);
}

function classify_string($string) {
	return preg_replace('/\W+/','',strtolower(strip_tags(remove_numbers($string))));
}

function remove_numbers($string) {
	return preg_replace('/[0-9]+/', '', $string);
}