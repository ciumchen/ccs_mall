SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `wst_users`;
CREATE TABLE `wst_users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `loginName` varchar(20) NOT NULL,
  `loginSecret` int(11) NOT NULL,
  `loginPwd` varchar(50) NOT NULL,
  `userType` tinyint(4) NOT NULL DEFAULT '0',
  `userSex` tinyint(4) DEFAULT '0',
  `userName` varchar(100) DEFAULT NULL,
  `trueName` varchar(100) DEFAULT NULL,
  `brithday` date DEFAULT NULL,
  `userPhoto` varchar(200) DEFAULT NULL,
  `userQQ` varchar(20) DEFAULT NULL,
  `userPhone` char(11) DEFAULT '',
  `userEmail` varchar(50) DEFAULT '',
  `userScore` int(11) DEFAULT '0',
  `userTotalScore` int(11) DEFAULT '0',
  `lastIP` varchar(16) DEFAULT NULL,
  `lastTime` datetime DEFAULT NULL,
  `userFrom` tinyint(4) DEFAULT '0',
  `userMoney` decimal(11,2) DEFAULT '0.00',
  `lockMoney` decimal(11,2) DEFAULT '0.00',
  `userStatus` tinyint(4) NOT NULL DEFAULT '1',
  `dataFlag` tinyint(4) NOT NULL DEFAULT '1',
  `createTime` datetime NOT NULL,
  `payPwd` varchar(100) DEFAULT NULL,
  `rechargeMoney` decimal(11,2) DEFAULT '0.00' COMMENT '充值金额',
  `isInform` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`userId`),
  KEY `userStatus` (`userStatus`,`dataFlag`),
  KEY `loginName` (`loginName`),
  KEY `userPhone` (`userPhone`),
  KEY `userEmail` (`userEmail`),
  KEY `userType` (`userType`,`dataFlag`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;


INSERT INTO `wst_users` VALUES ('1', 'wstmart', '5937', '33c67f436e38cfa964f1fde58a5213cc', '1', '0', null, null, null, '', null, '', '', '0', '0', '113.109.180.6', '2016-10-17 10:04:44', '0', '0.00', '0.00', '1', '1', '2016-10-08 10:27:28', null, '0.00', '1'),
('2', 'test', '8860', 'bf9156c6c4cc320de14c4a3fd2839616', '0', '0', null, null, null, '', '', '', '', '0', '0', '116.22.173.168', '2016-10-11 19:05:05', '0', '0.00', '0.00', '1', '1', '2016-10-08 11:20:42', null, '0.00', '1'),
('3', '新鲜鲜果旗舰店', '9096', '4a0eda0f97c3da3e6d9ce42256c3d887', '1', '1', '新鲜鲜果', null, null, '', '23234', '15918671994', 'sadf@qq.com', '0', '2', '116.22.12.53', '2016-10-14 22:01:10', '0', '0.00', '0.00', '1', '1', '2016-10-08 16:02:44', null, '0.00', '1'),
('4', 'haiyuan', '7413', '760c16148d35bf403e455fd7aafc3f35', '1', '0', null, null, null, '', null, '', '', '0', '0', '116.22.12.172', '2016-10-09 10:59:56', '0', '0.00', '0.00', '1', '1', '2016-10-08 21:44:57', null, '0.00', '1'),
('5', 'maysh1009', '6326', '9df7f105ab4f096958e74c2008733c65', '0', '0', null, null, null, '', '', '', '', '0', '0', '116.22.12.172', '2016-10-09 11:06:53', '0', '0.00', '0.00', '1', '1', '2016-10-09 11:06:53', null, '0.00', '1'),
('6', 'zhangfaguang', '5152', 'f59eac75fafe3a5dae279d5510c5ff71', '0', '0', null, null, null, '', '', '', '', '0', '0', '60.13.219.25', '2016-10-09 19:00:02', '0', '0.00', '0.00', '1', '1', '2016-10-09 19:00:02', null, '0.00', '1'),
('7', 'vda123', '6640', 'e6b43a8ec3abf125e4808c08b2f7682b', '1', '0', null, null, null, '', null, '', '', '0', '0', '116.22.12.53', '2016-10-14 22:12:07', '0', '0.00', '0.00', '1', '1', '2016-10-09 19:32:17', null, '0.00', '1'),
('8', 'weisheng', '9840', '2d52a8859152143a6ae3099af02f50f7', '1', '0', null, null, null, '', null, '', '', '0', '0', '116.22.12.172', '2016-10-09 21:27:48', '0', '0.00', '0.00', '1', '1', '2016-10-09 21:03:01', null, '0.00', '1'),
('9', 'jiushui', '7789', '55d4131f13d29a8fd716a44858c0d3e6', '1', '0', null, null, null, '', null, '', '', '0', '0', '116.22.12.172', '2016-10-10 09:54:16', '0', '0.00', '0.00', '1', '1', '2016-10-10 09:53:50', null, '0.00', '1'),
('10', 'liangyou', '8964', '15335b0063ff9974df4b8afaded54bd1', '1', '0', null, null, null, '', null, '', '', '0', '0', '116.22.12.172', '2016-10-10 16:45:07', '0', '0.00', '0.00', '1', '1', '2016-10-10 10:49:35', null, '0.00', '1'),
('11', 'songshu', '7576', '21d917b9434892bb0846d7c0d905e94a', '1', '0', null, null, null, '', null, '', '', '0', '0', '116.22.12.172', '2016-10-10 14:50:29', '0', '0.00', '0.00', '1', '1', '2016-10-10 14:50:07', null, '0.00', '1'),
('12', 'sisley', '5139', '4b53be1961c187abf4258c5d0a6cae29', '1', '0', null, null, null, '', null, '', '', '0', '0', '116.22.12.172', '2016-10-10 16:08:27', '0', '0.00', '0.00', '1', '1', '2016-10-10 16:07:38', null, '0.00', '1'),
('13', 'aodisite', '7761', 'fdcd139ac6b01fd12bfff41aee70a196', '1', '0', null, null, null, '', null, '', '', '0', '0', '116.22.173.168', '2016-10-11 11:41:41', '0', '0.00', '0.00', '1', '1', '2016-10-10 19:15:34', null, '0.00', '1'),
('14', 'honor1', '7412', '43225a3e24aa6cb309db9e295d552759', '1', '0', null, null, null, '', null, '', '', '0', '0', '116.22.173.168', '2016-10-11 14:26:47', '0', '0.00', '0.00', '1', '1', '2016-10-11 14:25:24', null, '0.00', '1'),
('15', 'ceshi1011', '4323', '8c697ca89e74b22a4dc53352a3d66aa6', '0', '0', null, null, null, '', '', '', '', '0', '0', '116.22.173.168', '2016-10-11 18:55:57', '0', '0.00', '0.00', '1', '1', '2016-10-11 18:55:57', null, '0.00', '1'),
('16', 'ceshi1010', '1063', '8e37f5001b9bca610bbd699b908ab0de', '0', '0', null, null, null, '', '', '', '', '0', '0', '116.22.173.168', '2016-10-11 19:02:07', '0', '0.00', '0.00', '1', '1', '2016-10-11 19:02:07', null, '0.00', '1'),
('17', 'test1', '3454', 'e42e0ac9893c62802af5e47433bd86b2', '0', '0', null, null, null, '', '', '', '', '0', '0', '116.22.173.168', '2016-10-11 19:11:18', '0', '0.00', '0.00', '1', '1', '2016-10-11 19:10:47', null, '0.00', '1'),
('18', 'ceshi111', '9440', 'a8725a52ea26d65956f201c3b7059679', '0', '0', null, null, null, '', '', '', '', '0', '0', '116.22.173.168', '2016-10-11 19:12:32', '0', '0.00', '0.00', '1', '1', '2016-10-11 19:11:22', null, '0.00', '1'),
('19', 'hushichun', '5513', '6a6ae583b6001aad3ed5aacfc184a0ce', '0', '0', null, null, null, '', '', '', '', '0', '0', '113.208.116.106', '2016-10-12 16:04:42', '0', '0.00', '0.00', '1', '1', '2016-10-12 16:04:42', null, '0.00', '1'),
('20', 'dfdfdsf', '1189', '0058d330018760ca1c4e79a69fb151e0', '0', '0', null, null, null, '', '', '', '', '0', '0', '113.107.234.101', '2016-10-12 16:59:32', '0', '0.00', '0.00', '1', '1', '2016-10-12 16:59:32', null, '0.00', '1'),
('21', 'maysh1013', '6825', '2a46c2a5fd65a633db3ab2720e03b9d0', '0', '0', null, null, null, '', '', '', '', '0', '0', '116.22.12.53', '2016-10-14 20:42:17', '0', '0.00', '0.00', '1', '1', '2016-10-13 18:01:02', null, '0.00', '1'),
('22', 'test@qq.com', '2974', '7615c6b6cd874f8f33ce73e39f6e57dc', '0', '0', null, null, null, '', '', '', '', '0', '0', '49.223.185.240', '2016-10-13 20:23:55', '0', '0.00', '0.00', '1', '1', '2016-10-13 20:23:55', null, '0.00', '1'),
('23', 'ro1058029', '4245', 'e93bbc57ca254c5bcb535f2892d28437', '0', '0', null, null, null, '', '', '', '', '0', '0', '61.140.122.29', '2016-10-14 10:42:49', '0', '0.00', '0.00', '1', '1', '2016-10-14 01:57:25', null, '0.00', '1'),
('24', 'zzzzzzzzzz', '7647', '32c3db12927569bebee24e8d32dae5b4', '0', '0', null, null, null, '', '', '', '', '0', '0', '116.25.76.27', '2016-10-14 11:29:13', '0', '0.00', '0.00', '1', '1', '2016-10-14 11:29:13', null, '0.00', '1'),
('25', 'Marky', '3994', 'c19d1870ad5242a37c5c72cc863d6ee0', '0', '1', 'Marky', 'Marky', '2016-12-06', 'upload/users/2016-10/5800dde7459e5.jpg', '', '', '', '0', '0', '113.119.38.118', '2016-10-15 10:10:26', '0', '0.00', '0.00', '1', '1', '2016-10-14 21:22:17', null, '0.00', '1'),
('26', 'haihai', '9980', 'd3f5e693f5038b3366d3b6e9e9a40c04', '0', '0', null, null, null, '', '', '', '', '0', '0', '27.38.29.11', '2016-10-16 23:20:42', '0', '0.00', '0.00', '1', '1', '2016-10-16 23:20:42', null, '0.00', '1'),
('27', 'demotest', '3752', '2fa0e6e9dd780c6c8db86be3eec83227', '0', '0', null, null, null, '', '', '', '', '0', '0', '123.161.250.74', '2016-10-17 10:46:42', '0', '0.00', '0.00', '1', '1', '2016-10-17 10:46:42', null, '0.00', '1'),
('28', 'testgq', '9660', 'ec72d43233595fd8754fc8ec52c656e7', '0', '0', null, null, null, '', '', '', '', '0', '0', '112.226.160.141', '2016-10-17 14:19:26', '0', '0.00', '0.00', '1', '1', '2016-10-17 12:54:35', null, '0.00', '1');
