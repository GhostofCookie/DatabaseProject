CREATE TABLE Salesperson (
	SID varchar(10) PRIMARY KEY,
	Firstname varchar(50),
	Lastname varchar(50),
	PhoneNo bigint,
	Commission numeric(10, 2));
INSERT INTO Salesperson VALUES(001, 'Brett', 'Regnier', 4037894567, 100000.01);
INSERT INTO Salesperson VALUES(002, 'Brandon', 'Hall', 4035849262, 100000.01);
INSERT INTO Salesperson VALUES(003, 'Siebrand', 'Soule', 4032943501, 100000.01);
INSERT INTO Salesperson VALUES(004, 'Tomas', 'Rigaux', 4031038492, 100000.01);

CREATE TABLE Customer (
	CID varchar(10) PRIMARY KEY,
	Firstname varchar(50),
	Lastname varchar(50),
	Gender bit,
	PhoneNo bigint,
	DateOfBirth date,
	StreetNo int,
	StreetName varchar(50),
	City varchar(50),
	Province varchar(50),
	PostalCode varchar(6));
INSERT INTO Customer VALUES(999, 'Reid', 'Paulhus', 0, 4034560923, '1997-02-13', 2, 'Main Street', 'Calgary', 'Alberta', 'T3A2D9');
INSERT INTO Customer VALUES(998, 'Tiller', 'Siwy', 0, 4030984759, '1993-12-01', 312, '2nd Street', 'Medicine Hat', 'Alberta', 'T3A1F5');
INSERT INTO Customer VALUES(997, 'Ryan', 'Wenman', 0, 4039903344, '1994-03-05', 2493, 'Park ave', 'Airdrie', 'Alberta', 'T3A9T3');
INSERT INTO Customer VALUES(996, 'Rylan', 'Buekart', 0, 4031232233, '1997-08-17', 666, '5 St.', 'Grand prairie', 'Alberta', 'Y3E8R5');
/*INSERT INTO Salesperson VALUES(996, 'Nicole', 'Vachon', 1, 4038185430, 1998-05-14);
INSERT INTO Salesperson VALUES(996, 'Cole', 'Something', 0, 4039993243, 1995-04-20);*/
/*select * from Customer;*/

CREATE TABLE Sale (
	SaleNo int,
	SID varchar(10),
	CID varchar(10),
	VIN varchar(17),
	TotalDue numeric(10, 2),
	DownPayment numeric(10, 2),
	FinancedAmount numeric(10, 2),
	InterestRate numeric(10, 2),
	SalePrice numeric(10, 2),
	SaleDate date,
	PRIMARY KEY (SaleNo, SID, CID, VIN),
	FOREIGN KEY (SID) REFERENCES SID,
	FOREIGN KEY (CID) REFERENCES Customer,
	FOREIGN KEY (VIN) REFERENCES Car);
INSERT INTO Sale VALUES(000001001, 001, 999, '1G1ZS58NX8F126575', 7000.00, 3000.00, 7000.00, 0.05, 7000, '2018-02-14');
INSERT INTO Sale VALUES(000002002, 002, 998, '1FD8X3ET9BEA40145', 13000.00, 4500.00, 16000.00, 0.07, 18000, '2013-04-04');
INSERT INTO Sale VALUES(000003003, 003, 997, '1GCGC23W4DS128396', 30000.00, 3000.00, 42000.00, 0.06, 45000, '2019-03-20');
INSERT INTO Sale VALUES(000004004, 003, 997, '5FRYD4H46FB029601', 9000.00, 1000.00, 10000.00, 0.04, 10000.00, '2019-03-10');
INSERT INTO Sale VALUES(000005005, 003, 996, 'JH2JE0105GC751079', 19000.00, 1000.00 ,18000.00, 0.05, 20000.00, '2019-03-05');

CREATE TABLE EmploymentHistory (
	EHID varchar(10),
	CID varchar(10),
	Employer varchar(50),
	StartDate date,
	Title varchar(50),
	SupervisorFirstName varchar(50),
	SupervisorLastName varchar(50),
	StreetNo int,
	StreetName varchar(50),
	City varchar(50),
	Province varchar(50),
	PostalCode varchar(6),
	PRIMARY KEY (EHID, CID),
	FOREIGN KEY (CID) REFERENCES Customer);
