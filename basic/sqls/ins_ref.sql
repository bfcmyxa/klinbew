INSERT INTO `user`(`name`, `email`, `password`, `creationDate`, `modified`, `accessLevel`) VALUES ('first','dasdas@blabla.net','dasdas',CURDATE(), CURDATE(), 1);
INSERT INTO `user`(`name`, `email`, `password`, `creationDate`, `modified`, `accessLevel`) VALUES ('second','dasdas@blabla.net','dasdas',CURDATE(), CURDATE(), 1);
INSERT INTO `user`(`name`, `email`, `password`, `creationDate`, `modified`, `accessLevel`) VALUES ('third','dasdas@blabla.net','dasdas',CURDATE(), CURDATE(), 1);
INSERT INTO `user`(`name`, `email`, `password`, `creationDate`, `modified`, `accessLevel`) VALUES ('fifth','dasdas@blabla.net','dasdas',CURDATE(), CURDATE(), 1);
INSERT INTO `user`(`name`, `email`, `password`, `creationDate`, `modified`, `accessLevel`) VALUES ('fourth','dasdas@blabla.net','dasdas',CURDATE(), CURDATE(), 1);
INSERT INTO `reference`(`name`, `file`, `version`) VALUES ('zweckbestimmung', 'c:\\blabla\\zweck.pdf', 3);
INSERT INTO `reference`( `name`, `file`, `version`) VALUES ('risikoanalyse', 'c:\\blabla\\risiko.pdf', 2);
INSERT INTO `reference`( `name`, `file`, `version`) VALUES ('sopklinbew', 'c:\\blabla\\sopklinew.pdf', 12);
INSERT INTO `reference`( `name`, `file`, `version`) VALUES ('glossar', 'c:\\blabla\\glossar.pdf', 55);
INSERT INTO `reference`( `name`, `file`, `version`) VALUES ('ttes5', 'c:\\blabla\\321312.pdf', 33);
INSERT INTO `reference`( `name`, `file`, `version`) VALUES ('test6', 'c:\\blabla\\lossar66.pdf', 11);
INSERT INTO `reference`( `name`, `file`, `version`) VALUES ('rwearwr7', 'c:\\blabla\\rwearwr7.pdf', 22);
INSERT INTO `reference`( `name`, `file`, `version`) VALUES ('testest8', 'c:\\blabla\\testest8.pdf', 3123);
INSERT INTO `project`(`projectid`, `title`, `alias`, 
					`status`, `createdBy`, `creationDate`,
					`modifyDate`, `fileName`, `productName`,
					`dokumentVersion`, `productVersion`, `referenceProjectId`, `productDescription`) 
		VALUES (1,'First Project','blabnla','teststatus',
				2, 12-06-2014,13-06-2014,'testfilename',
				'name_des_produkts',21,1,1,'some product description');