import serial.tools.list_ports
import serial_port
import database
from time import sleep

ports = serial.tools.list_ports.comports()
serial_inst = serial.Serial()

port_list = serial_port.list_ports(ports)
val = input('COM: ')
port_var = serial_port.get_port(val, port_list)

serial_inst.baudrate = 9600
serial_inst.port = port_var

status = 0

while True:
    if not serial_inst.isOpen():
        serial_inst.open()
    command = str(status)
    serial_inst.write(command.encode('utf-8'))
    data = serial_port.get_data(serial_inst)
    if data is not None:
        status, sensor_value = data.split()
        int_sensor_value = round(float(sensor_value))
        print(int_sensor_value)
        database.register(int_sensor_value)
    if serial_inst.isOpen():
        serial_inst.close()
    sleep(3)
