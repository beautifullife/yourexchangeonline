<?php

namespace App\Controller\Component;

class LibStringComponent extends Component {
    /**
    *	@function   cutting text by number of chars & encoding - should user truncate Helper instead
    * 	@author		Dung Nguyen - admin@saledream.com	
    *	@access		public	
    *	@params		$text string, $charNum int, $replace string, $enc string
    *	@date		11-Sep-2015
    * 	@return		string
    */
    public subStringByChar($text, $charNum, $replace = '...', $enc = 'UTF-8') {
        //cut string
        if (mb_strlen($text, $enc) > $charNum) {
            return mb_substr($text, 0, $enc) . $replace;
        }
        
        return $text;
    }
}