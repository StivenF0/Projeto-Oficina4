def list_ports(ports):
    """
    -> Function lists the USB ports in a device
    :param ports: ports got with serial lib
    :return: a list with all the ports
    """
    port_list = []
    for one_port in ports:
        port_list.append(str(one_port))
        print(str(one_port))
    return port_list


def get_port(port, ports):
    """
    -> Select the port a user wants to use in a Windows device
    :param port: number of the COM port
    :param ports: list with all the ports of the device
    :return: the full name of the selected COM port
    """
    for x in range(len(ports)):
        if ports[x].startswith(f'COM{str(port)}'):
            port_var = f'COM{str(port)}'
            print(ports[x])
            return port_var


def get_data(serial_object):
    """
    -> Reads data from a USB port
    :param serial_object: full object port
    :return: no return
    """
    if serial_object.in_waiting:
        packet = serial_object.readline()
        return packet.decode('utf').rstrip('\n')
