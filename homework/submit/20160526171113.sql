-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-05-22 14:30:59
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlinelearn`
--

-- --------------------------------------------------------

--
-- 表的结构 `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `classid` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(40) DEFAULT NULL,
  `classcategory` varchar(8) DEFAULT NULL,
  `subclasscategory` varchar(20) NOT NULL,
  `classdescription` varchar(400) DEFAULT NULL,
  `classsourcepath` varchar(100) DEFAULT NULL,
  `classimagepath` varchar(100) DEFAULT NULL,
  `classupdatetime` char(14) DEFAULT NULL,
  `classclicknum` int(11) DEFAULT NULL,
  `classteachby` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`classid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `class`
--

INSERT INTO `class` (`classid`, `classname`, `classcategory`, `subclasscategory`, `classdescription`, `classsourcepath`, `classimagepath`, `classupdatetime`, `classclicknum`, `classteachby`) VALUES
(1, '计算机组成原理第七章', '工学', '计算机组成原理', '计算机组成原理第七章————计算机系列教材，清华大学出版社', 'ppt/gx/jsjzcyl/num7.pptx', 'image/class/zcyl1.png', '20150319192524', 1000, '辛迪'),
(2, '计算机组成原理第8章', '工学', '计算机组成原理', '计算机组成原理第8章————计算机系列教材，清华大学出版社', 'ppt/gx/jsjzcyl/num7.pptx', 'image/class/zcyl1.png', '20150320192524', 10011, '辛迪'),
(3, '计算机组成原理第6章', '工学', '计算机组成原理', '计算机组成原理第6章————计算机系列教材，清华大学出版社', 'ppt/gx/jsjzcyl/num6.pptx', 'image/class/zcyl1.png', '20150322192524', 1011, '辛迪'),
(4, '计算机组成原理第1章', '工学', '计算机组成原理', '计算机组成原理第1章————计算机系列教材，清华大学出版社', 'ppt/gx/jsjzcyl/num1.pptx', 'image/class/zcyl1.png', '20150324092524', 5511, '辛迪');

-- --------------------------------------------------------

--
-- 表的结构 `collection`
--

CREATE TABLE IF NOT EXISTS `collection` (
  `classid` int(11) DEFAULT NULL,
  `studentnum` char(10) NOT NULL DEFAULT '',
  `collecttime` char(14) NOT NULL DEFAULT '',
  PRIMARY KEY (`studentnum`,`collecttime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `useraccount` char(10) NOT NULL DEFAULT '',
  `commentclassid` int(11) DEFAULT NULL,
  `content` varchar(400) DEFAULT NULL,
  `commenttime` char(14) NOT NULL DEFAULT '',
  PRIMARY KEY (`useraccount`,`commenttime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `postid` int(11) NOT NULL AUTO_INCREMENT,
  `time` char(14) DEFAULT NULL,
  `host` char(10) DEFAULT NULL,
  `postname` varchar(100) DEFAULT NULL,
  `postcategory` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`postid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `post`
--

INSERT INTO `post` (`postid`, `time`, `host`, `postname`, `postcategory`) VALUES
(2, '20160519160400', 'U20124586', '123', '123'),
(3, '20160519160425', 'U20124586', '456', '123'),
(5, '20160522112753', 'T20120001', '名称', '类别'),
(6, '20160522113308', 'U20120001', '名称', '类别');

-- --------------------------------------------------------

--
-- 表的结构 `postmessage`
--

CREATE TABLE IF NOT EXISTS `postmessage` (
  `postid` int(11) NOT NULL DEFAULT '0',
  `content` varchar(400) DEFAULT NULL,
  `time` char(14) NOT NULL DEFAULT '',
  `usernum` char(10) NOT NULL DEFAULT '',
  `atinfor` char(24) DEFAULT NULL,
  PRIMARY KEY (`postid`,`usernum`,`time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `postmessage`
--

INSERT INTO `postmessage` (`postid`, `content`, `time`, `usernum`, `atinfor`) VALUES
(3, '哈哈', '20160522111654', 'T20120001', ''),
(3, '哈哈哈', '20160522111703', 'T20120001', ''),
(3, '哈哈哈', '20160522111704', 'T20120001', ''),
(3, '我是张三', '20160522113005', 'U20120001', '');

-- --------------------------------------------------------

--
-- 表的结构 `selecttest`
--

CREATE TABLE IF NOT EXISTS `selecttest` (
  `testnum` int(11) NOT NULL AUTO_INCREMENT,
  `testcategory` varchar(8) DEFAULT NULL,
  `testsubclass` varchar(20) DEFAULT NULL,
  `testcontent` varchar(400) DEFAULT NULL,
  `selecta` varchar(100) DEFAULT NULL,
  `selectb` varchar(100) DEFAULT NULL,
  `selectc` varchar(100) DEFAULT NULL,
  `selectd` varchar(100) DEFAULT NULL,
  `correntanswer` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`testnum`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `selecttest`
--

INSERT INTO `selecttest` (`testnum`, `testcategory`, `testsubclass`, `testcontent`, `selecta`, `selectb`, `selectc`, `selectd`, `correntanswer`) VALUES
(2, 'single', '数据结构', '栈和队列的共同特点是(      )。', '只允许在端点处插入和删除元素', '都是先进后出', '都是先进先出', '没有共同点', 'A'),
(3, 'single', '数据结构', '用链接方式存储的队列，在进行插入运算时(   )', '仅修改头指针', '头、尾指针都要修改', '仅修改尾指针', '头、尾指针可能都要修改', 'D'),
(4, 'single', '数据结构', '以下数据结构中哪一个是非线性结构？(   )', '队列', '栈', '线性表', '二叉树', 'D'),
(5, 'single', '数据结构', '设有一个二维数组A[m][n]，假设A[0][0]存放位置在644(10)，A[2][2]存放位置在676(10)，每个元素占一个空间，问A[3][3](10)存放在什么位置？脚注(10)表示用10进制表示。', '688', '678', '692', '696', 'C'),
(6, 'single', '数据结构', '树最适合用来表示(      )。', '有序数据元素', '无序数据元素', '元素之间具有分支层次关系的数据', '元素之间无联系的数据', 'C'),
(7, 'single', '数据结构', '二叉树的第k层的结点数最多为(  )', '2^k-1', '2K+1', '2K-1', '2^(k-1)', 'D'),
(8, 'single', '数据结构', '若有18个元素的有序表存放在一维数组A[19]中，第一个元素放A[1]中，现进行二分查找，则查找A［3］的比较序列的下标依次为(      )', '1，2，3', '9，5，2，3', '9，5，3', '9，4，2，3', 'D'),
(9, 'single', '数据结构', '对n个记录的文件进行快速排序，所需要的辅助存储空间大致为', ' O（1）', 'O（n）', 'O（log2n）', 'O（n2）', 'C'),
(10, 'single', '数据结构', '对于线性表（7，34，55，25，64，46，20，10）进行散列存储时，若选用H（K）=K %9作为散列函数，则散列地址为1的元素有（   ）个', '1', '2', '3', '4', 'D'),
(11, 'single', '数据结构', '设有6个结点的无向图，该图至少应有(      )条边才能确保是一个连通图', '5', '6', '7', '8', 'A'),
(12, 'single', '数据结构', '下面关于线性表的叙述错误的是（   ）。', '线性表采用顺序存储必须占用一片连续的存储空间	', '线性表采用链式存储不必占用一片连续的存储空间', '线性表采用链式存储便于插入和删除操作的实现', '线性表采用顺序存储便于插入和删除操作的实现', 'D'),
(13, 'single', '数据结构', '设哈夫曼树中的叶子结点总数为m，若用二叉链表作为存储结构，则该哈夫曼树中总共有（  ）个空指针域。', '2m-1', '2m', '2m+1', '4m', 'B'),
(14, 'single', '数据结构', '设顺序循环队列Q[0：M-1]的头指针和尾指针分别为F和R，头指针F总是指向队头元素的前一位置，尾指针R总是指向队尾元素的当前位置，则该循环队列中的元素个数为（  ）。', 'R-F', 'F-R', '(R-F+M)％M', '(F-R+M)％M', 'C'),
(15, 'single', '数据结构', '设某棵二叉树的中序遍历序列为ABCD，前序遍历序列为CABD，则后序遍历该二叉树得到序列为（   ）。', 'BADC', 'BCDA', 'CDAB', 'CBDA', 'A'),
(16, 'single', '数据结构', '设某完全无向图中有n个顶点，则该完全无向图中有（  ）条边。', 'n(n-1)/2', 'n(n-1)', 'n^2', 'n^2-1', 'A'),
(17, 'single', '数据结构', '设某棵二叉树中有2000个结点，则该二叉树的最小高度为（  ）。', '9', '10', '11', '12', 'C'),
(18, 'single', '数据结构', '设某有向图中有n个顶点，则该有向图对应的邻接表中有（  ）个表头结点。', 'n-1', 'n', 'n+1', '2n-1', 'B'),
(19, 'single', '数据结构', '设一组初始记录关键字序列(5，2，6，3，8)，以第一个记录关键字5为基准进行一趟快速排序的结果为（  ）。', '2，3，5，8，6', '3，2，5，8，6', '3，2，5，6，8', '2，3，6，5，8', 'C'),
(20, 'single', '数据结构', '设某数据结构的二元组形式表示为A=(D，R)，D={01，02，03，04，05，06，07，08，09}，R={r}，r={<01，02>，<01，03>，<01，04>，<02，05>，<02，06>，<03，07>，<03，08>，<03，09>}，则数据结构A是（  ）。', '线性结构', '树型结构', '物理结构', '图型结构', 'B'),
(21, 'single', '数据结构', '下面程序的时间复杂为（  ）\r\nfor（i=1，s=0； i<=n； i++） {t=1；for(j=1；j<=i；j++) t=t*j；s=s+t；}', 'O(n)', 'O(n^2)', 'O(n^3)', 'O(n^4)', 'B'),
(22, 'single', '数据结构', '设指针变量p指向单链表中结点A，若删除单链表中结点A，则需要修改指针的操作序列为（  ）。', 'q=p->next；p->data=q->data；p->next=q->next；free(q)；', 'q=p->next；q->data=p->data；p->next=q->next；free(q)；', 'q=p->next；p->next=q->next；free(q)；', 'q=p->next；p->data=q->data；free(q)；', 'A'),
(23, 'single', '数据结构', '设有n个待排序的记录关键字，则在堆排序中需要（  ）个辅助记录单元。', '1', 'n', 'nlog2 n', 'n^2', 'A'),
(24, 'single', '数据结构', '设一组初始关键字记录关键字为(20，15，14，18，21，36，40，10)，则以20为基准记录的一趟快速排序结束后的结果为(  )。', '10，15，14，18，20，36，40，21', '10，15，14，18，20，40，36，21', '10，15，14，20，18，40，36，2l', '15，10，14，18，20，36，40，21', 'A'),
(25, 'single', '数据结构', '设二叉排序树中有n个结点，则在二叉排序树的平均平均查找长度为（  ）。', 'O(1)', 'O(log2n)', 'O(n)', 'O(n^2)', 'B'),
(26, 'single', '数据结构', '设无向图G中有n个顶点e条边，则其对应的邻接表中的表头结点和表结点的个数分别为（  ）。', ' n，e', 'e，n', '2n，e', 'n，2e', 'D'),
(27, 'single', '数据结构', '设某强连通图中有n个顶点，则该强连通图中至少有（  ）条边。', 'n(n-1)', 'n+1', 'n', 'n(n+1)', 'C'),
(28, 'single', '数据结构', '设有5000个待排序的记录关键字，如果需要用最快的方法选出其中最小的10个记录关键字，则用下列（  ）方法可以达到此目的。', '快速排序', '堆排序', '归并排序', '插入排序', 'B'),
(29, 'single', '数据结构', '下列四种排序中（  ）的空间复杂度最大。', '插入排序', '冒泡排序', '堆排序', '归并排序', 'D'),
(30, 'single', '数据结构', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `studentid` int(11) NOT NULL AUTO_INCREMENT,
  `studentnum` char(10) DEFAULT NULL,
  `stupassword` varchar(16) DEFAULT NULL,
  `studentname` varchar(20) DEFAULT NULL,
  `studentclass` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`studentid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`studentid`, `studentnum`, `stupassword`, `studentname`, `studentclass`) VALUES
(1, 'U20124586', '123456', '黄静荣', '计科2'),
(2, 'U20120001', '123456', '张三', '计科2'),
(3, 'U20120011', '123456', '李四', '计科1');

-- --------------------------------------------------------

--
-- 表的结构 `submithomework`
--

CREATE TABLE IF NOT EXISTS `submithomework` (
  `homeworktime` char(14) NOT NULL DEFAULT '',
  `teachernum` char(10) NOT NULL DEFAULT '',
  `studentnum` char(10) NOT NULL DEFAULT '',
  `submittime` char(14) DEFAULT NULL,
  `homeworkfile` varchar(100) DEFAULT NULL,
  `score` varchar(3) DEFAULT NULL,
  `notes` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`homeworktime`,`teachernum`,`studentnum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `submithomework`
--

INSERT INTO `submithomework` (`homeworktime`, `teachernum`, `studentnum`, `submittime`, `homeworkfile`, `score`, `notes`) VALUES
('20160522104004', 'T20120001', 'U20120001', '20160522114832', '../homework/submit/20160522114832.doc', '80', NULL),
('20160522120137', 'T20120001', 'U20120011', '20160522120227', '../homework/submit/20160522120227.doc', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teachertid` int(11) NOT NULL AUTO_INCREMENT,
  `teachernum` char(10) DEFAULT NULL,
  `tepassword` varchar(16) DEFAULT NULL,
  `teachername` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`teachertid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `teacher`
--

INSERT INTO `teacher` (`teachertid`, `teachernum`, `tepassword`, `teachername`) VALUES
(1, 'T20120001', '123456', '何霖');

-- --------------------------------------------------------

--
-- 表的结构 `testrecord`
--

CREATE TABLE IF NOT EXISTS `testrecord` (
  `time` char(14) NOT NULL DEFAULT '',
  `testcategory` char(1) NOT NULL DEFAULT '',
  `testnum` int(11) NOT NULL DEFAULT '0',
  `studentnum` char(10) NOT NULL DEFAULT '',
  `answer` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`time`,`testcategory`,`testnum`,`studentnum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `testtable`
--

CREATE TABLE IF NOT EXISTS `testtable` (
  `name` varchar(40) NOT NULL,
  `age` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `testtable`
--

INSERT INTO `testtable` (`name`, `age`) VALUES
('1l', 2),
('2354ddd', 2),
('2ddwd', 2),
('32ddd', 2),
('4dwad', 2),
('a', 1),
('aadr', 2),
('adasdddd', 2),
('adsad', 2),
('asdws', 2),
('b', 2),
('c', 2),
('d', 2),
('dasdasdw', 2),
('ds', 2),
('dwadxzff', 2),
('dwdctttt', 2),
('e', 2),
('f', 2),
('fasdasc', 2),
('fgag', 2),
('g', 2),
('gag', 2),
('gfgeru', 2),
('gg3ee', 2),
('h', 2),
('j', 2),
('k', 2),
('l', 2),
('m', 2),
('n', 2),
('o', 2),
('p', 2),
('q', 2),
('r', 2),
('s', 2),
('sdawdas', 2),
('sss', 2),
('t', 2);

-- --------------------------------------------------------

--
-- 表的结构 `testulink`
--

CREATE TABLE IF NOT EXISTS `testulink` (
  `teacherid` char(10) NOT NULL DEFAULT '',
  `stuclassname` varchar(10) DEFAULT NULL,
  `coursename` varchar(40) DEFAULT NULL,
  `addtime` char(14) NOT NULL DEFAULT '',
  PRIMARY KEY (`teacherid`,`addtime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `testulink`
--

INSERT INTO `testulink` (`teacherid`, `stuclassname`, `coursename`, `addtime`) VALUES
('T20120001', '计科2', 'C语言', '20160522103730'),
('T20120001', '计科1', 'C++', '20160522103802');

-- --------------------------------------------------------

--
-- 表的结构 `thomework`
--

CREATE TABLE IF NOT EXISTS `thomework` (
  `addtime` char(14) NOT NULL DEFAULT '',
  `teachernum` char(10) NOT NULL DEFAULT '',
  `class` varchar(50) DEFAULT NULL,
  `homeworkpath` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`addtime`,`teachernum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `thomework`
--

INSERT INTO `thomework` (`addtime`, `teachernum`, `class`, `homeworkpath`) VALUES
('20160522104004', 'T20120001', '计科2', '../homework/teacher/20160522104004.doc'),
('20160522120137', 'T20120001', '计科1', '../homework/teacher/20160522120137.doc');

-- --------------------------------------------------------

--
-- 表的结构 `trueorfalse`
--

CREATE TABLE IF NOT EXISTS `trueorfalse` (
  `testnum` int(11) NOT NULL AUTO_INCREMENT,
  `testsubclass` varchar(20) DEFAULT NULL,
  `testcontent` varchar(400) DEFAULT NULL,
  `correntanswer` char(1) DEFAULT NULL,
  PRIMARY KEY (`testnum`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `trueorfalse`
--

INSERT INTO `trueorfalse` (`testnum`, `testsubclass`, `testcontent`, `correntanswer`) VALUES
(1, '数据结构', '调用一次深度优先遍历可以访问到图中的所有顶点。（  ）', 'F'),
(2, '数据结构', '分块查找的平均查找长度不仅与索引表的长度有关，而且与块的长度有关。（  ）', 'T'),
(3, '数据结构', '冒泡排序在初始关键字序列为逆序的情况下执行的交换次数最多。（  ）', 'T'),
(4, '数据结构', '满二叉树一定是完全二叉树，完全二叉树不一定是满二叉树。（  ）', 'T'),
(5, '数据结构', '设一棵二叉树的先序序列和后序序列，则能够唯一确定出该二叉树的形状。（  ）', 'F'),
(6, '数据结构', '层次遍历初始堆可以得到一个有序的序列。（  ）', 'F'),
(7, '数据结构', '设一棵树T可以转化成二叉树BT，则二叉树BT中一定没有右子树。（  ）', 'T'),
(8, '数据结构', '线性表的顺序存储结构比链式存储结构更好。（  ）', 'F'),
(9, '数据结构', '中序遍历二叉排序树可以得到一个有序的序列。（  ）', 'T'),
(10, '数据结构', '快速排序是排序算法中平均性能最好的一种排序。（  ）', 'T');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
