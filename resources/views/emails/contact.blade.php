<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
</head>

<body>
  <h2>Prise de contact </h2>
  <p>Réception d'une prise de contact avec les éléments suivants :</p>
  <ul>
    <li><strong>Email</strong> : {{ $contact['email'] }}</li>
    <li><strong>Nom</strong> : {{ $contact['nom'] }}</li>
    <li><strong>Message</strong> {{$contact['message']}} </li>
  </ul>
</body>

</html>