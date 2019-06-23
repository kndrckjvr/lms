TRUNCATE TABLE authortbl;
TRUNCATE TABLE authorbooktbl;
TRUNCATE TABLE booktbl;
TRUNCATE TABLE itembooktbl;
TRUNCATE TABLE logtbl;
TRUNCATE TABLE penaltytbl;
TRUNCATE TABLE sectiontbl;
TRUNCATE TABLE transactiontbl;
TRUNCATE TABLE usertbl;
INSERT INTO `sectiontbl` (`section_id`, `section_name`, `section_code`, `section_code_number`, `status`, `created_at`) VALUES
(1, 'None', 'NON', 1, 1, 1556900274),
(2, 'Science', 'SCI', 1, 1, 1556901623),
(3, 'Fiction', 'FIC', 1, 1, 1556901623),
(4, 'Non-Fiction', 'NFC', 1, 1, 1556901623),
(5, 'Business', 'BUS', 1, 1, 1556901623),
(6, 'Economics', 'ECO', 1, 1, 1556901623),
(7, 'Information Technology', 'IT', 1, 1, 156901623),
(8, 'Engineering', 'ENG', 1, 1, 1556901623),
(9, 'Literature', 'LIT', 1, 1, 1556901623),
(10, 'Arts', 'ART', 1, 1, 1556901623),
(11, 'Comedy', 'COM', 1, 1, 1556901623),
(12, 'Romantic', 'ROM', 1, 1, 1556901623),
(13, 'Sample 1', 'ABC', 1, 1, 1556901623),
(14, 'Sample 2', 'DEF', 1, 1, 1556901623),
(15, 'Sample 3', 'GHI', 1, 1, 1556901623),
(16, 'Sample 4', 'JKL', 1, 1, 1556901623),
(17, 'Sample 5', 'MNO', 1, 1, 1556901623),
(18, 'Sample 6', 'PQR', 1, 1, 1556901623),
(19, 'Sample 7', 'STU', 1, 1, 1556901623),
(20, 'Sample 8', 'VWX', 1, 1, 1556901623),
(21, 'Sample 9', 'YZA', 1, 1, 1556901623),
(22, 'Sample 10', 'BCD', 1, 1, 1556901623),
(23, 'Sample 11', 'EFG', 1, 1, 1556901623),
(24, 'Sample 12', 'HIJ', 1, 1, 1556901623),
(25, 'Sample 13', 'KLM', 1, 1, 1556901623),
(26, 'Sample 14', 'OPQ', 1, 1, 1556901623),
(27, 'Sample 15', 'RST', 1, 1, 1556901623),
(28, 'Sample 16', 'UVW', 1, 1, 1556901623),
(29, 'Sample 17', 'XYZ', 1, 1, 1556901623),
(30, 'Sample 18', 'KJC', 1, 1, 1556901623);
INSERT INTO `penaltytbl` (`penalty_id`, `penalty_date`, `penalty_amount`, `penalty_day`) VALUES
(1, 0, 20, 3);