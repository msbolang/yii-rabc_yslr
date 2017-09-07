-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-09-07 15:04:49
-- 服务器版本： 5.7.14
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2rabc`
--

-- --------------------------------------------------------

--
-- 表的结构 `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('医生', '1', 1501319350),
('医生', '3', 1502891755),
('管理员', '2', 1501298934);

-- --------------------------------------------------------

--
-- 表的结构 `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/admin/*', 2, NULL, NULL, NULL, 1501318182, 1501318182),
('/admin/assignment/*', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/assignment/assign', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/assignment/index', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/assignment/revoke', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/assignment/view', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/default/*', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/default/index', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/menu/*', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/menu/create', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/menu/delete', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/menu/index', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/menu/update', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/menu/view', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/permission/*', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/permission/assign', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/permission/create', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/permission/delete', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/permission/index', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/permission/remove', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/permission/update', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/permission/view', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/role/*', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/role/assign', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/role/create', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/role/delete', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/role/index', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/role/remove', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/role/update', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/role/view', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/route/*', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/route/assign', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/route/create', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/route/index', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/route/refresh', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/route/remove', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/rule/*', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/rule/create', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/rule/delete', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/rule/index', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/rule/update', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/rule/view', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/user/*', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/user/activate', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/user/change-password', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/user/delete', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/user/index', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/user/login', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/user/logout', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/user/request-password-reset', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/user/reset-password', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/user/signup', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/admin/user/view', 2, NULL, NULL, NULL, 1500711979, 1500711979),
('/cooperative/*', 2, NULL, NULL, NULL, 1501511598, 1501511598),
('/cooperative/index', 2, NULL, NULL, NULL, 1501511604, 1501511604),
('/customer/*', 2, NULL, NULL, NULL, 1501406178, 1501406178),
('/customer/index', 2, NULL, NULL, NULL, 1501406183, 1501406183),
('/hospitalclientlist/*', 2, NULL, NULL, NULL, 1501402895, 1501402895),
('/hospitalclientlist/index', 2, NULL, NULL, NULL, 1501402902, 1501402902),
('/hospitalprojectcategory/*', 2, NULL, NULL, NULL, 1501402516, 1501402516),
('/hospitalprojectcategory/index', 2, NULL, NULL, NULL, 1501402533, 1501402533),
('/marketingplan/*', 2, NULL, NULL, NULL, 1501411670, 1501411670),
('/marketingplan/index', 2, NULL, NULL, NULL, 1501411675, 1501411675),
('/notice/*', 2, NULL, NULL, NULL, 1501596070, 1501596070),
('/notice/index', 2, NULL, NULL, NULL, 1501596075, 1501596075),
('/recordsofconsumption/*', 2, NULL, NULL, NULL, 1501407075, 1501407075),
('/recordsofconsumption/index', 2, NULL, NULL, NULL, 1501407070, 1501407070),
('/site/*', 2, NULL, NULL, NULL, 1501325646, 1501325646),
('/site/index', 2, NULL, NULL, NULL, 1501325661, 1501325661),
('/staff/*', 2, NULL, NULL, NULL, 1501411135, 1501411135),
('/staff/index', 2, NULL, NULL, NULL, 1501411141, 1501411141),
('/stock-category/*', 2, NULL, NULL, NULL, 1501388496, 1501388496),
('/stock-category/create', 2, NULL, NULL, NULL, 1501388507, 1501388507),
('/stock-category/index', 2, NULL, NULL, NULL, 1501388501, 1501388501),
('/stock-category/update', 2, NULL, NULL, NULL, 1501388513, 1501388513),
('/stock/*', 2, NULL, NULL, NULL, 1501385998, 1501385998),
('/stock/create', 2, NULL, NULL, NULL, 1501386022, 1501386022),
('/stock/delete', 2, NULL, NULL, NULL, 1501386034, 1501386034),
('/stock/index', 2, NULL, NULL, NULL, 1501386010, 1501386010),
('/stock/update', 2, NULL, NULL, NULL, 1501386049, 1501386049),
('/user/*', 2, NULL, NULL, NULL, 1501325276, 1501325276),
('/user/create', 2, NULL, NULL, NULL, 1501327848, 1501327848),
('/user/index', 2, NULL, NULL, NULL, 1501327241, 1501327241),
('/user/signup', 2, NULL, NULL, NULL, 1501328013, 1501328013),
('公告查看', 2, NULL, NULL, NULL, 1501596109, 1501596109),
('公告管理', 2, NULL, NULL, NULL, 1501596090, 1501596090),
('医生', 1, NULL, NULL, NULL, 1501319310, 1502891016),
('医院项目查看', 2, '只能查看项目', NULL, NULL, 1501403007, 1501403039),
('医院项目管理', 2, NULL, NULL, NULL, 1501402974, 1501402974),
('合作商', 1, NULL, NULL, NULL, 1502631552, 1502631552),
('合作商管理', 2, NULL, NULL, NULL, 1501511632, 1501511632),
('员工', 1, NULL, NULL, NULL, 1502631581, 1502631581),
('员工管理', 2, NULL, NULL, NULL, 1501411161, 1501411691),
('客户管理', 2, NULL, NULL, NULL, 1501405930, 1501407202),
('库存查看', 2, NULL, NULL, NULL, 1501386161, 1501386161),
('库存管理', 2, NULL, NULL, NULL, 1500101918, 1501388529),
('登陆用户管理', 2, NULL, NULL, NULL, 1501328179, 1501407125),
('管理员', 1, '管理员', NULL, NULL, 1500702595, 1501596129),
('终端客户', 1, NULL, NULL, NULL, 1502631472, 1502631472);

-- --------------------------------------------------------

--
-- 表的结构 `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('管理员', '/admin/*'),
('管理员', '/admin/assignment/*'),
('管理员', '/admin/assignment/assign'),
('管理员', '/admin/assignment/index'),
('管理员', '/admin/assignment/revoke'),
('管理员', '/admin/assignment/view'),
('管理员', '/admin/default/*'),
('管理员', '/admin/default/index'),
('管理员', '/admin/menu/*'),
('管理员', '/admin/menu/create'),
('管理员', '/admin/menu/delete'),
('管理员', '/admin/menu/index'),
('管理员', '/admin/menu/update'),
('管理员', '/admin/menu/view'),
('管理员', '/admin/permission/*'),
('管理员', '/admin/permission/assign'),
('管理员', '/admin/permission/create'),
('管理员', '/admin/permission/delete'),
('管理员', '/admin/permission/index'),
('管理员', '/admin/permission/remove'),
('管理员', '/admin/permission/update'),
('管理员', '/admin/permission/view'),
('管理员', '/admin/role/*'),
('管理员', '/admin/role/assign'),
('管理员', '/admin/role/create'),
('管理员', '/admin/role/delete'),
('管理员', '/admin/role/index'),
('管理员', '/admin/role/remove'),
('管理员', '/admin/role/update'),
('管理员', '/admin/role/view'),
('管理员', '/admin/route/*'),
('管理员', '/admin/route/assign'),
('管理员', '/admin/route/create'),
('管理员', '/admin/route/index'),
('管理员', '/admin/route/refresh'),
('管理员', '/admin/route/remove'),
('管理员', '/admin/rule/*'),
('管理员', '/admin/rule/create'),
('管理员', '/admin/rule/delete'),
('管理员', '/admin/rule/index'),
('管理员', '/admin/rule/update'),
('管理员', '/admin/rule/view'),
('管理员', '/admin/user/*'),
('管理员', '/admin/user/activate'),
('管理员', '/admin/user/change-password'),
('管理员', '/admin/user/delete'),
('管理员', '/admin/user/index'),
('管理员', '/admin/user/login'),
('管理员', '/admin/user/logout'),
('管理员', '/admin/user/request-password-reset'),
('管理员', '/admin/user/reset-password'),
('管理员', '/admin/user/signup'),
('管理员', '/admin/user/view'),
('合作商管理', '/cooperative/*'),
('合作商管理', '/cooperative/index'),
('客户管理', '/customer/*'),
('客户管理', '/customer/index'),
('医院项目管理', '/hospitalclientlist/*'),
('医院项目查看', '/hospitalclientlist/index'),
('医院项目管理', '/hospitalclientlist/index'),
('医院项目管理', '/hospitalprojectcategory/*'),
('医院项目查看', '/hospitalprojectcategory/index'),
('医院项目管理', '/hospitalprojectcategory/index'),
('员工管理', '/marketingplan/*'),
('员工管理', '/marketingplan/index'),
('公告管理', '/notice/*'),
('公告查看', '/notice/index'),
('公告管理', '/notice/index'),
('客户管理', '/recordsofconsumption/*'),
('客户管理', '/recordsofconsumption/index'),
('管理员', '/site/*'),
('管理员', '/site/index'),
('员工管理', '/staff/*'),
('员工管理', '/staff/index'),
('库存管理', '/stock-category/*'),
('库存管理', '/stock-category/create'),
('库存管理', '/stock-category/index'),
('库存管理', '/stock-category/update'),
('库存管理', '/stock/*'),
('库存管理', '/stock/create'),
('库存管理', '/stock/delete'),
('库存查看', '/stock/index'),
('库存管理', '/stock/index'),
('库存管理', '/stock/update'),
('登陆用户管理', '/user/*'),
('管理员', '/user/*'),
('登陆用户管理', '/user/create'),
('管理员', '/user/create'),
('登陆用户管理', '/user/index'),
('管理员', '/user/index'),
('登陆用户管理', '/user/signup'),
('管理员', '/user/signup'),
('管理员', '公告管理'),
('医生', '医院项目查看'),
('管理员', '医院项目管理'),
('管理员', '合作商管理'),
('管理员', '员工管理'),
('管理员', '客户管理'),
('管理员', '库存管理'),
('管理员', '登陆用户管理');

