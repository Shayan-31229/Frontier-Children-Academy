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


use App\Models\Client;

class ClientController extends WebsiteBaseController
{

    public function __construct()
    {

    }

    public function index()
    {
        $this->middleware('page-status');

        $data = [];
        $data['client'] = Client::where('status', 1)
                                    ->orderBy('rank', 'asc')
                                    ->Active()
                                    ->get();

        return view(parent::WebsiteViewHelper('website.client.index'), compact('data'));
    }
}