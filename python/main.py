import serial.tools.list_ports
import serial_port
import database

ports = serial.tools.list_ports.comports()
serial_inst = serial.Serial()

port_list = serial_port.list_ports(ports)
val = input('COM: ')
port_var = serial_port.get_port(val, port_list)

serial_inst.baudrate = 9600
serial_inst.port = port_var

if not serial_inst.isOpen():
    serial_inst.open()

while True:
    data = serial_port.get_data(serial_inst)
    if data is not None:
        int_data = round(float(data))
        print(int_data)
        database.register(int_data)
