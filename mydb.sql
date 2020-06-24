-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2020 at 04:13 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `emailid` varchar(40) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `recepient` varchar(6) NOT NULL DEFAULT 'admin',
  `recepientId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `subject`, `emailid`, `message`, `recepient`, `recepientId`) VALUES
(1, 'John Wick', 'Query', 'johnwick@gmail.com', 'I would like to know the process of installing this system at my home', 'admin', 0),
(4, 'test', 'tetst', 'test@email.com', 'Delete Test', 'admin', 0),
(7, 'Frank Senior', 'Account', 'franksr@email.com', 'Dear Administrator,\r\nMy wife has trouble accessing her account. Please look into it.\r\nHer email is bertha@gmail.com.\r\nThank you', 'admin', 0),
(8, 'Vishal Patel', 'Recovery Progress', 'vishalpatel2788@gmail.com', 'Dear Dr. George,\r\nWould it be possible to get some further medication as I am often feeling faint.', 'doctor', 18),
(9, 'Frank Senior', 'Thank you', 'franksr@email.com', 'Dear Martin,\r\nOur whole family would like to thank you for helping our son get back on his feat.\r\nWe appreciate all you have done.\r\nSincerely,\r\nFrank Sr', 'doctor', 6),
(12, 'John Snow', 'Thank you', 'johnsnow@email.com', 'Dear Dr. George,\r\nI would like to thank you for all your help.\r\nThe recovery went smoothly due to your assistance.\r\nThank you again for everything', 'doctor', 18);

-- --------------------------------------------------------

--
-- Table structure for table `doctorsdetails`
--

CREATE TABLE `doctorsdetails` (
  `DoctorId` int(10) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Street` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `Nationality` varchar(100) NOT NULL,
  `Speciality` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Qualifications` varchar(100) NOT NULL,
  `Availability` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorsdetails`
--

INSERT INTO `doctorsdetails` (`DoctorId`, `FirstName`, `LastName`, `Phone`, `Street`, `City`, `Country`, `Gender`, `DOB`, `Nationality`, `Speciality`, `Department`, `Qualifications`, `Availability`) VALUES
(6, 'Martin', 'John', '987654321', '1 Rue', 'London', 'England', 'Male', '2019-12-10', 'English', 'Cardiologist', 'Orthopedics', 'MBBS', 'Yes'),
(18, 'George', 'Ezra', '1234657980', '14 Chatlet', 'Paris', 'France', 'Male', '2017-12-31', 'French', 'General', 'Regular', 'Master in Medicine', 'Yes'),
(37, 'Lawrence', 'King', '987654321', '6, Rue Vaugirad', 'Paris', 'France', 'Male', '1986-07-21', 'French', 'General Practioner', 'Medicine', 'MBBS', 'Yes'),
(105, 'Scarlett', 'Johansson', '9587460249', '1 Avenue du Colonel Henri, 75014', 'Paris', 'France', 'Female', '1975-02-08', 'American', 'Neurosurgeon', 'Surgery', 'BMBS', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

CREATE TABLE `guardian` (
  `GuardianId` int(11) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Street` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `PatientID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`GuardianId`, `Phone`, `Street`, `City`, `Country`, `Gender`, `DOB`, `PatientID`) VALUES
(61, '9587424780', '35 Rue du Chevalier de la Barre - 75018', 'Paris', 'France', 'Male', '1987-11-30', 2),
(101, '', '', '', '', '', '', 100),
(102, '', '', '', '', '', '', 100),
(104, '4468465825', '207 Rue du Faubourg Saint-Denis, 75010', 'Paris', 'France', 'Male', '1988-02-22', 2),
(106, '764061985', '10 Rue Vaugirard', 'Paris', 'France', 'Female', '1978-12-29', 2);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `idPatient` int(10) NOT NULL,
  `First_Name` varchar(45) DEFAULT NULL,
  `Last_Name` varchar(45) DEFAULT NULL,
  `Phone_number` varchar(45) DEFAULT NULL,
  `BirthDate` varchar(45) DEFAULT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `Cholesterol` varchar(450) DEFAULT NULL,
  `Emerg_FirstName` varchar(45) DEFAULT NULL,
  `Emerg_LastName` varchar(45) DEFAULT NULL,
  `Emerg_Relation` varchar(45) DEFAULT NULL,
  `Emerg_PhoneNumber1` varchar(20) DEFAULT NULL,
  `Emerg2_PhoneNumber2` varchar(20) DEFAULT NULL,
  `Emerg_PhoneNumber2` varchar(20) DEFAULT NULL,
  `HepatitisB` varchar(45) DEFAULT NULL,
  `ChickenPox` varchar(45) DEFAULT NULL,
  `Measles` varchar(45) DEFAULT NULL,
  `Medical_History` varchar(800) DEFAULT NULL,
  `Height` varchar(45) DEFAULT NULL,
  `Weight` varchar(45) DEFAULT NULL,
  `DoctorId` int(11) DEFAULT NULL,
  `Gender` varchar(30) NOT NULL,
  `Occupation` varchar(30) NOT NULL,
  `Marital_Status` varchar(30) NOT NULL,
  `EmailID` varchar(50) NOT NULL,
  `Social_Security` varchar(50) NOT NULL,
  `Emerg2_Relation` varchar(50) NOT NULL,
  `Emerg2_FirstName` varchar(50) NOT NULL,
  `Emerg2_PhoneNumber1` varchar(20) NOT NULL,
  `BloodPressure` varchar(100) NOT NULL,
  `HeartDisease` varchar(100) NOT NULL,
  `Vaccination_History` varchar(100) NOT NULL,
  `OtherHealthIssues` varchar(500) NOT NULL,
  `Emerg2_LastName` varchar(30) NOT NULL,
  `DoctorComments` text DEFAULT NULL,
  `RoomNo` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`idPatient`, `First_Name`, `Last_Name`, `Phone_number`, `BirthDate`, `Address`, `Cholesterol`, `Emerg_FirstName`, `Emerg_LastName`, `Emerg_Relation`, `Emerg_PhoneNumber1`, `Emerg2_PhoneNumber2`, `Emerg_PhoneNumber2`, `HepatitisB`, `ChickenPox`, `Measles`, `Medical_History`, `Height`, `Weight`, `DoctorId`, `Gender`, `Occupation`, `Marital_Status`, `EmailID`, `Social_Security`, `Emerg2_Relation`, `Emerg2_FirstName`, `Emerg2_PhoneNumber1`, `BloodPressure`, `HeartDisease`, `Vaccination_History`, `OtherHealthIssues`, `Emerg2_LastName`, `DoctorComments`, `RoomNo`) VALUES
