<?php
/**
 * Created by PhpStorm.
 * User:Shayan Khan
 * Date: 01/Aug/2025
 * Time: 9:14 AM
 */
namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class WebsiteViewHelperFacade extends Facade{
    protected static function getFacadeAccessor() { return 'websiteviewhelper'; }
}