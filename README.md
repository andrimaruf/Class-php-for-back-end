Class PHP
======================

this class for back end php, you can use this class for function in sistem, and then CRUD (Create Read update Delete) for your sistem.

## Requirements

 * Mysqli
 * PHP 5.2+
 

## How to Use

 User for select one data
```php
 public function name_function( $param )
 {
   self::$db->where('name_field', $param);
 	$row = self::$db->getOne('table_name', 'value');
 	if( $row != false ){
 		return $row->value;
 	} else
 		return;
 }
```

 User for select all data
```php
 public function name_function( )
 {
  $tbl = 'table_name';
  $cols  = '*';
  $row = self::$db->get($tbl, null, $cols);
  
  if($row != false){
     return $row;
  } else {
     return false;
  }
 }
```

 User for select data with join and group by
```php
 public function name_function( )
 {
   $tbl = 'table_name1 AS tbl1';

			$cols  = '*';

			self::$db->join('table_name2 AS tbl2', 'tbl1.id = tbl2.no', 'LEFT');
			self::$db->groupBy('tbl1.id');
			$row = self::$db->get($tbl, null, $cols);

			if($row != false){
				return $row;
			} else {
				return false;
			}
 }
```
``` If you want to use LEFT JOIN in parameter you must make LEFT, if RIGHT parameter is RIGHT and if inner join, this parameter is none ```

 Use for insert data
```php
 public function name_function( $param )
 {
  arrs = array(
				'val1' => $val1,
				'val2' => $val2,
				'val3' => $val3,
				'val4' => $val4
			);

			self::$db->insert('table_name', arrs);
			self::$db->getInsertId();
 }
```

 Use for update data
```php
 public function name_function( $param )
 {
  self::$db->where('id', $param);
	 self::$db->delete('table_name');
	}
```

 Use for delete data 
```php
 public function name_function( $param )
 {
  self::$db->where('id', $param);
		self::$db->delete('table_name');
	}
```

  
