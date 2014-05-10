Class PHP
======================

this class for back end php, you can use this class for function in sistem, and then CRUD (Create Read update Delete) for your sistem.

## Requirements

 * Mysqli
 * PHP 5.2+
 

## How to Use

 * User for select data
  ```php
  public function 'name_function'( $param )
  {
    self::$db->where('name_field', $param);
  	$row = self::$db->getOne('table_name', 'value');
  	if( $row != false ){
  		return $row->value;
  	} else
  		return;
  }
  ```
 * User for select data
 * User for select data
 * User for select data
  
