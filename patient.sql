DROP TABLE IF EXISTS Patient;

CREATE TABLE `Patient` (
  `patientID` int(5) NOT NULL, -- patientID will have 5 digits.
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `admissionDate` date NOT NULL,
  `groupID` int(1) NOT NULL, -- groupID are 1 to 4.
  `familyCode` int(3) NOT NULL,
  `emergencyContactName` varchar(50) NOT NULL,
  `emergencyContactNumber` bigint(10) DEFAULT NULL,
  `emergencyContactRelation` varchar(50) NOT NULL, -- We have Sibling and Child as of right now...
  `email` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `password` varchar(15) NOT NULL, -- password will be alphanumeric of 15 digits.
  `approval` int(1) NOT NULL, -- approval will be yes(1) OR no(0). Beware that some are set as 0.
  `totalDues` decimal(10,2) NOT NULL,
  `phone` bigint(10) DEFAULT NULL
);

-- `role` Patient Role is 5.
-- 40 Patients
-- 32 Approved & 8 No-Approved as a whole.
-- 8 Approved & 2 No-Approved per each groupID
INSERT INTO `Patient` (`patientID`,`fName`,`lName`,`admissionDate`,`groupID`,`familyCode`,`emergencyContactName`,`emergencyContactNumber`,`emergencyContactRelation`,`email`,`DOB`,`password`,`approval`,`totalDues`,`phone`)
VALUES
  ("9789738","Lavinia","Ball","2010/11/18",1,"218","Ina Wise","2876868017","Child","ball_lavinia@yahoo.com","1931/10/10","ZNJ95OQV0FU1BM5","1","580.61","1378867584"),
  ("7898046","Geoffrey","Molina","2017/09/07",1,"462","Zachary Hayes","7932370560","Child","g.molina1366@yahoo.com","1940/10/04","MBQ91ZPI7RJ0CA6","1","178.54","0884164814"),
  ("7355057","Xenos","Cortez","2014/08/12",1,"398","Amanda Mayo","4169784507","Child","x-cortez7826@hotmail.com","1941/12/12","ZBB47GZS5FN5WW7","1","757.39","3650276103"),
  ("2217777","Pearl","Cook","2020/08/07",1,"602","Stella Dejesus","2351075348","Sibling","p-cook3454@gmail.com","1936/10/14","KAT38MVK9CG7FA8","1","21.83","4565115322"),
  ("6864168","Lacey","Travis","2014/01/04",1,"852","Rama Camacho","3488965856","Sibling","travislacey2788@hotmail.com","1929/05/15","SCA14CJW4CY8TR9","1","441.45","4139752272"),
  ("7365354","Dustin","Chapman","2018/03/28",1,"854","Burke Hopper","7184252970","Child","dchapman889@yahoo.com","1950/12/20","XSB69ZJK8FM5FL3","1","896.07","9878532033"),
  ("1485529","Ian","Montgomery","2018/11/16",1,"440","Coby Waller","4424226893","Sibling","m.ian@yahoo.com","1925/07/02","FXZ17OYI8XM8YO3","1","554.07","2372427726"),
  ("9273735","Cullen","Head","2017/07/15",1,"997","Rahim Cortez","5392372672","Sibling","headcullen@yahoo.com","1945/10/08","MLA30FGP8RD6NG9","1","922.88","1796117540"),
  ("7449148","Nicole","Maxwell","2013/05/16",1,"173","Louis Rodriquez","5647791021","Child","mnicole@yahoo.com","1938/02/12","LWI81NWZ1UD3NY1","0","211.74","5681272383"),
  ("5182359","Doris","Kirkland","2017/11/18",1,"484","Flavia Vincent","5533426731","Sibling","doris-kirkland2329@hotmail.com","1938/06/27","YXO69WOE9OP9JY6","0","486.92","3167169832");
