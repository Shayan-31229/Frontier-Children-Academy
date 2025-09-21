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


use App\Models\Faq;
use App\Models\Web\WebFaq;
use Illuminate\Http\Request;

class FaqsController extends WebsiteBaseController
{
    protected $view_path = 'web.website.faq';
    public function __construct()
    {
        $this->middleware('page-status');
    }

    public function index(Request $request)
    {
        $data = [];

        $data['rows'] = WebFaq::select('id', 'question', 'answer')
            ->where(function ($query) use ($request) {

                if ($request->has('s')) {
                    $query->where('question', 'like', '%' . $request->s . '%');
                    $this->filter_query['question'] = $request->s;
                }
            })
            ->Active()
            ->latest()
            ->orderBy('rank','asc')
            ->get();
            //->paginate($this->pagination_limit);

        return view(parent::WebsiteViewHelper($this->view_path.'.index'), compact('data'));
    }
}