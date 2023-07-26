CREATE TABLE temp_table (
  H_no INT,
  R_no INT,
  B_no INT,
  Date_of_Join DATETIME,
  Date_of_Exit DATETIME,
  Date_of_Leave DATETIME,
  bed_no INT
);

INSERT INTO BELONGS_TO (H_no, R_no, B_no, Date_of_Join, Date_of_Exit, Date_of_Leave, bed_no)
VALUES
(105, 5, 2, '2023-05-07 00:00:00', '2025-05-07', '2027-05-07', 1),
(106, 6, 2, '2023-05-07 00:00:00', NULL, '2025-05-07', 1),
(107, 7, 3, '2023-05-07 00:00:00', NULL, '2025-05-07', 1),
(108, 8, 3, '2023-05-07 00:00:00', NULL, '2025-05-07', 1),
(109, 9, 3, '2023-05-07 00:00:00', '2025-06-10', '2027-06-10', 1),
(110, 10, 1, '2023-05-07 00:00:00', NULL, '2025-05-07', 1),
(111, 11, 1, '2023-05-07 00:00:00', '2025-01-22', '2027-01-22', 1),
(139, 15, 1, '2023-05-08 00:00:00', NULL, '2023-06-08', 1),
(235, 10, 1, '2023-05-11 00:31:47', NULL, NULL, 1),
(102, 1, 1, '2023-05-11 00:00:00', NULL, NULL, NULL);



CREATE TABLE temp_rooms (
  R_ID INT,
  B_no INT,
  Rent INT,
  R_Type VARCHAR(10),
  Bed_no INT,
  BED_STATUS VARCHAR(10)
);

INSERT INTO temp_rooms (R_ID, B_no, Rent, R_Type, Bed_no, BED_STATUS)
VALUES
(1, 1, 700, 'SINGLE', 1, 'OCCUPIED'),
(1, 2, 800, 'DOUBLE', 1, 'FREE'),
(1, 2, 800, 'DOUBLE', 2, 'OCCUPIED'),
(1, 3, 900, 'SINGLE', 1, 'OCCUPIED'),
(4, 1, 600, 'DOUBLE', 1, 'OCCUPIED'),
(4, 1, 600, 'DOUBLE', 2, 'FREE'),
(5, 2, 750, 'SINGLE', 1, 'FREE'),
(6, 3, 850, 'DOUBLE', 1, 'FREE'),
(6, 3, 850, 'DOUBLE', 2, 'OCCUPIED'),
(7, 1, 650, 'SINGLE', 1, 'OCCUPIED'),
(8, 2, 850, 'DOUBLE', 1, 'FREE'),
(8, 2, 850, 'DOUBLE', 2, 'FREE'),
(9, 3, 700, 'SINGLE', 1, 'OCCUPIED'),
(10, 1, 800, 'DOUBLE', 1, 'OCCUPIED'),
(10, 1, 800, 'DOUBLE', 2, 'OCCUPIED'),
(11, 2, 600, 'SINGLE', 1, 'FREE'),
(12, 3, 750, 'DOUBLE', 1, 'OCCUPIED'),
(12, 3, 750, 'DOUBLE', 2, 'FREE'),
(15, 1, 1000, 'DOUBLE', 1, 'FREE'),
(15, 1, 1000, 'DOUBLE', 2, 'OCCUPIED'),
(16, 2, 900, 'SINGLE', 1, 'FREE');




UPDATE rooms
SET Rent = 175000
WHERE B_no = 3 AND R_Type = 'SINGLE';
