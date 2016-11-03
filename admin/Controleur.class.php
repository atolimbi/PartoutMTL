<?php
/**
 * Class Controleur
 * Gère les requêtes HTTP
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2013-12-10
 * @update 2016-01-22 : Adaptation du code aux standards de codage du département de TIM
 * @license MIT
 * @license http://opensource.org/licenses/MIT
 * 
 */

class Controleur 
{
	
		/**
		 * Traite la requête
		 * @return void
		 */
		public function gerer()
		{
			
			switch ($_GET['requete']) {
				
				case 'accueil':
					$this->accueil(); // option quand get requete est accueil
					break;
				
				case 'admin' : 
					$this->admin();
					break;
				
				case 'autentificationAdmin':
					$this->autentificationAdmin();
					break;
					/*
				case 'importation':
					$this->importation(); // option quand get requete n'existe pas
					break;
				case 'importationok':
					$this->importationok(); // option quand get requete n'existe pas
					break;
					*/
					
				default:
					$this->accueil(); // option quand get requete n'existe pas ou c'est incorrect(ça vais montrer la page d'accueil quand même)
					break;
			}
		}
		private function accueil()
		{
			$oVue = new VueAdmin();
			
			$oVue->afficheEntete();
			$oVue->afficheFormAutentificationAdmin();
			$oVue->affichePied();
		}
		
		private function autentificationAdmin()
		{
			$oVue = new VueAdmin();
			$admin = new Admin();
			$resulta = $admin->verifFormAutentifiAdmin();
			
			
			$oVue->afficheEntete();
			
			if($resulta)
			{
				$oVue->afficherAcceuilAdmin();
			}
			else
			{
				$oVue->afficheFormAutentificationAdmin();
			}
			
			$oVue->affichePied();
		}
		
		private function admin()
		{
			$oVue = new VueAdmin();
			
			$oVue->afficheEntete();
			$oVue->verifFormAutentifiAdmin();
			$oVue->affichePied();
		}
		// Placer les méthodes du controleur.
		/*
		function importation()
		{
			$oVue = new Vue();
			
			$oVue->afficheEntete();
			$oVue->afficheformImportation();
			$oVue->affichePied();
		}
		
		function importationok()
		{
			$oVue = new Vue();
			
			$oVue->afficheEntete();
			$oVue->afficheImportationok();
			$oVue->affichePied();
		}
		*/
}
?>















