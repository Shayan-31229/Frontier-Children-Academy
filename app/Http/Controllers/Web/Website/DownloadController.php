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


use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Web\WebBlog;
use App\Models\Web\WebDownload;
use Illuminate\Http\Request;

class DownloadController extends WebsiteBaseController
{

    protected $view_path = 'web.website.download';
    public function __construct()
    {

    }
    
    public function index(Request $request)
    {
        $this->middleware('page-status');
        $data = [];
        $data['rows'] = WebDownload::where('status', 1)
                    ->where(function ($query) use ($request) {

                        if ($request->has('s')) {
                            $query->where('title', 'like', '%'.$request->s.'%');
                            $this->filter_query['title'] = $request->s;
                        }
                    })
                    ->latest()
                    ->paginate($this->pagination_limit);

        $data['recent'] = WebBlog::select('title', 'slug', 'short_desc', 'publish_date', 'image')
            ->Active()
            ->limit(10)
            ->get();

        return view(parent::WebsiteViewHelper($this->view_path.'.index'), compact('data'));

    }

}