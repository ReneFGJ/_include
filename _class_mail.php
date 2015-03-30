<?php
/*
 * Sistema de e-mail
 */
$admin_nome = 'Rene F. Gabriel';
$email_adm =  'rene.gabriel@pucpr.br';

require_once ("libs/email/PHPMailerAutoload.php");

function enviaremail($para, $blank, $titulo, $texto) {
	$mail = new mail;
	$mail->titulo = $titulo;
	$mail->texto = $texto;
	$mail->to = array('renefgj@gmail.com');
	echo 'ola';
	$mail->method_2_mail(); 
}

class mail {
	var $titulo;
	var $texto;
	var $to;
	var $cc;
	var $cco;

	function method_1_mail() {
		global $admin_nome, $email_adm;
		$to = $this->to[0];
		$body = $this->texto;
		$subject = $this->titulo;

		$headers = '';
		$headers .= "To: " . $e1 . " \n";
		$headers .= "From: " . $admin_nome . " <" . $email_adm . "> \n";
		$headers .= "Mime-Version: 1.0 \n";
		//	$headers .= "Priority: Normal \n";
		//	$headers .= "Reply-To: " .$email_adm. " \n";
		//	$headers .= "Return-Path: ".$email_adm." \n";
		//	$headers .= "Subject: ".$subject." \n";
		//	$headers .= "X-Assp-Envelope-From:".$email_adm." \n";
		$headers .= 'Content-Type: text/html; charset="iso-8859-1"' . " \n";

		$headers = '';
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "To: " . $e1 . " \n";
		$headers .= "Reply-To: " . $email_adm . " \n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\n";

		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= "From: " . $admin_nome . " <" . $email_adm . "> \r\n";

		//	$body = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">'."\n".$body;
		if (mail($to, $subject, $body, $headers)) {
			return ('OK');
		} else {
			return ('ERRO');
		}
	}

	function method_1_mail()
		{
			$mail = new PHPMailer;
			$mail -> isSMTP();

			$smtp = trim($hd -> email_smtp);
			$from = trim($hd -> email);
			$replay = trim($hd -> email_replay);
			$pass = trim($hd -> email_pass);
			$from_name = $hd -> email_name;
			$email_to = $dd[0];

			$mail -> SMTPDebug = 0;
			$mail -> Debugoutput = 'html';
			$mail -> Host = $smtp;
			$mail -> Port = 25;
			$mail -> SMTPAuth = true;
			$mail -> Username = $from;
			$mail -> Password = $pass;
			$mail -> setFrom($from, $from_name);
			
			$mail -> FromName = $from;
			$mail -> From = $from;			

			if (strlen($replay) > 0)
				{
					$mail -> addReplyTo($from, $from_name);
				} else {
					$mail -> addReplyTo($from, $from);		
				}
			
			$mail -> addAddress($to, '');
			$mail -> Subject = $subject;
			$mail -> msgHTML($messagem, dirname(__FILE__));
			$mail -> AltBody = 'This is a plain-text message body';
			if (!$mail -> send()) {
				//echo "Mailer Error: " . $mail -> ErrorInfo;
			} else {
				//echo "Message sent!";
			}			
		}

	function structure() {
		$sql = "
					create table MAIL
						{
							id_ml serial not null,
							ml_idmsg char (15),
							ml_de char(8),
							ml_para char(8),
							ml_titulo text,
							ml_texto text,
							
							ml_enviado integer,
							ml_enviado_hora char(8),
							
							ml_lido integer,
							ml_lido_hora char(8),
							
							ml_importancia integer,
							ml_excluido integer,
							
							ml_enviado integer,
							ml_caixa char(1)
						}
				";
		$rlt = db_query($sql);
	}

}
?>
