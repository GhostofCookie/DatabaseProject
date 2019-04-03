CREATE TABLE Salesperson (
    SID SERIAL PRIMARY KEY,
    Firstname varchar(50),
    Lastname varchar(50),
    PhoneNo bigint,
    Commission numeric(10, 2)
);
INSERT INTO Salesperson VALUES(001, 'Brett', 'Regnier', 4037894567, 100000.01);
INSERT INTO Salesperson VALUES(002, 'Brandon', 'Hall', 4035849262, 100000.01);
INSERT INTO Salesperson VALUES(003, 'Siebrand', 'Soule', 4032943501, 100000.01);
INSERT INTO Salesperson VALUES(004, 'Tomas', 'Riguax', 4031038492, 100000.01);

CREATE TABLE Customer (
    CID SERIAL PRIMARY KEY,
    Firstname varchar(50),
    Lastname varchar(50),
    Gender bit,
    PhoneNo bigint,
    DateOfBirth date,
    StreetNo int,
    StreetName varchar(50),
    City varchar(50),
    Province varchar(50),
    PostalCode varchar(6)
);
INSERT INTO Customer VALUES(999, 'Reid', 'Paulhus', 0, 4034560923, '1997-02-13', 2, 'Main Street', 'Calgary', 'Alberta', 'T3A2D9');
INSERT INTO Customer VALUES(998, 'Tiller', 'Siwy', 0, 4030984759, '1993-12-01', 312, '2nd Street', 'Medicine Hat', 'Alberta', 'T3A1F5');
INSERT INTO Customer VALUES(997, 'Ryan', 'Wenman', 0, 4039903344, '1994-03-05', 2493, 'Park ave', 'Airdrie', 'Alberta', 'T3A9T3');

CREATE TABLE Sale (
    SaleNo int,
    SID BIGINT UNSIGNED,
    CID BIGINT UNSIGNED,
    VIN BIGINT UNSIGNED,
    TotalDue numeric(10, 2),
    DownPayment numeric(10, 2),
    FinancedAmount numeric(10, 2),
    InterestRate numeric(10, 2),
    SaleDate date,
    PRIMARY KEY (SaleNo, SID, CID, VIN),
    FOREIGN KEY (SID) REFERENCES SID,
    FOREIGN KEY (CID) REFERENCES Customer,
    FOREIGN KEY (VIN) REFERENCES Car
);
INSERT INTO Sale VALUES(000001001, 001, 999, '1G1ZS58NX8F126575', 7000.00, 3000.00, 7000.00, 0.05, '2019-02-14');
INSERT INTO Sale VALUES(000002002, 002, 998, '1FD8X3ET9BEA40145', 13000.00, 4500.00, 16000.00, 0.07, '2017-04-05');
INSERT INTO Sale VALUES(000003003, 003, 997, '1GCGC23W4DS128396', 30000.00, 2000.00, 40000.00, 0.06, '2019-03-20');

CREATE TABLE EmploymentHistory (
    EHID SERIAL,
    CID  BIGINT UNSIGNED,
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
    FOREIGN KEY (CID) REFERENCES Customer
);
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
    PRIMARY KEY (VIN, PurchaseDate)
);
INSERT INTO Car VALUES('1G1ZS58NX8F126575', '2019-02-14', 'Corolla', 'BE', '2018', 'Black', 1);
INSERT INTO Car VALUES('1FD8X3ET9BEA40145', '2017-04-05', 'Camry', 'CE', '2017', 'Blue', 1);
INSERT INTO Car VALUES('1GCGC23W4DS128396', '2019-03-20', 'Rav4', 'XE', '2019', 'Grey', 1);

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
    FOREIGN KEY (VIN) REFERENCES Car
);
INSERT INTO UsedCar VALUES('1G1ZS58NX8F126575', 'Tomas Express', 89347, 10000.00, 6000.00, 600, 'Cole St.', 'Toronto', 'Ontario', 'A3Q7B4');
INSERT INTO UsedCar VALUES('1FD8X3ET9BEA40145', 'Ryan', 74302, 20500.00, 12000.00, 2493, 'Park ave', 'Airdrie', 'Alberta', 'T3A9T3');
INSERT INTO UsedCar VALUES('2MEBP72XXGB668354', 'Nicole Motorsport', 126594, 8500.00, 3000.00, 342, '1st ave', 'Okotoks', 'Alberta', 'B0M3T3');

CREATE TABLE NewCar (
    VIN varchar(17) PRIMARY KEY,
    ExpectedMiles int,
    MSRP numeric(10, 2),
    InteriorColour varchar(50),
    FlatFee numeric (6, 2),
    FOREIGN KEY (VIN) REFERENCES Car
);
INSERT INTO NewCar VALUES('1GCGC23W4DS128396', 53, 35000.00, 'Grey', 2000.00);

CREATE TABLE Repair (
    RID SERIAL,
    VIN varchar(17),
    Problem text,
    RepairCost numeric(10, 2),
    ActualCost numeric(10, 2),
    PRIMARY KEY (RID, VIN),
    FOREIGN KEY (VIN) REFERENCES Car
);
INSERT INTO Repair VALUES('000301', '2MEBP72XXGB668354', "Eject seat button broken", 9000.00, 6000.00);

CREATE TABLE Warranty (
    WID SERIAL,
    VIN varchar(17),
    CID BIGINT UNSIGNED,
    SID BIGINT UNSIGNED,
    ItemsCovered varchar(100),
    Deductible numeric(10, 2),
    MonthlyCost numeric(10, 2),
    TotalCost numeric(10, 2),
    Duration varchar(10),
    CoSigner varchar(50),
    StartDate date,
    WarrantySalesDate date,
    PRIMARY KEY (WID),
    FOREIGN KEY (VIN) REFERENCES Car,
    FOREIGN KEY (CID) REFERENCES Customer,
    FOREIGN KEY (SID) REFERENCES Salesperson
);

CREATE TABLE Payment (
    PaymentNo int,
    CID BIGINT UNSIGNED,
    BankAccount varchar(16),
    PaymentDate date,
    PaidDate date,
    Due varchar(10),
    Amount numeric(10, 2),
    PRIMARY KEY (PaymentNo, CID),
    FOREIGN KEY (CID) REFERENCES Customer
);