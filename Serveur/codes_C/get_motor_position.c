/*
 * Copyright: 		DRIOUECHE Mohammed
 * Created : 		4 September 2020
 * Last Update: 	4 September 2020
 * This File is for getting the servo-motor position (by writing "UP" & "DOWN" in "servo_motor.txt")
 */

#include<stdio.h>
#include<string.h>
#include "motor.h"

void main(void){
	fprintf(stdout,"%s",get_position());
}

