CREATE DATABASE tec_database;

USE tec_database;

CREATE TABLE Company (
    company_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE Qualification (
    qualification_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    code VARCHAR(10) NOT NULL
);

CREATE TABLE Candidate (
    candidate_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE Opening (
    opening_id INT AUTO_INCREMENT PRIMARY KEY,
    company_id INT,
    required_qualification_id INT,
    start_date DATE,
    end_date DATE,
    hourly_pay DECIMAL(10, 2),
    FOREIGN KEY (company_id) REFERENCES Company(company_id),
    FOREIGN KEY (required_qualification_id) REFERENCES Qualification(qualification_id)
);

CREATE TABLE Job_History (
    job_history_id INT AUTO_INCREMENT PRIMARY KEY,
    candidate_id INT,
    opening_id INT,
    FOREIGN KEY (candidate_id) REFERENCES Candidate(candidate_id),
    FOREIGN KEY (opening_id) REFERENCES Opening(opening_id)
);

CREATE TABLE Placement (
    placement_id INT AUTO_INCREMENT PRIMARY KEY,
    opening_id INT,
    candidate_id INT,
    total_hours_worked DECIMAL(10, 2),
    FOREIGN KEY (opening_id) REFERENCES Opening(opening_id),
    FOREIGN KEY (candidate_id) REFERENCES Candidate(candidate_id)
);

CREATE TABLE Course (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    qualification_id INT,
    title VARCHAR(100) NOT NULL,
    FOREIGN KEY (qualification_id) REFERENCES Qualification(qualification_id)
);

CREATE TABLE Session (
    session_id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT,
    date DATE,
    fee DECIMAL(10, 2),
    FOREIGN KEY (course_id) REFERENCES Course(course_id)
);

CREATE TABLE Candidate_Qualification (
    candidate_id INT,
    qualification_id INT,
    PRIMARY KEY (candidate_id, qualification_id),
    FOREIGN KEY (candidate_id) REFERENCES Candidate(candidate_id),
    FOREIGN KEY (qualification_id) REFERENCES Qualification(qualification_id)
);

CREATE TABLE Candidate_Session (
    candidate_id INT,
    session_id INT,
    PRIMARY KEY (candidate_id, session_id),
    FOREIGN KEY (candidate_id) REFERENCES Candidate(candidate_id),
    FOREIGN KEY (session_id) REFERENCES Session(session_id)
);
