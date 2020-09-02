/*
 * Copyright: DRIOUECHE Mohammed
 * Last Update: 2 Sptember 2020
 * This File contain all database queries.
 */

/* Create Database */
/*
	/Client/database$ sqlite3 smartwindow
*/

/* Create tables*/
/* id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,  */
CREATE TABLE ldr (
                  _timestamp DATETIME, 
                  _value NUMERIC);
/*
 * _position : UP/DOWN
 */
CREATE TABLE motor (
                    _timestamp DATETIME, 
                    _position VARCHAR(4));
/*
 * _action : UP/DOWN
 * _type : manual/automatic
 */
CREATE TABLE log (
                  _timestamp DATETIME, 
                  _action VARCHAR(4),
                 _type VARCHAR(9));
