<?php
// ======= Configuration =======
$to = 'Mohamedrizki07@gmail.com'; // Remplace par ton email de réception

// ======= Récupération des données du formulaire =======
$name    = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
$email   = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
$subject = isset($_POST['subject']) ? htmlspecialchars(trim($_POST['subject'])) : '';
$message = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : '';

// ======= Validation minimale =======
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
  echo "Veuillez remplir tous les champs.";
  exit;
}

// ======= Création du message =======
$email_message = "Nom : $name\n";
$email_message .= "Email : $email\n\n";
$email_message .= "Message :\n$message";

// ======= En-têtes de l'email =======
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";

// ======= Envoi de l'email =======
if (mail($to, $subject, $email_message, $headers)) {
  echo "Your message has been sent. Thank you!";
} else {
  echo "Erreur lors de l'envoi du message.";
}
?>