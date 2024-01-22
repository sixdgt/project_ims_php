CREATE DATABASE project_ims_php;

USE project_ims_php;

CREATE TABLE ims_usertype(
    ut_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userytype VARCHAR(200) NOT NULL,
    is_removed TINYINT NOT NULL DEFAULT 0,
    is_created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    is_updated_at DATETIME NULL,
    is_removed_at DATETIME NULL
);

CREATE TABLE ims_course_category(
    cc_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    course_category VARCHAR(255) NOT NULL,
    course_category_short VARCHAR(200) NOT NULL,
    is_removed TINYINT NOT NULL DEFAULT 0,
    is_created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    is_updated_at DATETIME NULL,
    is_removed_at DATETIME NULL
);

CREATE TABLE ims_course(
    course_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    course_title VARCHAR(255) NOT NULL,
    course_code VARCHAR(100) NOT NULL,
    course_duration VARCHAR(200) NOT NULL,
    course_start_date DATE,
    course_end_date DATE,
    course_category_id INT,
    is_removed TINYINT DEFAULT 0,
    is_created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    is_updated_at DATETIME NULL,
    is_removed_at DATETIME NULL,
    FOREIGN KEY (course_category_id) REFERENCES ims_course_category(cc_id)
);

CREATE TABLE ims_user(
    user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    passkey VARCHAR(255) NOT NULL,
    user_type_id INT,
    is_removed TINYINT DEFAULT 0,
    is_created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    is_updated_at DATETIME NULL,
    is_removed_at DATETIME NULL,
    FOREIGN KEY (user_type_id) REFERENCES ims_usertype(ut_id)
);

CREATE TABLE ims_shift(
    shift_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    shift VARCHAR(255) NOT NULL,
    is_removed TINYINT DEFAULT 0,
    is_created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    is_updated_at DATETIME NULL,
    is_removed_at DATETIME NULL
);

CREATE TABLE ims_admin(
    admin_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    middle_name VARCHAR(255) NULL,
    last_name VARCHAR(255) NOT NULL,
    contact VARCHAR(255) NOT NULL,
    designation VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    shift_id INT,
    user_id INT,
    is_removed TINYINT DEFAULT 0,
    is_created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    is_updated_at DATETIME NULL,
    is_removed_at DATETIME NULL,
    FOREIGN KEY (user_id) REFERENCES ims_user(user_id),
    FOREIGN KEY (shift_id) REFERENCES ims_shift(shift_id)
);

CREATE TABLE ims_student(
    student_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    middle_name VARCHAR(255) NULL,
    last_name VARCHAR(255) NOT NULL,
    contact VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    user_id INT,
    is_removed TINYINT DEFAULT 0,
    is_created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    is_updated_at DATETIME NULL,
    is_removed_at DATETIME NULL,
    FOREIGN KEY (user_id) REFERENCES ims_user(user_id)
);

CREATE TABLE ims_mentor(
    mentor_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    middle_name VARCHAR(255) NULL,
    last_name VARCHAR(255) NOT NULL,
    contact VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    academic_qualification VARCHAR(255) NOT NULL,
    current_workplace VARCHAR(255) NOT NULL,
    work_experience VARCHAR(255) NOT NULL,
    core_skills VARCHAR(255) NOT NULL,
    user_id INT,
    is_removed TINYINT DEFAULT 0,
    is_created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    is_updated_at DATETIME NULL,
    is_removed_at DATETIME NULL,
    FOREIGN KEY (user_id) REFERENCES ims_user(user_id)
);

CREATE TABLE ims_course_enroll(
    course_enroll_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    course_enroll_title VARCHAR(255) NOT NULL,
    user_id INT,
    course_id INT,
    shift_id INT,
    is_removed TINYINT DEFAULT 0,
    is_created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    is_updated_at DATETIME NULL,
    is_removed_at DATETIME NULL,
    FOREIGN KEY (user_id) REFERENCES ims_user(user_id),
    FOREIGN KEY (course_id) REFERENCES ims_course(course_id),
    FOREIGN KEY (shift_id) REFERENCES ims_shift(shift_id)
);

CREATE TABLE ims_enroll_student(
    enroll_student_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    course_enroll_id INT,
    user_id INT,
    is_removed TINYINT DEFAULT 0,
    is_created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    is_updated_at DATETIME NULL,
    is_removed_at DATETIME NULL,
    FOREIGN KEY (user_id) REFERENCES ims_user(user_id),
    FOREIGN KEY (course_enroll_id) REFERENCES ims_course_enroll(course_enroll_id)
);
















