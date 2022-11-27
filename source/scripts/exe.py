import mysql.connector
import functions_query 
 
config = {
	'user': 'root',
	'password':'Jose123_+#',
	'host':'127.0.0.1',
 	'database': 'pastelaria_gaucho',
	'raise_on_warnings': True
}





cnx = mysql.connector.connect(**config)
 
functions_query.query_check_dbname(cnx.cursor())

 
    

cnx.close()
