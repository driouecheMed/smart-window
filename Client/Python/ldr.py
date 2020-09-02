'''
 * Copyright: DRIOUECHE Mohammed
 * Last Update: 2 Sptember 2020
 * This File is for reading ldr values (from file "ldr.txt")
'''

'''
 * we suppose that the values in the file are generated after the processing 
the values from the sensor value to lux scale.
 * The lux (symbol: lx) is the SI derived unit of illuminance, measuring luminous flux per unit area.
It is equal to one lumen per square metre.
It can be easily calculated based on ldr (photoresistance) value.
 * meaning of values :
		---------------------------------------------
		| Full moon night	| 0,5 lux				|
		| Well-lit night	| 20 -> 70 lux			|
		| Covered sky (day) | 500 -> 25 000 lux 	|
		| Full sun (day)	| 50 000 -> 100 000 lux |
		---------------------------------------------
'''
f = open('../ldr.txt','r')
values = f.readlines()
values = float(values[0])
print(values)
f.close();
