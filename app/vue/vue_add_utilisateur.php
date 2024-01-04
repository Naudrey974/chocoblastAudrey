<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <?php include_once './app/vue/vue_navbar.php'?>
    <h1>Ajouter un utilisateur :</h1>
    <form action="" method="post">
        <label for="nom_utilisateur">Saisir le nom de l'utilisateur :</label>
        <input type="text" name="nom_utilisateur">
        <label for="prenom_utilisateur">Saisir le prénom de l'utilisateur :</label>
        <input type="text" name="prenom_utilisateur">
        <label for="mail_utilisateur">Saisir l'email de l'utilisateur :</label>
        <input type="email" name="mail_utilisateur">
        <label for="password_utilisateur">Saisir le MP de l'utilisateur :</label>
        <input type="password" name="password_utilisateur">
        <label for="password_vérification">Confirmer le MP de l'utilisateur :</label>
        <input type="password" name="password_vérification">
        <label for="image_utilisateur">Enregistrer une image :</label>
        <input type="file" id="image" alt="Login" src="" />
        <label for="id_roles">Saisir le N° de rôles de l'utilisateur :</label>
        <input type="text" name="id_roles">
        <input type="submit" value="Ajouter" name="submit">
    </form>
    <p><?=$message?></p>
</body>
</html>
