DROP TABLE IF EXISTS `FamilyMember`;

CREATE TABLE `FamilyMember` (
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `familyCode` int(3) NOT NULL, -- Still Need to match these codes to the Patient table codes...
  `DOB` date NOT NULL,
  `approval` int(1) NOT NULL, -- approval will be yes(1) OR no(0). Beware that some are set as 0.
  `password` varchar(50) NOT NULL, -- password will be alphanumeric of 15 digits.
  `phone` bigint(10) DEFAULT NULL
);

-- `role` FamilyMember Role is 6.
-- 40 Family Members
-- 32 Approved & 8 No-Approved.
INSERT INTO `FamilyMember` (`fName`,`lName`,`email`,`familyCode`,`DOB`,`approval`,`password`,`phone`)
VALUES
  ("Simon","Ratliff","sratliff@hotmail.com","659","1986/02/17","1","JMF46CYQ0TQ1OH8","1870568766"),
  ("Althea","Wooten","wooten-althea@gmail.com","543","1986/12/14","1","NOQ48NBZ6EJ7VX3","9173437726"),
  ("Craig","Savage","craig.savage6986@gmail.com","867","1987/06/11","1","FQU98XHI2DZ8RL1","4586685431"),
  ("Isadora","Morse","morseisadora9238@yahoo.com","133","1999/10/06","1","XDO32PVV7YJ9QK4","8733664863"),
  ("Lillith","Clements","clementslillith@gmail.com","580","1986/01/24","1","XDO87SOP2EW3HI3","7451242583"),
  ("Kenneth","Stark","s.kenneth8623@gmail.com","765","1999/05/16","1","SAL57BPK7FP8AC7","7054214681"),
  ("Declan","Stout","s-declan@hotmail.com","834","1993/12/18","1","USE56ILE3LL7BD3","7402043345"),
  ("Michael","Bernard","bernard.michael4894@gmail.com","723","1980/06/28","1","XWI86UXG1BE4FQ3","2251444150"),
  ("Deirdre","Mcgowan","deirdre_mcgowan4790@yahoo.com","916","1995/05/30","0","NWK34XJN6OL6UQ2","7742282382"),
  ("Selma","Miller","s.miller1011@hotmail.com","837","1996/02/19","0","CXO41YRA3GJ5LY7","2918238974");
INSERT INTO `FamilyMember` (`fName`,`lName`,`email`,`familyCode`,`DOB`,`approval`,`password`,`phone`)
VALUES
  ("Lionel","Griffin","g.lionel8090@yahoo.com","465","1990/01/08","1","GGM34PTN4IV4GW1","6451717577"),
  ("Calvin","Noble","n.calvin3419@hotmail.com","213","1998/09/30","1","FRO48SRH7MF8JS6","5767171058"),
  ("Hilda","Blankenship","hblankenship2906@hotmail.com","316","1986/08/02","1","ZRK43YSL3MV1SS3","2546736576"),
  ("Darryl","Carey","carey-darryl@gmail.com","431","1991/05/27","1","EIA96PFB8VY8QF6","7734574107"),
  ("Jerome","Stephens","stephensjerome@hotmail.com","129","1984/09/05","1","NKY47BJL8TX1QQ1","8611366618"),
  ("Chantale","Howell","howell-chantale8032@hotmail.com","435","1980/10/01","1","UKN58CJY8HK4WF4","5364428759"),
  ("Oprah","Ortega","ortega.oprah1084@hotmail.com","845","1996/12/15","1","FLM43HHN4HM8CS8","3413889682"),
  ("Eleanor","Brown","brown.eleanor@hotmail.com","794","1991/01/06","1","FUO86CQC0UN7QX4","4814831326"),
  ("Amal","Calderon","c_amal5321@hotmail.com","950","1992/10/03","0","KIO27ONN9PF6OC5","8356293928"),
  ("Callum","Owens","owens_callum8490@hotmail.com","565","1993/07/07","0","CGU98FSC6IS2IS0","6701399143");
INSERT INTO `FamilyMember` (`fName`,`lName`,`email`,`familyCode`,`DOB`,`approval`,`password`,`phone`)
VALUES
  ("Armand","Wilcox","warmand@hotmail.com","756","1990/01/21","1","CLW66XNM5ZQ4VE3","8936982765"),
  ("Fitzgerald","Hudson","hudson-fitzgerald6457@gmail.com","316","1990/06/09","1","EXU28KIF4KO3IO5","5392250078"),
  ("Freya","Hodges","h_freya4131@hotmail.com","902","1985/10/22","1","UIE23RYW4YE0NL8","0216266426"),
  ("Logan","Abbott","logan.abbott4999@gmail.com","256","1992/08/21","1","LRM28RQQ5BN8QH5","8250926255"),
  ("Cooper","Alvarado","a-cooper9445@hotmail.com","729","1988/12/20","1","WTG09GGQ9EL6LO7","8179515155"),
  ("Shellie","Mckay","mckay_shellie4596@hotmail.com","989","1995/08/23","1","VLV79EQF3VM4FN4","5147929254"),
  ("Kimberly","Michael","m_kimberly@yahoo.com","946","1996/10/08","1","XFI56MZG4KL5BI7","2736708739"),
  ("Armand","Mcneil","armand-mcneil@gmail.com","710","1985/03/25","1","EZB71EKX3LS1JU7","8194814531"),
  ("Paul","Weaver","paulweaver@yahoo.com","255","1984/12/06","0","WWE53QES8CS8RY7","6258740726"),
  ("Veda","Fry","veda_fry238@yahoo.com","779","1980/06/10","0","OJS78PYO5HH3RR5","8225753379");
INSERT INTO `FamilyMember` (`fName`,`lName`,`email`,`familyCode`,`DOB`,`approval`,`password`,`phone`)
VALUES
  ("Isaac","Leach","l.isaac6681@gmail.com","779","1995/10/09","1","KKT65MYE2JT7OE2","5698046507"),
  ("Venus","Giles","giles_venus@hotmail.com","171","1992/12/15","1","WST94VBY6ZK5WF6","4269184124"),
  ("Chava","Stein","s-chava3483@gmail.com","219","1984/07/12","1","RHS09MWC1KR6BK4","5906348976"),
  ("Stephanie","Hoover","s-hoover@gmail.com","738","1993/09/16","1","JMT82OVG5EN6CR7","1485219731"),
  ("Ariana","Vinson","avinson9963@gmail.com","383","1984/07/13","1","OUS57ODS7KY8UJ5","5734167566"),
  ("Dominique","Dawson","dominique.dawson@gmail.com","867","1983/07/04","1","RJA41TUT3EA5MQ1","8586659492"),
  ("Jorden","Combs","combs.jorden5796@hotmail.com","604","1981/12/15","1","DEM69HFK3CW5VO5","8101651281"),
  ("Tobias","Carroll","tobias.carroll8343@gmail.com","413","1991/09/07","1","NGG01CYQ1AT8XS0","6163041847"),
  ("Whoopi","O'donnell","w-odonnell@yahoo.com","952","1998/02/20","0","PRK09HGB8NA6GS3","4285788329"),
  ("Murphy","Sweet","s-murphy@yahoo.com","355","1996/05/24","0","XCB82EOR3SY8KG1","8783744553");
