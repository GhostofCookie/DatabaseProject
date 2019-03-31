CREATE TABLE Salesperson (
    SID SERIAL PRIMARY KEY,
    Firstname varchar(50),
    Lastname varchar(50),
    PhoneNo bigint,
    Commission numeric(10, 2)
);

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

CREATE TABLE NewCar (
    VIN varchar(17) PRIMARY KEY,
    ExpectedMiles int,
    MSRP numeric(10, 2),
    InteriorColour varchar(50),
    FlatFee numeric (6, 2),
    FOREIGN KEY (VIN) REFERENCES Car
);

CREATE TABLE Repair (
    RID SERIAL,
    VIN varchar(17),
    Problem text,
    RepairCost numeric(10, 2),
    ActualCost numeric(10, 2),
    PRIMARY KEY (RID, VIN),
    FOREIGN KEY (VIN) REFERENCES Car
);

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