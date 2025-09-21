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
use App\Models\Web\WebMenu;
use App\Models\Web\WebPage;


use App\Http\Requests\Web\Menu\AddValidation;
use App\Http\Requests\Web\Menu\EditValidation;
use App\Models\Menu;
use App\Models\MenuPage;
use App\Models\Page;
use Illuminate\Http\Request;
use View, AppHelper, Image, URL;

class MenuController extends AdminBaseController
{
    protected $base_route = 'web.admin.menu';
    protected $view_path = 'web.admin.menu';
    protected $panel = 'Menu';
    protected $filter_query = [];

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $data = [];
        $data['rows'] = WebMenu::select('id', 'title','rank', 'status')
            ->paginate($this->pagination_limit);

        $data['url'] = URL::current();
        return view(parent::WebsiteViewHelper($this->view_path.'.index'), compact('data'));
    }

    public function edit(Request $request, $id)
    {
        $id = decrypt($id);
        $data = [];
        if (!$data['row'] = WebMenu::find($id))
            return parent::invalidRequest();

        $data['pages'] = WebPage::where('status', 1)->orderBy('title','asc')->get();
        $data['active_pages'] = $data['row']->pages()->orderBy('rank')->get();
        
        return view(parent::WebsiteViewHelper($this->view_path.'.edit'), compact('data'));
    }

    public function update(EditValidation $request, $id)
    {
        $id = decrypt($id);

        if (!$row = WebMenu::find($id)) return parent::invalidRequest();

        $request->request->add(['last_updated_by' => auth()->user()->id]);
        
        $row->update($request->all());

        $pages = [];
        if($request->get('pages')){
            foreach ($request->get('pages') as $key => $page_id){
                $pages[$page_id] = [
                    'rank' => $key+1
                ];
            }
        }

        $row->pages()->sync($pages);

        $request->session()->flash($this->message_success, $this->panel.' successfully updated.');
        return redirect()->route($this->base_route);
    }

    public function menuPageHtml()
    {

        $data = [];
        $pages = WebPage::where('status', 1)->orderBy('title','asc')->get();

        $data['html'] = view($this->view_path.'.includes.page_row', compact('pages'))->render();

        return response()->json(json_encode($data));
    }
}