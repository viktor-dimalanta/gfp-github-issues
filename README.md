# Laravel GitHub Issues Viewer

![image](https://github.com/user-attachments/assets/c7caeff2-3d37-400d-969b-8e6040bc9075)


### 📌 Overview

This Laravel application allows a logged-in GitHub user to view all open issues assigned to them in their visible repositories.

### 🚀 Setup Instructions

#### Step 1: Clone the Repository

git clone https://github.com/viktor-dimalanta/gfp-github-issues.git
cd gfp-github-issues

#### Step 2: Install Dependencies

composer install

#### Step 3: Set Up Environment Variables

Copy the .env.example file and create a new .env file:

cp .env.example .env

Then update the following in .env:

GITHUB_ACCESS_TOKEN=your_personal_access_token

#### Step 4: Generate App Key

php artisan key:generate

#### Step 5: Serve the Application

php artisan serve

Visit http://127.0.0.1:8000/github/issues in your browser.

🔑 Generate GitHub Personal Access Token

Log in to GitHub

Go to Settings > Developer Settings > Personal Access Tokens

Click "Generate new token (classic)"

Select the following scopes:

✅ repo (Full control of private repositories, if needed)

✅ read:org (Read organization and team memberships)

✅ read:issues (Read access to issues assigned to you)

✅ user (Read your profile information)

Click "Generate Token"

Copy the token and add it to your .env file under GITHUB_ACCESS_TOKEN

## 📌 Usage

Open http://127.0.0.1:8000/github/issues

View a list of open issues assigned to you, including issue number, title, and creation date.

## ⚙️ Additional Commands

Clear Cache:

php artisan cache:clear && php artisan config:clear

Migrate Database (if needed):

php artisan migrate

## Run Tests:

php artisan test

## 📜 License

This project is open-source and available under the MIT License.

## 👤 Author

Developed by

Viktor Angelo Dimalanta, MSIT https://www.linkedin.com/in/viktor-dimalanta-msit/

