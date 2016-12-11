-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Хост: sitebow.mysql.ukraine.com.ua
-- Время создания: Дек 11 2016 г., 13:45
-- Версия сервера: 5.6.27-75.0-log
-- Версия PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `sitebow_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `category_id`, `create`) VALUES
(8, 'So 2016 Was Not the Year Messaging Changed Your Life', 'THIS WAS SUPPOSED to be the year that texting wasnвЂ™t just texting anymore. After big announcements from Facebook, Google, and others, Americans were going to use messaging apps for so much more than chatting with friends. You were going to seamlessly interact with a world of online businesses. You were going to send questions to search engines and book tables at restaurants. You were going to get stuff done without ever opening another app.', 12, '2016-12-11 11:09:34'),
(9, 'How a 70-Year-Old Idea Could Make Engines Way More Efficient', 'IF YOU POP THE hood on your car and yank out the plastic cover beneath it, youвЂ™ll see a beautiful bit of mind-boggling engineering: the internal combustion engine. TodayвЂ™s engines harness around 100 explosions of fuel and oxygen each second, generating massive power with minimal emissions.\nThatвЂ™s great, but tightening pollution standards around the world mean automobiles must become increasingly efficient. Electric cars offer one way forward, but they remain expensive and hobbled by range anxietyвЂ”the fear, often unfounded, that youвЂ™ll end up stranded with a dead battery. Internal combustion isnвЂ™t going anywhere anytime soon, with advancements like turbochargers, direct injection, and variable valve timing squeezing more miles from every gallon.', 12, '2016-12-11 11:09:34'),
(10, 'The Neuroscientist WhoвЂ™s Building a Better Memory for Humans', 'IN AN EPIDSODE of the dystopian near-future series, Black Mirror, a small, implantable device behind the ear grants the ability to remember, access, and replay every moment of your life in perfect detail, like a movie right before your eyes.\nTheodore Berger, a biomedical engineer at the University of Southern California, canвЂ™t promise that level of perfect recallвЂ”perhaps for the betterвЂ”but he is working on a memory prosthesis. The device, surgically implanted directly into the brain, mimics the function of a structure called the hippocampus by electrically stimulating the brain in a particular way to form memoriesвЂ”at least in rats and monkeys. And now, heвЂ™s testing one that could work in humans.', 12, '2016-12-11 11:09:34'),
(11, 'You Could Play This Jigsaw Puzzle Forever and Never Finish', 'THE JOY OF any good jigsaw puzzle isnвЂ™t finishing it, itвЂ™s the satisfaction of linking pieces, one fit at a time. With the Infinite Galaxy Puzzle, which you can assemble in any direction and in countless shapes, that sensation need never end. Granted, that lack of resolution may make you crazy. But it makes the Infinite Galaxy Puzzle from Nervous System a unique contribution to the cannon.\nYouвЂ™d expect nothing less from its creators, who have spent вЂњfive or sixвЂќ years making jigsaw puzzles. Founders Jesse Louis-Rosenberg and Jessica Rosenkrantz use custom software to create their designs and a laser cutter to bring them to life. вЂњIt harkens back to when puzzles were hand-cut and had a lot more individual style,вЂќ Louis-Rosenberg says.', 14, '2016-12-11 11:09:34'),
(12, 'AngelList acquires Product Hunt', 'AngelList, the LinkedIn for startups, just bought Product Hunt, the platform where people vote up or down on startup products.\nProduct Hunt declined to comment on the selling price but a source close to the matter tells us it was about $20 million. Recode first reported that same price.\nProduct Hunt was rumored to be raising its next round for the past several months but, as founder Ryan Hoover tells TechCrunch, AngelList seemed like the best option for the future of the company and now the two are combining forces.', 17, '2016-12-11 11:09:34'),
(13, 'Siren Care makes a вЂњsmartвЂќ sock to track diabetic health', 'Diabetic health tracking startup Siren Care has created smart socks that use temperature sensors to detect inflammation вЂ” and therefore injury вЂ” in realtime for diabetics.\nCo-founder Ran Ma was working on growing biomass to grow back skin that had been damaged while at Northwestern University when she started learning how to treat diabetic feet and thought of making a wearable that could track and prevent injuries.\nBoth type 1 and type 2 diabetes patients are prone to foot swelling, among other foot issues and it can lead to some serious problems such as infection or amputation of the foot if not checked. Early detection is crucial to head off any serious complications and Ma and her co-founder Veronica Tran believe built-in sensors are the key.', 17, '2016-12-11 11:09:34'),
(14, 'JustEat is now delivering takeout with self-driving robots in the UK', 'The robots will serve you now: Greenwich, London residents have officially begun receiving deliveries from autonomous, six-wheeled rolling cooler bots, which are handling the вЂњlast mileвЂќ of food delivery from nearby takeout restaurants. Engadget notes that the robots are now in вЂњactive service,вЂќ after they completed a previous testing phase which began earlier this year.\nBefore you ask, these bots are designed to be tamper-proof, so passers-by wonвЂ™t just smell your delicious delivery curry and crack one open to score an unpaid meal. Also, in case you wanted to request one for selfie opportunities, youвЂ™re out of luck вЂ“ theyвЂ™re assigned at random, and not available via specific request while ordering from Just Eat even if you happen to live in their Greenwich operating area.', 19, '2016-12-11 11:09:34');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `ord` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`alias`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `alias`, `type`, `ord`, `parent_id`, `create`) VALUES
(18, 'Forum', 'forums', 2, 0, 0, '2016-12-11 11:09:34'),
(17, 'Startups', 'startups', 0, 1, 15, '2016-12-11 11:09:34'),
(16, 'Social', 'social', 0, 0, 15, '2016-12-11 11:09:34'),
(15, 'Blogs', 'blogs', 1, 0, 0, '2016-12-11 11:09:34'),
(14, 'Design', 'design', 0, 0, 11, '2016-12-11 11:09:34'),
(13, 'Culture', 'culture', 0, 1, 11, '2016-12-11 11:09:34'),
(12, 'Business', 'business', 0, 0, 11, '2016-12-11 11:09:34'),
(11, 'News', 'news', 0, 0, 0, '2016-12-11 11:09:34'),
(19, 'Ideas', 'ideas', 0, 0, 18, '2016-12-11 11:09:34'),
(20, 'Technologies', 'technologies', 0, 1, 18, '2016-12-11 11:09:34');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
