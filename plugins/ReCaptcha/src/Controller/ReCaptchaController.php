<?php

namespace ReCaptcha\Controller;

require_once ROOT . DS . 'plugins' . DS . 'ReCaptcha' . DS . 'vendor' . DS . 'autoload.php';

use App\Controller\AppController as BaseController;

class ReCaptchaController extends BaseController
{

    const SECRET = '6LfbQwwTAAAAAFNhCzCAvzxQ7KwY3z4wKpPOSh1C';
    
    /**
    *	@function   verify
    * 	@author		Dung Nguyen - admin@saledream.com	
    *	@access		public	
    *	@params		
    *	@date		23-Sep-2015
    * 	@return		
    */
    static public function verify() {
        //check params
        if (isset($_POST['g-recaptcha-response']) === false) {
            return false;
        }
        
        //verify user
        $recaptcha  = new \ReCaptcha\ReCaptcha(self::SECRET);
        $response   = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
        
        return $response->isSuccess();
    }

}
