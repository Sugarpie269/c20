<?php

namespace App\Http\Controllers;

use App\Models\countries;
use App\Models\states;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\user_form_data;
use App\Models\user_form_data_likes;
use Carbon\Carbon;

class user_form_data_controller extends Controller
{
    public function index(Request $request)
    {
        // $data['countries'] = countries::get(["name", "id"]);
        $data['total_records'] = user_form_data::get()->count();
        $data['total_records_last_24_hours'] = user_form_data::where('created_date', '>=', Carbon::now()->subDay()->toDateTimeString())->get()->count();
        // dd($data);
        // $user_form_data = user_form_data::search('Pr')->get();
        return view('front.index',compact('data'));
    }

    public function fetchCountry(Request $request)
    {
        $states = states::distinct()->pluck('country_id')->toArray();
        $data['countries'] = countries::whereNotIn('id',countries::whereNotIn('id',$states)->pluck('id')->toArray())->get(["name", "id"]);
        return view('front.form',compact('data'));

    }

    public function fetchState(Request $request)
    {
        $states = states::where("country_id",$request->country_id)->orderBy('name','ASC')->get(["id", "name"]);
        return response()->json($states);
    }

    public function form_save(Request $request)
    {       
        // dd($request);
        $validator = Validator::make(
            $request->all(),
            [
                // 'name' => 'required|string|max:255',
                // 'email' => 'required|string|email|max:300|unique:user_form_data,email',
                // 'country' => 'required',
                // 'state' => 'required',
                // 'age' => 'required|string|max:2',
                // 'gender' => 'required|string|max:10',
                'latitude' => 'required|string|max:100',
                'longitude' => 'required|string|max:100',
                // 'unique_light_number' => 'required|string|max:100',
                // 'nomination_type' => 'required',
                // 'nominee_relation' => 'required|string|max:50',
                // 'naminee_name' => 'required|string|max:255',
                // 'naminee_email' => 'required|string|email|max:300|unique:user_form_data,naminee_email',
                // 'naminee_state' => 'required',
                // 'naminee_country' => 'required',
                // 'naminee_gender' => 'required|string|max:10',
                // 'story' => 'required|string|max:600',
                // 'info_url' => 'required|string|max:500',                
                // 'concent_1' => 'required',
                // 'concent_2' => 'required',
            ]
        );
        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            return back()->withErrors($validator);
        }
        else {
            $user_form_data = new user_form_data();
            $user_form_data->name = $request->name;
            $user_form_data->email = $request->email;
            $user_form_data->country = $request->country;
            $user_form_data->state = $request->state;
            $user_form_data->gender = ($request->gender)? $request->gender:'';
            $user_form_data->age = ($request->age)? $request->age:'0';
            $user_form_data->latitude = $request->latitude;
            $user_form_data->longitude = $request->longitude;
            $user_form_data->nomination_type = $request->nomination_type;
            if($request->nominee_relation)
                $user_form_data->nominee_relation = $request->nominee_relation;
            $user_form_data->keep_public = $request->keep_public == "Yes" ? 'Y' : 'N';
            $user_form_data->naminee_name = $request->naminee_name;
            $user_form_data->naminee_email = $request->naminee_email;
            if($request->naminee_gender)
                $user_form_data->naminee_gender = $request->naminee_gender;
            $user_form_data->naminee_country = $request->naminee_country;
            $user_form_data->naminee_state = $request->naminee_state;
            $user_form_data->story = $request->story;
            $user_form_data->info_url = $request->info_url;
            $user_form_data->concent_1 = $request->concent_1 == "y" ? 1 : 0;
            $user_form_data->concent_2 = $request->concent_2 == "y" ? 1 : 0;
            $user_form_data->concent_3 = $request->concent_3 == "y" ? 1 : 0;
            $user_form_data->is_approved = 'N';
            $user_form_data->save();

            $country_name = countries::where('id',$request->country)->get()->pluck('name');
            $state_name = states::where('id',$request->state)->get()->pluck('name');
            $country_name = strtolower(preg_replace('/[^A-Za-z0-9]/', '', $country_name[0]));
            $state_name = strtolower(preg_replace('/[^A-Za-z0-9]/', '', $state_name[0]));
            
            $unique_light_number= $country_name.$state_name.$user_form_data->id;
            if ($user_form_data = user_form_data::find($user_form_data->id)) 
            {
                $user_form_data->unique_light_number=  $unique_light_number;
                $user_form_data->save();
            }
            $mailsent_status = app('App\Http\Controllers\MailController')->send_mail($request,$unique_light_number);
            if($request->forEmail =='Yes' )
                $mailsent_nominee_status = app('App\Http\Controllers\MailController')->send_mail_nominee($request,$unique_light_number);
            else
                $mailsent_nominee_status ='N';
            if ($user_form_data = user_form_data::find($user_form_data->id)) 
            {
                $user_form_data->email_sent= $mailsent_status;
                $user_form_data->email_sent_nominee= $mailsent_nominee_status;
                $user_form_data->save();
            }

        return redirect(env("APP_URL").'/light-up/'.$unique_light_number);
        }

    }

    public function like_save(Request $request)
    {
        $user_form_data_likes = new user_form_data_likes();
        $user_form_data_likes->story_id = $request->story_id;
        $user_form_data_likes->latitude = $request->latitude;
        $user_form_data_likes->longitude = $request->longitude;
        $user_form_data_likes->save();
        return Helper::format_number_in_k_notation(user_form_data_likes::where('story_id',$request->story_id)->count());
    }

    public function search(Request $request){
        $keyword = '';
        $search_data = '';
        return view('front.search',compact('search_data','keyword'));
    }
    public function search_result(Request $request){
        $keyword = $request->keyword;
        $search_data = user_form_data::search($keyword)->where('is_approved','Y')->where('keep_public','Y')->get();        
        return view('front.search',compact('search_data','keyword'));
    }
    public function social_share(Request $request){
        $keyword = $request->social_share_id;
        $search_data = user_form_data::search($keyword)->where('is_approved','Y')->where('keep_public','Y')->get();        
        return view('front.social_share',compact('search_data','keyword'));
    }

    public function all_approved_story()
    {
        $data['total_records'] = user_form_data::where('is_approved','Y')->where('keep_public','Y')->get();
        return view('front.explore_lights_map',compact('data'));
    }
    public function light_up(Request $request)
    {
        if($request->segment(2)){
            $keyword = $request->segment(2);
            $search_data = user_form_data::search($keyword)->get();     
            return view('front/light-up',compact('search_data','keyword'));
        }else{
            redirect(env("APP_URL")."/");
        }
    }
    public function light_up_globe(Request $request)
    {
        return view('front/light-up-globe');
    }
}