(2, 'Frank', 'Peterson', '91', '2000-01-03', '10', 'Yes', 'John', 'Kennedy', 'Friend', '123456798', '', '', 'Yes', 'IMMUNE', 'NOT IMMUNE', 'Liver disease', '199', '99', 6, 'Male', 'Unemployed', 'Other', 'frank@gmail.com', '1234567890', 'Brother', 'Mark', '987987987', 'Yes', 'No', 'Small pox', 'Kidney Failure', 'Henry', 'Patient has recovered\r\nNo more treatment necessary', 302),
(3, 'Vishal', 'Patel', '07541236951', '1992-02-13', '1 rue des poissonniers', 'Yes', 'Mark', 'Ronson', 'Friend', '5556522255', '5265558522', '54545454545', 'No', 'NOT IMMUNE', 'NOT IMMUNE', 'Sugar', '178', '70', 18, 'Male', 'Unemployed', 'Married', 'vishalpatel2788@gmail.com', '2222455214', 'Friend', 'Amy', '7845855545', 'Yes', 'No', 'General', 'Liver problem', 'Shaw', 'Recovery is proceeding well\r\nLot of sleep required\r\nBlood pressure needs to be carefully monitored', 210),
(56, 'John', 'Snow', '9988776655', '2011-11-11', '10 Rue Butte Aux Cailles', 'Yes', 'Arya', 'Stark', 'Sister', '9273498275', '8873612007', '8627349106', 'Yes', 'IMMUNE', 'IMMUNE', 'Sugar', '190', '82', 18, 'Male', 'Employed', 'Single', 'johnsnow@email.com', '12314325', 'Sister', 'Sansa', '0764061654', 'No', 'Yes', 'ChickenPox, Small Pox, Measles', 'Kidney', 'Stark', 'Patient will make full recovery soon.\r\nRequires a few more days of rest.\r\n', 0),
(58, 'Joey', 'Tribianni', '9988776652', '1990-06-20', '20 Rue du Faubourg Saint-Denis, 75010 Paris', 'No', 'Ross', 'Geller', 'Friend', '9865413895', '', '', 'No', 'IMMUNE', 'NOT IMMUNE', 'Amnesia', '196', '85', 6, 'Male', 'Employed', 'Single', 'joey@email.com', '13424325', 'Friend', 'Phoebe', '9786300015', 'Yes', 'No', 'ChickenPox, Small Pox', 'Liver', 'Buffet', 'No comments at the moment', 112),
(100, 'Test1', 'T', '9988776652', '1990-06-20', '20 Rue du Faubourg Saint-Denis, 75010 Paris', 'No', 'Ross', 'Geller', 'Friend', '9865413895', '', '', 'No', 'IMMUNE', 'NOT IMMUNE', 'Amnesia', '196', '85', 6, 'Male', 'Employed', 'Single', 'test@email.com', '13424325', 'Friend', 'Phoebe', '9786300015', 'Yes', 'No', 'ChickenPox, Small Pox', 'Liver', 'Buffet', 'Under strict supervision\r\nBloodpressure needs to be lowered\r\nMore vitamin intake required', 203);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `RoomID` int(11) NOT NULL,
  `RoomNo` int(20) DEFAULT NULL,
  `Location` varchar(45) DEFAULT NULL,
  `Occupied` varchar(3) NOT NULL,
  `HeartRateSensor` varchar(3) DEFAULT NULL,
  `HeartRateSensorID` int(11) NOT NULL,
  `BloodPressureSensor` varchar(3) NOT NULL,
  `BloodPressureSensorID` int(11) NOT NULL,
  `SleepSensor` varchar(3) NOT NULL,
  `SleepSensorID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`RoomID`, `RoomNo`, `Location`, `Occupied`, `HeartRateSensor`, `HeartRateSensorID`, `BloodPressureSensor`, `BloodPressureSensorID`, `SleepSensor`, `SleepSensorID`, `PatientID`) VALUES
(4, 112, 'Saint John\'s Hospital, 1st Floor', 'Yes', 'Yes', 2, 'Yes', 3, 'No', 0, 58),
(5, 203, 'Saint John\'s Hospital, 2nd Floor', 'Yes', 'Yes', 4, 'Yes', 6, 'Yes', 5, 100),
(6, 210, 'Saint John\'s Hospital, 2nd Floor', 'Yes', 'Yes', 7, 'Yes', 9, 'Yes', 8, 3),
(7, 302, 'Saint John\'s Hospital, Foor 3', 'Yes', 'Yes', 10, 'No', 0, 'No', 0, 2),
(8, 101, 'Saint John\'s Hospital, 1st Floor', 'No', 'Yes', 11, 'Yes', 12, 'No', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE `sensor` (
  `SensorID` int(11) NOT NULL,
  `SensorName` varchar(45) DEFAULT NULL,
  `RoomNo` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`SensorID`, `SensorName`, `RoomNo`) VALUES
(2, 'Heartrate', 112),
(3, 'BloodPressure', 112),
(4, 'Heartrate', 203),
(5, 'Sleep', 203),
(6, 'BloodPressure', 203),
(7, 'Heartrate', 210),
(8, 'Sleep', 210),
(9, 'BloodPressure', 210),
(10, 'Heartrate', 302),
(11, 'Heartrate', 101),
(12, 'BloodPressure', 101);

-- --------------------------------------------------------

--
-- Table structure for table `sensordata`
--

CREATE TABLE `sensordata` (
  `idSensorData` int(11) NOT NULL,
  `Sleep_hours` varchar(45) DEFAULT NULL,
  `HeartRate` varchar(45) DEFAULT NULL,
  `BloodPressure` varchar(45) DEFAULT NULL,
  `RoomTemprature` varchar(45) DEFAULT NULL,
  `Motionsensordata` varchar(45) DEFAULT NULL,
  `PatientId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FirstName`, `LastName`, `Email`, `user_type`, `Password`) VALUES
(1, 'Aniruddha', 'R', 'aniruddha04@gmail.com', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'Frank', 'Peterson', 'frank@gmail.com', 'patient', '1a1dc91c907325c69271ddf0c944bc72'),
(3, 'Vishal', 'Patel', 'vishalpatel2788@gmail.com', 'patient', '1a1dc91c907325c69271ddf0c944bc72'),
(6, 'Martin', 'John', 'martinjohn@email.com', 'doctor', '1a1dc91c907325c69271ddf0c944bc72'),
(18, 'George', 'Ezra', 'george@email.com', 'doctor', '1a1dc91c907325c69271ddf0c944bc72'),
(37, 'Lawrence', 'King', 'lawrence@email.com', 'doctor', '1a1dc91c907325c69271ddf0c944bc72'),
(56, 'John', 'Snow', 'johnsnow@email.com', 'patient', '1a1dc91c907325c69271ddf0c944bc72'),
(58, 'Joey', 'Tribianni', 'joey@email.com', 'patient', '1a1dc91c907325c69271ddf0c944bc72'),
(61, 'Jack', 'Peterson', 'jack@email.com', 'guardian', '1a1dc91c907325c69271ddf0c944bc72'),
(100, 'Test1', 'T', 'test@email.com', 'patient', '1a1dc91c907325c69271ddf0c944bc72'),
(101, 'Test', 'Father', 'testf@gmail.com', 'guardian', '1a1dc91c907325c69271ddf0c944bc72'),
(102, 'Test', 'Mother', 'testm@email.com', 'guardian', '1a1dc91c907325c69271ddf0c944bc72'),
(104, 'Frank', 'Senior', 'franksr@email.com', 'guardian', '1a1dc91c907325c69271ddf0c944bc72'),
(105, 'Scarlett', 'Johansson', 'scarlett@email.com', 'doctor', '1a1dc91c907325c69271ddf0c944bc72'),
(106, 'Jane', 'Peterson', 'jane@email.com', 'guardian', '1a1dc91c907325c69271ddf0c944bc72');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorsdetails`
--
ALTER TABLE `doctorsdetails`
  ADD PRIMARY KEY (`DoctorId`);

--
-- Indexes for table `guardian`
--
ALTER TABLE `guardian`
  ADD PRIMARY KEY (`GuardianId`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`idPatient`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`RoomID`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`SensorID`);

--
-- Indexes for table `sensordata`
--
ALTER TABLE `sensordata`
  ADD PRIMARY KEY (`idSensorData`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `RoomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sensor`
--
ALTER TABLE `sensor`
  MODIFY `SensorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
