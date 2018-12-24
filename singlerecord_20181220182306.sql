
CREATE TABLE `dataset` (
  `id` int(255) NOT NULL,
  `datum_id` int(255) NOT NULL,
  `record_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `record` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `dataset`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `dataset`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

ALTER TABLE `record`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

