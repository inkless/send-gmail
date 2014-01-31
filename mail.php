<?php

require __DIR__.'/phpmailer/class.phpmailer.php';
require __DIR__.'/config.php';

class ERROR {
    public static $msg = '';
}

// Use the following function to send the e-mail messages (add the function in one of your included files):
function smtpmailer($to, $from, $from_name, $subject, $body) { 

    $mail = new PHPMailer();  // create a new object
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1;  // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true;  // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465; 
    $mail->Username = GUSER;  
    $mail->Password = GPWD;           
    $mail->SetFrom($from, $from_name);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);
    if(!$mail->Send()) {
        ERROR::$msg = 'Mail error: '.$mail->ErrorInfo; 
        return false;
    } else {
        ERROR::$msg = 'Message sent!';
        return true;
    }
}

$from = "zhangxiaoyu9350@gmail.com";
$from_name = "Guangda Zhang";
$subject = "Interested in the apartment";
$tpl = <<<EOF
Hi, 

Just saw your post on Craigslist. $$$$
I'm very interested in this apartment. I currently live at my friend's place in Glen Park and can move in any time. 

I'm a software engineer working in a company in SOMA. I love this location, it's close to my friends. Can I take a look at the apartment soon? I'll be on vacation this weekend so can not come on weekends. I can come see it this Friday and the following weekdays. I can make a decision very soon. Please call my phone (415-608-4896) or email me back.


Best,
Joe
EOF;

$to_array = array(
    array(
        'email' => 'n7kwn-4311867881@hous.craigslist.org',
        'post' => 'http://sfbay.craigslist.org/sfc/apa/4311867881.html',
    ),
    array(
        'email' => 'r78r6-4301802826@hous.craigslist.org',
        'post' => 'http://sfbay.craigslist.org/sfc/apa/4301802826.html',
    ),
    array(
        'email' => 'sbk5w-4298864688@hous.craigslist.org',
        'post' => 'http://sfbay.craigslist.org/sfc/apa/4298864688.html',
    ),
    array(
        'email' => 'ws2vk-4312235563@hous.craigslist.org',
        'post' => 'http://sfbay.craigslist.org/sfc/apa/4312235563.html',
    ),
    // array(
    //     'email' => 'fmzg3-4296352877@hous.craigslist.org',
    //     'post' => 'http://sfbay.craigslist.org/sfc/apa/4296352877.html',
    // ),
    // array(
    //     'email' => 'gq4fn-4274287719@hous.craigslist.org',
    //     'post' => 'http://sfbay.craigslist.org/sfc/apa/4274287719.html',
    // ),
    // array(
    //     'email' => 'hvcvd-4298843782@hous.craigslist.org',
    //     'post' => 'http://sfbay.craigslist.org/sfc/apa/4298843782.html',
    // ),
    // array(
    //     'email' => 'kzpmh-4298667163@hous.craigslist.org',
    //     'post' => 'http://sfbay.craigslist.org/sfc/apa/4298667163.html',
    // ),
    // array(
    //     'email' => 'hzzbf-4271339079@hous.craigslist.org',
    //     'post' => 'http://sfbay.craigslist.org/sfc/apa/4271339079.html',
    // ),
    // array(
    //     'email' => 'homeseekers389@yahoo.com',
    //     'post' => 'http://sfbay.craigslist.org/sfc/apa/4298069589.html',
    // ),
    // array(
    //     'email' => 'info@jacksongroup.net',
    //     'post' => 'http://sfbay.craigslist.org/sfc/apa/4298161432.html',
    // ),
    // array(
    //     'email' => 'mccarron94109@yahoo.com',
    //     'post' => 'http://sfbay.craigslist.org/sfc/apa/4282731007.html',
    // ),
    // array(
    //     'email' => '5xqtq-4294700624@hous.craigslist.org',
    //     'post' => 'http://sfbay.craigslist.org/sfc/apa/4294700624.html',
    // ),
    // array(
    //     'email' => 'hvtsf-4271065286@hous.craigslist.org',
    //     'post' => 'http://sfbay.craigslist.org/sfc/apa/4271065286.html',
    // ),
    // array(
    //     'email' => 'wtdwh-4279574769@hous.craigslist.org',
    //     'post' => 'http://sfbay.craigslist.org/sfc/apa/4279574769.html',
    // ),
    // array(
    //     'email' => 'craig@berendtproperties.com',
    //     'post' => 'http://sfbay.craigslist.org/sfc/apa/4286089487.html',
    // ),
    // array(
    //     'email' => 'rentalgem@gmail.com',
    //     'post' => 'http://sfbay.craigslist.org/sfc/apa/4288990201.html',
    // ),
    // array(
    //     'email' => 'wqs8w-4288716078@hous.craigslist.org',
    //     'post' => 'http://sfbay.craigslist.org/sfc/apa/4288716078.html',
    // ),
);

foreach ($to_array as $to) {
    $content = str_replace('$$$$', $to['post'], $tpl);
    // var_dump($to['email'].'|'.$content);
    smtpmailer($to['email'], $from, $from_name, $subject, $content);
}






