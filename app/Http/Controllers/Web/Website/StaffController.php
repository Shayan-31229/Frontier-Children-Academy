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

use App\Http\Requests\StaffContact\AddValidation;
use App\Mail\MailSubscribers;
use App\Mail\StaffContact;
use App\Models\ContactUsSetting;
use App\Models\GeneralSetting;
use App\Models\Staff;
use App\Models\Web\WebStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StaffController extends WebsiteBaseController
{

    protected $view_path = 'web.website.staff';

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $this->middleware('page-status');
        $data = [];
        $data['pageDetail'] = $request->instance()->query('pageStatus');

        $data['staffs'] = WebStaff::Active()
                                ->orderBy('rank')
                                ->get();

        return view(parent::WebsiteViewHelper($this->view_path.'.index'), compact('data'));

    }

    public function detail(Request $request, $id)
    {
        $id = decrypt($id);
        $data['staffs'] = WebStaff::active()->find($id);
        return view(parent::WebsiteViewHelper($this->view_path.'.staff-detail'), compact('data'));
    }

    public function message(Request $request)
    {
        /*
         *  "_token" => "fmAsCEsURmtllAEohgadCoqnp23oGbSDtM75r3Lu"
              "staff" => "eyJpdiI6Im9DVHl3T0VubkpPMndZaXpjMFJzNkE9PSIsInZhbHVlIjoiRWdzRU1vOStaaHZqYnhjMzIxTXFaZz09IiwibWFjIjoiMDE1NGFiNThmYzEwZjkxMGQ0Y2EzZjY1MzE0M2ExZTJjZjBiZGExOWU0ODhi ▶"
              "staff_name" => "Shayan Khan"
              "send_to_email" => "dos.shayan@gmail.com"
              "first_name" => "Shayan"
              "last_name" => "Khan"
              "email" => "dos.shayan@gmail.com"
              "phone" => "923330700333"
              "message" => "This is a test email."
         * */

        if($request->has('send_to_email')){
            //Mail::to($request->get('send_to_email'))->send(new StaffContact(['message_detail' => $request,'general_setting' => $general_setting,'contactUs_setting' => $contactUs_setting]));

            Mail::to($request->get('email'))->send(new StaffContact([
                'message_detail' => $request,
            ]));
            \Log::info("The email is sent from StaffController.php");
            $request->session()->flash($this->message_success,'Dear '.$request->get('first_name').', Message Send Successfully. The concern will contact you soon.');

        }

        return back();

    }
}