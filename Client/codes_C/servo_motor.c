/*
 * Copyright: DRIOUECHE Mohammed
 * Last Update: 2 Sptember 2020
 * This File is for commanding the servo-motor
 */

#include<stdio.h>

/*
 * SERVO_UP : servo motor rotation when user want to pull up the window shade
 * SERVO_DOWN : servo motor rotation when user want to pull down the window shade
 */
#define SERVO_UP 1
#define SERVO_DOWN 2

void main(int argc, char* argv[]){

	FILE* f;
	int direction;

	if(argc == 2){
		direction = atoi(argv[1]);
		f = fopen("../servo_motor.txt", "w");
		if(direction == SERVO_UP){
			fprintf(f,"up");
		}else if(direction == SERVO_DOWN){
			fprintf(f,"down");
		}else{
			fprintf(stderr, "Arguments Invalid. \nPlease enter 1 for UP and 2 for DOWN.\n");	
		}
	}else{
		fprintf(stderr, "Too Many/Less arguments.\n");
	}
}

