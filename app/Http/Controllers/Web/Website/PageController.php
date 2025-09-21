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

use App\Models\Web\WebPage;
use URL;

class PageController extends WebsiteBaseController
{

    protected $view_path = 'web.website.page';
    public function index()
    {
         return redirect()->route('web.home');


    }

    public function pageDetail($slug)
    {

        $data = [];
        $data['url'] = URL::current();
        $data['row'] = WebPage::where('slug', $slug)->first();

        if(!$data['row'])
            return redirect()->route('web.home');

         $data['child_page'] = $data['row']->children()->get();

        $data['others'] = WebPage::select('title', 'slug', 'page_type', 'link')
            ->whereNotIn('id',$data['child_page']->pluck('id'))
            ->where('slug','<>', $slug)
            ->where('slug','<>', 'home')
            ->Active()
            //->limit(10)
            ->orderBy('title')
            ->get();

           WebPage::where('id','=',$data['row']->id)->increment('view_count', 1);
        return view(parent::WebsiteViewHelper($this->view_path.'.page_detail'), compact('data'));

    }
}