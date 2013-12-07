<?php
// model : la classe Commande 
//Inclusion de Classe Mére
require_once('Model.Model.php');
Class CommandeModel extends Model {
// les attributs de la classe Commande 
	private $idCustumerOrders ;
	private $dateCreation ;
	private $confirmationNumber;
	private $clientIdClient ;
	private $situationCommande;
	
	//Accesseurs et modificateurs des attributs privé (getters et setters) || Methodes magiques
		// le getters
		
	public function getIdCustumerOrders(){
			return $this->idCustumerOrders;
		}
		
		public function getDateCreation(){
		return $this->dateCreation;
		}
		
		public function getConfirmationNumber(){
		return $this->confirmationNumber;
		}
		
		
		public function getClientIdClient(){
		return $this->clientIdCilent;
		}
		
		public function getSituationCommande(){
		return $this->situationCommande;
		}
		
		// les setters
		
		
		public function setIdCustumerOrders($value){
			if(is_numeric($value))
				$this->idCustumerOrders = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "idCustumerOrders";
			}
		}
		
		public function setConfirmationNumber($value){
			if(is_numeric($value))
				$this->confirmationNumber = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "confirmationNumber";
			}
		}
		
		public function setClientIdClient($value){
			if(is_numeric($value))
				$this->clientIdClient = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "clientIdClient";
			}
		}
		
		public function setSituationCommande($value){
			
				if(is_string($value))
				$this->situationCommande = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "situationCommande";
			}
		}
		
		public function setDateCreation($value){
			
				if(is_string($value))
				$this->dateCreation = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "dateCreation";
			}
		}
		
		public function updateSituationCommande($idCustomerorders){
				
				$upd ='UPDATE ordre_clients SET SItuation_commande = "'.$this->situationCommande.'"

					WHERE idCustomer_orders = '.$idCustomerorders ;

					
			
					 
			$res = mysql_query($upd);
			
			if($res){
				echo 'ordre_clients successfully updated';
			}else{
				
				echo '<h1>'.mysql_error().'</h1>';
				echo '<h2>'.mysql_errno().'</h2>';
			}
		
		}
		// liste des commandes
		public function listCommande(){
			$tab = array();
			$rqt = mysql_query('SELECT * FROM ordre_clients');
			if (!$rqt) {
              echo "Could not successfully run query ($sql) from DB: " . mysql_error();
                 exit;
					}
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		//Recherche d'une CMD
		public function findCommande($idCustumerOrders){
			
		
			$rqt = mysql_query("SELECT * FROM ordre_clients WHERE idCustomer_orders = ".$idCustumerOrders);
			$data = mysql_fetch_assoc($rqt);
				

			if(count($data)>0){
				
				$this->idCustumerOrders = $data['idCustomer_orders'];
				$this->dateCreation = $data['Date_creation'];
				$this->confirmationNumber = $data['confirmation_number'];
				$this->clientIdCilent = $data['Clients_idClient'];
				$this->situationCommande = $data['SItuation_commande'];
				
				
			}

			return $this;


		}
		
		}
		?>

		



