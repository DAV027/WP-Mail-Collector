# Mail Collector Plugin for WordPress
## Description
The Mail Collector plugin is a simple and efficient tool for collecting email addresses through a form on your WordPress site. This plugin allows you to easily gather and store email addresses in your WordPress database for future use, such as newsletters, promotions, or other email campaigns.

## Features
- Easy Installation: Quickly set up and activate the plugin from your WordPress admin dashboard.
- Shortcode for Form: Use the [mail_collector_form] shortcode to display the email collection form anywhere on your site.
- Database Storage: Securely stores collected email addresses in a dedicated table in your WordPress database.
- Form Validation: Ensures the email addresses entered are valid before storing them.
- Redirect on Submission: Redirects users upon form submission, with optional success and error messages.

## Installation
Download the Plugin:
- Clone or download the repository to your local machine.
- Upload the mail-collector directory to the /wp-content/plugins/ directory on your WordPress site.

Activate the Plugin:
- Go to the WordPress admin dashboard.
- Navigate to Plugins > Installed Plugins.
- Find the "Mail Collector" plugin and click Activate.

Add the Form to Your Site:
- Edit the page or post where you want to display the email collection form.
- Add the shortcode `[mail_collector_form]` to the content area.

## Usage
After activating the plugin and adding the shortcode to a page or post, visitors to your site will be able to submit their email addresses through the form. The email addresses will be stored in a custom table in your WordPress database, which can be accessed via your database management tool (e.g., phpMyAdmin).
