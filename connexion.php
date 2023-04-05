<?php
    session_start();
    include_once("./src/connect_bdd.inc.php");
?>
<?php 
    include_once "./src/head2.inc.php"
?>
<body>
    <header>
        <a href="#"><img class="logo" src="./asset/gmail_logo.png" alt="logo"></a>
        <nav>
            <ul class="navigation">
                <li><a href="#"> POUR LES PROS</a></li>
                <li><a href="./connexion.php"> CONNEXION</a></li>
                <li><a href="./index.php">CRÉER UN COMPTE</a></li>
            </ul>
        </nav>
    </header>

    <main>

<div class="formulaire">

    <h2>Connectez vous a votre compte</h2>

        <fieldset id="account">
                <legend>Connexion</legend>
                <form action="" method="post">
                
                        <label for="email">Mail</label> <br>
                        <input type="text" id="email" name="email" placeholder="Votre mail" aria-required="true"> <br>
                        <label for="password">Mot de passe</label> <br>
                        <input type="password" id="password" name="psw" placeholder="Votre mot de passe" aria-required="true"> <br>
                
                    <div class="bouton">
                    <input type="submit" id="submit" value="Valider votre compte" aria-label="Valider">
                    </div>
                
                   </form>
            </fieldset>

            <?php
            //inclusion
            include_once "./src/log.inc.php";
            ?>
</div>            
    </main>

    <footer>

    </footer>
</body>
</html>