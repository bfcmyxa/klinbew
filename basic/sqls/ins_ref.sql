
INSERT INTO `reference`(`referenceId`, `name`, `file`, `version`) VALUES (1, 'zweckbestimmung', 'c:\blabla\zweck.pdf', 3);
INSERT INTO `reference`(`referenceId`, `name`, `file`, `version`) VALUES (2, 'risikoanalyse', 'c:\blabla\risiko.pdf', 2);
INSERT INTO `reference`(`referenceId`, `name`, `file`, `version`) VALUES (3, 'sopklinbew', 'c:\blabla\sopklinew.pdf', 12);
INSERT INTO `reference`(`referenceId`, `name`, `file`, `version`) VALUES (4, 'glossar', 'c:\blabla\glossar.pdf', 55);
INSERT INTO `reference`(`referenceId`, `name`, `file`, `version`) VALUES (5, 'ttes5', 'c:\\blabla\\321312.pdf', 33);
INSERT INTO `reference`(`referenceId`, `name`, `file`, `version`) VALUES (6, 'test6', 'c:\\blabla\\lossar66.pdf', 11);
INSERT INTO `reference`(`referenceId`, `name`, `file`, `version`) VALUES (7, 'rwearwr7', 'c:\\blabla\\rwearwr7.pdf', 22);
INSERT INTO `reference`(`referenceId`, `name`, `file`, `version`) VALUES (8, 'testest8', 'c:\\blabla\\testest8.pdf', 3123);

INSERT INTO `user`(`userid`, `name`, `email`, `passoword`, `creationDate`, `modified`, `accessLevel`) 
		VALUES (2,'ivanp','ivanp@blabla.com','password',10-01-2015,10-01-2015,1);

INSERT INTO `project`(`projectid`, `title`, `alias`, 
					`status`, `createdBy`, `creationDate`,
					`modifyDate`, `fileName`, `productName`,
					`dokumentVersion`, `productVersion`, `referenceProjectId`, `productDescription`) 
		VALUES (1,'First Project','blabnla','teststatus',
				2, 12-06-2014,13-06-2014,'testfilename',
				'name_des_produkts',21,1,1,'some product description');