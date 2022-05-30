<?PHP
// cat.php
class Cat
{
		private $name;
		private $yearOfBirth;
		Private $AantalSnorharen;
        private $AantalTanden;
        private $Vachtkleur;
    
		public function __construct($name, $yearOfBirth, $AantalSnorharen, $AantalTanden, $Vachtkleur)
		{
			$this->name = $name;
			$this->yearOfBirth = $yearOfBirth;
		}
		
		function __toString()// OVERRIDE
		{
			return "Cat : $this->name, yearOfBirth : $this->yearOfBirth \n $this->AantalSnorharen  $this->AantalTanden  $this->Vachtkleur" ;
		}
		
		public function setName($naam)
		{
			$this->name = $naam;
		}
		
		public function getName()
		{
			return $this->name;
		}
		
		public function getYearOfBirth()
		{
			return $this->yearOfBirth;
		}
    
    public function getAantalSnorharen()
		{
			return $this->AantalSnorharen;
		}
    public function getAantalTanden()
		{
			return $this->AantalTanden;
		}
    public function getVachtkleur()
		{
			return $this->Vachtkleur;
		}
}// einde class Cat

class Wolf
{
		private $name;
		private $yearOfBirth;
		
		public function __construct($name, $yearOfBirth)
		{
			$this->name = $name;
			$this->yearOfBirth = $yearOfBirth;
		}
		
		function __toString()// OVERRIDE
		{
			return "Wolf : $this->name, yearOfBirth : $this->yearOfBirth \n";
		}
		
		public function setName($naam)
		{
			$this->name = $naam;
		}
		
		public function getName()
		{
			return $this->name;
		}
		
		public function getYearOfBirth()
		{
			return $this->yearOfBirth;
		}
}// einde class Wolf

class Fish
{
		private $name;
		private $yearOfBirth;
		
		public function __construct($name, $yearOfBirth)
		{
			$this->name = $name;
			$this->yearOfBirth = $yearOfBirth;
		}
		
		function __toString()// OVERRIDE
		{
			return "Fish : $this->name, yearOfBirth : $this->yearOfBirth \n";
		}
		
		public function setName($naam)
		{
			$this->name = $naam;
		}
		
		public function getName()
		{
			return $this->name;
		}
		
		public function getYearOfBirth()
		{
			return $this->yearOfBirth;
		}
}// einde class Fish
?>