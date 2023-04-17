<?php

namespace App\Http\Controllers;

use App\Models\user_form_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class admin_user_form_controller extends Controller
{
    public function index(Request $request)
    {
        if (request()->segment(2) && request()->segment(3)) {
            $from_date = date("Y-m-d", strtotime(request()->segment(2)));
            $to_date = date("Y-m-d", strtotime(request()->segment(3)));
            $data = user_form_data::select('*',DB::raw("CONCAT((select states.name from states where states.id= user_form_data.state),', ',(select countries.name from countries where countries.id= user_form_data.country)) as location"),DB::raw("CONCAT((select states.name from states where states.id= user_form_data.naminee_state),', ',(select countries.name from countries where countries.id= user_form_data.naminee_country)) as nominee_location"), DB::raw("(CASE WHEN keep_public='Y' THEN 'Yes' ELSE 'No' END) as keep_public_status"), DB::raw("DATE_FORMAT(created_date, '%d %M %Y') as Date"))
                ->whereDate('created_date', '>=', $from_date)
                ->whereDate('created_date', '<=', $to_date)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $data = user_form_data::select('*',DB::raw("CONCAT((select states.name from states where states.id= user_form_data.state),', ',(select countries.name from countries where countries.id= user_form_data.country)) as location"),DB::raw("CONCAT((select states.name from states where states.id= user_form_data.naminee_state),', ',(select countries.name from countries where countries.id= user_form_data.naminee_country)) as nominee_location"), DB::raw("(CASE WHEN keep_public='Y' THEN 'Yes' ELSE 'No' END) as keep_public_status"), DB::raw("DATE_FORMAT(created_date, '%d %M %Y') as Date"))
                ->orderBy('id', 'desc')
                ->get();
        }
        $date['from_date'] = request()->segment(2);
        $date['to_date'] = request()->segment(3);
        // dd($data);
        return view('admin.reports', compact('data', 'date'));
    }
    public function getlist(Request $request)
    {
        if (request()->segment(3) && request()->segment(4)) {
            $from_date = date("Y-m-d", strtotime(request()->segment(3)));
            $to_date = date("Y-m-d", strtotime(request()->segment(4)));
            $data = user_form_data::select( 'unique_light_number as Unique_Light_Number','name as Filler_Name','email as Filler_Email',DB::raw("CONCAT((select states.name from states where states.id= user_form_data.state),', ',(select countries.name from countries where countries.id= user_form_data.country)) as Location"), 'age as Age', 'gender as Gender', 'latitude as Latitude','longitude as Longitude','nomination_type as Nomination_Type','nominee_relation as Nominee_Relation',DB::raw("(CASE WHEN keep_public='Y' THEN 'Yes' ELSE 'No' END) as Keep_Public"),'naminee_name as Nominee_Name','naminee_email as Nominee_Email', DB::raw("CONCAT((select states.name from states where states.id= user_form_data.naminee_state),', ',(select countries.name from countries where countries.id= user_form_data.naminee_country)) as Nominee_Location"), 'story as Story','info_url as Info_Url', DB::raw("(SELECT COUNT(story_id) FROM user_form_data_likes WHERE story_id = user_form_data.id GROUP BY story_id ) AS Likes"), DB::raw("(CASE WHEN is_approved='Y' THEN 'Approved' ELSE 'Declined' END) as Approval_Status"),DB::raw("(CASE WHEN email_sent='Y' THEN 'Yes' ELSE 'No' END) as Mail_Status"),DB::raw("(CASE WHEN email_sent_nominee='Y' THEN 'Yes' ELSE 'No' END) as Nominee_Mail_Status"), DB::raw("DATE_FORMAT(created_date, '%d %M %Y') as Date"))
                ->whereDate('created_date', '>=', $from_date)
                ->whereDate('created_date', '<=', $to_date)
                ->orderBy('id', 'desc')->get();
        } else {
            $data = user_form_data::select( 'unique_light_number as Unique_Light_Number','name as Filler_Name','email as Filler_Email',DB::raw("CONCAT((select states.name from states where states.id= user_form_data.state),', ',(select countries.name from countries where countries.id= user_form_data.country)) as Location"), 'age as Age', 'gender as Gender', 'latitude as Latitude','longitude as Longitude','nomination_type as Nomination_Type','nominee_relation as Nominee_Relation',DB::raw("(CASE WHEN keep_public='Y' THEN 'Yes' ELSE 'No' END) as Keep_Public"),'naminee_name as Nominee_Name','naminee_email as Nominee_Email', DB::raw("CONCAT((select states.name from states where states.id= user_form_data.naminee_state),', ',(select countries.name from countries where countries.id= user_form_data.naminee_country)) as Nominee_Location"), 'story as Story','info_url as Info_Url', DB::raw("(SELECT COUNT(story_id) FROM user_form_data_likes WHERE story_id = user_form_data.id GROUP BY story_id ) AS Likes"), DB::raw("(CASE WHEN is_approved='Y' THEN 'Approved' ELSE 'Declined' END) as Approval_Status"),DB::raw("(CASE WHEN email_sent='Y' THEN 'Yes' ELSE 'No' END) as Mail_Status"),DB::raw("(CASE WHEN email_sent_nominee='Y' THEN 'Yes' ELSE 'No' END) as Nominee_Mail_Status"), DB::raw("DATE_FORMAT(created_date, '%d %M %Y') as Date"))
                ->orderBy('id', 'desc')->get();
        }

        return json_decode($data); //'data','date');

    }
    public function updateStatus($id, $status, Request $request)
    {
        $user_form_data = user_form_data::findOrfail($id);
        $user_form_data->is_approved = $status;
        $user_form_data->save();
        if ($status == "Y") {
            $data = file_get_contents('light-stories.json');
            $json_arr = json_decode($data, true);
            $json_arr[] = array('title'=>$user_form_data->unique_light_number, 'latitude'=>$user_form_data->latitude, 'longitude'=>$user_form_data->longitude);
            file_put_contents('light-stories.json', json_encode($json_arr));
            return back()->with('success', 'data has been approved.');
        } else {
            // delete data
        // get array index to delete
        $data = file_get_contents('light-stories.json');
        // decode json to associative array
        $json_arr = json_decode($data, true);
        $arr_index = array();
        foreach ($json_arr as $key => $value)
        {
            if ($value['title'] == $user_form_data->unique_light_number)
            {
                $arr_index[] = $key;
            }
        }
        // delete data element
        foreach ($arr_index as $i)
        {
            unset($json_arr[$i]);
        }
        // rebase array
        $json_arr = array_values($json_arr);
        // encode array to json and save to file
        file_put_contents('light-stories.json', json_encode($json_arr));
            return back()->with('error', 'data has been declined.');
        }

    }
}
