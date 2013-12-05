<?php
	/*  Controlers : Produit*/
	//Inclusion de Classe M�re
	require_once('Controller.Controller.php');
	class ProduitController extends Controller{
		
		//Action index
		public function index(){
			$produit = new ProduitModel();
			//met dans viewData une liste des produits
			$this->viewData['listProduit'] = $produit->listProduit();
			$this->View(__FUNCTION__);
		}
		//Action :ajouter
		public function ajouter(){
			$produit = new ProduitModel();
			$this->viewData['produit'] = $produit;
			
			/*Pour �viter que les message d'erreurs ne soient pas afficher au premier 
			appel de la vue, on v�rifier */
			if(!isset($_POST['type_produit_HEF']))
				$this->View(__FUNCTION__);
			else{

			$produit->settype_produit_HEF($_POST['type_produit_HEF']);
			$produit->AddModelError("type_produit_HEF", " * Erreur type_produit_HEF");

			$produit->setprix($_POST['prix']);
			$produit->AddModelError("prix", " * Erreur Prix ");

			$produit->setdescription($_POST['description']);
			$produit->AddModelError("description", " * Erreur description");

			$produit->setsmall_description($_POST['small_description']);
			$produit->AddModelError("small_description", " * Erreur small_description");

			$produit->setQuantite($_POST['quantite']);
			$produit->AddModelError("quantite", " * Erreur Quantit�");
			
			$produit->setdate_de_maj($_POST['date_de_maj']);
			$produit->AddModelError("date_de_maj", " * Erreur Date_MAJ");

			$produit->setCategories_idCategory($_POST['Categories_idCategory']);
			$produit->AddModelError("Categories_idCategory", " * Erreur idCategory");
			
			$produit->setimage($_POST['image']);
			$produit->AddModelError("image", " * Erreur Image");
				
			//Validation des donn�es.
			if($produit->IsValid()){
				
				$produit->addProduit();
				
				//rederiction vers index.phtml
				$this->RederictAction("Produit");
			}else

				$this->View(__FUNCTION__);
			}
		}
		//Action : Modifier
		public function modifier($id){
			//ajouter le produit
			$produit = new ProduitModel();
			$this->viewData['produit'] = $produit->findProduit($id);

			/*Pour �viter que les message d'erreurs ne soient pas afficher au premier 
			appel de la vue, on v�rifier */
			if(!isset($_POST['type_produit_HEF']))

				$this->View( __FUNCTION__);

			else{
			 
			
			$produit->settype_produit_HEF($_POST['type_produit_HEF']);
			$produit->AddModelError("type_produit_HEF", " * Erreur type_produit_HEF");

			$produit->setprix($_POST['prix']);
			$produit->AddModelError("prix", " * Erreur Prix ");

			$produit->setdescription($_POST['description']);
			$produit->AddModelError("description", " * Erreur description");

			$produit->setsmall_description($_POST['small_description']);
			$produit->AddModelError("small_description", " * Erreur small_description");

			$produit->setQuantite($_POST['quantite']);
			$produit->AddModelError("quantite", " * Erreur Quantit�");
			
			$produit->setdate_de_maj($_POST['date_de_maj']);
			$produit->AddModelError("date_de_maj", " * Erreur Date_MAJ");

			$produit->setCategories_idCategory($_POST['Categories_idCategory']);
			$produit->AddModelError("Categories_idCategory", " * Erreur idCategory");

			$produit->setimage($_POST['image']);
			$produit->AddModelError("image", " * Erreur Image");

				if($produit->IsValid()){
					//Mettre � jour le produit
					$produit->updateProduit($id);

					//rederiction vers index.phtml
					$this->RederictAction("Produit");

				}else
					
					$this->View( __FUNCTION__);
			}
		}
		//Action : Supprimer
		public function supprimer($id){
			$produit = new ProduitModel();
			$this->viewData['produit'] = $produit->findProduit($id);
			
			if(isset($_POST['id'])){
				$produit->deleteProduit($id);
				//rederiction vers index.phtml
				$this->RederictAction("Produit");
			}
			$this->View(__FUNCTION__);
		}
		
	}
?>

