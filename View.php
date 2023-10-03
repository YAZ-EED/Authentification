<?php
    class ViewAuthentification{

        public function formLogin($messageErr = null, $EmailCorrect = null, $email =null){
  
            echo "
                <form action='' method='post' class='mx-auto'>
                <h3 class='text-center my-5'>Authentification</h3>
                <label for='Email'><b>Email</b></label>
                <input name='Email' type='Email' class='form-control' placeholder='taper votre Email' value='$email' required><br>
                <label for='Password'><b>Mot de passe</b></label>
                <input name='Password' type='password' class='form-control' placeholder='taper votre mot de passe' required><br>
            ";
                
            if($messageErr){
                $message = $EmailCorrect ? 'le mot de passe est inccorect !' : "l'Email et le mot de passe est inccorect !";
                echo "<p class='alert alert-danger'><b>$message</b></p>";
            }

            echo $EmailCorrect 
            ? "<a href='ControllerReset.php?email=$email'>Vous avez oublié votre mot de passe</a><br>" 
            : "<a href='ControllerReset.php'>Vous avez oublié votre mot de passe</a> <br>" ;
            
                
            echo '
                    <a href="ControllerRegistration.php">Créer un nouveau compte</a> <br><br>
                    <input type="submit" value="Connexion" class="btn btn-primary" name="login">
                </form>
            ';
        }

        public function formResetPassword($email){

            echo "
                <form action='ControllerConfirmation.php' method='post' class='mx-auto'>
                    <h4 class='text-center my-5'>Rénitialiser le mot de passe</h4>
                    <label for='code'><b>Code</b></label>
                    <input name='code' type='text' class='form-control' placeholder='Code' required><br>
                    <label for='password'><b>Nouveau Mot de passe</b></label>
                    <input name='password' type='password' class='form-control' placeholder='Nouveau Mot de passe' required><br>
                    <input type='hidden' value='$email' name='email'>
                    <input type='submit' value='Valider' class='btn btn-primary' name='Reset'>
                </form>
            ";

        }

        public function formEnvoyerCode(){

            echo "
                <form action='' method='get' class='mx-auto'>
                    <h4 class='text-center my-5'>Rénitialiser le mot de passe</h4>
                    <label for='email'><b>Entrez votre Email</b></label>
                    <input name='email' type='email' class='form-control' required><br>
                    <input type='submit' value='Envoyer le code' class='btn btn-primary'>
                </form>
            ";

        }

        public function formRegistration($email = null, $nom = null, $prenom = null, $password = null){

            echo "
                <form action='' method='post' class='mx-auto'>
                    <h4 class='text-center my-5'>Inscription</h4>
                    <label for='nom'><b>Nom</b></label>
                    <input name='nom' type='text' class='form-control' placeholder='Taper votre Nom' value='$nom' required><br>
                    <label for='prenom'><b>Prenom</b></label>
                    <input name='prenom' type='text' class='form-control' placeholder='Taper votre Prenom' value='$prenom' required><br>
                    <label for='email'><b>Email</b></label>
                    <input name='email' type='Email' class='form-control' placeholder='taper votre Email' value='$email' required><br>
                    <label for='password'><b>Mot de passe</b></label>
                    <input name='password' type='password' class='form-control' placeholder='Mot de passe' value='$password' required><br>
                    <input type='submit' value='Enregistrée' class='btn btn-primary' name='enregistrée'>
                    </form>
                    ";
                }
                
        public function formConfirmation(){
            
            echo "
                <form action='ControllerConfirmation.php' method='post' class='mx-auto'>
                    <h4 class='text-center my-5'>Confirmer voter email</h4>
                    <label for='code'><b>Code</b></label>
                    <input name='code' type='text' class='form-control' placeholder='Code' required><br>
                    <input type='submit' value='confirmer' class='btn btn-primary' name='confirmer'>
                </form>
            ";

        }

        public function viewHome($user){

            echo "
                <h3 class='py-2'>Bienvenue sur la page d'accueille</h3>
                <h5 class='py-2'>Votre information est</h5>
                <div>
                    <p><b>Nom</b> : $user->nom</p>
                    <p><b>Prenom</b> : $user->prenom</p>
                    <p><b>Email</b> : $user->email</p>
                </div>
                <a href='Disconnection.php' class='btn btn-danger m-4'>Déconnexion</a>
            ";
        }
    }