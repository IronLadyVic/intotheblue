-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Sep 12, 2014 at 12:45 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `into-the-blue`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `topic_id` int(11) NOT NULL,
  `photo_path` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `topic_id` (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`, `updated_at`, `deleted_at`, `topic_id`, `photo_path`) VALUES
(1, 'Body surfing', 'The water was cooler - maybe 17 at first - but I still trunked it comfortably for over 1.5 hours.  The early photos don''t show it, but it was sunny throughout, yet the glossy surface remained undisturbed. \r\n\r\nPaul and I found the stretch between the Main Peak and the Rocks empty, and worked long lefts and occasional tubes alone for most the session until a couple of sticks decided to paddle out exactly where we were and endeavor to take every wave ... whether they could make it or not.  Not nearly enough, though, to spoil a sweet session.  Dozens of waves, sliding along glossy, shoulder-high ramps, deep into the inside. ', '2014-09-08 01:05:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'bodysurfing.png'),
(2, 'Dunedin bodyboarder champion', 'Dunedin bodyboarder Ben Mackinnon placed fifth overall in a high-class event on Australia''s Gold Coast this month, fresh off winning two New Zealand titles.\n\nMackinnon was up against some quality competition, and the tricky conditions and onshore winds meant he had to make some tough decisions in the surf.\n\nThe Rebel Sport Pro at Duranbah beach on the Gold Coast is a World Tour-recognised event and includes top Australians, and a few other big names from around the world.\n\nMackinnon originally entered the open men''s division of the Australian national titles, which was held in conjunction with the Rebel Sport Pro.\n\nAfter bowing out early in the open men''s event, Mackinnon decided to enter the professional division, in which he had to surf up to eight 20-minute heats to make the finals.', '2014-09-08 01:52:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 'bodyboarding1.jpg'),
(3, 'Cape Fear', 'First, the contest. In case you didn’t know the whereabouts of Cape Fear, it’s Ours, the often-seen slab in Sydney, Australia. But “Cape Fear” sounds scarier. In short, the contest consists of 14 invited surfers (including Jamie O’Brien, Bruce Irons, Ryan Hipwood and Dave Rastavich) competing in seven man-on-man matchups, which are called “battles.” The pairings are based on the surfer’s ability. Half of each heat will be paddle-in, the other half will be tow-in (more or less, the site says “approximately 20 minutes” for the paddle/tow ratio). And the first six heats are the “undercard” for the main event. If you’re not confused yet, rest assured that two heats will be running simultaneously. Still with me? Quick, what rhymes with orange?', '2014-09-08 01:06:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 'surfing1.jpg'),
(4, 'Undertow', 'My first surf race was in 2008 at Ohope Beach for surf lifesaving nationals, the waves were over 15ft high. ', '2014-09-08 01:52:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, 'mastersphoto500.jpg'),
(5, 'The Green Wind Surfer', 'Sopot, the Miami Beach of the north, was the venue of the first Open Polish Kona One Championships. After two days of intense racing in demanding conditions, the very experienced Arek Fedusio was the winner,  followed by Joachim Larsson and young talent ?ukasz Buderaski. Another impressive sailor, 17 year old Martyna Mossakowska, finished first among the ladies and sixth overall.\r\n\r\nIt was an extraordinary weekend, as the Polish windsurfing community met the Kona One for the first time. Poland has produced some of the best international windsurfers in recent years including World Champions Przemys?aw Miarczy?ski (RS:X) and event organizer Maksymilian Wojcik (Raceboard). The Polish RS:X team is also top of the world rankings.\r\n\r\nAltogether fifteen racers, both female and male, met up for the championship at Klub Zeglarski in Sopot, where a great number of international windsurfing and sailing championships have taken place over the years. There was an even split between young and experienced sailors, all having had a solid race background and all having listened to the call of “no-pumping” and “one board and one sail”. The question was: would the Polish pump gurus accept the new conditions?\r\n\r\nThe first race day was Saturday and the Baltic Sea greeted the sailors with a good onshore breeze of 20 knots and two meter waves. The course was set as a classical upwind-downwind. To give the sailors some extra motivation the race officer had placed the downwind mark at the shore-break.', '2014-09-08 01:53:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 'green wind surfing.jpg'),
(6, 'Surf Boating', 'The Titahi Bay surf boat crew sealed a spot in the New Zealand team after dominant performance in the latest round of the national series in Whangamata today.\r\n\r\nThe Capital Coast crew of Nick Boyd, Jordan Te Paa, Dean Ellis, Jono Boyd and sweep Wil McDowell won a tight final over arch-rivals Piha, having also beaten them in the semifinals and in a four-race trial earlier in the day.  Selectors confirmed their spot late in the day, with McDowell delighted to be taking on Australia''s best in Newcastle next month after his crew narrowly missed out last year.\r\n\r\n"It''s been a big day and the boys were starting to feel it through the rounds but they found a bit extra in the semifinal and final," McDowell said. "We had a good chat together and talked about the disappointment last year and how the only thing we could do was make it clear-cut for the selectors this year.  Last year was definitely in the back of my mind and I think we all used it as motivation today."\r\n\r\nTitahi Bay have benefitted from the return of veteran Dean Ellis, bolstering his relatively youthful teammates who have come up through the under-23 ranks.\r\n\r\n"Dean''s been in New Zealand teams in the past and having that experience in the boat has just been invaluable.  We had a good platform to work from but he''s been a big factor in helping getting us to where we are today."\r\n\r\nMairangi Bay, featuring trans-Tasman rower Shaun Quincey, came through for third in the men''s final, while Piha sweep Mark Bourneville provided a nice touch by wishing McDowell and his crew all the best in Australia after the final.\r\n\r\nTitahi Bay were joined in the national ranks by Red Beach''s champion women''s crew, who came through to beat Piha and Omanu in the female final.\r\n\r\nEligibility and injury issues meant the women''s trial was abandoned, so Red Beach''s Zita Talaic-Burgess said her crew was determined to make the rest of the racing count.\r\n\r\n"We came prepared to do a lot of races and we had to perform no matter what, especially if we''re the ones going to Australia," Talaic-Burgess explained.  "We''ve done lots of training, both on and off the water, to prepare for this season and we''re delighted to be able to claim the win today."\r\n\r\nThe Red Beach ranks were made up of Kelly Andrew, Katrina Gouldstone, Ashleigh Jenkins, Madison Smith and sweep Shane O''Halloran, with O''Halloran also sweeping the Red Beach under-23 men''s crew to victory over Piha and Waihi Beach.\r\n\r\nWaihi Beach, swept by 76-year-old veteran Dan Harris, had revenge in the under-19 men''s final, while Paekakariki capped an excellent day by taking out both the under-21 and under-19 women''s finals.\r\n\r\nThe next event in the series is the Piha Big Wave Classic in early February.', '2014-09-08 01:53:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 6, '300px-Alexandra_Headland_Colts.jpg'),
(7, 'Bondi', 'A boat crew shall consist of five competitors, four of whom shall be “rowers” and a “sweep” who controls the boat by use of a sweep oar and commands to the rowers.\r\n\r\nBoat crews start at the water’s edge holding their boats ready. On the starting signal, crews row around their assigned turning buoy situated approx 400metres off shore and return to the beach. The winner is the first crew to pass their boat between the finish flags on the beach.', '2014-09-11 04:38:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 6, 'bondiboating.jpg'),
(8, 'Surfs up man', 'In tow-in surfing (most often, but not exclusively, associated with big wave surfing), a motorized water vehicle, such as a personal watercraft, tows the surfer into the wave front, helping the surfer match a large wave''s higher speed, which is generally a higher speed than a self-propelled surfer can produce. Surfing-related sports such as paddle boarding and sea kayaking do not require waves, and other derivative sports such as kite surfing and windsurfing rely primarily on wind for power, yet all of these platforms may also be used to ride waves. Recently with the use of V-drive boats, wake surfing, in which one surfs on the wake of a boat, has emerged. The Guinness Book of World Records recognized a 78 feet (23.8 m) wave ride by Garrett McNamara at Nazaré, Portugal as the largest wave ever surfed.[1]', '2014-09-11 04:38:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'bodysurfsup.png'),
(9, 'How to body surf', 'More of an art than a sport, body surfing is pure communion with the ocean. You are literally gliding across the face of wave, using nothing more than your body. On your last beach vacation, you may have tried body surfing on your own. But chances are that you ended up swimming like mad toward shore, hoping that the oncoming wave would lift you up, only to find yourself sinking and performing some kind of underwater summersault.\r\nBody surfing requires almost no preparation, except to know a few safety tips and basic techniques. The only equipment you need is swim fins. It is possible to catch waves very near the shore without fins, but then the rides wil be much shorter.', '2014-09-11 22:05:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'body_surfing2.jpg'),
(10, 'technique', 'In waist- to chest-deep water, you can simply push off the ocean floor, start stroking toward shore, and angle down the face of the oncoming wave. Presto...you''re a body surfer! If you''re in deeper water, or if you are catching waves are breaking further outside, you will need swim fins to gain enough speed.\r\nThe trick to body surfing is to get your head and shoulders down below your hips and legs. When this happens, the hips and legs rise and your center of balace shifts downward. Gravity, aided by the force of the wave and your strokes and kicsk, starts the slide. Once the slide begins and you feel the exuberant rush, your head and shoulders will come up. Now the chest becomes a planning surface, and off you go with your body becoming a surfboard.\r\nOn larger, well-formed waves, more experienced body surfers cut diagonally across the face of a wave, trying to race the peeling curl.\r\nIf you see a wave coming and you don''t want to body surf it, drop the shoulder that faces the wave. This motion turns your body into the wave and pushes you out the back of the wave. This is NOT a forward roll movement. Push yourself back into the wave, stroking to make sure you come out the back.', '2014-09-11 22:05:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'bodysurf.jpg'),
(11, 'BODYSURFING FINS:', 'There are a ton of different types and brands of bodysurfing fins out there. Here is a short list of some of the more popular and innovative bodysurfing fins to get you started on your search for a new set of fins.', '2014-09-11 22:07:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'bodysurfsup.png'),
(12, 'The Wedge - Newport Beach, California', 'The Wedge is one of the most famous bodysurfing spots in the world, located in Newport Beach California. Wave faces here can reach upwards of 20 feet on big south swells and hurricane-generated swells during the spring, summer, and fall. Known as a proving ground for the world''s best, The Wedge is for the most experienced bodysurfers only.', '2014-09-11 22:07:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'thewedge.jpg'),
(13, 'Basics: Surfing vs. Bodyboarding', 'Surfers ride a variety of board sizes for different wave types or styles of riding whereas bodyboarders predominantly ride waves on a smaller board made from a foam-like material in a prone position (laying on their stomach) and use fins on their feet to assist in kicking into surf. Surfing requires a high level of coordination, balance and wave knowledge while on your feet. Bodyboarders, on the other hand, are required to be just as agile in the water with a keen sense of how to distribute body weight while riding. - See more at: http://www.mensfitness.com/life/sports/shining-the-spotlight-on-bodyboarding#sthash.efk2WSG7.dpuf', '2014-09-11 22:20:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 'bodyboarding.jpg'),
(14, 'Bondi boarding', 'Waves come in all shapes and forms, which are determined by the swell direction, shape of the sandbars or reef on the bottom, wind direction and other geographical factors. These days, both surfers and bodyboarders are riding unique and challenging waves, however, bodyboarders typically opt for more "ledgy" or steep waves whereas surfers could have some difficulty getting a quality ride. Surfers, however, do have an advantage in longer, faster waves with the ability to gain more speed standing up on a board - See more at: http://www.mensfitness.com/life/sports/shining-the-spotlight-on-bodyboarding#sthash.efk2WSG7.dpuf', '2014-09-11 22:09:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 'Duncan_Smith_Medium.jpg'),
(15, 'Christie Jumps 15 Places to 14th On World Qualifying Series With Podium Finish', 'Gisborne surfer Richard Christie has jumped 15 places to 14th on the Association of Surfing Professionals (ASP) World Qualifying Series (WQS) after the most recent event completed early Sunday morning (NZ time).\r\n\r\nChristie placed third at the Sata Airlines Azores Pro, his best result of the season.  Christie was eliminated in the semifinals on the final day of the competition by eventual winner Jesse Mendes (BRA).  After a stellar run through a stacked field of high calibre surfers, Christie found himself trailing Mendes early before bouncing back with a 7.50 point ride, the highest of the heat.  Christie then posted a 4.0 point ride to level with Mendes before the Brazilian answered back and took the win 14.10 to Christie’s 11.50.\r\n\r\n“It was really tough to find the right waves, and I fell off on one where I could have maybe gotten the score,” Christie said.\r\n“I still had fun and I’m stoked for my result. I haven’t really thought of the rankings scenario just yet, but I’ll sure start looking at things and possibilities.  I have a couple more days here and I’m just going to enjoy myself, it’s such a beautiful place.”', '2014-09-11 22:13:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 'Ricardo_Christie_NZL1129azores14poullenot.jpg'),
(16, 'New Zealand Surfing Team Announced For 50th Anniversary of World Surfing Games', 'Surfing New Zealand has today (Friday 5th September) named six surfers in the New Zealand Surfing Team to compete at the 2014 ISA World Surfing Games.  The event will be held at Punta Negra, Peru from the 24th October – 1st November, the event marking the 50th anniversary of the International Surfing Association. \r\n\r\nThe team is highlighted by Association of Surfing Professionals (ASP) competitors Matt Hewitt (Mnt) and Sarah Mason (Gold Coast).\r\n\r\nThe two surfers have several years of international experience touring the world on the ASP World Qualifying Series and in Mason’s case on the ASP World Tour in 2012.  Mason is the only surfer to not have previously competed in the New Zealand Surfing Team.  However, Mason was a member of the junior team in 2010 where she finished eighth in the Under 18 Girls Division of the ISA World Junior Championship.', '2014-09-11 22:13:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 'Matt_Hewitt_Nats2014b.jpg'),
(17, 'What Surf Sports is all about\r\n\r\n', 'Strength and humanity. Passion and commitment. Turning the ordinary into the extraordinary.\r\n\r\nA national sport, Surf Sports offer a prime training ground for the physical and psychological demands of saving lives in the surf.\r\n\r\nJunior Surf members, as young as seven get to enjoy the fun and excitement of pitting themselves against each other.\r\n\r\nRegardless of ability or interest, events range from Club based competitions to District and National U14 Championships.\r\n\r\nQualified Lifeguards can participate in District Surf Sport events, which help build their peak performance for the New Zealand Championships held in March.\r\n\r\nEvents span the range of rescue skills and test competitors’ strength, fitness and agility in swimming, running, paddling a surf ski, board or canoe or rowing a surf boat.\r\n\r\nRacing Inflatable Rescue Boats is an increasingly popular part of our sport.', '2014-09-11 22:16:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, 'poollifesaving.jpg'),
(18, 'coaching programme \r\n', 'The full weekly summer programme begins in October 2014.  The programme will run until the National Championships in March 2015.  All Surf Sports competitors are catered for from age 10 years and older. The programme is athlete focused - this means the programme is based around getting the best out of our athletes and why the programme is split into four levels of ability.  These levels are:\r\n\r\n1. Beginner                  2. Intermediate            3.Advanced          4. Elite', '2014-09-11 22:16:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, 'queenslandlifesaving.jpeg'),
(19, 'North Island Slalom Cup', 'This season there will be a North Island Cup (slalom) awarded to the best result from 3 events:\r\n- Tauranga Spring Windsurf Fun Slalom 20/21 September\r\n- Wellington Slalom Plus 29/30 November\r\n- Auckland Slalom Series (1 selected round)\r\nResults will be based on the individuals best results from 2 of the 3 events (i.e. Auckland/Tauranga or Tauranga/Wellington) - this should mean you are in with a chance if you only enter 2 of the 3 events', '2014-09-11 22:17:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 'windsports.jpeg'),
(20, 'Help NZ Windsurfers to Worlds and Youth Olympics', 'Come on board! Donate now! Claim a ''Perk'' and go into a monthly prize draw. Become part of the team supporting four young New Zealand Windsurfers. They have been nominated for the Youth Worlds and Youth Olympics. Go Kiwis!!!\r\n\r\n\r\n', '2014-09-11 22:17:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 5, 'Windsurfing.jpg'),
(21, 'Champions in big boats', 'Reigning champions, Piha A, has emerged Reigning champions, Piha A, has emerged victorious as open men’s surf boat champs at the nationals at Mt Maunganui yesterday (8 March 2013). Piha Pistols also cleaned up the under-23 surf boat title, with Piha Pirates third. Piha Pedators were 2nd in under-19 men’s.\r\nPiha A’s team was Scott Lissington, Chris Morris, Benjamin Richards, Nen Scott and Mark Bourneville.\r\nPiha Pistols was Cedric Bourneville, Ludoivic Bourneville,  Bejamin Richards, Oliver Sawbridge, Jean-Paul Smit and Mark Bourneville.\r\nPiha Pirates was Ben Flight, Rhye Jacka, Nicolas MacKenzie and Shamus O’Halloran.\r\nPiha has surely regained its historic pre-eminence in the surf boat, under the leadership of Horse. Will a similar leader emerge to take Piha to the front again in the surf skI?\r\nKirsty Wannan was 2nd in the open women’s surf race.', '2014-09-11 22:19:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 6, 'surfboat.jpg'),
(22, 'Sweeping all before – Champion Piha Boaties', 'It doesn’t get better than this. Look at that tightly disciplined technique of the Piha Pirates crew (closest to camera), Horse on the sweep, with the Australian Tannun crew behind (in a Piha-borrowed boat).\r\nPiha crew are the newly crowned kings of surf-boating in Australasia so this was a big one to win, and they did it,  in big, tough surf.\r\nWins in both the Open Men’s and Under-23s gave Horse the double-sweep victory.\r\nPiha has now firmly established itself as the creme de la creme top surf boating club in New Zealand. Shows what a goal, successional planning,  dedication, practice and inspiring leadership can do.', '2014-09-11 22:19:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 6, 'Pirates-and-Tannun-on-same-wave-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Body Surfing', '2014-09-04 01:45:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Body Boarding', '2014-09-04 01:45:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Surfing', '2014-09-04 01:46:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Surf Sports', '2014-09-04 01:46:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Wind Surfing', '2014-09-04 01:47:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Surf Boating', '2014-09-04 01:47:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(1000) NOT NULL,
  `password` varchar(300) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `avatar` varchar(1000) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `avatar`, `admin`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `username`) VALUES
(1, 'pdavis@gmail.com', '1', 'Paul', 'Davis', 'bla.jpg', 0, '', '2014-09-09 02:23:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'pdavis'),
(2, 'vicram@hotmail.com', '1', 'Vic', 'Clark', 'bla.jpg', 0, '', '2014-09-09 02:23:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'vicram'),
(3, 'tomassy@gmail.com', '1', 'Tom', 'Clark', 'bla.jpg', 0, '', '2014-09-09 02:23:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Tbomb'),
(4, 'jane@yahoo.co.nz', '1', 'Jane', 'Clark', 'bla.jpg', 0, '', '2014-09-09 02:23:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Jane'),
(5, 'v@g.com', '$2y$10$YnxDoYAi8dRmictsIVh2auieQptXWEnP/ZIFxV8pvxegFRJjRx5DG', 'Victoria', 'Clark', '036ab6d.jpg', 0, '', '2014-09-09 13:58:26', '2014-09-09 13:58:26', '0000-00-00 00:00:00', 'Vic');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`);
