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

use App\Models\Web\WebPricing;

class PricingController extends WebsiteBaseController
{
    protected $view_path = 'web.website.pricing';

    public function __construct()
    {
        $this->middleware('page-status');
    }

    public function index()
    {
        $data = [];
        //'title','old_price','new_price', 'per_term', 'description', 'image','tag','rank', 'status'

        $data['rows'] = WebPricing::Active()
                        ->orderBy('rank','asc')
                        ->get();

        return view(parent::WebsiteViewHelper($this->view_path.'.index'), compact('data'));
    }
}