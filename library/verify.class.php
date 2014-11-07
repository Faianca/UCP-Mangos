<?php
/**s
* Wow Class's Verification
*
* @Website / User Cpanel for Mangos/Trinity etc..
* @copyright 2010 Jorge Faianca
* @version $id: class.verify.php,v 2.0 
*/

class verify{

	function get_faction($race)
	{
		$this->race = $race;
		if ($this->race == 2 or $this->race == 10 or $this->race == 8 or $this->race == 5 or $this->race == 6) 
		{
			$faction = 1;
		}
		else
		{
			$faction = 0;
		}
		return $faction;
	}

	private function forloop($newrace)
	{
		$count = count($newrace);
		for ($i = 0; $i < $count; $i++) {
			
			echo "<option value=\"{$newrace[$i]['id']}\">{$newrace[$i]['race']}</option>";
		}
	}
	function get_races($faction, $class)
	{
		if ($faction == 0)
		{
			if ($class == 1){
				$newrace = array(0 => array('race' => 'Human','id' => 1),
				1 => array('race' => 'Draenei','id' => 11),
				2 => array('race' => 'Night Elf','id' => 4),
				3 => array('race' => 'Gnome','id' => 7),
				4 => array('race' => 'Dwarf','id' => 3)); 
				
				
				$this->forloop($newrace);
			} // class 1
			if ($class == 2)
			{
				$newrace = array(0 => array('race' => 'Human','id' => 1),
				1 => array('race' => 'Draenei','id' => 11),
				3 => array('race' => 'Dwarf','id' => 3));
				

				$this->forloop($newrace);
			} // class 2
			if ($class == 3)
			{
				$newrace = array(0 => array('race' => 'Draenei','id' => 11),
				1 => array('race' => 'Night Elf','id' => 4),
				2 => array('race' => 'Dwarf','id' => 3));
				
				
				$this->forloop($newrace);
			} // class 3
			if ($class == 4)
			{
				$newrace = array(
				0 => array('race' => 'Human','id' => 1),
				1 => array('race' => 'Night Elf','id' => 4),
				2 => array('race' => 'Gnome','id' => 7),
				3 => array('race' => 'Dwarf','id' => 3));
				
				$this->forloop($newrace);
			} // class 4

			if ($class == 5)
			{
				$newrace = array(
				0 => array('race' => 'Human','id' => 1),
				1 => array('race' => 'Draenei','id' => 11),
				2 => array('race' => 'Night Elf','id' => 4),
				3 => array('race' => 'Dwarf','id' => 3));
				
				$this->forloop($newrace);
			} // class 5
			if ($class == 6)
			{
				$newrace = array(
				0 => array('race' => 'Human','id' => 1),
				1 => array('race' => 'Draenei','id' => 11),
				2 => array('race' => 'Night Elf','id' => 4),
				3 => array('race' => 'Gnome','id' => 7),
				4 => array('race' => 'Dwarf','id' => 3));
				
				$this->forloop($newrace);
			} // class 6
			
			if ($class == 7)
			{
				$newrace = array(
				0 => array('race' => 'Draenei','id' => 11)
				);
				
				$this->forloop($newrace);
			} // class 7
			if ($class == 8)
			{
				$newrace = array(
				0 => array('race' => 'Human','id' => 1),
				1 => array('race' => 'Draenei','id' => 11),
				2 => array('race' => 'Gnome','id' => 7));
				
				$this->forloop($newrace);
			} // class 8
			if ($class == 9)
			{
				$newrace = array(
				0 => array('race' => 'Human','id' => 1),
				1 => array('race' => 'Gnome','id' => 7));
				
				$this->forloop($newrace);
			} // class 9
			if ($class == 11)
			{
				$newrace = array(
				0 => array('race' => 'Night Elf','id' => 4));
				
				$this->forloop($newrace);
			} // class 11
			
		} 
		else
		{
			if ($class == 1)
			{
				$newrace = array(
				0 => array('race' => 'Orc','id' => 2),
				1 => array('race' => 'Undead','id' => 5),
				2 => array('race' => 'Tauren','id' => 6),
				3 => array('race' => 'Troll','id' => 8)
				);
				
				$this->forloop($newrace);
			} // class 1
			
			if ($class == 2)
			{
				$newrace = array(
				0 => array('race' => 'Blood Elf','id' => 10));
				
				$this->forloop($newrace);
			} // class 2
			if ($class == 3)
			{
				$newrace = array(
				0 => array('race' => 'Orc','id' => 2),
				1 => array('race' => 'Tauren','id' => 6),
				2 => array('race' => 'Troll','id' => 8),
				3 => array('race' => 'Blood Elf','id' => 10));
				
				$this->forloop($newrace);
			} // class 3
			if ($class == 4)
			{
				$newrace = array(0 => array('race' => 'Orc','id' => 2),
				1 => array('race' => 'Undead','id' => 5),
				2 => array('race' => 'Troll','id' => 8),
				3 => array('race' => 'Blood Elf','id' => 10));
				
				$this->forloop($newrace);
			} // class 4
			
			if ($class == 5)
			{
				$newrace = array(
				0 => array('race' => 'Undead','id' => 5),
				1 => array('race' => 'Troll','id' => 8),
				2 => array('race' => 'Blood Elf','id' => 10));
				
				$this->forloop($newrace);			
			} // class 5
			if ($class == 6)
			{
				$newrace = array(
				0 => array('race' => 'Orc','id' => 2),
				1 => array('race' => 'Undead','id' => 5),
				2 => array('race' => 'Tauren','id' => 6),
				3 => array('race' => 'Troll','id' => 8),
				4 => array('race' => 'Blood Elf','id' => 10));
				
				$this->forloop($newrace);
			} // class 6
			if ($class == 7)
			{
				$newrace = array(
				0 => array('race' => 'Orc','id' => 2),
				1 => array('race' => 'Tauren','id' => 6),
				2 => array('race' => 'Troll','id' => 8));
				
				$this->forloop($newrace);
			} // class 7
			if ($class == 8)
			{
				$newrace = array(
				0 => array('race' => 'Undead','id' => 5),
				1 => array('race' => 'Troll','id' => 8),
				2 => array('race' => 'Blood Elf','id' => 10));
				
				$this->forloop($newrace);
			} // class 8
			if ($class == 9)
			{
				$newrace = array(
				0 => array('race' => 'Orc','id' => 2),
				1 => array('race' => 'Undead','id' => 5),
				2 => array('race' => 'Blood Elf','id' => 10));
				
				$this->forloop($newrace);			
			} // class 9
			if ($class == 11)
			{
				$newrace = array(
				0 => array('race' => 'Tauren','id' => 6));
				
				$this->forloop($newrace);
			} // class 11
		}
	}
} // END VERIFY 
?>