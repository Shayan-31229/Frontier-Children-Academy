<?php
/*
 * Mr. Shayan Khan
 * CyberArts Pvt. Ltd.
 * Warsak Road, Peshawar
 * +923330700333
 * dos.shayan@gmail.com
 * https://alampk.com
 */

namespace App\Http\Controllers\Web;

use View;
use AppHelper;

class WebBaseController extends WebController
{
    protected $message_success = 'message_success';
    protected $message_warning = 'message_warning';
    public $internet_status = 'There is no Internet connection. Please Check the network cables, modem, and router.';

    /*check internet connection*/
    public function checkConnection()
    {
        $connected = @fsockopen("www.google.com", 80); //website, port  (try 80 or 443)
        if ($connected){
            return true;
        }
        return false;
    }



}