-- --------------------------------------------------------

--
-- 表的结构 `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `cooperative`
--

CREATE TABLE IF NOT EXISTS `cooperative` (
  `id` int(11) NOT NULL,
  `cooperativeNumber` varchar(50) NOT NULL COMMENT '合作商代码',
  `coname` varchar(255) NOT NULL COMMENT '姓名',
  `phone` varchar(255) NOT NULL COMMENT '电话',
  `adder` varchar(255) NOT NULL COMMENT '地址',
  `passportNumber` varchar(255) NOT NULL COMMENT '护照号码',
  `createuser` tinyint(4) NOT NULL COMMENT '是否创建登陆账号 已创建1 0未',
  `loginname` varchar(255) DEFAULT NULL COMMENT '合作商登陆账号',
  `loginID` int(11) DEFAULT NULL COMMENT '登陆账号ID',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '状态',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `create_use` int(11) NOT NULL COMMENT '创建人',
  `updated_at` int(11) NOT NULL COMMENT '修改时间',
  `updated_use` int(11) NOT NULL COMMENT '修改人'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `phone` varchar(255) NOT NULL COMMENT '电话',
  `adder` varchar(255) NOT NULL COMMENT '地址',
  `PassportNo` varchar(255) NOT NULL COMMENT '护照号',
  `integral` int(11) NOT NULL DEFAULT '0' COMMENT '积分',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '状态',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `create_use` int(11) NOT NULL COMMENT '创建人',
  `updated_at` int(11) NOT NULL COMMENT '修改时间',
  `updated_use` int(11) NOT NULL COMMENT '修改人',
  `loginAccount` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone`, `adder`, `PassportNo`, `integral`, `status`, `created_at`, `create_use`, `updated_at`, `updated_use`, `loginAccount`) VALUES
