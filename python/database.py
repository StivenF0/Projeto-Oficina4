import connection
from datetime import datetime


def register(data):
    """
    -> register an integer to a table in localhost database
    :param data: string to be registered
    :return: no return
    """
    now = datetime.now()
    str_date = now.strftime('%Y-%m-%d %H:%M:%S')
    connection.cursor.execute('INSERT INTO registers VALUES (default, %s, %s, null)', (str_date, data))
    connection.my_database.commit()
    print('Register done succesfully')
