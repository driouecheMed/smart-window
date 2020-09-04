/*
 * Copyright: 		DRIOUECHE Mohammed
 * Created : 		2 September 2020
 * Last Update: 	4 September 2020
 * This File is for changing the servo-motor position (by writing "UP" & "DOWN" in "servo_motor.txt")
 */

#include<stdio.h>
#include<string.h>
#include "motor.h"

void main(void){
	FILE* fp;
	char direction[4];
	
	strcpy(direction, get_position());

	//Command to the opposite position
	fp = fopen("../servo_motor.txt", "w");
	
	if(strcmp(direction,"up") == 0){
		fprintf(fp,"down");
	}else{
		fprintf(fp,"up");
	}
	fclose(fp);
}

