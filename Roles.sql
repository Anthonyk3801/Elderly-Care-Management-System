DROP TABLE IF EXISTS `Roles`;

CREATE TABLE `Roles` (
  `role` varchar(50) NOT NULL,
  `accessLevel` int(2) NOT NULL
);

INSERT INTO `Roles` (`role`, `accessLevel`)
VALUES
("Admin", 1),
("SuperVisor", 2),
("Doctor", 3),
("Caregiver", 4),
("Patient", 5),
("FamilyMember", 6);
