/*
 * Copyright: 		DRIOUECHE Mohammed
 * Created : 		4 September 2020
 * Last Update: 	4 September 2020
 * We use get_motor_position in multiple files 
 * so it's better to create a header instead of recopying the function ;) 
 */

const char* get_position(void);

const char* get_position(void){
	FILE* f;
	char direction[4];
	
	//Get Motor Position
	f = fopen("../servo_motor.txt", "r");
	fscanf(f, "%s", direction);
	//this test, to make sure we didn't get "Segmentation fault (core dumped)" Error while deploiement
	if(strcmp(direction,"up") == 0){
		return "up";
	}else{
		return "down";
	}
	fclose(f);

}

