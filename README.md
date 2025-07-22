# 🧑‍💼 JobPortal Web Application

A full-featured web-based Job Portal system where **job seekers** can search and apply for jobs, and **recruiters** can post and manage job openings. Designed using **PHP** and **MySQL**, this project is ideal for students and beginners looking to understand real-world CRUD applications.


## 📌 Project Highlights

### 👨‍💼 Job Seeker
- User Registration and Login
- Browse Job Listings by Category or Location
- Apply for Jobs
- View Application History

### 🏢 Recruiter
- Company/Recruiter Registration and Login
- Post New Job Openings
- View and Manage Job Applications

### 🛠️ Admin Panel (Optional)
- Manage All Users and Listings
- Approve or Reject Job Posts
- Monitor Platform Activity

---

## 🧰 Tech Stack

- **Frontend**: HTML, CSS, Bootstrap
- **Backend**: PHP
- **Database**: MySQL
- **Server**: Apache (via XAMPP)

---

## 🚀 Live Demo & Tutorial

🎥 **Watch the Full Project Tutorial on YouTube**  
Subscribe and follow along:  
📺 [Rashmi Prava Mishra – Web Development Tutorials](https://www.youtube.com/@rashmipravamishra)  
✅ Don't forget to Like, Share, and Subscribe!

---

## 💻 Local Setup Guide

### 1. Install Prerequisites
- [XAMPP](https://www.apachefriends.org/index.html)
- Git (optional)

### 2. Clone the Repository
git clone https://github.com/lopalopa/jobportal.git
cd jobportal
### 3. Import the Database
Open http://localhost/phpmyadmin
Create a new database named jobportal
Import jobportal.sql (if provided in the project folder)

### 4. Configure Database Connection
Update db.php or your database config file:

$host = "localhost";
$user = "root";
$password = "";
$database = "jobportal";
### 5. Run the Application
Start Apache and MySQL via XAMPP

Go to: http://localhost/jobportal

## 🗂 Project Structure
jobportal/
├── admin/             → Admin dashboard files
├── recruiter/         → Recruiter panel and job management
├── jobseeker/         → Job seeker pages and features
├── includes/          → Reusable files like header, footer, db config
├── db.php             → Database connection file
├── index.php          → Landing page
└── README.md          → You're reading it!


## 🧠 Learning Outcomes
Understanding MVC-like separation using PHP

Form handling, session management, and MySQL CRUD

User roles and access-level controls

Building real-world projects using XAMPP stack

## 🧑‍🏫 About Me
Hello! I’m Rashmi Prava Mishra, a passionate software developer, freelancer, and educator.
I specialize in full-stack web development using PHP, Java, React, Laravel, and more.

📺 Follow My YouTube Channel for complete tutorials:
👉 https://www.youtube.com/@rashmipravamishra

## 🤝 Contributing
Want to contribute?
Fork the repo
Create your feature branch (git checkout -b feature/my-feature)
Commit your changes (git commit -m 'Add new feature')
Push to the branch (git push origin feature/my-feature)
Open a Pull Request

## 📜 License
This project is open-source and available for learning purposes.

📬 Contact
📧 Email: rashmipravamishra@example.com
🌐 Portfolio: [https://lopalopa.github.io/freelancer-portfolio/]
🔗 LinkedIn: [https://www.linkedin.com/in/rashmi-mishra-187734106/]


### ✅ Next Steps

After saving this file:
1. Place it inside the root folder of your `jobportal` project as `README.md`
2. Commit and push it to GitHub:

git add README.md
git commit -m "Added complete README with YouTube link"
git push origin master
