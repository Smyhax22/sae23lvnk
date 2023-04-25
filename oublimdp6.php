<!DOCTYPE html>
<html>
  <head>
      <?php
          include('fonctions.php');
          setup();
      ?>
    <meta charset="UTF-8">
  </head>
  <body>
    <div class="container d-flex flex-column">
      <div class="row align-items-center justify-content-center
          min-vh-100 g-0">
        <div class="col-12 col-md-8 col-lg-4">
          <div class="card shadow-sm border-warning">
            <div class="card-body">
              <div class="mb-4">
                <h5>Mot de passe oublié ?</h5>
                <p class="text-black-50 pt-2">Entrez votre adresse mail afin de recevoir un mail de récupération
                </p>
              </div>
              <form action="oublimdp6.php" method="post">
                <div class="mb-3">
                  <label for="email" class="form-label">Votre adresse mail</label>
                  <input type="input" id="email" class="form-control" name="mail" placeholder="Entrez votre email">
                </div>
                <div class="mb-3 d-grid">
                  <button type="submit" class="btn btn-warning">
                    Réinitialiser le mot de passe
                  </button>
                </div>
                <span class="align-items-center justify-content-center" >Pas de profil ? <a href="creerprofil5.php">S'inscrire</a></span>
              </form>
            </div>
          </div>
          <div class="pt-2">
            <?php
              $json = file_get_contents('data/users.json');
              $user = json_decode($json, true);
              if ( ( $_POST['mail'] == "" ) && isset($_POST['mail']) ){
                echo "<div class='alert alert-warning'>
                        Veuillez renseigner votre adresse mail.
                      </div>";
              }
              # (!empty( array_filter(   $user, function($u) use ($recherche)  { return $u['mail'] === $_POST['mail']; }  ))) )
              else if ( ( empty( array_filter($user, function($u) use ($recherche) { return $u['mail'] === $_POST['mail']; })))  && isset($_POST['mail'])) {
               echo "<div class='alert alert-warning'>
                        Cette adresse mail n'est pas liée à un compte.
                      </div>";
              }
              else if (isset($_POST['mail']) ){
                mail('contact.nathanielguitton@gmail.com', 'Code de confirmation Voiture', '43321');
              }
            ?>
          </div>
        </div>
      </div>
    </div>
    <?php
      pr();
    ?>
  </body>
</html>
