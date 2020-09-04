'''
 * Copyright: 		DRIOUECHE Mohammed
 * Created : 		2 September 2020
 * Last Update: 	2 September 2020
 * This File is the one that run permanetly on the processor.
   ie. in this file we will set up the automatic version of changing window shade state
(sorvo-motor > UP/DOWN) based on the luminous flux (value from ldr)
'''

import os
import time
import sqlite3

sleep_period = 5
db = "../../Client/database/smartwindow.db"

# get the lux value (from ldr.txt file)
def get_ldr_value():
	f = open('../ldr.txt','r')
	values = f.readlines()
	values = float(values[0])
	f.close()
	return values

# save new lux value to database
def save_ldr_value(value):
	conn=sqlite3.connect(db)
	curs=conn.cursor()
	curs.execute("INSERT INTO ldr values(datetime('now'), (?))", (value,))
	conn.commit()
	conn.close()



# get the servo motor position (from servo_motor.txt file)
def get_motor_position():
	f = open('../servo_motor.txt','r')
	position = f.readlines()
	position = str(position[0])
	position = position.rstrip("\n")
	f.close()
	return position

# save time when motor change direction and direction (up/down) to db
def save_motor_position(value):
	conn=sqlite3.connect(db)
	curs=conn.cursor()
	curs.execute("INSERT INTO motor_history values(datetime('now'), (?), 'Automatic')", (value,))
	conn.commit()
	conn.close()

# move the sades the the opposite position of the current one
def change_motor_position(position):
	f = open('../servo_motor.txt','w')
	if(position == 'up'):
		f.write('down')
		save_motor_position('down')
	else:
		f.write('up')
		save_motor_position('up')
	f.close()

def main():
	while True:
		lux = get_ldr_value()
		position = get_motor_position()
		
		#save to db
		save_ldr_value(lux)

		print("lux="+str(lux))
		print("position="+str(position))
		if (lux >= 50000 and position == "up"):
			# full sun and the shades are up
			change_motor_position(position)
		elif (lux < 50000 and position == 'down'):
			# there is less sun and shades are down
			change_motor_position(position)

		time.sleep(sleep_period)


if __name__=="__main__":
	main()