(1, '张三', '123456', '北京市xxx区xxx路222号', '123456', 0, 1, 1504703834, 2, 1504703834, 2, 0),
(2, '李四', '654321', '广州市xxx区xxx路xxx号', '987654', 0, 1, 1504706010, 2, 1504706010, 2, 0);

-- --------------------------------------------------------

--
-- 表的结构 `hospitalclientlist`
--

CREATE TABLE IF NOT EXISTS `hospitalclientlist` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL DEFAULT '0' COMMENT '所属项目',
  `name` varchar(255) NOT NULL COMMENT '客户名称',
  `price` decimal(10,2) NOT NULL COMMENT '金额',
  `performance_royalty` decimal(10,2) NOT NULL COMMENT '业绩提成',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '状态',
  `belong` int(11) NOT NULL DEFAULT '0' COMMENT '所属医生',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `create_use` int(11) NOT NULL COMMENT '创建人',
  `updated_at` int(11) NOT NULL COMMENT '修改时间',
  `updated_use` int(11) NOT NULL COMMENT '修改人'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `hospitalclientlist`
--

INSERT INTO `hospitalclientlist` (`id`, `category`, `name`, `price`, `performance_royalty`, `status`, `belong`, `created_at`, `create_use`, `updated_at`, `updated_use`) VALUES
(1, 1, '张先生', '20000.00', '200.00', 1, 1, 1503210506, 2, 1503210506, 2),
(2, 2, '王微', '50000.00', '500.00', 1, 3, 1503210595, 2, 1503210595, 2);

-- --------------------------------------------------------

--
-- 表的结构 `hospitalprojectcategory`
--

