<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class SendMailController extends Controller
{
    public function index()
    {
        return view('email');
    }

    public function store(Request $request)
    {
        // $tes = $request->tes;
        // require '..\vendor/autoload.php';
        // $mail = new PHPMailer(true);
        // $mail->SMTPDebug = 0;
        // $mail->isSMTP();
        // $mail->Host = env('EMAIL_HOST');
        // $mail->SMTPAuth = true;
        // $mail->Username = env('EMAIL_USERNAME') ;
        // $mail->Password = env('EMAIL_PASSWORD');
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        // $mail->Port = 587;
        // $mail->setFrom($tes, 'name');
        // $mail->addAddress('testing.paboi@gmail.com');
        // $mail->isHTML(true);
        // $mail->Subject = 'subject';
        // $mail->Body = 'body';
        // $dt = $mail->send();

        // if($dt){
        //     return 'berhasil';
        // }else{
        //     return 'gagal';
        // }

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.anandadimmas.my.id';                  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'anandadimmas@anandadimmas.my.id';                 // SMTP username
    $mail->Password = 'Juminimini,123';                            // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    // Sender
    $mail->setFrom("anandadimmas@anandadimmas.my.id", "anandadimmas");

    // who will receive the email submission
    
    $mail->addAddress("anandadimmas1204@gmail.com");     // Add a recipient
    
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'subject';
    $mail->Body    = '<!DOCTYPE html>
    <html>
    <body>
    
    <h1>The img element</h1>
    
    <img src="https://image.shutterstock.com/image-photo/mountains-under-mist-morning-amazing-260nw-1725825019.jpg" alt="Girl in a jacket" width="500" height="600">
    
    </body>
    </html>
    ';
    //$mail->Body    = view('email.emailTemplate',compact('isi'))->render();
    // $mail->Body    = view('email.myTestMail')->render();

    $mail->send();

} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
    }
}
