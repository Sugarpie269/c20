<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\countries;
use App\Models\states;
use Symfony\Component\Mime\Part\TextPart;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailController extends Controller {
    public function send_mail(Request $request, $unique_light_number) {
        // Mail::raw("", function($message) use($request,$unique_light_number) {
        //     // $body = new TextPart("You have been nominated for G20, this is your unique light number ".$unique_light_number . ".");
        //     $body = view('emailer_self')->render();
        //     $body = str_replace('%unique_light_number%', $unique_light_number, $body);
        //     $body = new TextPart($body);
        //     $message->to($request->naminee_email, $request->naminee_name)->subject('Nomination Received');
        //     $message->from('khushboo.mishra@creativelandasia.com','G20')->setBody($body,'text/plain');
        // });
        $body = view('emailer_self')->render();
        $body = str_replace('%unique_light_number%', $unique_light_number, $body);
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions
        try {

            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            // $mail->IsSendmail();
            $mail->Host = env("MAIL_HOST");             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Mailer = env("MAIL_MAILER");
            $mail->Username = env("MAIL_USERNAME");   //  sender username
            $mail->Password = env("MAIL_PASSWORD");       // sender password
            $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->Port = env("MAIL_PORT");                          // port - 587/465

            $mail->setFrom(env("MAIL_FROM_ADDRESS"), env('MAIL_FROM_NAME'));
            $mail->addAddress($request->email);
            
            $mail->addReplyTo(env("MAIL_FROM_ADDRESS"), env('MAIL_FROM_NAME'));
            $mail->isHTML(true);                // Set email content format to HTML
            $mail->Subject = "Your Light is Up!";
            $mail->Body    = $body;
            // $mail->AltBody = plain text version of email body;


            if( !$mail->send() ) 
                return 'N';           
            else 
                return 'Y';
            

        } catch (Exception $e) {
            return 'N';
        }
    }

    public function send_mail_nominee(Request $request, $unique_light_number) {

        $nominee_country_name = countries::where('id',$request->naminee_country)->get()->pluck('name');
        $nominee_state_name = states::where('id',$request->naminee_state)->get()->pluck('name');
        $country_name = countries::where('id',$request->country)->get()->pluck('name');
        $state_name = states::where('id',$request->state)->get()->pluck('name');
        
        $body = view('emailer')->render();
        $body = str_replace('%unique_light_number%', $unique_light_number, $body);
        $body = str_replace('%name%', $request->name, $body);
        $body = str_replace('%email%', $request->email, $body);
        $body = str_replace('%country%', $country_name[0], $body);
        $body = str_replace('%state%', $state_name[0], $body);
        $body = str_replace('%gender%', $request->gender, $body);        
        $body = str_replace('%age%', $request->age, $body);        
        $body = str_replace('%latitude%', $request->latitude, $body);        
        $body = str_replace('%longitude%', $request->longitude, $body);        
        $body = str_replace('%nomination_type%', $request->nomination_type, $body); 
        if($request->nominee_relation)
            $body = str_replace('%Nominee Relation: nominee_relation%', 'Nominee Relation : '.$request->nominee_relation.'<br />', $body);             
        else
            $body = str_replace('%Nominee Relation: nominee_relation%', '', $body);   
        if($request->keep_public=='Y')
            $keep_public='Yes';
        else
            $keep_public='No';

        $body = str_replace('%keep_public%', $keep_public, $body);        
        $body = str_replace('%naminee_name%', $request->naminee_name, $body);        
        $body = str_replace('%naminee_email%', $request->naminee_email, $body);        
        if($request->naminee_gender)
            $body = str_replace('%Nominee Gender: naminee_gender%','Nominee Gender : '.$request->naminee_gender.'<br />', $body);             
        else
            $body = str_replace('%Nominee Gender: naminee_gender%','', $body);             
        $body = str_replace('%naminee_country%', $nominee_country_name[0], $body);        
        $body = str_replace('%naminee_state%', $nominee_state_name[0], $body);        
        $body = str_replace('%story%', $request->story, $body);
        $body = str_replace('%info_url%', $request->info_url, $body);
       
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions
        try {

            // Email server settings
            $mail->SMTPDebug = 0;
            // $mail->isSMTP();
            $mail->isSMTP();
            // $mail->IsSendmail();
            $mail->Host = env("MAIL_HOST");             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Mailer = env("MAIL_MAILER");
            $mail->Username = env("MAIL_USERNAME");   //  sender username
            $mail->Password = env("MAIL_PASSWORD");       // sender password
            $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->Port = env("MAIL_PORT");                          // port - 587/465

            $mail->setFrom(env("MAIL_FROM_ADDRESS"), env('MAIL_FROM_NAME'));
            $mail->addAddress($request->naminee_email);
            
            $mail->addReplyTo(env("MAIL_FROM_ADDRESS"), env('MAIL_FROM_NAME'));
            $mail->isHTML(true);                // Set email content format to HTML
            $mail->Subject = "You are One in a Million!";
            $mail->Body    = $body;
            // $mail->AltBody = plain text version of email body;


            if( !$mail->send() ) 
                return 'N';           
            else 
                return 'Y';
            

        } catch (Exception $e) {
            return 'N';
        }
    }

 }