CREATE TABLE IF NOT EXISTS `hospitalprojectcategory` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL COMMENT '项目名称',
  `parent` int(11) NOT NULL DEFAULT '0' COMMENT '上级分类'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `hospitalprojectcategory`
--

INSERT INTO `hospitalprojectcategory` (`id`, `category_name`, `parent`) VALUES
(1, '面部整形最新疗法', 0),
(2, '瘦身减肥项目', 0),
(3, '德国最新疗法', 0);

-- --------------------------------------------------------

--
-- 表的结构 `marketingplan`
--

CREATE TABLE IF NOT EXISTS `marketingplan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `content` text COMMENT '内容',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '状态',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `create_use` int(11) NOT NULL COMMENT '创建人',
  `updated_at` int(11) NOT NULL COMMENT '修改时间',
  `updated_use` int(11) NOT NULL COMMENT '修改人'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `menu`
--

INSERT INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
(1, '权限', NULL, '/admin/permission/index', 0, NULL),
(2, '菜单管理', NULL, '/admin/menu/index', NULL, NULL),
(3, '系统默认用户', 7, '/admin/user/index', 10, 0x7b2269636f6e223a202266612066612d75736572222c202276697369626c65223a2066616c73657d),
(4, '分配', NULL, '/admin/assignment/index', NULL, NULL),
(5, '角色', NULL, '/admin/role/index', NULL, NULL),
(6, '路由', NULL, '/admin/route/index', NULL, NULL),
(7, '登陆用户管理', NULL, '/user/index', 20, NULL),
(8, '创建用户', 7, '/user/create', NULL, NULL),
(9, '用户列表', 7, '/user/index', NULL, NULL),
(10, '库存', NULL, '/stock/index', 50, NULL),
(11, '库存分类', 10, '/stock-category/index', NULL, NULL),
(12, '库存列表', 10, '/stock/index', NULL, NULL),
(13, '医生', NULL, '/hospitalclientlist/index', 60, NULL),
(14, '项目列表', 13, '/hospitalprojectcategory/index', NULL, NULL),
(15, '项目客户列表', 13, '/hospitalclientlist/index', NULL, NULL),
(16, '终端客户', NULL, '/customer/index', 71, NULL),
(17, '客户名单', 16, '/customer/index', NULL, NULL),
(18, '消费记录', 16, '/recordsofconsumption/index', NULL, NULL),
(19, '员工考勤', NULL, '/staff/index', 70, NULL),
(20, '员工列表', 19, '/staff/index', NULL, NULL),
(21, '营销计划', 19, '/marketingplan/index', NULL, NULL),
(22, '合作商', NULL, '/cooperative/index', 80, NULL),
(23, '合作商管理', 22, '/cooperative/index', NULL, NULL),
(24, '公告', NULL, '/notice/index', 72, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(11) NOT NULL,
  `usergroup` varchar(50) NOT NULL COMMENT '发送对象',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `content` text COMMENT '内容',
  `peruser` text COMMENT '阅读者',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '状态',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `create_use` int(11) NOT NULL COMMENT '创建人',
  `updated_at` int(11) NOT NULL COMMENT '修改时间',
  `updated_use` int(11) NOT NULL COMMENT '修改人'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `recordsofconsumption`
--

CREATE TABLE IF NOT EXISTS `recordsofconsumption` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL COMMENT '客户ID',
  `SalesmanNumber` varchar(255) NOT NULL COMMENT '业务员编号',
  `DoctorNumber` varchar(255) NOT NULL COMMENT '医生编号',
  `category` int(11) NOT NULL DEFAULT '0' COMMENT '所做项目',
  `price` decimal(10,2) NOT NULL COMMENT '消费价格',
  `TimeToSpend` varchar(11) NOT NULL COMMENT '消费时间',
  `integral` int(11) NOT NULL DEFAULT '0' COMMENT '加积分',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '状态',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `create_use` int(11) NOT NULL COMMENT '创建人',
  `updated_at` int(11) NOT NULL COMMENT '修改时间',
  `updated_use` int(11) NOT NULL COMMENT '修改人'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `recordsofconsumption`
--

INSERT INTO `recordsofconsumption` (`id`, `customer_id`, `SalesmanNumber`, `DoctorNumber`, `category`, `price`, `TimeToSpend`, `integral`, `status`, `created_at`, `create_use`, `updated_at`, `updated_use`) VALUES
(1, 1, '123456', '98765', 1, '5000.00', '1504828800', 100, 1, 1504710424, 2, 1504795545, 2);

-- --------------------------------------------------------

--
-- 表的结构 `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL COMMENT '职位',
  `induction_time` int(11) NOT NULL COMMENT '入职时间',
  `departure_time` int(11) NOT NULL COMMENT '离职时间',
  `WorkingPlace` varchar(255) NOT NULL COMMENT '工作地点',
  `SalesmanNumber` varchar(255) NOT NULL COMMENT '编号',
  `department` varchar(255) NOT NULL COMMENT '部门',
  `name` varchar(50) NOT NULL COMMENT '姓名',
  `eag` varchar(50) DEFAULT NULL COMMENT '年龄',
  `sex` tinyint(4) NOT NULL COMMENT '性别1男 0女',
  `height` decimal(10,2) DEFAULT NULL COMMENT '身高 单位cm',
  `weight` decimal(10,2) DEFAULT NULL COMMENT '体重 单位kg',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `wechat` varchar(255) DEFAULT NULL COMMENT '微信',
  `phone` varchar(255) DEFAULT NULL COMMENT '电话',
  `adder` varchar(255) DEFAULT NULL COMMENT '现住址',
  `remarks` text COMMENT '备注',
  `createuser` tinyint(4) NOT NULL COMMENT '是否创建登陆账号 已创建1 0未',
  `loginname` varchar(255) DEFAULT NULL COMMENT '登陆账号',
  `loginID` int(11) DEFAULT NULL COMMENT '登陆账号ID',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '状态',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `create_use` int(11) NOT NULL COMMENT '创建人',
  `updated_at` int(11) NOT NULL COMMENT '修改时间',
  `updated_use` int(11) NOT NULL COMMENT '修改人'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL DEFAULT '0' COMMENT '分类',
  `product_name` varchar(255) NOT NULL COMMENT '产品名称',
  `product_number` varchar(50) NOT NULL COMMENT '产品编号',
  `number` int(11) NOT NULL COMMENT '数量',
  `purchase_time` int(11) NOT NULL COMMENT '进库时间',
  `outbound_time` int(11) DEFAULT NULL COMMENT '出库时间',
  `ex_shipment_price_perbox` decimal(10,2) NOT NULL COMMENT '每盒进货价',
  `Postage_per_shipment` decimal(10,2) NOT NULL COMMENT '每批邮费价格',
  `advent` varchar(50) NOT NULL COMMENT '临期',
  `early_warning` int(11) NOT NULL COMMENT '预警数量',
  `detailed_description` text COMMENT '详情说明',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '状态',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `create_use` int(11) NOT NULL COMMENT '创建人',
  `updated_at` int(11) NOT NULL COMMENT '修改时间',
  `updated_use` int(11) NOT NULL COMMENT '修改人'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `stock`