INSERT INTO `Patient` (`patientID`,`fName`,`lName`,`admissionDate`,`groupID`,`familyCode`,`emergencyContactName`,`emergencyContactNumber`,`emergencyContactRelation`,`email`,`DOB`,`password`,`approval`,`totalDues`,`phone`)
VALUES
  ("7600483","Hayley","Jacobson","2013/08/31",2,"252","Maisie Parks","3712037876","Child","h-jacobson@hotmail.com","1932/02/10","TKB30FIS7FY2EA4","1","912.94","3674376887"),
  ("6419795","Dennis","Baldwin","2012/08/05",2,"607","Merritt Lara","9671726857","Sibling","baldwin-dennis@yahoo.com","1940/11/28","UPD38BVU8IX9KL2","1","607.39","5833883147"),
  ("1094435","Courtney","Boyle","2012/12/29",2,"161","Samson Cervantes","4001542859","Child","b-courtney9774@yahoo.com","1941/01/09","OCR49NBP3QW2PY6","1","535.89","8226228338"),
  ("2419576","Elaine","Ramos","2011/09/28",2,"767","Benedict Montgomery","5356847267","Child","ramos_elaine1828@hotmail.com","1923/09/23","LTE81GYA2CJ6NT2","1","452.60","9435172835"),
  ("8407658","Dale","Blackburn","2020/05/17",2,"140","Zoe Lang","4695573166","Sibling","dblackburn@yahoo.com","1953/12/04","VLY15NJY1GZ4JT7","1","872.62","2755031165"),
  ("3090413","Brennan","Cline","2020/03/26",2,"520","Tobias Moses","8569751304","Child","clinebrennan817@gmail.com","1945/05/10","LVS60NLN1FH6AN2","1","771.98","8466345423"),
  ("0152423","Noah","Cross","2019/01/21",2,"758","Reed Palmer","3299617248","Sibling","cnoah4363@gmail.com","1924/11/29","HHX08EJH6VF0YM9","1","504.60","8767878876"),
  ("8579802","Raya","Le","2015/05/20",2,"169","Sybill Hunter","7053738465","Sibling","l-raya988@yahoo.com","1944/10/11","VNC17WYL3MX8DM8","1","229.52","2675706505"),
  ("5385222","Benedict","Fischer","2017/03/26",2,"793","Adele Conley","7582753266","Sibling","fischer-benedict@yahoo.com","1951/10/15","STP89ROG8NP8OS4","0","988.41","2288278584"),
  ("5143347","Sage","Wilcox","2020/03/03",2,"654","Savannah Frye","4293761156","Sibling","w-sage8281@yahoo.com","1939/04/20","XOJ86IRO6QO8UX8","0","409.59","5666817184");
INSERT INTO `Patient` (`patientID`,`fName`,`lName`,`admissionDate`,`groupID`,`familyCode`,`emergencyContactName`,`emergencyContactNumber`,`emergencyContactRelation`,`email`,`DOB`,`password`,`approval`,`totalDues`,`phone`)
VALUES
  ("4467635","Buckminster","Buchanan","2011/05/15",3,"160","Hall Harris","5621112338","Child","b-buchanan3490@hotmail.com","1933/07/10","HRJ00RTY4YH6OQ6","1","687.16","2436816548"),
  ("2906673","Drake","Hamilton","2011/08/15",3,"684","Brianna Warren","8398288262","Child","dhamilton@hotmail.com","1932/08/02","NSS90ZIN2RR5CP8","1","455.92","4223345182"),
  ("6385359","Charissa","Mckee","2016/12/25",3,"653","Amelia Goodman","3226364207","Child","mckeecharissa@hotmail.com","1924/09/23","TBF10HGP5SH3LF4","1","736.42","5664638374"),
  ("0758233","Nasim","Pate","2021/06/18",3,"659","Katell Stokes","1056231175","Child","pate_nasim7122@yahoo.com","1938/12/22","YLS41PTJ1CF6JK1","1","970.07","0268464255"),
  ("5538570","Byron","Guerrero","2021/09/29",3,"310","Lawrence Cobb","3753731488","Sibling","byron_guerrero@hotmail.com","1939/01/01","EID82UGE0UQ7WU3","1","997.17","0644538387"),
  ("4792876","Regan","Davis","2019/01/08",3,"389","Wylie Park","1856952318","Sibling","r-davis7583@yahoo.com","1935/07/04","BUB16RCE9LK6QE8","1","244.30","6867675592"),
  ("4245268","Dorothy","Travis","2012/06/16",3,"241","Chaim Banks","8873693692","Child","dorothy-travis@yahoo.com","1934/05/18","FFA32KBA6WO6KR2","1","385.99","0256333887"),
  ("9238665","Ursula","Gamble","2012/03/03",3,"178","Guinevere Mccormick","4441542266","Sibling","gamble.ursula@yahoo.com","1926/01/21","WVB11EBL8XO1XZ1","1","515.53","2258457430"),
  ("4568667","August","Haley","2021/02/06",3,"397","Marvin Fields","0526272864","Child","a.haley2578@gmail.com","1947/05/14","OSR85WUF5CT9SO7","0","834.80","2248188617"),
  ("6285936","Macaulay","Christensen","2011/02/12",3,"867","Kiona Wolf","7425647337","Child","c.macaulay8964@hotmail.com","1949/09/04","HCX46YLD3JQ2WQ7","0","725.56","4366372646");
