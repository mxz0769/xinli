/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : psydata

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-06-25 16:37:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for answer
-- ----------------------------
DROP TABLE IF EXISTS `answer`;
CREATE TABLE `answer` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(500) CHARACTER SET utf8 NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `answertime` int(11) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of answer
-- ----------------------------
INSERT INTO `answer` VALUES ('1', '1111111111111111122222222222222222333333333333333333哈哈哈哈哈哈哈哈哈哈或或或或或呃呃呃鹅鹅鹅鹅鹅鹅饿鹅鹅鹅饿根据西南证券的研报，片仔癀上市以来，零售价已提高19次。\r\n\r\n据了解，号称“绝密配方”的片仔癀是老字号中成药，为国家中药一级保护品种，作为肝病类中药龙头企业，一直被称为“清热解毒第一名药”，传统制作技艺列入国家非遗名录。\r\n\r\n片仔癀的主要成分是牛黄、麝香、三七、蛇胆，功效为清热解毒，凉血化瘀，消肿止痛。用于热毒血瘀所致急慢性病毒性肝炎，痈疽疔疮，无名肿毒，跌打损伤及各种炎症。\r\n\r\n关于此番涨价、限购的火爆局面，有分析认为原因可归纳为三点，一是片仔癀制造原料稀缺昂贵（麝香、蛇胆等），二是疗效、“国货”等受到资本追捧，三是不排除黄牛炒作。', '1', '2', '234323243');
INSERT INTO `answer` VALUES ('2', '啦啦啦啦啦啦啦啦绿绿绿绿绿绿绿绿222222222222222222凄凄切切群群群群群群群群群群群群群群群群群群群群群群333333333333333这次灯光秀以“百年征程 波澜壮阔 百年初心 历久弥坚”为主题，用长达12分钟的画面内容制作、1000余幅原创手绘国漫原画，展示英雄城市、英雄人民敢为人先、追求卓越的精神风貌，为庆祝建党百年，创下武汉历届灯光秀之最。\r\n\r\n百年党史中，武汉始终站在历史和时代发展的潮头，坚定理想，与党和人民心连心、同呼吸、共命运，践行党的初心使命，百折不挠地推动党和人民事业不断前进。', '2', '2', '342342424');
INSERT INTO `answer` VALUES ('3', 'ssssssssssssss哈哈哈哈哈哈哈哈哈哈或或或或或或或或或或圣诞节发电机房东方季道给付对价肯德基福克斯的开发商京东客服再说这次抢购潮，片仔癀也不是近日才有的，那为何突然就爆了呢？我个人认为背后大概率是有人操纵的。\r\n\r\n不难想象，起初排队买片仔癀的人群是托，炒家出钱雇来排队的，和地产商雇人去售楼部现场排队一个模式。操作雇人排队之前，供货方经销商统一行动、同时下架控货线上线下的片仔癀。这两点行动掌握好分寸节奏后，紧接着网络自媒体把人群排队买不到片仔癀事件传播开来，剩下的就是蝴蝶效应。\r\n\r\n当然了，以上只是个人臆测而已，别较真，但同时也得感叹，万物皆可炒，不得不服！', '1', '3', '34233424');

-- ----------------------------
-- Table structure for cate
-- ----------------------------
DROP TABLE IF EXISTS `cate`;
CREATE TABLE `cate` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `catename` varchar(20) CHARACTER SET utf8 NOT NULL,
  `state` int(11) NOT NULL DEFAULT 1 COMMENT '状态，1:使用，0:删除',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cate
-- ----------------------------
INSERT INTO `cate` VALUES ('1', '成长', '1');
INSERT INTO `cate` VALUES ('2', '职场', '1');
INSERT INTO `cate` VALUES ('3', '人际关系', '1');
INSERT INTO `cate` VALUES ('4', '心理知识', '1');
INSERT INTO `cate` VALUES ('5', '情绪', '1');
INSERT INTO `cate` VALUES ('6', '亲子家庭', '1');

-- ----------------------------
-- Table structure for question
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 NOT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `addtime` varchar(11) CHARACTER SET utf8 NOT NULL,
  `display` int(11) DEFAULT 0 COMMENT '是否匿名',
  `check` int(11) NOT NULL DEFAULT 0 COMMENT '是否审核',
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of question
-- ----------------------------
INSERT INTO `question` VALUES ('1', '1', '测试11111111111', '少时诵诗书所所所所所所所所所所所所所11111111111111111111', '1', '1624007307', '1', '1');
INSERT INTO `question` VALUES ('2', '1', 'test222222222', 'test22222222222222222222222222222222222222222222', '2', '1624253787', '1', '1');
INSERT INTO `question` VALUES ('3', '1', '哈哈哈1213231231', '哈哈哈哈哈哈哈哈哈121312313', '3', '1624253827', '1', '1');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `openid` varchar(100) CHARACTER SET utf8 NOT NULL,
  `createtime` varchar(11) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '孙悟空', 'asxwexfsfs', '343432232');
INSERT INTO `user` VALUES ('2', '猪八戒', 'sdfsfsdff', '54353543453');
INSERT INTO `user` VALUES ('3', '沙悟净', 'zfsfsdfsdf', '463456464');
