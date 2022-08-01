import mysql.connector
my_database = mysql.connector.connect(host="localhost", user="oficinas40", password="oficinas40password",
                                      database="oficinas40_testes")
cursor = my_database.cursor()
