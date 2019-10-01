CREATE TABLE `guest` (
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Passport` varchar(255) NOT NULL,
  `Telephone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  PRIMARY KEY (Username),
  UNIQUE (Passport),
  UNIQUE (Username)
);

INSERT INTO `guest` (`Username`, `Password`, `Firstname`, `Lastname`, `Passport`, `Telephone`, `Email`) VALUES
('123', '123', 'Sss', 'Qwe', 'ss', 'ss', '2131@qq.com'),
('1234', 'wqe', 'Sww', 'Sf2', 'wqe', 'wde', '321@qq.com'),
('123sstt', 'wqessss', 'Qss', 'Sff', 'wqessss', 'ww', 'Sw@qq.com'),
('412421', 'sad', 'Rq', 'Qs2', 'sad', 'dasd', 'wqe@qq.com'),
('asdsff', 'saddd', 'Arr', 'Sww', 'saddd', 'sda', 'sad@qq.com'),
('qwe', 'rrr', 'Sqq', 'Jqq', 'rrr', 'ads', '12344@qq.com');



