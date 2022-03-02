<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FromWhereList;
use App\Models\Industry;
use App\Models\LandingPageContact;
use App\Models\LandingPageData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LandingContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $industries = Industry::orderBy('id', 'desc')->pluck("name", "id");
        $fromWhere = FromWhereList::orderBy('id', 'desc')->pluck("name", "id");
        $description = LandingPageData::where("type", "action")->first()->description;
        return response()->json([
            "industries" => $industries,
            "fromWhere" => $fromWhere,
            "description" => $description
        ]);
    }

    public function thanks(): JsonResponse
    {
        $thanks = LandingPageData::where("type", "action")->first(["thanks_title", "thanks_paragraph"]);
        return response()->json(
            $thanks
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function send(Request $request): JsonResponse
    {
        $inputs = $request->only(["name", "email", "business_name", "phone_number", "how_can_help_you", "industry_type", "type"]);
        $inputs['how_can_help_you'] = json_decode($inputs['how_can_help_you']);
        $inputs['industry_type'] = json_decode($inputs['industry_type']);
        $how_can_help_you = [];
        $industry_type = [];
        if (!empty($inputs['how_can_help_you'])) {
            foreach ($inputs['how_can_help_you'] as $el) {
                $how_can_help_you[] = $el->value;
            }
            $inputs['how_can_help_you'] = $how_can_help_you;
        }
        if (!empty($inputs['industry_type'])) {
            foreach ($inputs['industry_type'] as $el) {
                $industry_type[] = $el->value;
            }
            $inputs['industry_type'] = $industry_type;
        }
        $landing = new LandingPageContact;
        $landing->name = $inputs['name'];
        $landing->phone_number = $inputs['phone_number'];
        $landing->email = $inputs['email'];
        $landing->company_name = $inputs['business_name'];
        $landing->from_where_id = $inputs['how_can_help_you'];
        $landing->industry_id = $inputs['industry_type'];
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
        return response()->json(["success" => true]);
    }

}
