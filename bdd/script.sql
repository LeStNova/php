-- test script for the UML model

-- normal case

INSERT INTO User VALUES ('a', 'b', 'c', 'd', 'H', 1, 1, 'f');
INSERT INTO Activite VALUES (1, 'a', 'b', 'c');
INSERT INTO Data VALUES ('00:00:00', '00:00:01', 1, 1, 1, 1, 1);

SELECT * FROM User;
SELECT * FROM Activite;
SELECT * FROM Data;


-- error case

INSERT INTO User VALUES ('a', 'b', 'c', 'd', 'H', 1, 1, 'f');
INSERT INTO Activite VALUES (1, 'a', 'b', 'c');
INSERT INTO Data VALUES ('00:00:00', '00:00:01', 1, 1, 1, 1, 1);


-- error case

INSERT INTO User VALUES ('a', 'b', 'c', 'd', 'H', 1, 1, 'f');
INSERT INTO Activite VALUES (1, 'a', 'b', 'c');
INSERT INTO Data VALUES ('00:00:00', '00:00:01', 1, 1, 1, 1, 1);

