<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="utf-8">
  </head>
  <body>

    <?php if (isset($not_connected) && $not_connected==true)
    {
    echo "<script>alert(\"Vous devez vous connecter pour accéder à ce contenue.\")</script>";
    }
    ?>

    <h1>Login</h1>
    <div id="body">
        <form action="<?=site_url("connexion")?>" method="post" >
            <p>Identifiant :</p>
            <code><input type="text" name="identifiant" value="" /></code>
            <p>Mot de passe :</p>
            <code><input type="password" name="password" value="" /></code>

            <input type="submit" name="login" value="Connexion">
        </form>
    </div>
  </body>
</html>
