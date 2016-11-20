<?php


/**
 * Searches input for tags {field:FIELD_NAME} and replaces with field values
 *
 * @since 1.0.1
 *
 */
function af_resolve_field_includes( $input, $fields ) {
	
	if ( preg_match_all( "/{field:(.*?)}/", $input, $matches ) ) {
		
		foreach ($matches[1] as $i => $field) {
			
			$input = str_replace($matches[0][$i], af_get_field( $field, $fields ), $input);
			
		}
		
	}
	
	return $input;
	
}


/**
 * Checks if the passed key is a valid form key (begins with form_)
 *
 * @since 1.0.1
 *
 */
function af_is_valid_form_key( $key ) {
	
	if ( ! is_string( $key ) ) {
		
		return false;
		
	}
	
	
	if ( 'form_' == substr( $key, 0, 5 ) ) {
		
		return true;
		
	}
	
	
	return false;
	
}