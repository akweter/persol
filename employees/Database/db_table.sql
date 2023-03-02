/** Create Database Table **/
create database persol;

use persol;

CREATE TABLE `staffs_details`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `idNumber` varchar(125),
    `idType` varchar(125),
    `email` varchar(125),
    `firstName` varchar(125),
    `lastName` varchar(125),
    `mobile` varchar(125),
    `residence` varchar(125),
    `field` varchar(125),
    `date` date,
    `department`  varchar(125),
    `team`  varchar(125),
    `staffId`  varchar(125),
    `bankName`  varchar(125),
    `bankAccount`  varchar(125),
    `educationLevel`  varchar(125),
    `hometown`  varchar(125),
    `digitalAddress`  varchar(125),
    `experienceYears`  varchar(125),
    `experience` varchar(125),
    `passwd` varchar(125),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `staffs_details`( `id`, `idNumber`, `idType`, `email`, `firstName`, `lastName`, `mobile`, `residence`, `field`, `date`, `department`, `team`, `staffId`, `bankName`, `bankAccount`, `educationLevel`, `hometown`, `digitalAddress`, `experienceYears`, `experience`, `passwd`) VALUES ('', 45125, 'Ecowas Card', 'james@akweer.mail', 'James', 'Akweter', '0540544762', 'Ablekuma', 'Web Development', '2000-11-25', 'Cybersecurity', 'Rapid Response Team', 's5464r6swex', 'Commercial Bank', '1011452410', 'SHS', 'Juaso', 'GC-098-987', '5', 'yes', 'True12');

