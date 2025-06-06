<?php
    require_once "vendor/autoload.php";
    use PHPMailer\PHPMailer\PHPMailer;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name    = $_POST['name'] ?? '';
        $email   = $_POST['email'] ?? '';
        $subject = $_POST['subject'] ?? '';
        $message = $_POST['message'] ?? '';

        $mail = new PHPMailer;
        $mail->isSMTP();  

        $mail->Host = "laorejita.net";
        $mail->SMTPAuth = true;                      
        $mail->Username = "pedidos@laorejita.net";             
        $mail->Password = "4@uR$3rR";                       
        $mail->SMTPSecure = "ssl";                       
        $mail->Port = 465;      

        //Correo quien envía
        $mail->SetFrom('pedidos@laorejita.net', 'La Orejita');

        //Correo de destino
        $mail->addAddress('pedidoslaorejita@gmail.com', 'La Orejita');
        $mail->WordWrap = 50;
        $mail->IsHTML(true);

        $mail->Subject = $subject;
        $mail->Body    = "<strong>Nombre:</strong> $name<br><strong>Email:</strong> $email<br><strong>Mensaje:</strong><br>$message";
        $mail->AltBody = "Nombre: $name\nEmail: $email\nMensaje:\n$message";

        if (!$mail->send()) {
            echo "Error al enviar el mensaje: " . $mail->ErrorInfo;
        } else {
            echo "Mensaje enviado correctamente.";
        }
    }
?>
