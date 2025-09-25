<?php

namespace App\Http\Controllers\Branch;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\CollegeBaseController;

class BranchController extends CollegeBaseController
{
    protected $base_route = 'branch';
    protected $view_path = 'branch';
    protected $panel = 'Branch';

    public function index()
    {
        $data['rows'] = Branch::orderBy('title')->paginate($this->pagination_limit);
        return view(parent::loadDataToView($this->view_path . '.index'), compact('data'));
    }

    public function create()
    {
        return view(parent::loadDataToView($this->view_path . '.create'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:191',
            'code'  => 'nullable|string|max:50|unique:branches,code',
        ]);

        Branch::create($request->only('title', 'code', 'address', 'phone', 'status'));

        $request->session()->flash($this->message_success, 'Branch created successfully.');
        return redirect()->route($this->base_route);
    }

    public function edit($id)
    {
        $data['row'] = Branch::findOrFail($id);
        return view(parent::loadDataToView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $row = Branch::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:191',
            'code'  => 'nullable|string|max:50|unique:branches,code,' . $row->id,
        ]);

        $row->update($request->only('title', 'code', 'address', 'phone', 'status'));

        $request->session()->flash($this->message_success, 'Branch updated successfully.');
        return redirect()->route($this->base_route);
    }

    public function destroy(Request $request, $id)
    {
        $row = Branch::findOrFail($id);
        $row->delete();

        $request->session()->flash($this->message_success, 'Branch deleted successfully.');
        return redirect()->route($this->base_route . '.index');
    }

    public function toggleStatus(Request $request, $id)
    {
        $row = Branch::findOrFail($id);
        $row->status = !$row->status;
        $row->save();

        $request->session()->flash($this->message_success, 'Branch status updated.');
        return redirect()->route($this->base_route . '.index');
    }
}
