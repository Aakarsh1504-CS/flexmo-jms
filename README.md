---

### README for Flexmo Job Management System

---

#### **Project Overview**

The Flexmo Job Management System is a web application built using Laravel. The application allows users to create profiles, upload resumes, browse job openings, manage job applications, and perform various job-related activities. The project was developed in response to the assignment requirements outlined in the problem statement.

#### **Core Features**
- **User Profile Management**: Users can create and manage their profiles, upload resumes, and update their education, experience, and project details.
- **Job Browsing and Filtering**: Users can view available jobs and filter them by location, job type, title, years of experience, and compensation.
- **Application Tracking**: Users can track and manage the jobs they've applied to.

#### **Additional Features**
- **Employer Profile Management**: Employers can create profiles, post job openings, and manage them.
- **Applicant Tracking for Employers**: Employers can view and filter applicants based on various criteria.

---

### **Installation and Setup**

#### **Prerequisites**
- PHP (>= 8.0)
- Composer
- Node.js & npm
- MySQL or any other relational database

#### **Steps to Set Up Locally**

1. **Clone the Repository**
   ```bash
   git clone https://github.com/Aakarsh1504-CS/flexmo-jms/
   cd flexmo-jms
   ```

2. **Install PHP Dependencies**
   - Since the `vendor` folder is not included in the repository, you need to install the dependencies using Composer:
   ```bash
   composer install
   ```

3. **Install Node.js Dependencies**
   - Similarly, as the `node_modules` folder is also not included, install the necessary Node.js dependencies:
   ```bash
   npm install
   npm run dev
   ```

4. **Environment Configuration**
   - Copy the `.env.example` file to `.env`:
   ```bash
   cp .env.example .env
   ```
   - Update the `.env` file with your database credentials and other necessary configurations:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
   ```

5. **Generate Application Key**
   - Generate the Laravel application key:
   ```bash
   php artisan key:generate
   ```

6. **Run Database Migrations**
   - **Important**: The `roles` table must be migrated first because Laravel Breeze's user system references it. Use the following command:
   ```bash
   php artisan migrate --path=database/migrations/2024_08_27_061641_create_roles_table.php
   ```
   - After migrating the `roles` table, you can run the remaining migrations:
   ```bash
   php artisan migrate
   ```
   **Feed the Roles Table**
   - Fill the roles table with the following data
   - id=1,name=Employer
   - id=2,name=Job Seeker
     *It is important to keep this data as written here , since the backend currently uses static id of the roles table. If you need to change this then Exployer logic can be followed*
   ```bash
   php artisan db:seed
   ```

7. **Seed the Database**
   - If applicable, you can seed the database with initial data:
   ```bash
   php artisan db:seed
   ```

8. **Start the Development Server**
   - Serve the application locally:
   ```bash
   php artisan serve
   ```
   - Visit `http://127.0.0.1:8000` in your web browser to view the application.

---

### **Usage**

1. **Register**
   - First, register as either an **Employer** or a **Job Seeker**.
   - Employers can create and manage job postings, while job seekers can browse and apply for jobs.

2. **Login**
   - After registration, log in to access the respective functionalities.

3. **Functionality**
   - **Employers**: Create, view, edit, and delete job postings. View and filter applicants.
   - **Job Seekers**: Browse jobs, filter by various criteria, and apply for positions.

---

### **Contact**

For any queries, please contact me at [aroraaakarsh0@gmail.com](mailto:aroraaakarsh0@gmail.com).

---
