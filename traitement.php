<?php 

//CONTROLE DU CHAMPS LASTNAME
if(!empty($_POST['lastname']))
{
    $nom=htmlentities($_POST['lastname']);
}
else {
    $nom='';
}

//CONTROLE DU CHAMPS PRENOM
if(!empty($_POST['firstname']))
{
    $prenom=htmlentities($_POST['firstname']);
}
else {
    $prenom='';
}

//CONTROLE DU CHAMPS MAIL
if(!empty($_POST['mail']))
{
    $mail=htmlentities($_POST['mail']);
    $linkmail='<a href="mailto:'.$mail.'">'.$mail.'<a/>';
}else{
    $mail='';
    $linkmail='';
}

//CONTROLE DU CHAMPS PHONE
if(!empty($_POST['phone']) && is_numeric($_POST['phone']))
{
    $telephone=htmlentities($_POST['phone']);
}else {
    $telephone='';
}

//CONTROLE DU CHAMPS SUBJECT
if(!empty($_POST['subject']))
{
	$sujet=htmlentities($_POST['subject']);
	}
else
{
	$sujet='';
}

// FIN DES CONTROLE DE CHAMPS
$to='votremail@gmail.com'; //votre email
$subjectmail='Demande d\'information';


$message='<p>Nom : ' .$nom. '</p>';
$message.='<p>Prenom : ' .$prenom. '</p>';
$message.='<p>Email : ' .$linkmail. '</p>';
$message.='<p>Telephone : ' .$telephone. '</p>';
$message.='<p>Commentaire : ' .$sujet. '</p>';

$header = 'From:'.$mail.'' . PHP_EOL; //email de l'utilisateur
$header.= 'Reply-To:votremail@gmail.com' . PHP_EOL; //votre email
$header.= 'MIME-Version: 1.0' . PHP_EOL;
$header.= 'Content-Type: text/html; charset="utf-8"' . PHP_EOL;

mail($to,$subjectmail,$message,$header);

//ENVOIE DE REPONSE AUTOMATIQUE
$to=$mail; //mail de l'utilisateur
$subjectmail='votre demande';

$message="Votre demande va être traité";

$header = 'From:votremail@gmail.com' . PHP_EOL; //votre email
$header.='Cc:'.$mail.'';


mail($to,$subjectmail,$message,$header);

header('location:message.html')




?>