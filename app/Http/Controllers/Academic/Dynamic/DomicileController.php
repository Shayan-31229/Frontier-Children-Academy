<?php

namespace App\Http\Controllers\Academic\Dynamic;

use App\Http\Controllers\CollegeBaseController;
use App\Http\Requests\Academic\Dynamic\Domicile\AddValidation;
use App\Http\Requests\Academic\Dynamic\Domicile\EditValidation;
use App\Models\Domicile;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DomicileController extends CollegeBaseController
{
    protected $base_route = 'dynamic.domicile';
    protected $view_path = 'academic.dynamic-hub.domicile';
    protected $panel;
    protected $filter_query = [];

    public function __construct()
    {
        $this->panel = __('academic.child.dynamic_gallery.child.domicile');
    }

    public function index(Request $request)
    {
        $data = [];
        $data['domiciles'] = Domicile::select('id', 'district')->get();
        return view(parent::loadDataToView($this->view_path.'.index'), compact('data'));
    }

    public function store(AddValidation $request)
    {
       $request->request->add(['created_at' => Carbon::now()]);

       Domicile::create($request->all());

       $request->session()->flash($this->message_success, $this->panel. ' Created Successfully.');
       return redirect()->route($this->base_route);
    }

    public function edit(Request $request, $id)
    {
        $id = decrypt($id);
        $data = [];
        if (!$data['row'] = Domicile::find($id))
            return parent::invalidRequest();

        $data['domiciles'] = Domicile::select('id', 'district')->orderBy('district')->get();

        $data['base_route'] = $this->base_route;
        return view(parent::loadDataToView($this->view_path.'.index'), compact('data'));
    }

    public function update(EditValidation $request, $id)
    {
        $id = decrypt($id);
       if (!$row = Domicile::find($id)) return parent::invalidRequest();

        $request->request->add(['last_updated_by' => auth()->user()->id]);

        $row->update($request->all());

        $request->session()->flash($this->message_success, $this->panel.' Updated Successfully.');
        return redirect()->route($this->base_route);
    }

    public function delete(Request $request, $id)
    {
        $id = decrypt($id);
        if (!$row = Domicile::find($id)) return parent::invalidRequest();

        $row->delete();

        $request->session()->flash($this->message_success, $this->panel.' Deleted Successfully.');
        return redirect()->route($this->base_route);
    }

    public function active(request $request, $id)
    {
        $id = decrypt($id);
        if (!$row = Domicile::find($id)) return parent::invalidRequest();

        //$request->request->add(['status' => 'active']);

        $row->update($request->all());

        $request->session()->flash($this->message_success, $row->district.' '.$this->panel.' Active Successfully.');
        return redirect()->route($this->base_route);
    }

    public function inActive(request $request, $id)
    {
        $id = decrypt($id);
        if (!$row = Domicile::find($id)) return parent::invalidRequest();

        $request->request->add(['status' => 'in-active']);

        $row->update($request->all());

        $request->session()->flash($this->message_success, $row->semester.' '.$this->panel.' In-Active Successfully.');
        return redirect()->route($this->base_route);
    }
}