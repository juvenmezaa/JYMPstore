<?php

namespace App;

use Input;
use ReCaptcha\ReCaptcha;
use Illuminate\Database\Eloquent\Model;

trait CaptchaTrait
{
    public function captchaCheck(){
    	$response = Input::get('g-recaptcha-response');
    	$remoteip = $_SERVER['REMOTE_ADDR'];
    	$secret = env('RE_CAP_SECRET');

    	$recaptcha = new ReCaptcha($secret);
    	$resp = $recaptcha->verify($response, $remoteip);
    	if ($resp->isSuccess()) {
    		return 1;
    	} else{
    		return 0;
    	}
    }
}
