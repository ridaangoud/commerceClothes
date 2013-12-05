<?php
	/* Models : classe Produit */
	//Inclusion de Classe Mére
	require_once('Model.Model.php');
	class ProduitModel extends Model{
		//Les Attributs  : chaque attribut correspond a une colonne de la table produit.
		private $idProducts;
		private $type_produit_HEF; 
		private $prix;
		private $description;
		private $small_description;
		private $quantite;
		private $date_de_maj;
		private $Categories_idCategory;
		private $image;
	
		//Accesseurs et modificateurs des attributs privé (getters et setters) || Methodes magiques
		
		/*
			* @desc         retourne idProducts de l'objet courant
			* @return   idProducts 
		*/
		public function getidProducts(){
			return $this->idProducts;
		}
		
		/*
			* @desc         retourne type_produit_HEF de l'objet courant
			* @return   type_produit_HEF 
		*/
		public function gettype_produit_HEF(){
			return $this->type_produit_HEF;
		}
		/*
			* @desc change la valeur de l'attribut type_produit_HEF aprés la validProductsation
			* @param   str $value     valeur de l'attribut type_produit_HEF
		*/
		public function settype_produit_HEF($value){
			if(is_string($value))
				$this->type_produit_HEF = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "type_produit_HEF";
			}
		}
		
		/*
			* @desc     retourne prix de l'objet courant
			* @return    prix 
		*/
		public function getprix(){
			return $this->prix;
		}
		/*
			* @desc       change la valeur de l'attribut prix aprés la validProductsation
			* @param   	str $value     valeur de l'attribut prix
		*/
		public function setprix($value){
			if(is_numeric($value))
				$this->prix = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "prix";
			}
		}
		
		/*
			* @desc     retourne description de l'objet courant
			* @return    description 
		*/
		public function getdescription(){
				return $this->description;
		}
		/*
			* @desc       change la valeur de l'attribut description aprés la validProductsation
			* @param   	str $value     valeur de l'attribut description
		*/
		public function setdescription($value){
			
				if(is_string($value))
				$this->description = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "description";
			}
		}
		
		/*
			* @desc     retourne small_description de l'objet courant
			* @return    small_description 
		*/
		public function getsmall_description(){
				return $this->small_description;
		}
		/*
			* @desc       change la valeur de l'attribut small_description aprés la validProductsation
			* @param   	str $value     valeur de l'attribut small_description
		*/
		public function setsmall_description($value){
			if(is_string($value))
				$this->small_description = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "small_description";
			}
		}
		/*
			* @desc     retourne description de l'objet courant
			* @return    description 
		*/
		public function getquantite(){
				return $this->quantite;
		}
		/*
			* @desc       change la valeur de l'attribut quantite aprés la validProductsation
			* @param   	str $value     valeur de l'attribut quantite
		*/
		public function setquantite($value){
			if(is_numeric($value))
				$this->quantite = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "quantite";
			}
		}
		/*
			* @desc     retourne description de l'objet courant
			* @return    description 
		*/
		public function getdate_de_maj(){
				return $this->date_de_maj;
		}
		/*
			* @desc       change la valeur de l'attribut date_de_maj aprés la validProductsation
			* @param   	str $value     valeur de l'attribut date_de_maj
		*/
		public function setdate_de_maj($value){
			if(is_string($value))
				$this->date_de_maj = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "date_de_maj";
			}
		}
		/*
			* @desc     retourne description de l'objet courant
			* @return    description 
		*/
		public function getCategories_idCategory(){
				return $this->Categories_idCategory;
		}
		/*
			* @desc       change la valeur de l'attribut Categories_idCategory aprés la validProductsation
			* @param   	str $value     valeur de l'attribut Categories_idCategory
		*/
		public function setCategories_idCategory($value){
			if(is_numeric($value))
				$this->Categories_idCategory = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "Categories_idCategory";
			}
		}
		/*
			* @desc     retourne description de l'objet courant
			* @return    description 
		*/
		public function getimage(){
				return $this->image;
		}
		/*
			* @desc       change la valeur de l'attribut image aprés la validProductsation
			* @param   	str $value     valeur de l'attribut image
		*/
		public function setimage($value){
			if(is_string($value))
				$this->image = $value;
			else{
				global $ErrorAttribut;
				$ErrorAttribut[] = "image";
			}
		}
		

		//CRUD : Create   Red    Update  Delete
		
		//Ajouter
		public function addProduit(){

			$add =' INSERT INTO produit (type_produit_HEF , prix , description , small_description , 
					quantite , date_de_maj , Categories_idCategory , image) 

			      VALUES ("'.$this->type_produit_HEF.'",'.$this->prix.',"'.$this->description.'"
					, "'.$this->small_description.'" , '.$this->quantite.', "'.$this->date_de_maj.'"
					, '.$this->Categories_idCategory.', "'.$this->image.'");

			';
			

		
				
			$res=	mysql_query($add);
			if($res){
				echo 'product successfully added';
			}else{
				
				echo '<h1>'.mysql_error().'</h1>';
				echo '<h2>'.mysql_errno().'</h2>';
			}
			

		}
		
		//Modifier
		public function updateProduit($idProducts){
					$rqt ='UPDATE produit SET type_produit_HEF ="'.$this->type_produit_HEF.'"

						, prix = '.$this->prix.'

						, description = "'.$this->description.'"

						, small_description = "'.$this->small_description.'"

						, quantite = '.$this->quantite.'

						, date_de_maj = "'.$this->date_de_maj.'"

						, Categories_idCategory = '. $this->Categories_idCategory .'

						, image = "'. $this->image .'"

						WHERE idProducts = '.$idProducts ;

					;

					 
			$res=mysql_query($rqt);
			if($res){
				echo 'product successfully updated';
			}else{
				
				echo '<h1>'.mysql_error().'</h1>';
				echo '<h2>'.mysql_errno().'</h2>';
			}
		
		}
		
		//Supprimer
		public function deleteProduit($idProducts){
		
			$rqt = 'DELETE FROM produit WHERE idProducts = '.$idProducts;
			mysql_query($rqt);

			}

		 
		//	Liste des Produits
		public function listProduit(){
			$tab = array();
			$rqt = mysql_query('SELECT * FROM produit');
			if (!$rqt) {
              echo "Could not successfully run query ($sql) from DB: " . mysql_error();
                 exit;
					}
			while($data = mysql_fetch_assoc($rqt))
				$tab[] = $data;
			return $tab;
		}
		//Recherche du produit
		public function findProduit($idProducts){
			
		
			$rqt = mysql_query("SELECT * FROM produit WHERE idProducts = ".$idProducts);
			$data = mysql_fetch_assoc($rqt);
				

			if(count($data)>0){
				
				$this->idProducts = $data['idProducts'];
				$this->type_produit_HEF = $data['type_produit_HEF'];
				$this->prix = $data['prix'];
				$this->description = $data['description'];
				$this->small_description = $data['small_description'];
				$this->quantite = $data['quantite'];
				$this->date_de_maj = $data['date_de_maj'];
				$this->Categories_idCategory = $data['Categories_idCategory'];
				$this->image = $data['image'];
				
			}

			return $this;


		}
	}
?>