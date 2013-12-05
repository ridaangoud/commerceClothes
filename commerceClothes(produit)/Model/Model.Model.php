<?php
	/* Models : Model une classe abstraite, classe m�re de toutes les mod�le */
	abstract class Model{
		//Tableau sera rempli par les nom des attributs no valide.
		protected $ErrorAttribut = array();
		//Tableau contiendra les attributs no valide et les messages d'erreur.
		protected $listError = array();
		
		//M�thodes de Validation des Attributs
		
		/**
			* @desc  Sp�cifie le message d'erreur pour les �ventuels attributs no valide.
			* @param   str $attribut      Nom de l'attribut
			* @param   str $messageError            Message d'erreur
		*/
		public function AddModelError($attribut, $messageError){
			global $ErrorAttribut;
			global $listError;
			for($i=0; $i<count($ErrorAttribut); $i++)
				if($ErrorAttribut[$i] === $attribut)
					$listError[$attribut] = $messageError;
		}
		
		/**
			* @desc  Retourne le message d'erreur de l'attribut no valide.
			* @param   str $attribut      Nom de l'attribut
			* @return   $listError  or ""         Retourne un tableau ou vide      
		*/
		public function ValidationMessage($attribut){
			global $listError;
			if(!empty($listError))
				if(array_key_exists($attribut, $listError))
					return $listError[$attribut];
					
			return "";
		}
		/**
			* @desc  V�rifie s'il y des attributs no valides pour emp�cher une 
					action sur la base de donn�es.
			* @return   1 or 0          valid� ou no valid�
		*/
		public function IsValid(){
			global $ErrorAttribut;
			if(count($ErrorAttribut)==0)
				return 1;
			else
				return 0;
		}
	}
?>