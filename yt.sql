/*
SQLyog Ultimate - MySQL GUI v8.2 
MySQL - 5.5.44-0+deb8u1 : Database - yt
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`yt` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `yt`;

/*Table structure for table `videos` */

DROP TABLE IF EXISTS `videos`;

CREATE TABLE `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_video` text,
  `id_channel` text,
  `video_title` text,
  `channel_title` text,
  `video_description` text,
  `video_thumbnail` text,
  `views_count` int(11) DEFAULT NULL,
  `comments_count` int(11) DEFAULT NULL,
  `likes_count` int(11) DEFAULT NULL,
  `dislikes_count` int(11) DEFAULT NULL,
  `subscribers_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `videos` */

insert  into `videos`(`id`,`id_video`,`id_channel`,`video_title`,`channel_title`,`video_description`,`video_thumbnail`,`views_count`,`comments_count`,`likes_count`,`dislikes_count`,`subscribers_count`) values (1,'d8kCTPPwfpM','UCp0hYYBW6IMayGgR-WeoCvQ','Taylor Swift and Zac Efron Sing a Duet!','TheEllenShow','This incredible duo teamed up to perform an original song for Ellen! They may not have had a lot of rehearsal, but it\'s clear that this is one musical combo it would be great to hear a lot more of.','https://i.ytimg.com/vi/d8kCTPPwfpM/mqdefault.jpg',26565660,33895,313190,2708,13423047),(2,'w1oM3kQpXRo','UCANLZYMidaCbLQFWXBC95Jg','Taylor Swift - Everything Has Changed ft. Ed Sheeran','TaylorSwiftVEVO','Music video by Taylor Swift performing Everything Has Changed. (C) 2013 Big Machine Records, LLC.','https://i.ytimg.com/vi/w1oM3kQpXRo/mqdefault.jpg',160273528,118218,1090283,27843,17074348),(3,'kC9YNz-h828','UCoGDh1Xa3kUCpok24JN5DKA','Viendo Como Estudiante En Supletorios','enchufetv','VOTA AHORA por Enchufe.tv - Click Aquí: http://goo.gl/yDE3XK\n y Click en SUBMIT\nSTREAMY AWARDS\n\n¡twittea! http://goo.gl/HdSpJ ¡likea! http://goo.gl/i8WS9\n\nCon polla cualquiera gordo hijuep...\n\nUn video nuevo cada semana.\n\n¡El Colegio de Contadores Públicos de Pichincha (http://www.ccpp.org.ec) acolitó a ENCHUFE.TV y por eso son chéveres!\n\n© enchufe.tv - Todos los derechos reservados por Touché Films 2012.\n\nLa APP que te quitara la virginidad\n\niOS http://bit.ly/IOSEnchufeTv\nAndroid http://bit.ly/AndroidEnchufeTv','https://i.ytimg.com/vi/kC9YNz-h828/mqdefault.jpg',20909302,12817,153106,2412,9789282),(4,'PPQNbTPb-F0','UCAbd8xHBGObktNG6F4GeChA','[일소라] 일반인 고등학생 - Hello (Adele) cover','일반인들의 소름돋는 라이브','[ 일반인들의 소름돋는 라이브 공식 유투브 채널 ]\n\nA student from Seoul Music High School singing Adele\'s \"Hello\"\nHow she sings and expresses \"Hello\" is just amazing!\n\nPlease SUBSCRIBE for more live clips!\n\n귀여운 여고생이 부르는 아델의 \"Hello\"\n\n서울 실용음악고등학교 학생의 영상입니다.\n와.. 아델 노래는 정말 도전하기조차 힘든데\n감정이 아주...ㄷㄷㄷ\n\n- Facebook : http://www.facebook.com/LiveMakeus','https://i.ytimg.com/vi/PPQNbTPb-F0/mqdefault.jpg',13709979,12644,216120,3156,73929),(5,'aKdV5FvXLuI','UC8-Th83bH_thdKZDJCrn88g','Daniel Radcliffe Raps Blackalicious\' \"Alphabet Aerobics\"','The Tonight Show Starring Jimmy Fallon','Jimmy challenges hip-hop lover Daniel Radcliffe to rap Blackalicious\' tongue-twisting \"Alphabet Aerobics.\"  \n\nSubscribe NOW to The Tonight Show Starring Jimmy Fallon: http://bit.ly/1nwT1aN\n\nWatch The Tonight Show Starring Jimmy Fallon Weeknights 11:35/10:35c\n\nGet more Jimmy Fallon: \nFollow Jimmy: http://Twitter.com/JimmyFallon\nLike Jimmy: https://Facebook.com/JimmyFallon\n\nGet more The Tonight Show Starring Jimmy Fallon: \nFollow The Tonight Show: http://Twitter.com/FallonTonight\nLike The Tonight Show: https://Facebook.com/FallonTonight\nThe Tonight Show Tumblr: http://fallontonight.tumblr.com/\n\nGet more NBC: \nNBC YouTube: http://bit.ly/1dM1qBH\nLike NBC: http://Facebook.com/NBC\nFollow NBC: http://Twitter.com/NBC\nNBC Tumblr: http://nbctv.tumblr.com/\nNBC Google+: https://plus.google.com/+NBC/posts\n\nThe Tonight Show Starring Jimmy Fallon features hilarious highlights from the show including: comedy sketches, music parodies, celebrity interviews, ridiculous games, and, of course, Jimmy\'s Thank You Notes and hashtags! You\'ll also find behind the scenes videos and other great web exclusives.\n\nDaniel Radcliffe Raps Blackalicious\' \"Alphabet Aerobics\"\nhttp://www.youtube.com/fallontonight','https://i.ytimg.com/vi/aKdV5FvXLuI/mqdefault.jpg',50063458,20683,541462,4733,8814457);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
