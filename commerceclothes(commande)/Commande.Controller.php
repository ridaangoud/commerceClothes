<?php
	/*  Controlers : commande*/
	//Inclusion de Classe Mére
	
	require_once('Controller.Controller.php');
	class CommandeController extends Controller{
		
		//Action index
		public function index(){
			$commande = new CommandeModel();
			//met dans viewData une liste des commandes
			$this->viewData['listCommande'] = $commande->listcommande();
			$this->View(__FUNCTION__);
		}
		
		//Action : Modifier
		public function modifier($id){
			//modifier le commande
			$commande = new CommandeModel();
			$this->viewData['commande'] = $commande->findCommande($id);
	
			/*Pour éviter que les message d'erreurs ne soient pas afficher au premier 
			appel de la vue, on vérifier */
			if(!isset($_POST['situationCommande']))
					
				$this->View( __FUNCTION__);

			else{
			 
			
			$commande->setdateCreation($_POST['dateCreation']);
			$commande->AddModelError("dateCreation", " * Erreur dateCreation");

			$commande->setconfirmationNumber($_POST['confirmationNumber']);
			$commande->AddModelError("confirmationNumber", " * Erreur confirmationNumber ");

			$commande->setClientIdClient($_POST['clientIdClient']);
			$commande->AddModelError("clientIdClient", " * Erreur clientIdClient");

			$commande->setsituationCommande($_POST['situationCommande']);
			$commande->AddModelError("situationCommande", " * Erreur situationCommande");

			 
			if($commande->IsValid()){
					//Mettre à jour le commande
					$commande->updateSituationCommande($id);
						
					//rederiction vers index.phtml
					$this->RederictAction("commande");

				}else
					
					$this->View( __FUNCTION__);
			
		}
		
	}
	}
?>

