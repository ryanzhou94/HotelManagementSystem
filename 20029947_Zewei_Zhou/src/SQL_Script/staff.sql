CREATE TABLE `staff` (
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (Username),
  UNIQUE (Username)
);
  
INSERT INTO `staff` (`Username`, `Password`) VALUES
('123', '123'),
('abc123', 'qqq');



