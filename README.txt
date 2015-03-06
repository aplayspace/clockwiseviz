If you want to save and load the notes you have to do the following instruction.

1. Extract the "db.sql" file into Mysql database.
2. Change the database connection info in "MySQLDB.class.php".
   ex:
        define ('DB_ADDRESS', 'localhost');	
	define ('DB_DATABASE', 'clockwise');	// no need to change
	define ('DB_USERNAME', 'root');	
	define ('DB_PASSWORD', '');	
3. In the "readFile.html" file change the "useHosting" variable to "true"
   ex : 
      // readFile.html - line 80 
      var useHosting = true;