--

INSERT INTO `stock` (`id`, `category`, `product_name`, `product_number`, `number`, `purchase_time`, `outbound_time`, `ex_shipment_price_perbox`, `Postage_per_shipment`, `advent`, `early_warning`, `detailed_description`, `status`, `created_at`, `create_use`, `updated_at`, `updated_use`) VALUES
(1, 100, '美容药品xxx', '123456', 10, 1503705600, 1504828800, '500.21', '50.55', '10年', 5, '详情说明详情说明详情说明详情说明详情说明详情说明', 1502807214, 1502807214, 2, 1503148710, 2),
(2, 101, '美容设备001', '001', 100, 1501545600, NULL, '5000.00', '50.00', '20', 2, '详情说明详情说明详情说明详情说明', 1503448490, 1503448490, 2, 1503448490, 2);

-- --------------------------------------------------------

--
-- 表的结构 `stock_category`
--

CREATE TABLE IF NOT EXISTS `stock_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL COMMENT '分类名称',
  `parent` int(11) DEFAULT '0' COMMENT '上级分类'
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `stock_category`
--

INSERT INTO `stock_category` (`id`, `category_name`, `parent`) VALUES
(100, '药品', 0),
(101, '机器', 0),
(103, '服装', 0),
(106, '活动物品', 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(256) NOT NULL,
  `password_reset_token` varchar(256) DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'boli', 'ZTIF0xMQvjlIRzIIYngwaHUIihmfp6K1', '$2y$13$ZdNfyESmNXSb6JZj8qYDnuZxrVY5VpH6XFQz2feAgqJEX31pqHSU.', NULL, 'boli@qq.com', 10, 1500704105, 1500704105),
(2, 'SuperAdmin', '_JPhSIRMCpV0r4yHQJWhEig6MVZ8oVbq', '$2y$13$Jay/JSFkYXY8emtM3tTubeQvueoA4qKAPA487YkDYqHEAbCMLD7/O', NULL, 'SuperAdmin@qq.com', 10, 1500704947, 1500704947),
(3, 'user1', 'XrYVilE_qGbocyhbSUUoULne6i8A0pu9', '$2y$13$bIhNiYZ/Y6tFmhFa80nLgO8wbKWqqvY3/rkCKHovS9LlLtC33YJ9u', NULL, 'user1@aaa.com', 10, 1501314261, 1501314261),
(4, 'user2', 'DiGLkh4L8448R68zsIs1cJ3JkGFHIOse', '$2y$13$Aw8wurto9nF1Pubbevi0e.yBg4MRK67rOKOX5COMSXLOf08LbyDF2', NULL, 'user@admin.com', 10, 1501329947, 1501329947),
(5, 'user3', 'RNWAQ-_pn6-Q4C53F0wVTsPCeoFgX0sf', '$2y$13$dZOGx8djio9Jk.2SK557n.1ZI7GQYFHIyuMs14oOu2//NKImGpFZW', NULL, 'user3@admin.com', 10, 1501329986, 1501329986),
(6, 'user4', 'rgBrgf5HFlQ9rN30Jr9dnUvIRd2q3xG_', '$2y$13$YlrEigxCfjDrZtJrH4zW4OIgWQMlZKCiDJz8Remp0WqPvnrQ9CqXq', NULL, 'jj@jfj.com', 10, 1501330467, 1501330467),
(7, 'user5', 'RVTWfKXydYxv1DDS8fBoLdlAfVZcMfA3', '$2y$13$6EJIcDzUBfFTxfIGX89tQu0YaX7TlNTJvDCz5STmDnES6/Ss5jBI6', NULL, 'user5@admin.com', 10, 1501333127, 1501333127),
(8, 'user666', 'WvwVndlJDZpJC7Frehh-JF0Z8QttbBTn', '$2y$13$V.6ul8en79mJhk8TtZh7R.imQiHzNa/LTvKVofsvC09DXhlSaHet6', NULL, 'user666@admin.com', 10, 1501333153, 1501333153),
(9, 'user7', 'wEp5JlEROhLRS7JK_WH1pua-lwP_FlcU', '$2y$13$w.jZMim9.RpTyJ/H3vqLROPL0hjjeIAdsu3inApshdDNtaxpPzUBm', NULL, 'usrt7@adminc.com', 10, 1501333297, 1501333297),
(10, 'user8', 'JwKuZ1O_EyKhB6w1NNzo5IHGvw1EIRYu', '$2y$13$SpMZLtpH7cNdY2Zc0FuqRuB23X6eQHeqUMwGu01x0rBK7GAO5rk8G', NULL, 'user8@ll.com', 10, 1501333344, 1501333344),
(11, 'user9', '14m2RIkFRbc5u3ZRgBoNV3S_nshnM3sP', '$2y$13$kAnLbDFKu3wznolTvP86W.ucwEqNcVzfEfWOIkuuGDuYFDDNP1zEC', NULL, 'user9@qq.com', 10, 1501333520, 1501333520),
(12, 'user888', 'px1ZL8mQuwKjiIaDqNmdQD7gm4PaQnlU', '$2y$13$lZu4YLM7JD6lbFmtYJimLuGdEq/RQHU06PNWsYAkKxS3IGjnnv.Ym', NULL, '88@fd.com', 10, 1501333540, 1501333540);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `cooperative`
--
ALTER TABLE `cooperative`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitalclientlist`
--
ALTER TABLE `hospitalclientlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitalprojectcategory`
--
ALTER TABLE `hospitalprojectcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketingplan`
--
ALTER TABLE `marketingplan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recordsofconsumption`
--
ALTER TABLE `recordsofconsumption`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_category`
--
ALTER TABLE `stock_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cooperative`
--
ALTER TABLE `cooperative`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hospitalclientlist`
--
ALTER TABLE `hospitalclientlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hospitalprojectcategory`
--
ALTER TABLE `hospitalprojectcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `marketingplan`
--
ALTER TABLE `marketingplan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recordsofconsumption`
--
ALTER TABLE `recordsofconsumption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stock_category`
--
ALTER TABLE `stock_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- 限制导出的表
--

--
-- 限制表 `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- 限制表 `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
