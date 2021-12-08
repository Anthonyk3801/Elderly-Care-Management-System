DROP TABLE IF EXISTS `Employee`;

CREATE TABLE `Employee` (
  `employeeID` int(5) NOT NULL, -- employeeID will have 5 digits.
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL, -- Employee Roles are 1 - 4 (Admin(1), Supervisor(2), Doctor(3), Caregiver(4))
  `salary` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `password` varchar(50) NOT NULL, -- password will be alphanumeric of 15 digits.
  `approval` int(1) NOT NULL, -- approval will be yes(1) OR no(0). Everyone on this test data is set at 1.
  `phone` bigint(10) DEFAULT NULL
);

-- 6 Supervisors
INSERT INTO `Employee` (`employeeID`,`fName`,`lName`,`role`,`salary`,`email`,`DOB`,`password`,`approval`,`phone`)
VALUES
  (12215,"Garth","Villarreal","Supervisor",92466.37,"g.villarreal9458@yahoo.com","1968/04/01","KIG95BDZ1TN6IF2",1,3271865639),
  (70518,"Nevada","Howell","Supervisor",160692.82,"n_howell@gmail.com","1969/08/31","GWF28JPS3UO3NM3",1,8627243137),
  (24273,"Tamekah","Chavez","Supervisor",66297.87,"tamekah.chavez8950@hotmail.com","1971/11/19","TBO35LEC2ON3VY3",1,3672051389),
  (98865,"Selma","Stevenson","Supervisor",105528.38,"sstevenson@gmail.com","1975/02/14","WLY83XCQ1JU0YT9",1,3557745867),
  (43422,"Ima","Leonard","Supervisor",61842.51,"lima@gmail.com","1976/10/15","BAT77YEV2BK7IF3",1,6072765863),
  (67788,"Nell","Blair","Supervisor",100664.77,"n.blair4604@yahoo.com","1962/12/30","KPV28XDP2KB9XV0",1,4252923459);