INSERT INTO EmploymentHistory VALUES(0009999, 999, 'Pepsi Co.', '2018-09-10', 'Chip Boy', 'Shannon', 'Smith', 5, 'Valley Road', 'Lethbridge', 'Alberta', 'Y8G9F0');
INSERT INTO EmploymentHistory VALUES(0009998, 998, 'Colour Me Mine', '2017-05-25', 'Chief Painter', 'Cindy', 'Toast', 1023, 'Ridge Road', 'Lethbridge', 'Alberta', 'Y8G7E2');
INSERT INTO EmploymentHistory VALUES(0008998, 998, 'Pharmers Edge', '2018-05-25', 'Programmer', 'Becca', 'Ssatafasah', 324, 'Simon ave', 'Lethbridge', 'Alberta', 'Y8G8M3');
INSERT INTO EmploymentHistory VALUES(0009997, 997, 'Pepsi Co.', '2017-05-25', 'Doritos Man', 'Gerald', 'Sharp', 5, 'Valley Road', 'Lethbridge', 'Alberta', 'Y8G9F0');

CREATE TABLE Car (
	VIN varchar(17),
	PurchaseDate date,
	Model varchar(50),
	Edition varchar(50),
	Year int,
	ExteriorColour varchar(50),
	Sold bit,
	PRIMARY KEY (VIN, PurchaseDate));
INSERT INTO Car VALUES('1G1ZS58NX8F126575', '2019-02-14', 'Corolla', 'BE', 2018, 'Black', 1);
INSERT INTO Car VALUES('1FD8X3ET9BEA40145', '2017-04-05', 'Camry', 'CE', 2017, 'Blue', 1);
INSERT INTO Car VALUES('1GCGC23W4DS128396', '2019-03-20', 'Rav4', 'XE', 2019, 'Grey', 1);
INSERT INTO Car VALUES('2MEBP72XXGB668354', '2018-05-23', 'Corolla', 'CE', 2016, 'Red', 0);
INSERT INTO Car VALUES('5FRYD4H46FB029601', '2019-02-10', 'Corolla', 'XL', 2012, 'Grey', 1);
INSERT INTO Car VALUES('JH2JE0105GC751079', '2019-01-01', 'Corolla', 'BE', 2019, 'Grey', 1);
INSERT INTO Car VALUES('WVWAK93C58E146711', '2019-01-01', 'Corolla', 'CE', 2019, 'White', 0);
INSERT INTO Car VALUES('3GTP2VE76CG334058', '2019-01-01', 'Corolla', 'XE', 2019, 'Black', 0);
INSERT INTO Car VALUES('1FMRU15L0YLC07711', '2019-01-01', 'Corolla', 'XL', 2019, 'Blue', 0);
INSERT INTO Car VALUES('3FTHF35H4VMA46128', '2019-01-01', 'Camry', 'BE', 2019, 'Grey', 0);
INSERT INTO Car VALUES('JHMAP21478S806784', '2019-01-01', 'Camry', 'CE', 2019, 'White', 0);
INSERT INTO Car VALUES('3FRXF75TX8V013563', '2019-01-01', 'Camry', 'LE', 2019, 'Black', 0);
INSERT INTO Car VALUES('JT8BD69S210194101', '2019-01-01', 'Rav4', 'BE', 2019, 'Grey', 0);
INSERT INTO Car VALUES('1FDXW46F7YEB48186', '2019-01-01', 'Rav4', 'CE', 2019, 'White', 0);
INSERT INTO Car VALUES('1FCKE39L66DA31117', '2019-01-01', 'Rav4', 'XE', 2019, 'Black', 0);
INSERT INTO Car VALUES('1HGCR6F34EA806613', '2017-03-23', 'Camry', 'LE', 2013, 'Black', 0);
INSERT INTO Car VALUES('3B6MC36Z0WM266239', '2018-08-31', 'Corolla', 'BE', 2014, 'Grey', 0);
INSERT INTO Car VALUES('1FMCA11U3SZC72876', '2016-11-12', 'Rav4', 'CE', 2012, 'White', 0);
INSERT INTO Car VALUES('2FAFP71W38X146655', '2015-05-09', 'Rav4', 'XE', 2011, 'Black', 0);
INSERT INTO Car VALUES('1FMRE11W65HA76909', '2019-01-01', 'Corolla', 'BE', 2019, 'Blue', 0);
INSERT INTO Car VALUES('1C3CCBHG8CN302293', '2019-01-01', 'Corolla', 'CE', 2019, 'Red', 0);
INSERT INTO Car VALUES('JH2ME0407BK011329', '2019-01-01', 'Corolla', 'XE', 2019, 'Orange', 0);
INSERT INTO Car VALUES('3VWPZ8AJ9AM699585', '2019-01-01', 'Corolla', 'XL', 2019, 'Green', 0);
INSERT INTO Car VALUES('1D7HA18297J650189', '2019-01-01', 'Camry', 'BE', 2019, 'White', 0);
INSERT INTO Car VALUES('2HGFA16507H079600', '2019-01-01', 'Camry', 'CE', 2019, 'Yellow', 0);
INSERT INTO Car VALUES('2HKRL18533H565435', '2019-01-01', 'Camry', 'LE', 2019, 'Black', 0);
INSERT INTO Car VALUES('4GTK7C1351J792624', '2019-01-01', 'Rav4', 'BE', 2019, 'Red', 0);
INSERT INTO Car VALUES('JH2SC51483M164101', '2019-01-01', 'Rav4', 'CE', 2019, 'Grey', 0);
INSERT INTO Car VALUES('WBAWR3C53APX35778', '2019-01-01', 'Rav4', 'XE', 2019, 'Blue', 0);
INSERT INTO Car VALUES('1FDWF35526EB87540', '2019-03-05', 'Camry', 'LE', 2015, 'Black', 0);
INSERT INTO Car VALUES('1FDNF21L1YEE84375', '2017-08-16', 'Rav4', 'BE', 2013, 'Grey', 0);
INSERT INTO Car VALUES('JN8AR05S6WW796378', '2013-11-23', 'Camry', 'CE', 2011, 'White', 0);
INSERT INTO Car VALUES('1FTRE14W25HB32294', '2014-05-15', 'Corolla', 'XE', 2010, 'Black', 0);

