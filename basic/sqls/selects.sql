SELECT `project`.`title`, `reference`.`name`, `reference`.`file` FROM `project`,`reference`,`referenceproject` WHERE `project`.`projectid` = `referenceproject`.`projectId` AND `referenceproject`.`referenceid` = `reference`.`referenceid`