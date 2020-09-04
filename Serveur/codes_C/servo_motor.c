/*
 * Copyright: DRIOUECHE Mohammed
 * Last Update: 4 Sptember 2020
 * This File is for changing the servo-motor position (by writing "UP" & "DOWN" in "servo_motor.txt")
 */

#include<stdio.h>
#include<string.h>

void main(int argc, char* argv[]){

	FILE* f;
	char direction[4];
	
	//Get Motor Position
	f = fopen("../servo_motor.txt", "r");
	fscanf(f, "%s", direction);
	fclose(f);

	//Command to the opposite position
	f = fopen("../servo_motor.txt", "w");
	if(strcmp(direction,"up") == 0){
		fprintf(f,"down");
	}else{
		fprintf(f,"up");
	}
	fclose(f);
}

