<?php

require  __DIR__ . '/../lib_ext/autoload.php';

use Notification\Email;

$novoEmail = new Email( 'smtp.mailtrap.io', 'ffda583bb093f1', 'f56902baaf33fa', '587', 'alkuntze@gmail.com', 'Alessandro TESTE' );
$novoEmail->sendEmail("Teste de envio de e-mail", "Esse é um e-mail de <b>teste</b>.", "alkuntze@gmail.com", "Ale", "alkuntze@yahoo.com.br", "Alessandro Kuntze");

var_dump($novoEmail);