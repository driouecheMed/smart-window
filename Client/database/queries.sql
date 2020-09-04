/*
 * Copyright: 		DRIOUECHE Mohammed
 * Created : 		2 September 2020
 * Last Update: 	4 September 2020
 * This File contain all database queries.
 */


/* Create tables*/

CREATE TABLE ldr (_timestamp DATETIME, 
                  _value NUMERIC);

/*
 * _action : UP/DOWN
 * _type : manual/automatic
 */
CREATE TABLE motor_history (_timestamp DATETIME, 
                  _action VARCHAR(4),
                 _type VARCHAR(9));

