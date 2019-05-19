--
-- Table structure for table `notification_set`
--

CREATE TABLE `notification_set` (
	  `id` int(255) NOT NULL,
	  `owner_id` int(255) NOT NULL,
	  `non_user_contact_id` int(255) NOT NULL,
	  `type` tinyint(1) NOT NULL,
	  `datum_record_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='type 0 = datum, 1 = record';

-- --------------------------------------------------------

--
-- Table structure for table `record_request`
--

CREATE TABLE `record_request` (
	  `id` int(11) NOT NULL,
	  `accessor_id` int(255) NOT NULL,
	  `accessed_id` int(255) NOT NULL,
	  `record_id` int(255) NOT NULL,
	  `status` tinyint(255) NOT NULL,
	  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='id accessor_id accessed_id record_id status timestamp ';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notification_set`
--
ALTER TABLE `notification_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record_request`
--
ALTER TABLE `record_request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notification_set`
--
ALTER TABLE `notification_set`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `record_request`
--
ALTER TABLE `record_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

