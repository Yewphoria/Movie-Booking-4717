use seenima;
DROP TABLE IF EXISTS movies;
DROP TABLE IF EXISTS customers;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS availability;

-- Initialize movies table
CREATE TABLE movies (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `pict` varchar(20) NOT NULL,
  `sypnosis` text NOT NULL,
  `cast` text NOT NULL,
  `director` text NOT NULL,
  `genre` text NOT NULL,
  `release` text NOT NULL,
  `runtime` text NOT NULL,
  `language` text NOT NULL,
  `trailer_url` varchar(255) NOT NULL,
  PRIMARY KEY (id)
);

-- Initialize customers table
CREATE TABLE customers (
  `id` int(10) NOT NULL  AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `salutation` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` int(20) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (id)
);

-- Initialize orders table
CREATE TABLE orders (
  `id` int(10) NOT NULL  AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `seat` int(5) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `Customername` varchar(100) NOT NULL,
  `payment` varchar(20) NOT NULL,
  PRIMARY KEY (id)
);

-- Initialize availability table
CREATE TABLE availability (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(100) NOT NULL,
  `seatcode` int(6) NOT NULL,
  `bookingstatus` varchar(50) NOT NULL,
  PRIMARY KEY (id)
);

-- Insert data into the movies table
INSERT INTO `movies` (`id`, `title`, `pict`, `sypnosis`, `cast`, `director`, `genre`, `release`, `runtime`, `language`, `trailer_url`) VALUES
(1, 'The Ex-Files 4: Marriage Plan 前任4：英年早婚', 'ex4.jpg', 'The immensely popular EX-FILE franchise now comes to its fourth sequel in which we see buddies Meng Yun and Yu Fei coming to an age to talk about marriage.\r\n\r\nIn order to avoid problems after marriage, Yu and his girlfriend Ding Dian create a marriage cooling-off period to preview life after marriage in advance. The ups and downs of marriage indeed become challenging tests for the relationship between them.\r\n\r\nChanges in friends around and pressure from parents are getting to make Meng think about marriage. With the question “why do people get married”, he starts a blind date journey, allowing him to learn various concepts of marriage and love from his different blind dates, which makes him even more confused and struggling.\r\n\r\nAt an unexpected alumni gathering, Meng reunites with his first love. After many years, his heart is still pounding at the sight of her. He seems to finally catch a glimmer of hope, but would this girl really be the chosen one?', 'Han Geng 韩庚, Zheng Kai 郑恺', 'Tian Yusheng 田羽生', 'Comedy/ Romance', '05-10-2023', '129 minutes', 'Mandarin(Sub: English, Chinese)', 'ex4.mp4'),
(2, 'Teenage Mutant Ninja Turtles: Mutant Mayhem', 'tmnt.webp', 'After years of being sheltered from the human world, the Turtle brothers set out to win the hearts of New Yorkers and be accepted as normal teenagers through heroic acts. Their new friend April O’Neil helps them take on a mysterious crime syndicate, but they soon get in over their heads when an army of mutants is unleashed upon them.', 'Paul Rudd, Maya Rudolph, Hannibal Buress, Rose Byrne, John Cena, Jackie Chan, Ice Cube', 'Jeff Rowe, Kyler Spears', 'Action/ Adventure/ Animation', '31-08-2023', '99 minutes', 'English(Sub: Chinese)', 'tmnt.mp4'),
(3, 'Saw X', 'saw.webp', 'John Kramer (Tobin Bell) is back in SAW X, the most intriguing, unexpected, and chilling installment of the global horror franchise. Exploring the untold chapter of John / Jigsaw’s most personal game, the film is set between the events of Saw I and II. A sick and desperate John travels to Mexico for a risky and experimental medical procedure, which he hopes will be a miracle cure for his cancer. But he discovers the operation is a scam to defraud the most vulnerable. Armed with a newfound purpose, John returns to his unique work, turning the tables on the con artists in his signature visceral way, through terrifying and ingenious traps.', 'Tobin Bell, Shawnee Smith, Synnøve Macody Lund, Steven Brand, Michael Beach and Renata Vaca', 'Kevin Greutert', 'Horror/ Thriller', '19-10-2023', '119 minutes', 'English(Sub: Nil)', 'saw-x.mp4'),
(4, 'The Nun II', 'nun.webp', 'In 1956 France, a priest is murdered, and it seems an evil is spreading. Sister Irene once again comes face to face with a demonic force.', 'Taissa Farmiga, Storm Reid, Anna Popplewell, Bonnie Aarons, Katelyn Rose Downey', 'Michael Chaves', '\r\nHorror/ Mystery', '07-09-2023', '110 minutes', 'English(Sub: Chinese)', 'abc.mp4'),
(5, 'Taylor Swift | The Eras Tour', 'taytay.webp', 'The cultural phenomenon continues on the big screen! Immerse yourself in this once-in-a-lifetime concert film experience with a breathtaking, cinematic view of the history-making tour. Taylor Swift Eras Tour attire and friendship bracelets are strongly encouraged!\r\n\r\nARE YOU READY FOR IT? Limited tickets available. Grab your tickets now!', 'Taylor Swift', 'Sam Wrench', 'Concert', '03-11-2023', '168 minutes', 'English(Sub: English)', 'abc.mp4'),
(6, 'Marvel Studios\' The Marvels', 'marvel.webp', 'In Marvel Studios\' "The Marvels," Carol Danvers aka Captain Marvel has reclaimed her identity from the tyrannical Kree and taken revenge on the Supreme Intelligence. But unintended consequences see Carol shouldering the burden of a destabilized universe
