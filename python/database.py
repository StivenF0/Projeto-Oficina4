import connection
from datetime import datetime


def register(data):
    """
    -> register an integer to a table in localhost database
    :param data: string to be registered
    :return: no return
    """
    if data <= 24:
        data = 100
    elif data < 30:
        data = 75
    elif data < 33:
        data = 50
    elif data < 50:
        data = 25
    else:
        data = 0
    
    # data = int((100*data - 2300)/27)
    now = datetime.now()
    str_date = now.strftime('%Y-%m-%d %H:%M:%S')
    connection.cursor.execute('INSERT INTO registers VALUES (default, %s, %s, null)', (str_date, data))
    connection.my_database.commit()
    print('Register done succesfully')
