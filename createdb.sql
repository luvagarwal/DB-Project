USE APOLLO;

CREATE TABLE HOSPITAL(
	hospital_id INT NOT NULL AUTO_INCREMENT,
	hospital_name CHAR(30) NOT NULL,
	hospital_type CHAR(30),
	address CHAR(50),
	PRIMARY KEY( hospital_id )
);

CREATE TABLE DOCTOR(
	doctor_id INT NOT NULL AUTO_INCREMENT,
	first_name CHAR(20),
	last_name CHAR(20),
	phone_no INT,
	address CHAR(50),
	hospital_id INT NOT NULL,
	sex CHAR(1),
	qualification CHAR(50),
	PRIMARY KEY( doctor_id ),
	FOREIGN KEY (hospital_id) REFERENCES HOSPITAL(hospital_id) 
);

CREATE TABLE CUSTOMER(
	customer_id INT NOT NULL AUTO_INCREMENT,
	first_name CHAR(20),
	last_name CHAR(20),
	address CHAR(50),
	sex CHAR(1),
	phone_no CHAR(12),
	doctor_id INT,
	PRIMARY KEY(customer_id),
	FOREIGN KEY (doctor_id) REFERENCES DOCTOR(doctor_id)
);

CREATE TABLE INDUSTRY(
	industry_id INT NOT NULL AUTO_INCREMENT,
	address CHAR(50),
	industry_name CHAR(30) NOT NULL,
	PRIMARY KEY(industry_id)
);

CREATE TABLE STORE(
	store_id INT NOT NULL AUTO_INCREMENT,
	address CHAR(50),
	established_on DATE,
	contact_no CHAR(12),
	start_time TIME,
	PRIMARY KEY(store_id)
);

CREATE TABLE EMPLOYEE(
	user_name CHAR(15) NOT NULL,
	first_name CHAR(15),
	last_name CHAR(15),
	image blob,
	dob DATE,
	sex CHAR(1),
	date_of_joining DATE,
	address CHAR(50),
	salary INT,
	employee_type CHAR(1),
	phone_no CHAR(12),
	qualification CHAR(50),
	password CHAR(32),
	store_id INT,
	PRIMARY KEY(user_name),
	FOREIGN KEY (store_id) REFERENCES STORE(store_id)
);

CREATE TABLE PRODUCT(
	product_name CHAR(30) NOT NULL,
	store_id INT,
	no_of_items INT DEFAULT 0,
	manufacture_date DATE,
	expire_date DATE,
	procurrent_cost INT,
	image BLOB,
	PRIMARY KEY(product_name),
	FOREIGN KEY (store_id) REFERENCES STORE(store_id)
);

CREATE TABLE PURCHASE(
	purchase_id INT NOT NULL,
	customer_id INT NOT NULL,
	date_of_purchase DATE NOT NULL,
	payment_method CHAR(20),
	product_name CHAR(30) NOT NULL,
	total_items INT,
	total_price INT,
	discount INT,
	FOREIGN KEY (customer_id) REFERENCES CUSTOMER(customer_id)
	#FOREIGN KEY (product_name) REFERENCES PRODUCT(product_name)
);


CREATE TABLE DELIVERY(
	industry_id INT NOT NULL,
	product_name CHAR(30) NOT NULL,
	total_items INT,
	time_of_delivery TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	total_paid INT,
	FOREIGN KEY (industry_id) REFERENCES INDUSTRY(industry_id),
	FOREIGN KEY (product_name) REFERENCES PRODUCT(product_name)
);

CREATE TABLE FEEDBACK(
	feedback_id INT NOT NULL AUTO_INCREMENT,
	customer_name CHAR(40),
	time_of_feedback TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	feedback_body CHAR(100),
	PRIMARY KEY(feedback_id)
);

CREATE TABLE REFUND(
	refund_id INT NOT NULL AUTO_INCREMENT,
	customer_id INT,
	purchase_id INT,
	refund_price INT,
	PRIMARY KEY (refund_id)
);


INSERT INTO HOSPITAL (hospital_name,hospital_type,address) VALUES ('KALYAN Hospital','Dental','E-12l dajd adjakjd akjd');
INSERT INTO DOCTOR (first_name, last_name,phone_no,address,hospital_id,sex,qualification) VALUES ('Aman','Pandey','12121212','W-121 djkjkjdksjdksdjsk,',1,'M','MBBS,MD');
INSERT INTO CUSTOMER (first_name,last_name,address,sex,phone_no,doctor_id) VALUES ('Dhrumil','Patel','A-73 dmkajda ksjdak akjsdka k','M','94038020192','1');

 