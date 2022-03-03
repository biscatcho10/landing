<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FromWhereList;
use App\Models\Industry;
use App\Models\LandingPageContact;
use App\Models\LandingPageData;
use Illuminate\Http\Request;

class LandingPageContactController extends Controller
{

    public function index(Request $request)
    {
        $data = LandingPageData::where("type", $request->page)->first();
        $view = "frontend.{$request->page}.page";
        return view($view, compact('data'));
    }

    public function thanks($type)
    {
        $thanks = LandingPageData::where("type", $type)->first();
        $view = "frontend.{$type}.thanks";
        return view($view, compact('thanks'));
    }



    public function send(Request $request)
    {
        $inputs = $request->only(["name", "email", "business_name", "phone_number", "how_can_help_you", "industry_type", "type"]);
        $landing = new LandingPageContact();
        $landing->name = $inputs['name'];
        $landing->phone_number = $inputs['phone_number'];
        $landing->email = $inputs['email'];
        $landing->company_name = $inputs['business_name'];
        $landing->message = $inputs['how_can_help_you'];
        $landing->type = $inputs['type'];
        $landing->save();
        $landing = LandingPageData::where("type", $inputs['type'])->first();
        if ($landing) {
            $details = [
                'to' => $inputs['email'],
                'subject' => $landing->email_subject,
                'template' => $landing->email_template,
            ];
            composeEmail($details['to'], $details['subject'], $details['template']);
        }

        if ($landing->redirect) {
            return redirect($landing->redirect_url);
        } else {
            return redirect()->route('get.thanks', $inputs['type']);
        }
    }

}
