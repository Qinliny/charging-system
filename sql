CREATE TABLE `cs_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_id` int(11) NOT NULL,
  `class_name` varchar(10) NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `cs_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_name` varchar(10) NOT NULL COMMENT '年级名称',
  `create_time` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `cs_interest_classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `interest_classes_name` varchar(255) NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `cs_nursery_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nursery_name` varchar(10) NOT NULL COMMENT '幼儿园名称',
  `create_time` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `cs_wutuo_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wutuo_class_name` varchar(10) NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `cs_charge_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `charge_type` char(5) COLLATE utf8_unicode_ci NOT NULL COMMENT '任务类型',
  `task_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '任务名称',
  `begin_time` date NOT NULL COMMENT '任务开始时间',
  `end_time` date NOT NULL COMMENT '任务结束时间',
  `create_time` datetime NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
