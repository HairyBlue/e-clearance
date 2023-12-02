DROP TABLE if EXISTS staff;
DROP TABLE if EXISTS clearance;
DROP TABLE if EXISTS student;
DROP TABLE if EXISTS role;
DROP TABLE if EXISTS user;
DROP TABLE if EXISTS position;

create TABLE if not EXISTS position (
	positionId int auto_increment PRIMARY KEY,
	superadmin VARCHAR(255) DEFAULT "SUPERADMIN",
	admin VARCHAR(255) DEFAULT "ADMIN",
	coadmin VARCHAR(255) DEFAULT "COADMIN",
	staff VARCHAR(255) DEFAULT "STAFF",
	student VARCHAR(255) DEFAULT "STUDENT"
);

create TABLE if not EXISTS user (
	userId int auto_increment PRIMARY KEY,
	email VARCHAR(255) not null UNIQUE,
	password VARCHAR(255) not null
);

create TABLE if not EXISTS role(
	roleId int auto_increment PRIMARY KEY,
	user_id int not null,
	position_id int not null,

	foreign key (user_id) references user (userId) on DELETE CASCADE on UPDATE CASCADE,
	foreign key (position_id) references position (positionId) on DELETE CASCADE on UPDATE CASCADE
);

create TABLE if not EXISTS student (
	studentId int auto_increment PRIMARY KEY,
	name VARCHAR(255) not null,
	course VARCHAR(255) not null,
	year int not null,
	division VARCHAR(255) not null,
	user_id int not null,

	foreign key (user_id)references user(userId) on DELETE CASCADE on UPDATE CASCADE
);

create TABLE if not EXISTS clearance(
	clearanceId int auto_increment PRIMARY KEY,
	dssc BOOLEAN DEFAULT(FALSE),
	cims BOOLEAN DEFAULT(FALSE),
    lab BOOLEAN DEFAULT(FALSE),
    csg BOOLEAN DEFAULT(FALSE),
    dean BOOLEAN DEFAULT(FALSE),
    cashier BOOLEAN DEFAULT(FALSE),
    
    student_id int not null,
    FOREIGN KEY (student_id) REFERENCES student (studentId) on DELETE CASCADE on UPDATE CASCADE
);

create TABLE if not EXISTS staff (
	staffId int auto_increment PRIMARY KEY,
	name VARCHAR(255) not null,
	assigned ENUM("dssc", "cims", "lab", "csg", "dean", "cashier", "registrar"),
	user_id int not null,

	foreign key (user_id)references user(userId) on DELETE CASCADE on UPDATE CASCADE
);

