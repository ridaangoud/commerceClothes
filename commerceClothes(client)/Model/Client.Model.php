<?php
	// inclure la classe model mere
	require_once('Model.Model.php');
      class ClientModel extends Model {
	 // chaque attribut correspond a une collone dans la table client
	 private $idClient ;
	 private $nom ;
	 private $email;
	 private $telephone ;
	 private $addresse;
	 private $ville;
	 private $civilite;
	 private $mdp;
	 private $codepostal;
	 private $prenom;
	 // accesseurs 
	 // accesseur ID
	 public function getIdClient()
	 {
		return $this->idClient;
	 }
	 //seter ID
	 public function setIdClient($value){
		if(is_numeric($value))
				$this->idClient = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "idClient";
				}	
	 }
	//accesseur nom
	 public function getNom()
	 {
		return $this->nom ;
			
	 }
	 //seter nom
	 public function setNom($value){
		if(!empty($value))
				$this->nom = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "nom";
				}	
		}
	 // accesseur email
	 public function getEmail()
	 {
		return $this->email;
	 }
	 //setter email
	 public function setEmail($value){
		if(!empty($value))
				$this->email = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "email";
				}	
		}
	 //accesseur telephone
	 public function getTelephone()
	 {
		return $this->telephone;
	 }
	 //setter  telephon
	 public function setTelephone($value){
		if(!empty($value))
				$this->telephone = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "telephone";
				}	
		}
	 // accesseur addresse
	 public function getAddresse()
	 {
		return $this->addresse ;
	 }
	 // setter addresse
	 public function setAddresse($value){
		if(!empty($value))
				$this->addresse = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "addresse";
				}	
		}
	 //accesseur ville
	 public function getVille()
	 {
		return $this->ville;
	 }
	 //setter ville
	 public function setVille($value){
		if(!empty($value))
				$this->ville = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "ville";
				}	
		}
	 // accesseur civilite
	 public function getCivilite()
	 {
		return $this->civilite ;
	 }
	 // setter civilite
	 public function setCivilite($value){
		if(!empty($value))
				$this->civilite = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "civilite";
				}	
		}
	 // accesseur mdp
	 public function getMdp()
	 {
		return $this->mdp;
	 }
	 // setter mdp
	 public function setMdp($value){
		if(!empty($value))
				$this->mdp = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "mdp";
				}	
	 // accesseur codepostal
	 }
	 public function getCodePostal()
	 {
		return $this->codepostal ;
	 }
	 //setter codepostal
	 public function setCodePostal($value){
		if(is_numeric($value))
				$this->codepostal = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "codepostal";
				}
		}
	 //accesseur prenom
	 public function getPrenom()
	 {
		return $this->prenom;
	 }
	 //setter prenom
	 public function setPrenom($value){
		if(is_string($value))
				$this->prenom = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "prenom";
				}	
		}
	 // liste des client enregister
	 public function listClient()
	 {
		$tab = array();
			$rqt = mysql_query("SELECT * FROM clients");
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
	 }
	//Ajouter
		public function addClient(){
		
					$add ='
					INSERT INTO clients ( nom, email, telephone,addresse, ville, civilite, mdp, codepostal ,prenom)
			      VALUES ("'.$this->nom.'",
				  "'.$this->email.'",
				  "'.$this->telephone.'",
				  "'.$this->addresse.'" ,
				  "'.$this->ville.'",
				  "'.$this->civilite.'",
				  "'.$this->mdp.'",
				  "'.$this->codepostal.'",
				  "'.$this->prenom.'");
					
					';

			
					
					
					
			mysql_query($add);
		}
		
	 //Recherche
		public function findClient($idClient){
			$rqt = mysql_query("SELECT * FROM clients WHERE idClient = ".$idClient);
			
			$data = mysql_fetch_assoc($rqt);
			if(count($data)>0){
			$this->idClient =$data['idClient'];
			$this->nom=$data['nom'];
			$this->email=$data['email'];
			$this->telephone=$data['telephone'];
			$this->addresse=$data['addresse'];
			$this->ville=$data['ville'];
			$this->civilite=$data['civilite'];
			$this->mdp=$data['mdp'];
			$this->codepostal=$data['codepostal'];
			$this->prenom=$data['prenom'];

			
			}
			return $this ;
	 }
	 // supprimer client
	 public function deleteClient($idClient){
	 $rqt = "DELETE FROM  clients WHERE idClient = ".$idClient;
	 mysql_query($rqt);
	 
	 }
	 
}	 