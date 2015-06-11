<?php

require_once dirname(__FILE__). '/../../PHPMailer/PHPMailerAutoload.php';

function sendMail($params){
        $name = $params['name'];
        $email = $params['email'];
        $message = $params['message'];
        $subject = $params['subject'];
        $image = "<center><img src='imagens/Mail.jpg' alt='some_text'></center><br />";  //logotipo
        $mail = new PHPMailer(true);   // true - Retorna excepcões
        $message = utf8_decode($message);  // para aparecer acentos
        $message = $image . $message;
        
        $mail->IsSMTP();   // Utilizador de SMTP
        try {
                $mail->Host       = "smtp.sapo.pt";  // Servidor SMTP
                $mail->SMTPAuth   = true;                   // Activar autenticação SMTP
		$mail->Port       = 25;	// Porta
                $mail->Username   = "fifa2018@sapo.pt";   // Utilizador do servidor SMTP
                $mail->Password   = "soufifa2018";         // Password do utilizador do SMTP
                
                $mail->SetFrom('fifa2018@sapo.pt', 'Dainamic');          // Email e nome de envio

                $mail->AddAddress($email, $name);   // Email e nome do destinatário
                
                $mail->Subject = utf8_decode($subject);    // Assunto da mensagem
                
                $mail->IsHTML(true);
                $mail->AltBody = 'O seu sistema de recepção de email não suporta HTML';
                $mail->MsgHTML($message);             // mensagem será enviado como HTML
                                                      
        
                $mail->Send();
                return true;
        } catch (phpmailerException $e) {
                echo $e->errorMessage();                      // Erros provenientes do PHPMailer
                $message = null;
                return false;
        } catch (Exception $e) {
                echo $e->getMessage();                        // Outros erros
                $message = null;
                return false;
        }
}

