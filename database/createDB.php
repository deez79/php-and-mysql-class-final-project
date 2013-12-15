############################################
#
#	Create a database and tables:
#	
#
#
############################################

CHARSET utf8;

CREATE DATABASE bond CHARACTER SET utf8;
USE bond;



##################
#
# 	user table:
#
##################

CREATE TABLE agent (
user_id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
username VARCHAR(120) NOT NULL,
first_name VARCHAR(40) NOT NULL,
last_name VARCHAR(80) NOT NULL,
email VARCHAR(120) NOT NULL, 
pass VARCHAR(40) NOT NULL,
PRIMARY KEY (user_id),
UNIQUE (username),
UNIQUE (email),
INDEX login (username, pass)
);



##################
#
# 	forum table
#
##################

CREATE TABLE forum (
forum_id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
forum_name VARCHAR(60) NOT NULL,
PRIMARY KEY (forum_id),
UNIQUE (forum_name)
);



###################
#
# 	Threads Table
#
###################

CREATE TABLE threads (
thread_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
forum_id TINYINT UNSIGNED NOT NULL,
user_id MEDIUMINT UNSIGNED NOT NULL,
subject VARCHAR(150) NOT NULL,
PRIMARY KEY (thread_id),
INDEX(forum_id),
INDEX(user_id)
);



####################
#
# 	Posts Table
#
####################

CREATE TABLE posts (
post_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
thread_id INT UNSIGNED NOT NULL,
user_id MEDIUMINT UNSIGNED NOT NULL,
message TEXT NOT NULL,
posted_on DATETIME NOT NULL,
PRIMARY KEY (post_id),
INDEX (thread_id),
INDEX (user_id)
);



###################################################
#
# 	Insert first users into database
#
###################################################

INSERT INTO agent VALUES (null, 'Dutchess', 'Sterling', 'Archer', 'worldsGreatest@issis.gov', sha1('lamePassWord'));

INSERT INTO agent VALUES (007, 'James', 'James', 'Bond', 'superSpy@mi6.gov.uk', sha1('lamePassWord'));



###################################################
#
# 	Insert forum names into database
#
###################################################

INSERT INTO forum (forum_name) VALUES ('Movies'), ('Bonds'), ('Q Branch'), ('Bond Ladies'), ('Off Topic');



###################################################
#
#
#	Create user for this database
#		limit privillages to:
#		SELECT and INSERT
#
#
###################################################

GRANT SELECT, INSERT ON bond.* TO bondApp@localhost IDENTIFIED BY 'p4ssw0rd';


