<?php
  /**
   * Users Class
   *
   * @Website / User Cpanel for Mangos/Trinity etc..
   * @copyright 2010 Jorge Faianca
   * @version $id: users.class.php,v 3.0 
   */
   
class User extends Database
  {
      public $msgs = array();
      
      /**
       * User::__construct()
       * 
       * @return
       */
      function __construct()
      {
      	      		
      }

      /**
       * User::confirmUserID()
       * 
       * @param mixed $username
       * @param mixed $cookie_id
       * @return
       */
      function confirmUserID($username, $cookie_id)
      {
     
         global $db;
          
          $sql = "SELECT cookie_id FROM ".DB_ACCOUNT." WHERE username = '" . $db->escape($username, true)."'";
          $result = $db->query($sql);
          if (!$result || (mysql_num_rows($result) < 1)) {
              return 1;
          }
          
          $row = $db->fetch($result);
          $row ['cookie_id'] = sanitize($row ['cookie_id']);
          $cookie_id = sanitize($cookie_id);
          
          if ($cookie_id == $row ['cookie_id']) {
              return 0;
          } else {
              return 2;
          }
      }
/**
       * User::getUserById1()
       * 
       * @param mixed $id
       * @return
       */
      
    public function getUserById1($id)
      {
          global $db;
          $sql = "SELECT * FROM ".DB_ACCOUNT." WHERE id = '" . (int)$id . "'";
          $row = $db->first($sql);
          
          if ($row) {
              return $row;
          } else
              return 0;
      }
      /**
       * User::confirmUserPass()
       * 
       * @param mixed $username
       * @param mixed $password
       * @return
       */
      function confirmUserPass($username, $password)
      {
           global $db;

          $sql = "SELECT sha_pass_hash FROM ".DB_ACCOUNT." WHERE username = '" . $db->escape($username, true)."'";
          $result = $db->query($sql);
          if (!$result) {
              return 0;
          }
          
          $row = $db->fetch($result);
          
          $password = sanitize($password);
          
          $entered_pass = sha1(strtoupper($username.":".$password));

          if ($entered_pass == strtolower($row['sha_pass_hash'])) {
              return 1;
          } else {
              return 2;
          }
      }


       /**
       * User::confirmBan()
       * 
       * @param mixed $username
       * @return
       */
      function confirmBan($id)
      {
          global $db;
          
          $sql = "SELECT active FROM ".DB_BAN." WHERE id = '". $id."'";
          $result = $db->first($sql);
	  return $result['active'];
  
      }
      /**
       * User::setUserActive()
       * 
       * @param mixed $email
       * @param mixed $token
       * @return
       */
      function setUserActive($email, $token)
      {
          global $db;
          
		  $data['token'] = 0;
		  $data['status'] = 1;
		
		  $db->update(DB_ACCOUNT, $data, "email = '" . $email . "' AND token = '" . $token . "' LIMIT 1");
          
          if ($db->affected() <= 0)
              return false;
          else
              return true;
      }

      /**
       * User::validateToken()
       * 
       * @param mixed $token
       * @return
       */
      function validateToken($token)
      {
          global $db;
          
          $sql = "SELECT token" 
		  . "\n FROM ".DB_ACCOUNT."" 
		  . "\n WHERE token ='" . $db->escape($token, true) . "'" 
		  . "\n LIMIT 1";
          $result = $db->query($sql);
          
          if (mysql_num_rows($result))
              return true;
      }

      /**
       * User::usernameExists()
       * 
       * @param mixed $username
       * @return
       */
      function usernameExists($username)
      {
          global $db;
          
          if (strlen($db->escape($username, true)) < 4)
              return 1;
			
			$aValid = array('-', '_'); 
          
		  $alpha_num = str_replace($aValid, "", $username);
          if (!ctype_alnum($alpha_num))
              return 2;
          
          $sql = $db->query("SELECT id" 
				. "\n FROM ".DB_ACCOUNT."" 
				. "\n WHERE username = '" . sanitize($username) . "'" 
				. "\n LIMIT 1");
          if ($db->numrows($sql) > 0)
              return 3;
          else
              return false;
      }

      /**
       * User::updateUserField()
       * 
       * @param mixed $username
       * @param mixed $field
       * @param mixed $value
       * @return
       */
      function updateUserField($username, $field, $value)
      {
          global $db;
		  
		  $username = sanitize($username);
		  $value = sanitize($value);
		  
		  $data[$field] = $value;
		  
		  $db->update(DB_ACCOUNT, $data, "username='" . $db->escape($username, true) . "'");

      }

      /**
       * User::getUserInfo()
       * 
       * @param mixed $username
       * @return
       */
      function getUserInfo($username)
      {
      	   global $db;
          $sql = "SELECT * FROM ". DB_ACCOUNT ." WHERE username = '" . $this->escape($username, false)."'";
          $result = $db->query($sql);
          if (!$username) {
              return false;
          }
          
          if (mysql_num_rows($result) > 0) {
              $row = $db->fetch($result);
              return $row;
          } else
              return null;
      }
	  
      /**
       * User::getUserById()
       * 
       * @param mixed $id
       * @return
       */
      
    public function getUserById($id)
      {
          global $db;
          $sql = "SELECT * FROM ".DB_ACCOUNT." WHERE id = '" . (int)$id . "'";
          $row = $db->first($sql);
          
          if ($row) {
              return $row['username'];
          } else
              return 0;
      }

	   
      /**
       * User::getUserList()
       * 
       * @return
       */
      public function getGmList()
      {
          global $db;
          $sql = "SELECT id,gmlevel FROM ".DB_GM." where gmlevel != 0 ORDER by gmlevel DESC";
          $row = $db->fetch_all($sql);
          
          if ($row) {
              return $row;
          } else
              return 0;
      }
	  
      /**
       * User::getaccount()
       * 
       * @param bool $sort
       * @param bool $where
       * @return
       */
      public function getaccount($sort = false, $where = false)
      {
          global $db, $pager;

		  $pager = new Paginator();
		  $counter = countEntries(DB_ACCOUNT);
		  $pager->items_total = $counter;
		  $pager->default_ipp = 10;
		  $pager->paginate();
		  
		  if ($counter == 0) {
			$pager->limit = "";
		  }
		  ($sort) ? $order = $sort : $order = "id ASC";
		  ($where) ? $where = "WHERE username LIKE '%".sanitize($where)."%'" : "";
		  
          $sql = "SELECT *, DATE_FORMAT(register_date, '%d %b %Y') as created FROM ".DB_ACCOUNT." " . $where . " ORDER BY " . $order.$pager->limit;
          $row = $db->fetch_all($sql);
          
          return $row;

      }


      /**
       * User::addNewUser()
       * 
       * @param mixed $username
       * @param mixed $password
       * @param mixed $email
       * @param mixed $token
       * @return
       */
      function addNewUser($username, $password, $email)
      {
          global $db;

		  $data = array(
				  'username' => $username, 
				  'sha_pass_hash' => $password, 
				  'email' => $email,
				  'expansion' => '2'

		  );
				  
		  $db->insert(DB_ACCOUNT, $data);
      }
	  

      /**
       * User::updateUser()
       * 
       * @param mixed $id
       * @return
       */
      public function updateUser($id)
      {
          global $db, $msgAlert, $showMsg;
		  
          if (isset($_POST['edit_user']) && $_POST['edit_user'] == 1) {
			  
			  $userrow = $this->getUserById1($id);
              
		if (empty($_POST['email'])) {
		      $_POST['email'] = $userrow['email']; 
		      
		    } else {
			  
			  if ($this->emailExists($_POST['email']) and $_POST['email'] != $userrow['email'])
				  $this->msgs['email'] = "Entered Email Address is already in use.";
			  
			  if (!$this->isValidEmail($_POST['email']))
				  $this->msgs['email'] = "Entered Email Address is not valid"; 
		
			      }
	  
              if (empty($this->msgs)) {
                  $data = array(
						  'email' => sanitize($_POST['email'])
				  );
				  
				  if ($_POST['password'] != "") {
					  $data['sha_pass_hash'] = sha1(strtoupper($userrow['username'].":".$_POST['password']));
				  } else
					  $data['sha_pass_hash'] = $userrow['sha_pass_hash'];
					  
				  $db->update(DB_ACCOUNT, $data, "id='" . $id . "'");
				  
				  if ($db->affected())
					$showMsg = '<span class="notice">Your Information was successful changed</span>';
					//redirect_to("account.php?do=edit");
				} else {
					$showMsg = '<div class="msgError"><span>An error occurred while updating user:</span><ul class="error">';
					foreach ($this->msgs as $msg) {
						$showMsg .= "<li>" . $msg . "</li>\n";
					}
					$showMsg .= '</ul></div>';
				}
			}
		}
		
      /**
       * User::emailExists()
       * 
       * @param mixed $email
       * @return
       */
      function emailExists($email)
      {
          global $db;
          
		  $email = sanitize($email);
          $sql = $db->query("SELECT id" 
				. "\n FROM ".DB_ACCOUNT."" 
				. "\n WHERE email = '" . $db->escape($email,true) . "'" 
				. "\n LIMIT 1");
          if (mysql_num_rows($sql) == 1)
              return true;
          else
              return false;
      }
	  
      /**
       * User::isValidEmail()
       * 
       * @param mixed $email
       * @return
       */
      function isValidEmail($email)
      {
          if (function_exists('filter_var')) {
              if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  return true;
              } else {
                  return false;
              }
          } else {
              return preg_match('/^[a-zA-Z0-9._+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/', $email);
          }
      }
	  
      /**
       * User::getUserFilter()
       * 
       * @return
       */
      function getUserFilter()
      {
          $this->sort_query = "";
          $this->sort_list = "<select onchange=\"if(this.value!='NA') window.location = 'index.php?do=users&amp;sub=users&amp;sort='+this[this.selectedIndex].value; else window.location = 'index.php?do=users&amp;sub=users';\" class=\"select\">";
          $sort_columns = array(
						  'NA' => '--- Select Sort Filter ---', 
						  'ASC_id' => 'ID ASC &uarr;', 
						  'DSC_id' => 'ID DESC &darr;', 
						  'ASC_register_date' => 'Registration Date ASC &uarr;', 
						  'DSC_register_date' => 'Registration Date DESC &darr;', 
						  'ASC_email' => 'Email Address ASC &uarr;', 
						  'DSC_email' => 'Email Address DESC &darr;', 
						  'ASC_last_access' => 'Last Access ASC &uarr;', 
						  'DSC_last_access' => 'Last Access DESC &darr;', 
						  'ASC_status' => 'Status ASC &uarr;', 
						  'DSC_status' => 'Status DESC &darr;'
			);
		  $this->getFilterLoop($sort_columns);
          $this->sort_list .= "</select>";
          
          return $this->sort_list;
 
      }
	  
      /**
       * User::getFilterLoop()
       * 
       * @param mixed $sort_columns
       * @return
       */
      function getFilterLoop($sort_columns)
      {
          foreach ($sort_columns as $sid => $label) {
              if (get('sort')) {
                  if ($_GET['sort'] != 'NA') {
                      $sort_order = substr($_GET['sort'], 0, 3);
                      if ($sort_order == 'DSC')
                          $sort_order = 'DESC';
                      $this->sort_query = '' . substr($_GET['sort'], 4) . ' ' . $sort_order . '';
                  } else
                      $this->sort_query = '';
                  
                  if ($_GET['sort'] == $sid)
                      $this->sort_list .= "<option value=\"".$sid."\" selected=\"selected\">".$label."</option>\n";
                  else
                      $this->sort_list .= "<option value=\"".$sid."\">".$label."</option>\n";
              } else
                  $this->sort_list .= "<option value=\"".$sid."\">".$label."</option>\n";
          }
	  }
	  
	public function getNews()
      {
          global $db, $pager;

		  $pager = new Paginator();
		  $counter = countEntries(DB_UCP.'.news');
		  $pager->items_total = $counter;
		  $pager->default_ipp = 10;
		  $pager->paginate();
		  
		  if ($counter == 0) {
			$pager->limit = "";
		  }
		  $order = "newsid DESC";
		  
          $sql = "SELECT * FROM ".DB_UCP.".news ORDER BY " .$order.$pager->limit;
          $row = $db->fetch_all($sql);
          
          return $row;

      }  
      
      public function getDonation()
      {
          global $db, $pager;

		  $pager = new Paginator();
		  $counter = countEntries(DB_UCP.'.donate');
		  $pager->items_total = $counter;
		  $pager->default_ipp = 10;
		  $pager->paginate();
		  
		  if ($counter == 0) {
			$pager->limit = "";
		  }
		  $order = "id DESC";
		  
          $sql = "SELECT * FROM ".DB_UCP.".donate ORDER BY " .$order.$pager->limit;
          $row = $db->fetch_all($sql);
          
          return $row;

      }  
      
      public function getDonationItems()
      {
          global $db, $pager;

		  $pager = new Paginator();
		  $counter = countEntries(DB_UCP.'.donateitems');
		  $pager->items_total = $counter;
		  $pager->default_ipp = 10;
		  $pager->paginate();
		  
		  if ($counter == 0) {
			$pager->limit = "";
		  }
		  $order = "id DESC";
		  
          $sql = "SELECT * FROM ".DB_UCP.".donateitems ORDER BY " .$order.$pager->limit;
          $row = $db->fetch_all($sql);
          
          return $row;

      }  
	  
      /**
       * User::setActiveInactive()
       * 
       * @param mixed $table
       * @param mixed $redirect
       * @return
       */
      public function setActiveInactive($table, $redirect)
      {
          global $db, $msgError;
          
          if (isset($_GET['publish'])) {
              $id = intval($_GET['id']);
              
              $data['status'] = intval($_GET['publish']);
              
              $db->update($table, $data, "id='" . $id . "'");
              if ($db->affected() == 1)
                  redirect_to($redirect);
          }
      }
  }