CREATE TABLE UsedCar (
	VIN varchar(17) PRIMARY KEY,
	DealerSeller varchar(50),
	Miles int,
	BookPrice numeric(10, 2),
	PricePaid numeric(10, 2),
	StreetNumber int,
	StreetName varchar(50),
	City varchar(50),
	Province varchar(50),
	PostalCode varchar(6),
	FOREIGN KEY (VIN) REFERENCES Car);
INSERT INTO UsedCar VALUES('1G1ZS58NX8F126575', 'Tomas Train Express', 89347, 10000.00, 6000.00, 600, 'Cole St.', 'Toronto', 'Ontario', 'A3Q7B4');
INSERT INTO UsedCar VALUES('1FD8X3ET9BEA40145', 'Cole Autos', 74302, 20500.00, 12000.00, 3940, '45 St.', 'Airdrie', 'Alberta', 'T3H6T3');
INSERT INTO UsedCar VALUES('2MEBP72XXGB668354', 'Nicole Motorsport', 126594, 8500.00, 3000.00, 342, '1st ave', 'Okotoks', 'Alberta', 'B0M3T3');
INSERT INTO UsedCar VALUES('5FRYD4H46FB029601', 'Cole Autos', 130478, 10000.00, 5500.00, 3940, '45 St.', 'Airdrie', 'Alberta', 'T3H6T3');
INSERT INTO UsedCar VALUES('1HGCR6F34EA806613', 'Nicole Motorsport', 88321, 9000.00, 4500.00, 342, '1st ave', 'Okotoks', 'Alberta', 'B0M3T3');
INSERT INTO UsedCar VALUES('3B6MC36Z0WM266239', 'Nicole Motorsport', 93230, 7500.00, 3000.00, 342, '1st ave', 'Okotoks', 'Alberta', 'B0M3T3');
INSERT INTO UsedCar VALUES('1FMCA11U3SZC72876', 'Tomas Train Express', 150342, 10000.00, 4250.00, 600, 'Cole St.', 'Toronto', 'Ontario', 'A3Q7B4');
INSERT INTO UsedCar VALUES('2FAFP71W38X146655', 'Cole Autos', 180230, 11000.00, 7000.00, 3940, '45 St.', 'Airdrie', 'Alberta', 'T3H6T3');
INSERT INTO UsedCar VALUES('1FDWF35526EB87540', 'Nicole Motorsport', 32472, 10000.00, 4900.00, 342, '1st ave', 'Okotoks', 'Alberta', 'B0M3T3');
INSERT INTO UsedCar VALUES('1FDNF21L1YEE84375', 'Nicole Motorsport', 98141, 12000.00, 6000.00, 342, '1st ave', 'Okotoks', 'Alberta', 'B0M3T3');
INSERT INTO UsedCar VALUES('JN8AR05S6WW796378', 'Tomas Train Express', 12349, 9500.00, 3850.00, 600, 'Cole St.', 'Toronto', 'Ontario', 'A3Q7B4');
INSERT INTO UsedCar VALUES('1FTRE14W25HB32294', 'Cole Autos', 210095, 5000.00, 2000.00, 3940, '45 St.', 'Airdrie', 'Alberta', 'T3H6T3');

