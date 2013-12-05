<?php
/*  Controlers : Client*/
	//Inclusion de Classe Mére
	require_once('Controller.Controller.php');
	class ClientController extends Controller{
		
		//Action index
		public function index(){
			$client = new ClientModel();
			//met dans viewData une liste des clients
			$this->viewData['listClient'] = $client->listClient();
			$this->View(__FUNCTION__);
		}
		
		public function ajouter(){
			$client = new ClientModel();
			$this->viewData['client'] = $client;
			
			/*Pour éviter que les message d'erreurs ne soient pas afficher au premier 
			appel de la vue, on vérifier */
			if(!isset($_POST['nom']))
			echo 
				$this->View(__FUNCTION__);
			else{

	

			$client->setNom($_POST['nom']);
			$client->AddModelError("nom", " * Erreur nom ");

			$client->setEmail($_POST['email']);
			$client->AddModelError("email", " * Erreur email");

			$client->setTelephone($_POST['telephone']);
			$client->AddModelError("telephone", " * Erreur telephone");

			$client->setAddresse($_POST['addresse']);
			$client->AddModelError("addresse", " * Erreur addresse");
			
			$client->setVille($_POST['ville']);
			$client->AddModelError("ville", " * Erreur ville");

			$client->setCivilite($_POST['civilite']);
			$client->AddModelError("civilite", " * Erreur civilite");
			
			$client->setMdp($_POST['mdp']);
			$client->AddModelError("mdp", " * Erreur mdp");
			
			$client->setCodepostal($_POST['codepostal']);
			$client->AddModelError("codepostal", " * Erreur codepostal");
			
			$client->setPrenom($_POST['prenom']);
			$client->AddModelError("prenom", " * Erreur prenom ");
			
			
			//Validation des données.
			if($client->IsValid()){
				
				$client->addClient();
				
				//rederiction vers index.phtml
				$this->RederictAction("Client");
			}else
				
				$this->View(__FUNCTION__);
			}}
			//Action : Supprimer
		public function supprimer($idClient){
			$client = new ClientModel();
			$this->viewData['client'] = $client->findClient($idClient);
			
			if(isset($_POST['idClient'])){
				$client->deleteClient($idClient);
				//rederiction vers index.phtml
				$this->RederictAction("Client");
			}
			$this->View(__FUNCTION__);
		}
		}
?>