        <?php 

require 'email-handler/PHPMailer-master/PHPMailerAutoload.php';
        $mail = new PHPMailer;
                                                $mail->isSMTP();
                                                //Enable SMTP debugging
                                                // 0 = off (for production use)
                                                // 1 = client messages
                                                // 2 = client and server messages
                                                $mail->SMTPDebug = 2; 
                                                //Ask for HTML-friendly debug output
                                                $mail->Debugoutput = 'html';
                                                //Set the hostname of the mail server
                                                $mail->Host = "mail.bindcrm.co.uk";
                                                //Set the SMTP port number - likely to be 25, 465 or 587
                                                $mail->Port = 465;
                                                //Whether to use SMTP authentication
                                                $mail->SMTPAuth = true;
                                                $mail->SMTPSecure = "tls";
                                                $mail->Username = "no-reply@bindcrm.co.uk";
                                                //Password to use for SMTP authentication
                                                $mail->Password = "UB=ugA^jnLYB";
                                                //Set the reply to
                                                $mail->AddReplyTo('no-reply@bindcrm.co.uk', 'Adam');
                                                //Set who the message is to be sent from
                                                $mail->setFrom("no-reply@bindcrm.co.uk", 'Adam');
                                                //Set who the message is to be sent to
                                                $mail->addAddress('a.sheard2012@gmail.com', 'Adam J');
                                                //Set the subject line
                                                $mail->Subject = 'New Task Added for me';
                                                //Read an HTML message body from an external file, convert referenced images to embedded,
                                                //convert HTML into a basic plain-text alternative body
                                                $mail->msgHTML('Waddup my neighbour');
                                                //Replace the plain text body with one created manually
                                                //$mail->AltBody = 'Follow this link to confirm your account: https://'.$_SERVER[HTTP_HOST].'/Activate/'.$ActivateCode;


                                                //send the message, check for errors
                                                if (!$mail->send()) {
                                                    $result .= "<p>Error sending email reminders.</p>";
                                                } else {

                                                    
                                                } 
                                                ?>