CREATE TABLE NewCar (
	VIN varchar(17) PRIMARY KEY,
	ExpectedMiles int,
	MSRP numeric(10, 2),
	InteriorColour varchar(50),
	FlatFee numeric (6, 2),
	FOREIGN KEY (VIN) REFERENCES Car);
INSERT INTO NewCar VALUES('1GCGC23W4DS128396', 53, 35000.00, 'Grey', 2000.00);
INSERT INTO NewCar VALUES('JH2JE0105GC751079', 34, 20000.00, 'Black', 2000.00);
INSERT INTO NewCar VALUES('WVWAK93C58E146711', 584,22000.00, 'Orange', 2000.00);
INSERT INTO NewCar VALUES('3GTP2VE76CG334058', 23, 24000.00, 'Green', 2000.00);
INSERT INTO NewCar VALUES('1FMRU15L0YLC07711', 453, 26000.00, 'Purple', 2000.00);
INSERT INTO NewCar VALUES('3FTHF35H4VMA46128', 32, 26000.00, 'Pink', 2000.00);
INSERT INTO NewCar VALUES('JHMAP21478S806784', 23, 28000.00, 'Grey', 2000.00);
INSERT INTO NewCar VALUES('3FRXF75TX8V013563', 54, 30000.00, 'Blue', 2000.00);
INSERT INTO NewCar VALUES('JT8BD69S210194101', 76, 35000.00, 'Yellow', 2000.00);
INSERT INTO NewCar VALUES('1FDXW46F7YEB48186', 123, 40000.00, 'Tan', 2000.00);
INSERT INTO NewCar VALUES('1FCKE39L66DA31117', 139, 45000.00, 'White', 2000.00);
INSERT INTO NewCar VALUES('1FMRE11W65HA76909', 345, 20000.00, 'Black', 2000.00);
INSERT INTO NewCar VALUES('1C3CCBHG8CN302293', 58,22000.00, 'Orange', 2000.00);
INSERT INTO NewCar VALUES('JH2ME0407BK011329', 231, 24000.00, 'Green', 2000.00);
INSERT INTO NewCar VALUES('3VWPZ8AJ9AM699585', 43, 26000.00, 'Purple', 2000.00);
INSERT INTO NewCar VALUES('1D7HA18297J650189', 324, 26000.00, 'Pink', 2000.00);
INSERT INTO NewCar VALUES('2HGFA16507H079600', 233, 28000.00, 'Grey', 2000.00);
INSERT INTO NewCar VALUES('2HKRL18533H565435', 154, 30000.00, 'Blue', 2000.00);
INSERT INTO NewCar VALUES('4GTK7C1351J792624', 176, 35000.00, 'Yellow', 2000.00);
INSERT INTO NewCar VALUES('JH2SC51483M164101', 82, 40000.00, 'Tan', 2000.00);
INSERT INTO NewCar VALUES('WBAWR3C53APX35778', 39, 45000.00, 'White', 2000.00);

CREATE TABLE Repair (
	RID serial,
	VIN varchar(17),
	Problem text,
	RepairCost numeric(10, 2),
	ActualCost numeric(10, 2),
	PRIMARY KEY (RID, VIN),
	FOREIGN KEY (VIN) REFERENCES Car);
INSERT INTO Repair VALUES(000301, '2MEBP72XXGB668354', "Eject seat button broken", 9000.00, 6000.00);

