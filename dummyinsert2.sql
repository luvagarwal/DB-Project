USE APOLLO

INSERT INTO HOSPITAL(hospital_name, hospital_type, address)
VALUES('akg', 'ndkfsdfjl', 'dklsajkhsffhklhlf');

INSERT INTO DOCTOR(first_name, last_name, phone_no, address, hospital_id, sex, qualification)
VALUES('dhr', 'umil', '291073979197', 'fhsfhskdfhkds', 1, 'm', 'pass');


INSERT INTO CUSTOMER(first_name, last_name, phone_no, address, sex)
VALUES('dhr', 'umil', '291073979197', 'fhsfhskdfhkds', 'm');

INSERT INTO FEEDBACK(customer_id, feedback_body)
VALUES(1, 'body of feedback');