INSERT INTO `Patient` (`patientID`,`fName`,`lName`,`admissionDate`,`groupID`,`familyCode`,`emergencyContactName`,`emergencyContactNumber`,`emergencyContactRelation`,`email`,`DOB`,`password`,`approval`,`totalDues`,`phone`)
VALUES
  ("4354144","Kirby","Riley","2016/07/06",4,"597","Knox Crosby","4055524147","Sibling","k-riley@hotmail.com","1950/10/29","LUS88LVT9DH0KL1","1","400.56","3007186236"),
  ("4481223","Cairo","Harper","2020/12/23",4,"413","Jorden Avery","7755471145","Child","charper3897@gmail.com","1943/06/14","MOO43DOY7PK5JN3","1","29.82","2477203326"),
  ("1063932","Daphne","Delacruz","2018/07/31",4,"657","Athena Raymond","5834269868","Sibling","delacruz-daphne@gmail.com","1930/09/12","JNF15ETP3SZ5RU2","1","842.17","5732154286"),
  ("2188577","Lois","Battle","2020/01/10",4,"478","Avram Maldonado","7868332453","Sibling","l.battle@hotmail.com","1943/11/16","XZO54FFD7HP1EB7","1","996.73","1427386829"),
  ("4446126","Chaney","Delacruz","2012/07/07",4,"401","Reagan Wolfe","3728002632","Child","c_delacruz@yahoo.com","1950/08/08","EFY74JKL2OG6YQ0","1","965.31","4361873274"),
  ("6535186","Oren","Rosario","2019/01/09",4,"214","Flynn Boyd","7725288452","Sibling","orosario@yahoo.com","1943/01/09","GNW90OKM2FL8TC4","1","691.82","6536607246"),
  ("7013639","Talon","Atkinson","2012/02/16",4,"707","Vaughan Benton","8141273367","Sibling","t-atkinson@yahoo.com","1935/05/02","COF82FOD5NI6UV3","1","605.82","4775747974"),
  ("3204658","Ahmed","Byers","2014/05/31",4,"696","Kathleen Booth","6743193526","Child","byers-ahmed6338@gmail.com","1935/11/25","HRC16FTP3GF6AB7","1","8.09","3713871529"),
  ("6438730","Maia","Spence","2021/02/19",4,"337","Inga Good","4536393722","Sibling","spencemaia7773@hotmail.com","1924/06/03","TNM35WYK2FP3TP8","0","884.06","8959555685"),
  ("6092225","Hilda","Gross","2011/07/07",4,"807","Maite Everett","1927545409","Child","hildagross4186@gmail.com","1928/03/31","EFN58BEA0MD3EQ4","0","523.56","1103573259");
