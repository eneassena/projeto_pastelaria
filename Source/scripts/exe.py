import mysql.connector
import functions_query 
 
config = {
	'user': '***********',
	'password':'***********',
	'host':'***********',
 	'database': '***********',
	'raise_on_warnings': True
}





cnx = mysql.connector.connect(**config)
 
functions_query.query_check_dbname(cnx.cursor())

 
    

cnx.close()
