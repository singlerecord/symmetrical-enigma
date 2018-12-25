CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `friender_id` int(255) NOT NULL,
  `friended_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

