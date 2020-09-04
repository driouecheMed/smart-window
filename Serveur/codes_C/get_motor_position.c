/*
 * Copyright: 		DRIOUECHE Mohammed
 * Created : 		4 September 2020
 * Last Update: 	4 September 2020
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

	fprintf(stdout,"%s",direction);
}

