<?php

namespace App\Http\Controllers\Branch;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Http\Controllers\CollegeBaseController;

class BranchSwitchController extends CollegeBaseController
{
    public function switch(Request $request)
    {
        if (!auth()->user()->hasRole('super-admin')) {
            return $this->invalidRequest('You do not have permission to switch branches.');
        }

        $request->validate([
            'branch_id' => 'nullable|exists:branches,id'
        ]);

        session(['active_branch_id' => $request->branch_id]);

        return redirect()->back()->with($this->message_success, 'Branch switched successfully.');
    }
}
