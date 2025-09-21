<?php
/*
 * Mr. Shayan Khan
 * CyberArts Pvt. Ltd.
 * Warsak Road, Peshawar
 * +923330700333
 * dos.shayan@gmail.com
 * https://alampk.com
 */

namespace App\Http\Controllers\Account\Fees;

use App\Http\Controllers\CollegeBaseController;
//use App\Http\Requests\Account\FeeHead\AddValidation;
//use App\Http\Requests\Account\FeeHead\EditValidation;
use App\Models\FeeHead;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
class FinesController extends CollegeBaseController
{
    protected $base_route = 'account.fees.head';
    protected $view_path = 'account.fees.head';
    protected $panel = 'Fees Head';
    protected $filter_query = [];

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $thisdate = date("Y-m-d");
        
        

        $data = DB::table('fee_masters as fm')
            ->leftJoin('fee_collections as fc', 'fm.id', '=', 'fc.fee_masters_id')
            ->select(
                'fm.id',
                'fm.semester',
                'fm.fee_head',
                'fm.fee_due_date',
                'fm.fee_amount',
                DB::raw('IFNULL(SUM(fc.paid_amount), 0) as total_paid'),
                DB::raw('IFNULL(SUM(fc.discount), 0) as total_discount'),
                DB::raw('fm.fee_amount - (IFNULL(SUM(fc.paid_amount), 0) + IFNULL(SUM(fc.discount), 0)) as balance')
            )
            ->where('fm.fee_due_date', '<', $thisdate)
            ->groupBy([
                'fm.id',
                'fm.semester',
                'fm.fee_head',
                'fm.fee_due_date',
                'fm.fee_amount'
            ])
            ->havingRaw('balance > 0')
            ->get();

            foreach ($data as $record) {
                $startDate = Carbon::parse($record->fee_due_date)->copy();
                $endDate = Carbon::today();

                while ($startDate->lte($endDate)) {
                    $exists = DB::table('fines')
                        ->where('fee_masters_id', $record->id)
                        ->whereDate('fine_date', $startDate->toDateString())
                        ->exists();

                    if (!$exists) {
                        DB::table('fines')->insert([
                            'fee_masters_id' => $record->id,
                            'fine_amount' => 120,
                            'fine_date' => $startDate->toDateString(),
                            'remarks' => 'Auto-generated fine',
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }

                    $startDate->addDay();
                }
            }

        return view(parent::loadDataToView($this->view_path.'.index'), compact('data'));
    }

}
