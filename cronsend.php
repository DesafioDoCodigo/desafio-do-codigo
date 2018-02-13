<?php
include 'php/func.php';

// Limite de envio de e-mails do servidor é 500 emails por hora
// E-mails a cada 15 minutos. Enviar 120 ao invés de 125 para ter uma margem
$maxQuantity = 120;

$getList = mysqli_query($mysql,
	"SELECT 
		cml.id, 
		cml.vars,
		u.email,
		mt.filename,
		mt.title
	FROM 
		cron_mail_list cml, 
		users u,
		mail_template mt 
	WHERE 
		cml.sended = 0 
		AND u.id = cml.userid
		AND mt.id = cml.emailid
	ORDER BY cml.id ASC 
	LIMIT $maxQuantity"
);

require_once 'mail/PHPMailerAutoload.php';

require_once('mail/class.html2text.inc');
use Html2Text\Html2Text;

if(mysqli_num_rows($getList)){
	while($linha = mysqli_fetch_array($getList)){

		$mail = new PHPMailer;

		$mail->ClearAllRecipients( );

		$mail->setFrom('suporte@desafiodocodigo.com.br', ('Desafio do Código'));
		$mail->isHTML(true);
		$mail->CharSet = 'UTF-8';
      
		$mail->addAddress($linha['email']); 
		$mail->Subject = $linha['title'];

		$mail->Body = str_replace(
			array("%LOGIN%", "%PASSWORD%", "%NOME%", "%ID%", "%CODE%"), 
			json_decode($linha['vars'], true), 
			file_get_contents('mail/templates/'.$linha['filename'].'.php')
		);
        $html = new Html2Text($mail->Body);
        $mail->AltBoy = $html->getText();
		$result = $mail->send();

        if ($result===true){
            //mysqli_query($mysql, "UPDATE cron_mail_list SET sended = 1, date_sended = NOW() WHERE id = ".$linha['id']." LIMIT 1");
            //OU:
            mysqli_query($mysql, "DELETE FROM cron_mail_list WHERE id = ".$linha['id']." LIMIT 1");
            echo "Email enviado para ".$linha['email'].": ".$linha['title']."<br>";
        } else {
            var_dump($result);
        }
	}
}
