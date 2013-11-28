-- SQL SCRIPT TO CREATE&POPULATE THE COURSES DATABASE TABLE
-- drop table COURSES;

create table COURSES (
id 	 	integer NOT NULL AUTO_INCREMENT,  			
course_name	varchar(50) NOT NULL,
year_of_entry	integer NOT NULL,
duration	integer NOT NULL,
CONSTRAINT PRIMARY KEY (id),
CONSTRAINT UNIQUE (course_name)
);

insert into COURSES (id, course_name, year_of_entry, duration)
    values(1, "BSc Computer Science", 1, 5);
insert into COURSES (id, course_name, year_of_entry, duration)
    values(2, "BSc Information Systems", 1, 4);
insert into COURSES (id, course_name, year_of_entry, duration)
    values(3, "MSc Software engineering", 1, 1);
insert into COURSES (id, course_name, year_of_entry, duration)
    values(4, "MSc Javascript ninja", 3, 2);
insert into COURSES (id, course_name, year_of_entry, duration)
    values(5, "MSc Rocket Science", 1, 5);