-- 12 Doctors
INSERT INTO `Employee` (`employeeID`,`fName`,`lName`,`role`,`salary`,`email`,`DOB`,`password`,`approval`,`phone`)
VALUES
  (65855,"August","Larson","Doctor",154149.81,"a-larson@gmail.com","1960/08/23","USR44SUI5NE6MS4",1,6336712247),
  (21555,"Lacota","Rich","Doctor",170756.94,"lacota.rich1162@gmail.com","1965/11/21","BBY81KVZ0AZ9LX7",1,4436677736),
  (76446,"Dorian","Dickson","Doctor",115597.51,"dorian.dickson585@gmail.com","1968/01/11","VAT34FEB9UW5QK7",1,7985127243),
  (31216,"Hakeem","Berry","Doctor",151573.18,"h-berry@hotmail.com","1974/03/18","ABC16JNF4RX0SR7",1,1068835875),
  (35622,"Brett","Lowery","Doctor",169560.24,"lowery.brett3691@gmail.com","1962/08/27","RHU79GFN3JP3TL8",1,5626385793),
  (51416,"Winifred","Holcomb","Doctor",146588.35,"winifredholcomb104@yahoo.com","1972/06/02","JZF45JIH2RC0VP8",1,0720341459),
  (36653,"Laurel","Gregory","Doctor",129828.49,"l_gregory@gmail.com","1975/06/07","CJD87AIY5MT8JD1",1,8145320458),
  (55582,"Reese","Crawford","Doctor",172413.57,"crawfordreese@hotmail.com","1963/06/30","BJU36ZKJ2KX3WO7",1,2672286130),
  (51846,"Reese","Hatfield","Doctor",169028.77,"reese-hatfield836@hotmail.com","1968/04/18","MRK87UAC8MU7VB6",1,8586313201),
  (83361,"Janna","Campbell","Doctor",131604.05,"campbell_janna@hotmail.com","1960/05/21","QXU82HPH9QP0WW7",1,0435871951),
  (32885,"Orson","Hogan","Doctor",131724.98,"o_hogan@hotmail.com","1964/12/04","TMQ76IAR4NR1QY4",1,7537765129),
  (18264,"Alan","Ward","Doctor",176519.14,"alanward1389@hotmail.com","1973/10/21","KCQ58MGK2YS5DT2",1,7613259817);

  -- 24 Caregivers
  INSERT INTO `Employee` (`employeeID`,`fName`,`lName`,`role`,`salary`,`email`,`DOB`,`password`,`approval`,`phone`)
  VALUES
    (63396,"Farrah","Stein","Caregiver",30427.25,"stein-farrah4086@hotmail.com","1984/01/22","XYW38ABQ7WH7AL7",1,2455355358),
    (47471,"Catherine","Jenkins","Caregiver",30562.03,"c.jenkins3718@yahoo.com","1992/10/15","XAG98SLF3QX9PY6",1,7026439804),
    (50855,"Clare","Rocha","Caregiver",30949.15,"clare_rocha2226@hotmail.com","1985/05/24","BSA31LYS9UH6LJ4",1,8553583725),
    (25379,"Harrison","Holt","Caregiver",32153.98,"h-harrison@yahoo.com","1993/11/15","MSN78THY9NV7NM0",1,5512724373),
    (63374,"Madeson","Morrow","Caregiver",26755.47,"morrow.madeson9678@yahoo.com","1992/05/29","ROA83KQT8MO3YD9",1,1685947447),
    (63423,"Madison","Martin","Caregiver",31417.54,"m-martin9326@hotmail.com","1989/10/30","NDN60KRR0FY1KF5",1,1332271277),
    (43546,"Quamar","Benton","Caregiver",26619.45,"q.benton9452@yahoo.com","1992/08/08","UWB54FTH4RM9JI6",1,9346468619),
    (88306,"Rogan","Chang","Caregiver",29335.11,"chang.rogan9299@gmail.com","1986/10/11","VEF60YDB6YO8VH4",1,5863522657),
    (81474,"Jillian","Camacho","Caregiver",27894.50,"camacho.jillian@hotmail.com","1981/03/12","UNO90TUY8QU2SI7",1,2111091588),
    (13835,"Zorita","Ballard","Caregiver",27527.30,"ballard.zorita8583@yahoo.com","1990/01/11","JRO63JBR8YJ2EI1",1,2211749444),
    (47127,"Alana","Lynn","Caregiver",30469.65,"a.lynn2214@hotmail.com","1990/05/23","KXP01PLW7ID9AQ4",1,4876181721),
    (10995,"Nell","Rivers","Caregiver",30454.63,"n.rivers@gmail.com","1985/08/02","DQY62ZJX1GJ6HD8",1,3211329264),
    (76318,"Nyssa","William","Caregiver",28680.74,"w.nyssa@yahoo.com","1993/08/28","UJB31HLP7PM3OV9",1,1110887796),
    (98174,"Perry","Spence","Caregiver",30590.69,"s.perry@gmail.com","1994/08/16","AYO60ZLY6VG3UG9",1,5355268922),
    (78209,"Vivian","Gamble","Caregiver",32409.58,"vgamble7967@yahoo.com","1993/06/17","MTK37TDP8DD7ZG5",1,0036425433),
    (72635,"Gage","Stark","Caregiver",27007.26,"g.stark7297@yahoo.com","1986/09/01","SJP12NMC9GD3JM5",1,5635813924),
    (66266,"Joan","Mcgowan","Caregiver",31123.80,"mcgowanjoan9549@hotmail.com","1984/09/03","WEO93TIB0LQ8VM8",1,7652387118),
    (33946,"Igor","Chan","Caregiver",30977.30,"igorchan@hotmail.com","1981/01/18","QPQ94USE1LJ3SO8",1,6957527518),
    (77440,"Isabella","Huff","Caregiver",26515.44,"h.isabella@hotmail.com","1991/01/14","IPS48RXB1AW6DW2",1,3432753220),
    (81959,"Montana","Hayden","Caregiver",30622.64,"hayden-montana@gmail.com","1987/12/21","TUU73WTZ4CM4PZ3",1,2588272298),
    (80561,"Lance","Moody","Caregiver",26458.08,"l.moody@gmail.com","1984/07/24","OGZ63MNF5JG1CX2",1,6402699111),
    (82808,"Cara","Vargas","Caregiver",29667.81,"cvargas9813@yahoo.com","1986/09/17","HVY62RYH1QV5PA2",1,2466383449),
    (33836,"Cullen","Curry","Caregiver",32456.46,"currycullen69@gmail.com","1983/11/13","HNY35SFQ6XD4PC7",1,6752835142),
    (11597,"Clio","Parks","Caregiver",30759.20,"p-clio@gmail.com","1987/01/16","VPK51QED9NI9DJ7",1,9912724074);
