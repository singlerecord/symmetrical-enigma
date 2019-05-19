
CREATE TABLE `non_user_contact` (
	  `id` int(11) NOT NULL,
	  `email` varchar(100) NOT NULL,
	  `owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `non_user_contact`
--
ALTER TABLE `non_user_contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `non_user_contact`
--
ALTER TABLE `non_user_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

