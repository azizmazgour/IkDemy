<?php

function maz_create_table_contact()  {
	global $wpdb;
	$tablename = $wpdb->prefix . "contacts";	

	if ( $wpdb->get_var("SHOW TABLES LIKE '$tablename'") != $tablename) {

		$sql = "CREATE TABLE `$tablename` (
		  `maz_id` bigint(20) NOT NULL AUTO_INCREMENT,
		  `created_at` datetime,  
		  `maz_nom` varchar(35) NOT NULL,
		  `maz_mail` varchar(35) NOT NULL,
		  `maz_chx` varchar(15) NULL,
		  `maz_telephone` varchar(15) NULL,
		  PRIMARY KEY (`maz_id`),
		  INDEX (created_at)
		  ) ENGINE=innoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;"; 
	}

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

		dbDelta($sql);

}  // fin  maz_create_table_contact

add_action( "after_switch_theme", "maz_create_table_contact" );



//=========================================================================
//==============   Page des messages contact
//=========================================================================
function maz_contact_create_menu() {
	add_menu_page( 'messages', 'Messages', 'edit_pages', 'messages_recus' , 'maz_create_page_contact', 'dashicons-email-alt', 6);
}  //fin fn maz_contact_create_menu


//=========================================================================
//==============   suprimer l enregistrement dans la base de donnee
//=========================================================================
function maz_supp_data(){
	global $wpdb;
	$id = $_POST['maz-id'];
	$wpdb->delete( 'wp_contacts', array( 'maz_id' => $id ) );
}
add_action( 'admin_menu', 'maz_supp_data');


//=========================================================================
//==============   Create page message inscription
//=========================================================================

function maz_create_page_contact() {

	global $wpdb;
	$wpdb->delete( 'contacts', array( 'maz_id' => 10 ) );
	$tablename = $wpdb->prefix . "contacts";	

	$sql = "SELECT *, DATE_FORMAT(created_at, '%e/%m/%Y à %H:%i') AS date_formatted
			FROM `$tablename`
			ORDER BY `created_at` DESC";
	$result = $wpdb->get_results( $sql, OBJECT);   ?>


	<div class="container" style="margin-top:40px;">
		<div class="row">
			<div class="col-md-10">
				<h1>Liste des messages reçus</h1>
				<br><br>
				<table id="table-messages" class="table table-bordered">
					<thead>
						<tr>
							<th>Date</th>
							<th>Nom</th>
							<th>Email</th>
							<th>Connu</th>
							<th>Téléphone</th>
							<th>Operations</th>
						</tr>
					</thead>

					
					<tbody>
						<?php foreach ($result as $res):
							echo '<tr>';
							echo '<td>', $res->date_formatted, '</td>';
							echo '<td>', $res->maz_nom, '</td>';
							echo '<td>', $res->maz_mail, '</td>';
							echo '<td>', $res->maz_chx, '</td>';
							echo '<td>', $res->maz_telephone, '</td>';

							echo '<td>
							<form action="" action="post">
							<button type="submit" class="btn btn-danger">Supprimer</button>
							<input name="maz-id" type="text" placeholder="Nom" value="'.$res->maz_id.'">
							</form>
							</td>';
							
							echo '</tr>';
						endforeach; ?>
					</tbody>
				</table>

			</div>
		</div>
	</div><!-- /container -->

	<div class="container">
		<div class="row">

		</div>
	</div>


<?php
}  // fin fn lgmac_create_page_contact


add_action( 'admin_menu', 'maz_contact_create_menu');