CREATE TABLE Warranty (
	WID varchar(10),
	VIN varchar(17),
	SID varchar(10),
	CID varchar(10),
	ItemsCovered varchar(100),
	Deductible numeric(10, 2),
	MonthlyCost numeric(10, 2),
	TotalCost numeric(10, 2),
	Duration int,
	CoSigner varchar(50),
	StartDate date,
	WarrantySalesDate date,
	PRIMARY KEY (WID),
	FOREIGN KEY (VIN) REFERENCES Car,
	FOREIGN KEY (CID) REFERENCES Customer,
	FOREIGN KEY (SID) REFERENCES Salesperson);
INSERT INTO Warranty VALUES('9876543', '1GCGC23W4DS128396', 003, 997, 'Interior Colour', 1000.00, 20.00, 240.00, 12, 'Weiss', '2019-03-20', '2019-03-20');
INSERT INTO Warranty VALUES('9876544', '1GCGC23W4DS128396', 003, 997, 'Exterior Colour', 1000.00, 25.00, 300.00, 12, 'Weiss', '2019-03-20', '2019-03-20');
INSERT INTO Warranty VALUES('9876545', '1GCGC23W4DS128396', 003, 997, 'Drive-Train', 1000.00, 50.00, 600.00, 12, 'Weiss', '2019-03-20', '2019-03-20');
INSERT INTO Warranty VALUES('9876234', '1FD8X3ET9BEA40145', 002, 998, 'Drive-Train', 500.00, 45.00, 1080.00, 24, 'Rachel', '2018-04-05', '2013-04-04');
INSERT INTO Warranty VALUES('9876698', '1G1ZS58NX8F126575', 001, 999, 'ExteriorColour', 500.00, 35.00, 210.00, 6, 'Samot', '2019-02-14', '2019-02-14');

CREATE TABLE Payment (
	PaymentNo int,
	CID varchar(10),
	BankAccount varchar(16),
	PaymentDate date,
	PaidDate date,
	Due varchar(10),
	Amount numeric(10, 2),
	PRIMARY KEY (PaymentNo, CID),
	FOREIGN KEY (CID) REFERENCES Customer);
INSERT INTO Payment VALUES(42343, 999, 1432-123-54, '2019-02-14', '2019-02-17', '2019-02-24', 130.00);
INSERT INTO Payment VALUES(12403, 998, 2437-892-01, '2018-04-05', '2018-04-09', '2018-04-15', 70.00);
INSERT INTO Payment VALUES(78643, 997, 8231-011-32, '2019-03-20', '2019-03-30', '2019-03-30', 200.00);
INSERT INTO Payment VALUES(42344, 999, 1432-123-54, '2019-03-14', '2019-03-18', '2019-03-24', 130.00);
INSERT INTO Payment VALUES(12404, 998, 2437-892-01, '2018-05-05', '2018-05-09', '2018-05-15', 70.00);
INSERT INTO Payment VALUES(12405, 998, 2437-892-01, '2018-06-05', '2018-06-06', '2018-06-15', 70.00);
INSERT INTO Payment VALUES(12406, 998, 2437-892-01, '2018-07-05', '2018-07-07', '2018-07-15', 70.00);
INSERT INTO Payment VALUES(12407, 998, 2437-892-01, '2018-08-05', '2018-08-11', '2018-08-15', 70.00);
INSERT INTO Payment VALUES(12408, 998, 2437-892-01, '2018-09-05', '2018-09-12', '2018-09-15', 70.00);
INSERT INTO Payment VALUES(12409, 998, 2437-892-01, '2018-10-05', '2018-10-15', '2018-10-15', 70.00);
INSERT INTO Payment VALUES(12410, 998, 2437-892-01, '2018-11-05', '2018-11-07', '2018-11-15', 70.00);
INSERT INTO Payment VALUES(12411, 998, 2437-892-01, '2018-12-05', '2018-12-05', '2018-12-15', 70.00);
INSERT INTO Payment VALUES(12412, 998, 2437-892-01, '2019-01-05', '2019-01-05', '2019-01-15', 70.00);
INSERT INTO Payment VALUES(12413, 998, 2437-892-01, '2019-02-05', '2019-02-08', '2019-02-15', 70.00);
INSERT INTO Payment VALUES(12414, 998, 2437-892-01, '2019-03-05', '2019-03-07', '2019-03-15', 70.00);
