-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 08:40 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(34, 'sports', 4),
(33, 'National', 8),
(32, 'International', 3),
(35, 'polytics', 1),
(36, 'Media', 1),
(37, 'Bussiness', 0),
(38, 'Tenis', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(57, '36-year-old arrested for raping schoolgirl in Narayanganj', 'Police have arrested a man for raping a schoolgirl in Narayanganj\'s Sadar upazila.\r\n\r\nThe arrestee is Shamim Tarek, 36, a resident of Towarpar area of the upazila, reports our Narayanganj correspondent quoting Ashiq Imran, sub-inspector of Fatullah Model Police Station.', '33', '26 May, 2021', 24, 'pexels-photo-1595387.jpeg'),
(59, 'Who will take the baton from the Fab Four?', 'Bangladesh on Tuesday prevailed through a looming threat of cyclone and registered a thumping 103-run victory over Sri Lanka in Mirpur. The victory sealed the Tigers\' first-ever bilateral series win over the Lankans and with it, Bangladesh also segued from a gloomy period into a state of steadiness, for the time being, in their cricketing adventure.\r\n\r\nBangladesh are now at the summit of the ICC ODI Super League table with 50 points in eight matches, and that ought to lift the Tigers\' spirit as they achieved all this coming on the back of nine losses out of 10 matches across formats.', '34', '27 May, 2021', 24, 'download.jpg'),
(60, '‘National pride at stake boys’: Jayasuriya urges countrymen to win final ODI', 'skipper Sanath Jayasuriya urged his countrymen to \'fight to the last\' in order to salvage some pride and win the final ODI against Bangladesh at the Sher-e-Bangla National Stadium in Mirpur on Friday. \r\n\r\nSri Lanka are on a three-match ODI tour to Bangladesh and things are looking grim for the islanders so far. Following the players\' kerfuffle with their board regarding signing new contract, Sri Lanka traveled with a rather inexperienced side, leaving a few key players out of the squad and under the new leadership of Kusal Perera. \r\n\r\nFor all latest news, follow The Daily Star\'s Google News channel.\r\nThe Lankans have already lost the series 2-0, with the final game of the series yet to be played. Bangladesh, who came into the series on the back of nine losses and a drawn Test in their last 10 matches across formats, had ended their poor run of form with a 33-run victory in the first ODI while their 103-run thumping of the visitors in the second ODI on Tuesday helped the Tigers clinch their first-ever bilateral series against Sri Lanka.\r\n\r\nAnd Jayasuriya, who has never lost a single game against Bangladesh across formats as a captain, found it difficult to fathom that his side are now being thrashed by the Tigers.\r\n\r\n', '34', '27 May, 2021', 24, '299073.4.jpg'),
(56, 'Schools not opening soon', 'he government has extended the closure of educational institutions till June 12, saying the reopening is subject to the drop in Covid infection rate below 5 percent and inoculation of university students.', '33', '26 May, 2021', 24, 'z92banner.png'),
(61, 'Shakib returns to Jamaica Tallawahs in CPL', 'Bangladesh premier all-rounder Shakib Al Hasan will once again be playing for Jamaica Tallawahs in the upcoming Caribbean Premier League (CPL), announced the T20 league on Twitter today. \r\n\r\nThe upcoming edition of CPL is scheduled to begin from August 28.', '34', '27 May, 2021', 24, 'istockphoto-177427917-612x612.jpg'),
(62, 'Govt approves proposal to buy Chinese Covid-19 vaccine at $10 per dose', 'The government has approved a proposal for purchasing 1.5 crore doses of Covid-19 vaccines from China at USD 10 per dose.\r\n\r\nThe decision was taken at the 19th meeting of the Cabinet Committee on Government Purchase today.\r\n\r\nFor all latest news, follow The Daily Star\'s Google News channel.\r\nAfter the meeting, Additional Secretary Shahida Akter disclosed the information at a briefing. \r\n\r\nFifty lakh vaccines will arrive in Bangladesh each month [June, July and August], she said.', '33', '27 May, 2021', 24, 'London-face-masks-epidemic-1024x683.jpg'),
(63, 'Chinese embassy in US says politicising Covid-19 origins hampers investigations', 'Politicising the origins of Covid-19 would hamper further investigations and undermine global efforts to curb the pandemic, China\'s US embassy said after President Joe Biden ordered a review of intelligence about where the virus emerged.\r\n\r\nThe embassy in Washington said in a statement on its website on Wednesday evening \"some political forces have been fixated on political manipulation and (the) blame game\".\r\n\r\nFor all latest news, follow The Daily Star\'s Google News channel.\r\nAlso read: Biden orders review of Covid-19 origins as lab leak theory debated\r\n\r\nAs the World Health Organization (WHO) prepares to begin a second phase of studies into the origins of Covid-19, China has been under pressure to give investigators more access amid allegations that SARS-CoV-2 leaked from a laboratory specialising in coronavirus research in the city of Wuhan.\r\n\r\nChina has repeatedly denied the lab was responsible, saying the United States and other countries were trying to distract from their own failures to contain the virus.', '32', '27 May, 2021', 24, 'pexels-photo-1092644.jpeg'),
(64, 'UN rights body mulling probe', 'The UN Human Rights Council will consider launching a broad, international investigation into abuses in the latest Gaza conflict and also into \"systematic\" abuses, according to a proposal as US Secretary of State Antony Blinken arrived in Cairo to strengthen efforts to shore up ceasefire between Israel and Palestinian militants in Gaza. \r\n\r\nThe Rights Council will hold a special session on the latest conflict today, at the request of Pakistan, as coordinator of the Organisation of Islamic Cooperation (OIC), and the state of Palestine.\r\n\r\nFor all latest news, follow The Daily Star\'s Google News channel.\r\nThose countries submitted a draft resolution late on Tuesday that would establish an independent international commission of inquiry to investigate all human rights violations in the occupied Palestinian territory, including East Jerusalem, and in Israel, since April 13. It would also examine all underlying root causes of tensions and instability, \"including systematic discrimination and repression based on national, ethnic, racial or religious identity,\" the draft said.\r\n\r\nThe independent team would collect and analyse evidence of crimes perpetrated, including forensic material, \"in order to maximise the possibility of its admissibility in legal proceedings\".\r\n\r\nReporting back in June 2022, it would identify those responsible to try and end impunity and ensure legal accountability.', '32', '27 May, 2021', 24, 'photo-1521295121783-8a321d551ad2.jpg'),
(65, '4 children drown in storm surges', 'Four children drowned in tidal water and a rickshaw-puller was crushed under a tree in Barishal division, while low-lying regions in the country were inundated after cyclone Yaas made landfall yesterday noon on the Odisha-West Bengal coast in India.\r\n\r\nIn a briefing yesterday, the state minister for disaster management and relief said 27 upazilas in nine districts were affected by the cyclone.\r\n\r\nFor all latest news, follow The Daily Star\'s Google News channel.\r\nThe met office said Yaas weakened to a severe cyclone from a very severe cyclone and was gradually losing its strength. Yet, all the passenger vessels and fishing trawlers were asked to stay close to the shore until further notice as sea remain very choppy.\r\n\r\nIn Barishal district\'s Bakerganj upazila, two children in separate villages drowned in tidal water.', '35', '27 May, 2021', 24, 'download (1).jpg'),
(66, 'THE BOND OF FRIENDSHIP AND CULTURE', '                                                ITO Naoki: Japan Fest first started about ten years ago to showcase Japanese culture. Previously, we would have an in-person event for people to come to the venue and enjoy a hands-on experience of Japanese culture, such as ikebana, bonsai, tea ceremony, or even trying on a kimono. I believe it\'s a great way to get to know a foreign culture. During in-person events, we would host this at the Shilpakala Academy. A few years ago, we even had around a thousand people taking part in it in one day, and it was a very successful event. Moreover, Bangladeshi and Japanese people also have certain similarities and a natural sense of affinity between themselves. For instance, Japan and Bangladesh love greenery, and both are rice-cultivating nations. Both countries also have strong family values. Additionally, we have industrial, hard-working people. Also, both countries are scarce in natural resources and are prone to natural disasters. So, we have a mutual basis of understanding between ourselves in terms of the cultural front. It is the first time we have held this event virtually, in which Tahsan kindly participated. Thank you very much, Tahsan.                                                ', '36', '27 May, 2021', 24, 'power-politics-1-638.jpg'),
(67, 'Can Tigers play the perfect game?', 'Despite registering a first-ever bilateral ODI series win over Sri Lanka with a game in hand, Bangladesh skipper Tamim Iqbal stated that they were lucky in getting past the hurdles without playing to their best in the first two games of the three-match series.\r\n\r\nAlthough the Tigers will eye the important 10 available ICC ODI Super League points in the final game today, head coach Russell Domingo will also focus on the overall performance and emphasise specific areas.', '34', '28 May, 2021', 25, 'GettyImages-83617213_(1).jpg'),
(68, 'Agri-machinery makers may get 10-year tax break', '                The government is planning to offer a 10-year tax exemption for agricultural machinery manufacturing in order to encourage investment and support farmers\' growing appetite for machines to increase productivity and cut labour-shortage induced higher production costs.\r\n\r\nInvestors considering to sign up for making milk and dairy products and baby foods and establish facilities to process locally produced fruits and vegetables are also likely to get the same benefit, said finance ministry officials.                ', '33', '28 May, 2021', 25, '61W1Rd1+aLL._SX258_BO1,204,203,200_.jpg'),
(69, 'Banking hour 10am to 3pm until June 6', '                Bangladesh Bank today extended the banking hour by half an hour and decided to keep banks open from 10am to 3pm from tomorrow until June 6.\r\n\r\nHowever, the branches will remain open until 4:30 pm to complete their regular procedures.\r\n\r\nFor all latest news, follow The Daily Star\'s Google News channel.\r\nThe central bank took the decision after the government extended the nationwide restrictions on public movement until June 6 to curb Covid-19 infections.\r\n\r\nBanks have been following the rostering system for their employees since April 14 as per the instructions of the banking regulator and the government.\r\n\r\nThe government enforced lockdown-like controls from April 5 after the Covid-19 infections rate and death tolls began rising alarmingly.                ', '33', '30 May, 2021', 32, 'photo-1529107386315-e1a2ed48a620.jpg'),
(70, '$200 million currency swap: Stepping up in Sri Lanka’s hour of need', '                In a first for Bangladesh, the country has extended a lifeline of sorts to the beleaguered Sri Lankan economy, offering to top up the island nation\'s depleting foreign reserves by as much as $500 million.\r\n\r\nThe global coronavirus pandemic has deprived Sri Lanka, which has $3.7 billion of foreign debt maturing this year, of important sources of foreign currency such as tourism and exports.\r\n\r\nFor all latest news, follow The Daily Star\'s Google News channel.\r\nIts $4.5 billion tourism industry, which was already reeling from the 2019 Easter Sunday bombings that killed 279 people, was hit particularly hard, while its exports were down about 17 percent in 2020.\r\n\r\nAt the end of April, Sri Lanka\'s foreign exchange reserves stood at about $4 billion, which is enough to cover the import bills for three months.\r\n\r\nOn the other hand, Bangladesh\'s reserves are hitting a new high each month. At the end of April, reserves crossed the $45 billion-mark for the first time.                ', '32', '30 May, 2021', 32, '1622404771-download.jpg'),
(71, 'Is Bangladesh prepared for the Indian Covid-19 variant?', 'After ravaging our neighbouring country, the Indian variant of coronavirus is spilling into Bangladesh. Local transmission of this variant has already been confirmed by the experts. Meanwhile, sudden rise in Covid-19 detection rate in frontier areas are alarming.\r\n\r\nFor all latest news, follow The Daily Star\'s Google News channel.\r\nExperts are suggesting strict restrictions in those areas to ensure containment. But, what is the actual situation there? Is Bangladesh ready to handle this threat?\r\n\r\nIn today\'s Straight from Star Newsroom Debjani Shyama tries to understand the current situation of coronavirus in Bangladesh and the border areas with The Daily Star reporter Moudud Ahmmed Sujan.', '33', '30 May, 2021', 32, '1622403899-'),
(72, 'areas are alarming.', 'After ravaging our neighbouring country, the Indian variant of coronavirus is spilling into Bangladesh. Local transmission of this variant has already been confirmed by the experts. Meanwhile, sudden rise in Covid-19 detection rate in frontier areas are alarming.\r\n\r\nFor all latest news, follow The Daily Star\'s Google News channel.\r\nExperts are suggesting strict restrictions in those areas to ensure containment. But, what is the actual situation there? Is Bangladesh ready to handle this threat?\r\n\r\nIn today\'s Straight from Star Newsroom Debjani Shyama tries to understand the current situation of coronavirus in Bangladesh and the border areas with The Daily Star reporter Moudud Ahmmed Sujan.', '33', '30 May, 2021', 32, '1622404263-image.jpg'),
(73, 'In today\'s Straigh 1234', '                                                                                After ravaging our neighbouring country, the Indian variant of coronavirus is spilling into Bangladesh. Local transmission of this variant has already been confirmed by the experts. Meanwhile, sudden rise in Covid-19 detection rate in frontier areas are alarming.\r\n\r\nFor all latest news, follow The Daily Star\'s Google News channel.\r\nExperts are suggesting strict restrictions in those areas to ensure containment. But, what is the actual situation there? Is Bangladesh ready to handle this threat?\r\n\r\nIn today\'s Straight from Star Newsroom Debjani Shyama tries to understand the current situation of coronavirus in Bangladesh and the border areas with The Daily Star reporter Moudud Ahmmed Sujan.                                                                                ', '33', '30 May, 2021', 32, '1622404854-5718897981_10faa45ac3_b-640x624.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `website_title` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `footer_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`website_title`, `logo`, `footer_desc`) VALUES
('News site', 'logo.png', '© Copyright 2021 News | Powered by news site');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(24, 'sh', 'shojol', 'shshojol', 'ddc65efaf458fdf8531b66de15e9bc45', 1),
(25, 'Md', 'Parvez', 'hasan', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(27, 'Md', 'surovi', 'surovi', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(28, 'md', 'sagor', 'sagor', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(29, 'md', 'rahul', 'rahul', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(30, 'md', 'karan', 'karan', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(31, 'md', 'raj', 'raj', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(32, 'md', 'alom', 'alom', '827ccb0eea8a706c4c34a16891f84e7b', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
