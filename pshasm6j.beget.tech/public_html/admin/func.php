<?
	function php2js($a=false)
	{
		if (is_null($a) || is_resource($a)) {
			return 'null';
		}
		if ($a === false) {
			return 'false';
		}
		if ($a === true) {
			return 'true';
		}
		
		if (is_scalar($a)) {
			if (is_float($a)) {
				//Always use "." for floats.
				$a = str_replace(',', '.', strval($a));
			}
			
			// All scalars are converted to strings to avoid indeterminism.
			// PHP's "1" and 1 are equal for all PHP operators, but
			// JS's "1" and 1 are not. So if we pass "1" or 1 from the PHP backend,
			// we should get the same result in the JS frontend (string).
			// Character replacements for JSON.
			static $jsonReplaces = array(
            array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'),
            array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"')
			);
			
			return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
		}
		
		$isList = true;
		
		for ($i = 0, reset($a); $i < count($a); $i++, next($a)) {
			if (key($a) !== $i) {
				$isList = false;
				break;
			}
		}
		
		$result = array();
		
		if ($isList) {
			foreach ($a as $v) {
				$result[] = php2js($v);
			}
			
			return '[ ' . join(', ', $result) . ' ]';
			} else {
			foreach ($a as $k => $v) {
				$result[] = php2js($k) . ': ' . php2js($v);
			}
			
			return '{ ' . join(', ', $result) . ' }';
		}
	}
?>