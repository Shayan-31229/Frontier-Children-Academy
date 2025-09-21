<?php
/*
 * Mr. Shayan Khan
 * CyberArts Pvt. Ltd.
 * Warsak Road, Peshawar
 * +923330700333
 * dos.shayan@gmail.com
 * https://alampk.com
 */

namespace App\Http\Controllers\Web\Website;

use App\Models\Web\WebService;

class ServiceController extends WebsiteBaseController
{
    protected $view_path = 'web.website.services';
    public function __construct()
    {

    }

    public function index()
    {
        $this->middleware('page-status');

        $data = [];
        $data['services'] = WebService::where('status', 1)
                                    ->orderBy('rank', 'asc')
                                    ->Active()
                                    ->get();

        return view(parent::WebsiteViewHelper($this->view_path.'.index'), compact('data'));
    }
}