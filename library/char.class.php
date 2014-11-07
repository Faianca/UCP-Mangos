<?php

  /**
   * Class char Re-done
   *
   * @Website / User Cpanel for Mangos/Trinity etc..
   * @copyright 2010 Jorge Faianca
   * @version $id: char.class.php,v 3.0 
   */
class char {
    
    private $race;
    private $class;
    private $gender; 
	
    public function __construct($race,$class,$gender)
    {
        $this->race = $race;
        $this->class = $class;
        $this->gender = $gender;
    }
    
    function get_gender()
    {    
        $genders = array(0 => 'Male', 1 => 'Female');
         return $genders[$this->gender];
    }
    
    function get_race() 
    {
    
        $races = array(1 => "Human",2 => "Orc",3 => "Dwarf",4 => "NightElf",5 => "Undead",
        6 => "Tauren",7 => "Gnome",8 => "Troll",10 => "BloodElf",11 => "Draenei");
        return $races[$this->race];
    
    }


    function get_class()
     {
    
      $classes = array(1 => "Warrior",2 => "Paladin",3 => "Hunter",4 => "Rogue",5 => "Priest",
      6 => "Death Knight",7 => "Shaman",8 => "Mage",9 => "Warlock",11 => "Druid");
      return $classes[$this->class];
    
    }
    } // fim da class