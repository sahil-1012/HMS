INSERT INTO laundry (L_id, H_no) 
VALUES ('h$H_id', $H_id) 
ON DUPLICATE KEY UPDATE Valid_From=CURRENT_DATE(), Valid_Till=DATE_ADD(NOW(), INTERVAL 1 MONTH), Total_Weight_Left=15, Additional_Weight=0;







ALTER TABLE e_contacts ADD CONSTRAINT e_contacts_ibfk_1 FOREIGN KEY (E_no) REFERENCES employee (E_ID);
ALTER TABLE e_dependents ADD CONSTRAINT e_dependents_ibfk_1 FOREIGN KEY (E_no) REFERENCES employee (E_ID);
ALTER TABLE works_for ADD CONSTRAINT works_for_ibfk_1 FOREIGN KEY (E_no) REFERENCES employee (E_ID);    









INSERT INTO rooms(R_ID, B_no, Rent, R_Type, Bed_no, BED_STATUS)
VALUES
(1, 2, 800, DOUBLE, 2, FREE),
(4, 1, 600, DOUBLE, 2, FREE),
(6, 3, 850, DOUBLE, 2, FREE),
(8, 2, 850, DOUBLE, 2, FREE),
(10, 1, 800, DOUBLE, 2, FREE),
(12, 3, 750, DOUBLE, 2, FREE),
(15, 1, 1000, DOUBLE, 2, FREE);