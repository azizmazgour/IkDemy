<?php

$nb1 = rand(1,9);
$nb2 = rand(1,9);



if (isset($_POST['send'])):

    //echo'<pre>';
    //    var_dump($_POST);
    //echo'</pre>';

    $valid = true;
    $message = array();

    // -------   verfication des champs
    // ----- verif nom
    if ( empty($_POST['maz-nom'])) {
        $message['nom'] = "entrez votre nom";
        $valid = false;
    }
    // --- verif mail
    if ( empty($_POST['maz-email'])) {
        $message['email'] = "entrez votre email";
        $valid = false;
    }
    if ( !is_email( $_POST['maz-email'] ) && !empty( $_POST['maz-email'] ) ) {
        $message['email'] = "entrez une adresse mail valide";
        $valid = false; 
        }
    // ----- verif tel
    if ( empty($_POST['maz-tel'])) {
        $message['tel'] = "entrez votre No. Tel";
        $valid = false;
    }
    // ----- connu
    if ( empty($_POST['maz_chx'])) {
        $message['maz_chx'] = "entrez votre choix";
        $valid = false;
    }




    // ------- test le captcha
    $captcha = $_POST['captcha'];
    if (empty($captcha))  {
        $message['captcha'] = "Vous n'avez pas saisi le résultat anti-spam";
        $valid = false; 
    } else if (!is_numeric($captcha))  {
        $message['captcha'] = "Votre saisie anti-spam n'est pas numérique"; 
        $valid = false; 
    } else if ($captcha != base64_decode($_POST['check1']) + base64_decode($_POST['check2']))  {
        $message['captcha'] = "La saisie anti-spam ne correspond pas au résultat";  
        $valid = false; 
    }



    if ( $valid == true):

     

        global $wpdb;
        $tablename = $wpdb->prefix . "contacts";

      $ctc_data = array(
          'maz_nom'                 => $_POST['maz-nom'],
          'maz_mail'                => $_POST['maz-email'],
          'maz_chx'                => $_POST['maz_chx'],
          'maz_telephone'   => (strlen($_POST['maz-tel']) > 0 ? $_POST['maz-tel'] : 'non renseigne'),
          'created_at'          => current_time('mysql', 0)
        );




        if($wpdb->insert($tablename, $ctc_data)):
            if(session_id()):
                $_SESSION['contact-result'] = "Votre message est envoyé, nous vous répondrons prochainement";
            endif;
            wp_safe_redirect(home_url()); 
        endif;

    endif;

    





endif; ?>


        <?php if (isset($_SESSION['contact-result'])): ?>
            <div class="container" style="margin:0 auto;">
                <div class="row">
                    <div class="col">
                        <div class="bg-success text-white text-center p-3 mb-3"><br>
                            <p class="mb-0"><?php echo $_SESSION['contact-result']; 
                            unset($_SESSION['contact-result'])
                            ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


<article class="home" id="home">
				<form class="form-suscribe" role="form" method="POST" action="" >
				<div class="container">
					<div class="row">
<!-- debut block 2 -->
				<div class="col-md-6 animated" data-animation="fadeIn" data-animation-delay="400">
					<h1>Know us</h1>
				
					<p class="aboutus" >

						<strong>IK Demy</strong> est née d'un pacte entre deux startups <strong>ONTHEBALL & SMARKTIC</strong> 
						pour développer la portée des formations pratiques au Maroc et d'en faire une véritable plus-value levier 
						au développement des établissements publics et privés, d'une conviction que les formations pratiques 
						sont bien plus qu'une animation d'un thème auprès des ressources humaines et la diffusion d'un manuel 
						ou d'une présentation; il s'agit de la transmission d'un savoir-faire en prenant en considération 
						les réalités du terrain, permettant à chacun des participants d'acquérir les compétences ciblées et 
						les mettre en pratique selon les enjeux de leurs métiers.
					</p>
					<p class="aboutus">
					<a href="https://otb.ma/" style="color:#ff5335;">Otb</a> & 
					<a href="https://smarktic.com/" style="color:#ff5335;">Smarktic</a>
				</p>
					
				</div>
<!-- fin block 2 -->
<!-- debut de block 1-->
					<div class="col-md-6 animated" data-animation="fadeIn" data-animation-delay="400">
						<h1>Inscrivez-vous à la prochaine formation</h1>

						<?php if(isset($message['nom'])) { ?>
							<div class="text-red bg-danger px-3"><?php echo $message['nom']; ?>
						<?php } ?>

					<div class="form-group">
						<label for="name" class="sr-only">Nom</label>
						<input name="maz-nom" type="text" class="form-control" id="maz-nom" placeholder="Nom" 
						value="<?php echo (isset($_POST['maz-nom'])) ? esc_attr($_POST['maz-nom']) : ''; ?>">
					</div>
					<div class="form-group">
						<label for="email" class="sr-only">Enter a valid email address</label>
						<input name="maz-email" type="email" class="form-control" id="maz-email" placeholder="Email"
						value="<?php echo (isset($_POST['maz-email'])) ? esc_attr($_POST['maz-email']) : ''; ?>">
					</div>
					<div class="form-group">
						<label for="phone" class="sr-only">Enter your phone number</label>
						<input name="maz-tel" type="tel" class="form-control" id="maz-tel" placeholder="Tel"
						value="<?php echo (isset($_POST['maz-tel'])) ? esc_attr($_POST['maz-tel']) : ''; ?>">
					</div>
					<h3>Comment avez-vous connu Nos formations.</h3>
<!-- case a coche -->
					<div class="form-group">

							<div class="col-md-6">
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="maz_chx" id="inlineRadio1" value="Google">
								  <label class="form-check-label caseTXT" for="inlineRadio1">Google</label>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="maz_chx" id="inlineRadio1" value="Amis">
								  <label class="form-check-label caseTXT" for="inlineRadio1">Amis</label>
								</div>
							</div>

					</div>

					<div class="form-group">

							<div class="col-md-6">
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="maz_chx" id="inlineRadio1" value="Facebook">
								  <label class="form-check-label caseTXT" for="inlineRadio1">Facebook</label>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="maz_chx" id="inlineRadio1" value="Autres">
								  <label class="form-check-label caseTXT" for="inlineRadio1">Autres</label>
								</div>
							</div>
							<h3>Anti-Spam,<br>saisir le resultat de l operataion: 
								<span><strong><?php echo $nb1; ?>&nbsp;+&nbsp;<?php echo $nb2; ?></strong></span>
							</h3>
							
							<div class="col-md-12">
								<div class="form-check form-check-inline">
								  	<input type="hidden" name="check1" value=<?php echo base64_encode($nb1); ?> />
                            		<input type="hidden" name="check2" value=<?php echo base64_encode($nb2); ?> />
                            		
		                            <?php if (  isset($message['captcha']) ) { ?>
			                            <div class="text-white bg-danger px-3"><?php echo $message['captcha'];  ?></div>
			                                <?php } ?>             
								</div>
							</div>
							<div class="form-group">
								<input type="text" id="captcha" name="captcha" placeholder="Captcha"/>
							</div>

					</div>
<!-- case a coche -->
						<button type="submit" name="send" class="btn" data-loading-text="Sending...">Inscription</button>
						
						<div class="form-response"></div>
					
					</div>
<!-- fin de block 1-->

					</div>
				</div>
				</form>

				<?php get_template_part( 'wp-carousel' ); ?>

				<div class="clearfix"></div>
			</article>