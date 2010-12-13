# Sequel Pro dump
# Version 1630
# http://code.google.com/p/sequel-pro
#
# Host: 127.0.0.1 (MySQL 5.1.45)
# Database: todo2
# Generation Time: 2010-09-03 22:29:53 -0400
# ************************************************************

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table files
# ------------------------------------------------------------

DROP TABLE IF EXISTS `files`;

CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT NULL,
  `file_name` varchar(50) DEFAULT NULL,
  `file_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` (`id`,`task_id`,`file_name`,`file_type`)
VALUES
	(1,NULL,NULL,NULL),
	(2,20,'my_avatar.jpg','image/jpeg'),
	(3,21,'grass.png','image/png'),
	(4,34,'grass1.png','image/png'),
	(5,41,'greener_grass.png','image/png'),
	(6,41,'ci_logo.jpg','image/jpeg'),
	(7,46,'synthetic_theme_pic.png','image/png'),
	(8,51,'Yamidoo_WordPress_Theme.png','image/png'),
	(9,60,'plane.jpg','image/jpeg'),
	(10,62,'four.png','image/png'),
	(11,74,'four1.png','image/png');

/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tasks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tasks`;

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `details` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` (`id`,`user_id`,`title`,`details`)
VALUES
	(60,6,'Hey there, I love codeigniter','It requires very little configuration, fully supports UTF-8 and I18N, and provides many of the tools that a developer needs within a highly flexible system. The integrated class auto-loading, cascading filesystem, highly consistent API, and easy integration with vendor libraries make it viable for any project, large or small.'),
	(4,1,'Go to the bank','Go to the bank and make a deposit. Also need to make a funds transfer from checking into savings. Order new checks at the teller window'),
	(61,2,'Creating a Web Poll with PHP','Polls are nearly ubiquitous on the web today, and there are plenty of services that will provide a drop-in poll for you. But what if you want to write one yourself? This tutorial will take you through the steps to create a simple PHP-based poll, including database setup, vote processing, and displaying the poll.'),
	(55,4,'real estate agency ','real estate agencies. real estate agencies. real estate agencies. real estate agencies. real estate agencies. real estate agencies. real estate agencies. real estate agencies. '),
	(56,1,'77 real estate agency ','real estate agency real estate agency 77 real estate agency '),
	(57,1,'77 real estate agency ','real estate agency real estate agency 77 real estate agency '),
	(58,4,'uploadify ','A function that triggers for each element selected. The default event handler generates a 6 character random string as the unique identifier for the file item and creates a file queue item for the file. The default event handler will not trigger if the value of your custom function returns false.\n\nThree arguments are passed to the function:\nevent: The event object.\nqueueID: The unique identifier of the file that was selected.\nfileObj: An object containing details about the file that was selected.'),
	(59,4,'uploadify ','A function that triggers for each element selected. The default event handler generates a 6 character random string as the unique identifier for the file item and creates a file queue item for the file. The default event handler will not trigger if the value of your custom function returns false.\n\nThree arguments are passed to the function:\nevent: The event object.\nqueueID: The unique identifier of the file that was selected.\nfileObj: An object containing details about the file that was selected.'),
	(52,3,'Yamidoo WordPress Theme2 ','Yamidoo WordPress Theme Yamidoo WordPress Theme Yamidoo WordPress Theme Yamidoo WordPress Theme Yamidoo WordPress Theme Yamidoo WordPress Theme Yamidoo WordPress Theme Yamidoo WordPress Theme Yamidoo WordPress Theme Yamidoo WordPress Theme Yamidoo WordPress Theme '),
	(53,1,'Real Estate','Estate is a hugely powerful, yet simple to manage business ?theme? built specifically for real estate agencies. Built on the WooFramework it boasts advanced SEO control, clean code and styling modification features. Making use of WordPress 3.0&#8242;s custom post types and taxonomies the theme unleashes a new ?Properties? management facility when installed ? proving it?s far more than just a WordPress theme, it?s a web solution. With flexible page templates, an advanced search facility that allows you to drill down into properties based on very specific criteria, Google Maps integration and smart property images management you?ll find huge value in the modest price tag.'),
	(54,1,'Real Estate','Estate is a hugely powerful, yet simple to manage business ?theme? built specifically for real estate agencies. Built on the WooFramework it boasts advanced SEO control, clean code and styling modification features. Making use of WordPress 3.0&#8242;s custom post types and taxonomies the theme unleashes a new ?Properties? management facility when installed ? proving it?s far more than just a WordPress theme, it?s a web solution. With flexible page templates, an advanced search facility that allows you to drill down into properties based on very specific criteria, Google Maps integration and smart property images management you?ll find huge value in the modest price tag.'),
	(18,3,'We need to get going on Steve Harvey','The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).'),
	(21,4,'Another green grass day','industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
	(51,6,'Yamidoo WordPress Theme ','Yamidoo WordPress Theme is the more sophisticated and PRO version of the previous theme from WPZoom. The theme can turn your magazine layout to a business theme. The nice looking theme has features like content feature slider in homepage, tabbed widgets, drop down navigation menu, theme option panel and more.'),
	(22,2,'Will this work out???','It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
	(50,6,'Perihelion','The all new Perihelion theme features an incredibly stylistic and unique design to add that special touch to your sites. Colorful textures and intricate design elements create an amazing array of layout options and combinations to provide a brand new look and feel. Perihelion not only features a unique design, but it also offers the'),
	(47,6,'Auzora ','Auzora is One Page Portfolio WordPress Theme. Comes with massive admin features. Are you tired to see a lot of one page wordpress theme use scrollable effect when change the page? Then check the auzora live preview..'),
	(48,6,'Auzora ','Auzora is One Page Portfolio WordPress Theme. Comes with massive admin features. Are you tired to see a lot of one page wordpress theme use scrollable effect when change the page? Then check the auzora live preview..'),
	(49,6,'Perihelion','The all new Perihelion theme features an incredibly stylistic and unique design to add that special touch to your sites. Colorful textures and intricate design elements create an amazing array of layout options and combinations to provide a brand new look and feel. Perihelion not only features a unique design, but it also offers the'),
	(46,6,'Synthetik  theme','Synthetik is a theme for WordPress. The theme design was developed for users who appreciate visual browsing and a minimal layout. The theme can been used to create everything from e-commerce sites, portfolio sites, and everything in between.'),
	(44,4,'Functional specifications','A functional specification (also, functional spec, specs, functional specifications document (FSD), or Program specification) in systems engineering and software development is the documentation that describes the requested behavior of an engineering system. The documentation typically describes what is needed by the system user as well as requested properties of inputs and outputs (e.g. of the software system).'),
	(45,5,'Avoid duplication and inconsistencies','In systems engineering a specification is a document that clearly and accurately describes the essential technical requirements for items, materials, or services including the procedures by which it can be determined that the requirements have been met. Specifications help avoid duplication and inconsistencies, allow for accurate estimates of necessary work and resources, act as a negotiation and reference document for engineering changes, provide documentation of configuration, and allow for consistent communication among those responsible for the eight primary functions of Systems Engineering. They provide a precise idea of the problem to be solved so that they can efficiently design the system and estimate the cost of design alternatives. They provide guidance to testers for verification (qualification) of each technical requirement.[1]'),
	(43,3,'database debate','There is an ongoing debate on the extent to which the writing of programs is an art, a craft or an engineering discipline.[1] In general, good programming is considered to be the measured application of all three, with the goal of producing an efficient and evolvable software solution (the criteria for \"efficient\" and \"evolvable\" vary considerably). The discipline differs from many other technical professions in that programmers, in general, do not need to be licensed or pass any standardized (or governmentally regulated) certification tests in order to call themselves \"programmers\" or even \"software engineers.\" However, representing oneself as a \"Professional Software Engineer\" without a license from an accredited institution is illegal in many parts of the world.[citation needed] However, because the discipline covers many areas, which may or may not include critical applications, it is debatable whether licensing is required for the profession as a whole. In most cases, the discipline is self-governed by the entities which require the programming, and sometimes very strict environments are defined (e.g. United States Air Force use of AdaCore and security clearance).'),
	(42,2,'Computer programming or coding','Computer programming (often shortened to programming or coding) is the process of designing, writing, testing, debugging / troubleshooting, and maintaining the source code of computer programs. This source code is written in a programming language. The code may be a modification of an existing source or something completely new. The purpose of programming is to create a program that exhibits a certain desired behaviour (customization). The process of writing source code often requires expertise in many different subjects, including knowledge of the application domain, specialized algorithms and formal logic.'),
	(34,1,'So far Georgia, New York','Some users of the EPPICard have fallen victim to one of a variety of Internet scams, prompting the state governments using the card to publish a long series of safety tips and precautions. The most direct threat against EPPICard holders are so-called \"phishing\" attacks. A phishing email requests that users log in to verify their account status, but directs them to a phony site where their log in information can be captured. So far Georgia, New York, Ohio, and Florida appear to be targeted, with states issuing warnings to the card users to beware of the scam.'),
	(41,3,'CodeIgniter','CodeIgniter is an Application Development Framework - a toolkit - for people who build web sites using PHP. Its goal is to enable you to develop projects much faster than you could if you were writing code from scratch, by providing a rich set of libraries for commonly needed tasks, as well as a simple interface and logical structure to access these libraries. CodeIgniter lets you creatively focus on your project by minimizing the amount of code needed for a given task.'),
	(40,1,'asdfsdfasdfasdf','asdfasdfasdfasdfasdf'),
	(62,2,'Creating a Web Poll with PHP','Polls are nearly ubiquitous on the web today, and there are plenty of services that will provide a drop-in poll for you. But what if you want to write one yourself? This tutorial will take you through the steps to create a simple PHP-based poll, including database setup, vote processing, and displaying the poll.'),
	(63,1,'Mingle WordPress Plugin','The simple way to turn your WordPress blog into a Social Network. Mingle uses your standard WordPress website and standard WordPress theme to create profile pages, user friending, profile page posts, profile activities, social comments, email notifications (with privacy settings) and a full directory of members. So go ahead and try it out ? give your users a more social experience on your website!'),
	(64,6,'this is my new uploader','this is a simple and complete function and \n    the easyest way i have found to allow you \n    to add an image to a form that the user can \n    verify before submiting \n\n    if the user do not want this image and change \n    his mind he can reupload a new image and we \n    will delete the last \n\n    i have added the debug if !move_uploaded_file \n    so you can verify the result with your \n    directory and you can use this function to \n    destroy the last upload without uploading \n    again if you want too, just add a value... '),
	(65,5,'this is my new uploader 2','this is a simple and complete function and \n    the easyest way i have found to allow you \n    to add an image to a form that the user can \n    verify before submiting \n\n    if the user do not want this image and change \n    his mind he can reupload a new image and we \n    will delete the last \n\n    i have added the debug if !move_uploaded_file \n    so you can verify the result with your \n    directory and you can use this function to \n    destroy the last upload without uploading \n    again if you want too, just add a value... '),
	(66,3,'add an image','add an image to a form that the user can verify before submiting if the user do not want this image and change his mind he can reupload a new image and we will delete the last i have added the debug if !move_uploaded_file so you can verify the result with your directory and you can use this function to destroy the last upload without uploading again if you want too, just add a value...\n\nPosted For: John Doe'),
	(67,5,'this is my new uploader5','this is a simple and complete function and \n    the easyest way i have found to allow you \n    to add an image to a form that the user can \n    verify before submiting \n\n    if the user do not want this image and change \n    his mind he can reupload a new image and we \n    will delete the last \n\n    i have added the debug if !move_uploaded_file \n    so you can verify the result with your \n    directory and you can use this function to \n    destroy the last upload without uploading \n    again if you want too, just add a value... '),
	(68,5,' uploader test','this is a simple and complete function and \n    the easyest way i have found to allow you \n    to add an image to a form that the user can \n    verify before submiting \n\n    if the user do not want this image and change \n    his mind he can reupload a new image and we \n    will delete the last \n\n    i have added the debug if !move_uploaded_file \n    so you can verify the result with your \n    directory and you can use this function to \n    destroy the last upload without uploading \n    again if you want too, just add a value... '),
	(69,5,' uploader test 3','this is a simple and complete function and \n    the easyest way i have found to allow you \n    to add an image to a form that the user can \n    verify before submiting \n\n    if the user do not want this image and change \n    his mind he can reupload a new image and we \n    will delete the last \n\n    i have added the debug if !move_uploaded_file \n    so you can verify the result with your \n    directory and you can use this function to \n    destroy the last upload without uploading \n    again if you want too, just add a value... '),
	(70,4,' Thee upload test 3','this is a simple and complete function and \n    the easyest way i have found to allow you \n    to add an image to a form that the user can \n    verify before submiting \n\n    if the user do not want this image and change \n    his mind he can reupload a new image and we \n    will delete the last \n\n    i have added the debug if !move_uploaded_file \n    so you can verify the result with your \n    directory and you can use this function to \n    destroy the last upload without uploading \n    again if you want too, just add a value... '),
	(71,5,' Thee upload is completed','this is a simple and complete function and \n    the easyest way i have found to allow you \n    to add an image to a form that the user can \n    verify before submiting if the user do not want this image and change \n    his mind he can reupload a new image and we \n    will delete the last \n\n    i have added the debug if !move_uploaded_file \n    so you can verify the result with your \n    directory and you can use this function to \n    destroy the last upload without uploading \n    again if you want too, just add a value... '),
	(72,6,' Thee upload is finally done, son','this is a simple and complete function and \n    the easyest way i have found to allow you \n    to add an image to a form that the user can \n    verify before submiting if the user do not want this image and change \n    his mind he can reupload a new image and we \n    will delete the last \n\n    i have added the debug if !move_uploaded_file \n    so you can verify the result with your \n    directory and you can use this function to \n    destroy the last upload without uploading \n    again if you want too, just add a value... '),
	(73,2,'Reference Guide','This free review script allows visitors to rank a product or service on a scale of 1-5. Comments can be left by visitors and as an option you can require the administrator to approve comments before being added to the website and even require user registration. Powerful admin panel lets you manage every section and feature on the site. Search engine optimized to get you top rankings.'),
	(74,1,'just another test','This free review script allows visitors to rank a product or service on a scale of 1-5. Comments can be left by visitors and as an option you can require the administrator to approve comments before being added to the website and even require user registration. Powerful admin panel lets you manage every section and feature on the site. Search engine optimized to get you top rankings.');

/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`name`,`email`,`username`,`password`)
VALUES
	(1,'Big Dog','','',''),
	(2,'Thomas','','',''),
	(3,'Kate','','',''),
	(4,'Steve','','',''),
	(5,'Tamer Elhotiby','tamer@electronicplanet.net','tamer','ba88e151495b41b896965b9b496a0019786c9e8f'),
	(6,'John Doe','johndoe@email.com','johndoe','a75eaf2153063c1c9cf20ac7c548d3b17a7ed0bf'),
	(7,'David Hoffner','tamer@mediaclear.net','davidh','80ec09fcae580feeea07f9fb1654fc2365a293f7'),
	(8,'George Washington','tameredits@gmail.com','georgew','d07ed9f6bf1620ba7aba36281a84b9cce2e45a49'),
	(9,'Billy Gates','payments@mediaclear.net','billyg','e17f4eb0fa25a1e5ad141c19d963ca9c28d91909');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;





/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
