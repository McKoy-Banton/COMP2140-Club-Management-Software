CREATE DATABASE club_management_database;
Use club_management_database;


CREATE TABLE students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(255) NOT NULL,
    id_number VARCHAR(20) NOT NULL,
    phone_number VARCHAR(15),
    email_address VARCHAR(255),
    major VARCHAR(50),
    minor VARCHAR(50),
    degree VARCHAR(50),
    faculty VARCHAR(50),
    interests VARCHAR(255),
    student_password VARCHAR(255)
);

INSERT INTO students (full_name, id_number, phone_number, email_address, major, minor, degree, faculty, interests, student_password)
VALUES
    ('Courtney Day', '6201465709', '+18764596782', 'bigheadcourtney@gmail.com', 'Accounting', 'Computer Science', 'Bachelor of Science', 'Social Sciences', 'Finance', 'Honey34'),
    ('Shanna Cliff', '620148956', '+18765677842', 'shanna@gmail.com', 'Computer Science', 'Economics', 'Bachelor of Science', 'Science and Technology', 'Computing', 'Ronna12'),
    ('Cris James', '620157701', '+18764562134', 'cris@gmai.com', 'Software Engineering', 'Animation', 'Bachelor of Science', 'Science and Technology', 'Computing', 'Dog23'),
    ('John Doe', '620156798', '+1234567890', 'john.doe@example.com', 'Computer Science', 'Mathematics', 'Bachelor of Science', 'Science and Technology', 'AI', 'student20'),
    ('Jane Smith', '670347890', '+9876543210', 'jane.smith@example.com', 'Business Administration', 'Marketing', 'Bachelor of Business Administration', 'Business', 'Finance', 'Jane123'),
    ('Alex Johnson', '620568734', '+1112223333', 'alex.johnson@example.com', 'Electrical Engineering', 'Physics', 'Bachelor of Engineering', 'Engineering','Robotics', '123456');


CREATE TABLE clubs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    club_name VARCHAR(255) NOT NULL,
    faculty VARCHAR(50),
    club_badge VARCHAR(255),
    social_media_links VARCHAR(255),
    meeting_day VARCHAR(20),
    meeting_times VARCHAR(50),
    email_address VARCHAR(255),
    phone_number VARCHAR(15),
    leaders_name VARCHAR(255),
    department VARCHAR(50),
    club_password VARCHAR(255)
);

INSERT INTO clubs (club_name, faculty, club_badge, social_media_links, meeting_day, meeting_times, email_address, phone_number, leaders_name, department, club_password)
VALUES
    ('Computing Society', 'Science and Technology', 'image1.png', 'https://www.Instagram/CS Club', 'Thursday', '3:00pm - 5:00pm', 'computing@uwimona.com', '+18761234567', 'John Daley', 'Computing', 'bestclub10'),
    ('UWI Young Investors', 'Social Sciences', 'image2.png', 'https://www.Instagram/YIC', 'Thursday', '3:30pm - 5:00Pm', 'YIC@uwimona.com', '+18765324567', 'Howard Brown', 'MSBM', 'Investors45'),
    ('MATHS Club', 'Science and Technology', 'image3.png', 'https://www.Instagram/Maths Club', 'Thursday', '2:00pm - 4:30pm', 'mathfun@uwimona.com', '+19167833567', 'Shadae Givans', 'Mathematics', 'Mathisfun4'),
    ('Programming Club', 'Science', 'programming_club_logo.png', 'https://www.facebook.com/programmingclub', 'Wednesday', '4:00 PM - 6:00 PM', 'programmingclub@example.com', '+1234567890', 'Alice Johnson', 'Computing','helloworld00'),
    ('Marketing Society', 'Business', 'marketing_society_logo.png', 'https://www.instagram.com/marketing_society', 'Thursday', '3:00 PM - 5:00 PM', 'marketingsociety@example.com', '+9876543210', 'Bob Williams', 'MSBM', 'beyou80'),
    ('Robotics Club', 'Engineering', 'robotics_club_logo.png', 'https://www.twitter.com/roboticsclub', 'Friday', '2:00 PM - 4:00 PM', 'roboticsclub@example.com', '+1112223333', 'Charlie Brown', 'Engineering', 'Robotsaregreatlol09');