<?php
/*
 * Mr. Shayan Khan
 * CyberArts Pvt. Ltd.
 * Warsak Road, Peshawar
 * +923330700333
 * dos.shayan@gmail.com
 * https://alampk.com
 */
namespace App\Http\Controllers\Web\Admin;

use Illuminate\Http\Request;
use View, AppHelper, Image, URL;

class HelpController extends AdminBaseController
{
    
     protected $base_route = 'web.admin.help';
    protected $view_path = 'web.admin.help';
    protected $panel = 'CMS User Help';
    protected $folder_path;
    protected $filter_query = [];

    public function index(Request $request)
    {
        $data = [];
        return view(parent::WebsiteViewHelper($this->view_path.'.index'));
    }

    
}