-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 12:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(30) NOT NULL,
  `DateTime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `author`, `DateTime`) VALUES
(1, 'Technology', 'admin', '2023-02-17 11:30:47am'),
(2, 'Medicine', 'admin', '2023-02-17 11:31:02am'),
(3, 'Entertainment', 'admin', '2023-02-17 11:31:07am'),
(4, 'Sports', 'admin', '2023-02-17 11:31:13am'),
(5, 'News', 'admin', '2023-02-17 11:31:20am'),
(6, 'Nature', 'admin', '2023-02-17 11:31:33am'),
(7, 'Business', 'admin', '2023-02-17 11:32:34am'),
(8, 'Art', 'admin', '2023-02-17 11:58:32am');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `title` varchar(300) NOT NULL,
  `category` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `post` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `datetime`, `title`, `category`, `author`, `image`, `post`) VALUES
(1, '2023-02-17 11:22:25am', 'The maze is in the mouse', 'Technology', 'admin', '0_VsJFrT07L6k-lbx9.png', 'I joined Google just before the pandemic when the company I had co-founded, AppSheet, was acquired by Google Cloud. The acquiring team and executives welcomed us and treated us well. We joined with great enthusiasm and commitment to integrate AppSheet into Google and make it a success. Yet, now at the expiry of my three year mandatory retention period, I have left Google understanding how a once-great company has slowly ceased to function.\n\nGoogle has 175,000+ capable and well-compensated employees who get very little done quarter over quarter, year over year. Like mice, they are trapped in a maze of approvals, launch processes, legal reviews, performance reviews, exec reviews, documents, meetings, bug reports, triage, OKRs, H1 plans followed by H2 plans, all-hands summits, and inevitable reorgs. The mice are regularly fed their “cheese” (promotions, bonuses, fancy food, fancier perks) and despite many wanting to experience personal satisfaction and impact from their work, the system trains them to quell these inappropriate desires and learn what it actually means to be “Googley” — just don’t rock the boat. As Deepak Malhotra put it in his excellent business fable, at some point the problem is no longer that the mouse is in a maze. The problem is that “the maze is in the mouse”.\n\nIt is a fragile moment for Google with the pressure from OpenAI + Microsoft. Most people view this challenge along the technology axis, although there is now the gnawing suspicion that it might be a symptom of some deeper malaise. The recent layoffs have caused angst within the company as many employees view this as a failure of management or a surrender to activist investors. In a way, this reflects a general lack of self-awareness across both management and employees. Google’s fundamental problems are along the culture axis and everything else is a reflection of it. Of course, I’m not the only person to observe these issues (see the post by Noam Bardin, Waze founder and ex-Googler).\n\nThe way I see it, Google has four core cultural problems. They are all the natural consequences of having a money-printing machine called “Ads” that has kept growing relentlessly every year, hiding all other sins.\n\n(1) no mission, (2) no urgency, (3) delusions of exceptionalism, (4) mismanagement.\n\nUnfortunately, this is not my first experience watching the gradual decay of a dominant empire. I lived through more than a decade (1999–2011) at another great company (Microsoft) as it slowly degraded and lost its way. Yet, Google has a few strengths that Microsoft didn’t have as it tried to recover — it isn’t a culture of ego and fiefdoms, the environment values introspection, the stated core values of the company are rock solid, and there is still immense respect for Google in the external world. There is hope for Google and for my friends who work there, but it will require an intervention.'),
(2, '2023-02-17 11:26:53am', 'Presearch AI', 'Technology', 'admin', '960x0.jpg', 'With all of the buzz about ChatGPT and artificial intelligence (AI) impacting Big Tech search engines like Google, we’ve been asked by community members how Presearch intends to leverage AI.\n\nWe’ve prepared this blog post to explore the opportunities and discuss how Presearch is using AI now and in the future.\n\nSearch engines have been pioneers in the AI space, having been built on top of machine learning (ML) algorithms for years. Due to a combination of large amounts of data to search through, query input from users indicating their intent, and the potential for real-time feedback from ongoing user interactions (clicks, paging, scrolling, etc.), AI-powered search engines have an ability to constantly learn and improve from new data and interactions.\n\nAI is under the hood powering search and social media experiences for billions every day.\n\nIt’s only been in recent months that public understanding of the power of AI has risen dramatically, as a result of exposure to AI responses through the ChatGPT interface launched by OpenAI. This has lead to massive awareness of the impressive stage at which AI currently operates and the rapidly-evolving future possibilities with AI.\n\nThe launch of chatGPT in November was an “iPhone moment” for AI technology, unveiling a compelling chat experience that feels so intelligent and human-like that public interest and rate of adoption has far exceeded all of the best technology launches of the past, reaching more than a million users in just five days.\n\nChatGPT packages up several years of open innovation on Large Language Models across a diverse set of companies and researchers (alongside OpenAI), and is paving the way for a significant wave of innovation in artificial intelligence over the next few years.\n\nPresearch CTO, Trey Grainger, is author of the book, AI-Powered Search, which he’s been releasing chapter-by-chapter since 2019, about how to implement artificial intelligence within the context of search experiences. Trey spent years as SVP of Engineering and then Chief Algorithms Officer for an AI-powered search company, building out the search and AI capabilities powering hundreds of the top companies in the world. He’s also published numerous books, journal articles, and research publications at the intersection of Search and AI. Trey is the perfect person to lead the project into this new era of search.\n\nIn this article we plan to give you a high level overview of how we’re currently using AI, and how AI will play a key role in Presearch’s decentralized search engine moving forward.'),
(3, '2023-02-17 11:40:40am', 'Knowing when to quit', 'Business', 'admin', 'tech-meeting-flatlay.jpg', 'When one embarks on a corporate career, you get on a conveyor belt. Initially, if you’re good at what you do, you get on the next conveyor belt and so on. As you progress in your career, it starts to get quieter and louder around you at once. It also becomes more important for your brain to be on constant alert and standby, on the senior leadership conveyor belt. And oh the politics and the need to constantly be better, do better! There are fewer people on whose counsel you can rely, and there are so many people who need something from you or depend on you. Your team, your extended team, then a division, then a whole department, then a whole portion of the company, then the company maybe, and the investors, the markets and so on. You get the picture.\n\nThe heady mix of dopamine and adrenaline that accompanies professional success — that’s the driver. The one that blurs the lines for us. Because replying to that email, taking on that stretch project and getting it across the finish line, closing that deal, saving that life, helping out that colleague is just SO important in the moment. It’s all well-intentioned and they’re all important, meaningful, purpose-filled tasks but work will never love you back forever. As soon as your utility to the place ends, the relationship is over. This is not a bitter statement, it’s an objective fact. So what are you working yourself to the ground for?\n\nWe work at minimum for five days/48 weeks, only to take 4 weeks off each year (if your employer is a good one). That’s it. All your real life wrapped up in those four weeks and 48 weekends. When you think about what that means, it equates to 23.5% of your life if you consider retiring at 65. That’s it. That’s all you have left for yourself. In this you fit in every dream you’ve ever had — advanced education, relationships of all kinds, children, pets, hobbies, things you want to do, things that give you joy, etc. The more you grow in your career, the less likely it is that your job only runs five days a week. It’s constant. All day. Everyday. Everywhere. You go from life to work life to work-life balance and finally to work-life integration or work-life harmony (which is anything but). But why do we let it? Why is enough money, less stress and more of real life not good enough?\n\nAt that stage in your career, it’s clearly not the money. It’s not existential concerns. So what is it? Why don’t we know when to quit? Why don’t we know when to stop? Ambition, the desire to leave a legacy in an inanimate object that you don’t own and didn’t create because of your ego, compulsive behaviours, something else altogether?'),
(6, '2023-02-17 11:57:28am', '2023 Turkey Earthquake', 'News', 'myuser1', '1246872877.jpg', 'On February 6, when everyone was at home and asleep, at 04:17 a.m., a great earthquake took place in Kahramanmaraş, Turkey.\n\nWe were not ready for this situation in terms of both search and rescue and building durability.\n\nWe are faced with a collapse of an unprecedented scale in the recent history of our country.\n\nClose to 100,000 deaths are expected.\n\nThe country’s political conflicts reach such a level that it prevents organization and cooperation.\n\nDuring the earthquake, Twitter, one of the most useful social networks in terms of organization and fundraising, was blocked for political reasons.\n\nIf you would like to donate to associations related to the earthquake, you can reach them from the official organizations below.'),
(7, '2023-02-17 12:00:57pm', 'Was Leonardo da Vinci the supreme genius, or just our kind of guy?', 'Art', 'myuser1', 'tdy_pop_keir_mona_lisa_191112_1920x1080.jpg', 'In the northern Italian city of Treviso, a Polish pianist, Slawomir Zubrzycki, sits down at an instrument that resembles a harpsichord and starts pumping a pedal with his right foot. As his hands float over the keyboard, the sound reaching his audience is as singular as it is beautiful: simultaneously reminiscent of the harpsichord, organ and a string quartet. The instrument is based on sketches Leonardo da Vinci made in his notebooks of a “viola organista” with the dream of simulating a viola ensemble that could be played from a keyboard. Hitting one or more keys brings the same number of strings inside the casing into contact with one of four bow-wheels spun by the pedal.\n\nMr Zubrzycki’s concert, sponsored by the Benetton Foundation, was among the more unusual commemorations of the 500th anniversary of da Vinci’s death, which fell on May 2nd 2019. It was also a reminder that, even in an age of polymaths, the breadth of the Tuscan master’s interests was exceptional. It encompassed not only painting, architecture, mathematics, engineering and numerous branches of science, but music too. “How many specialists would we need today to attempt Leonardo’s researches?” asks Martin Kemp, emeritus professor of the history of art at Oxford University. “At least 13. Maybe more.”\n\nIn the Antico Setificio Fiorentino, Italy’s oldest working silk mill, Beatrice Fazzini turns by hand a vertical warper: a cylindrical machine that prepares yarn for weaving. It was constructed in 1786 and is based on a design by da Vinci that Stefano Ricci, the fashion house which owns the mill, says has been used in Florence since da Vinci was alive. If that is indeed so, it was one of his very few inventions that had a practical application.\n\nLike many an autodidact, da Vinci was long on inquisitiveness but short on intellectual self-discipline. He had astonishing powers of observation, an extraordinary talent for making connections between different areas of knowledge, a readiness to challenge contemporary beliefs and an uncanny ability to anticipate future discoveries. But his life yielded an endless succession of untested contraptions, unpublished studies and unfinished artworks.\n\nAnniversaries are normally opportunities for reappraising the legacy of the great man or woman concerned. Da Vinci’s 500th highlighted the fact that, outside the field of painting, his legacy — as distinct from his genius — was modest. He had brilliant intuitions in fields as diverse as anatomy and hydraulics, but because he failed to publish his theories and findings, hundreds of years were to pass before they were discovered by someone else.\n\nEven his artistic oeuvre, though sublime, is minute. Fewer than 20 finished works are generally attributed to da Vinci. He failed to complete some of his most important commissions such as the “Adoration of the Magi”. His ill-fated experimentation with materials ruined others, including “The Last Supper”. Hence the paucity of exhibitions devoted to his art in what should be his year of years. Florence commemorated him with a show devoted to his master, Verrocchio.'),
(8, '2023-02-17 12:08:27pm', 'Taoism and Nature', 'Nature', 'myuser2', '0_Pt1rh77KsYM_0eJK.jpg', 'Taoism is an ancient pillar of Chinese philosophy pre-dating Zen by nearly a thousand years. It was hugely influential in the development of Chinese Zen (Chan) before the philosophy ever made its way to Japan or the West. I find myself reading the Tao Te Ching at least 2–3 times per year. I believe this ancient text contains all the spiritual wisdom we can hope to document as humans. I’m not kidding. If you told me I could bring only one book to a desert island, I would choose the Tao Te Ching.\n\nThe text is poetic, written simply and declaratively. The words are a perfect mirror of the philosophy they espouse and, weirdly, they remind me of great Western poetic stylists like TS Eliot or Ezra Pound. The mythology of its ‘author’ (Lao Tzu) is epochal and mysterious, akin to Homer or Shakespeare. It was composed independently as a rogue spiritual text before ever becoming the basis for any organized religion. Its message transcends all cultural boundaries and stands the test of time better than any other text of its age. While it reminds me of the aforementioned Western texts at times, its message is more pointedly spiritual and prods at the very roots of how we think and feel.\n\nEnough of that; this isn’t a history lesson. The Tao Te Ching can be read in less than a few hours and contains all the wisdom you need to fuel a lifelong spiritual journey. These lessons have been here for thousands of years and yet barely anyone puts them into practice. In studying them, you allow yourself an opportunity to acquire wisdom over knowledge, to understand rather than to merely know. Investigating the Tao will help you better ‘get’ yourself and revel humbly in the beautiful power of nature.\n\nThe fundamental premise of this “watercourse way” as Alan Watts called it, is harmony with nature. We look to nature for metaphorical lessons in how to live, since we are in and of the Earth and its bounty. In a famous example, Bruce Lee, heavily influenced by the Tao, implored us to ‘be like water’:\n\n“Empty your mind, be formless, shapeless — like water. Now you put water in a cup, it becomes the cup; You put water into a bottle, it becomes the bottle; You put it in a teapot, it becomes the teapot. Water can flow or it can crash.”');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(20) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `admin`) VALUES
(1, 'admin', '$2y$10$Us64Tr5tDcN/in.n88/QRO2FqnIdo.BxQYbKnbxOLCKW.DUknnRn6', 'admin@gmail.com', 1),
(2, 'myuser1', '$2y$10$KIuY8JQ9D8hwyHffBPIh7.JhVzMQRRPrAwP81BmqYN8.wqwKNsYo2', 'user@gmail.com', 0),
(3, 'myuser2', '$2y$10$5zTRjtpj6ULl9YARr9A0sus1XTZTmBFiHO/BGMGH95ByuX8a.OZIG', 'user2@gmail.com', 0),
(4, 'myuser3', '$2y$10$DduxrNG2xdScLdO7ZltY0Ofw702.t/CcKAoAqJhX1R8W/YFN5qZ5q', 'user3@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
