# Contao Member Reset Email

A standalone Contao 5.3 backend module that allows administrators to send password reset emails to members directly from the **member list view**, **bulk actions**, or the **individual member edit page**.

This module works on its own, but can also be installed alongside other custom modules (e.g. Member Import).  
It includes its own configuration options in **System → Settings** and uses Contao’s built-in **OptIn token** for secure reset links.

---

## 🚀 Features

- Adds a **reset email icon** to the member list (`tl_member`) next to “login as member”.
- Adds a **bulk action** for sending reset emails to multiple selected members.
- Adds a **button** in the *Login details* section of the member edit form.
- Uses Contao **Notification Center** if available, otherwise falls back to the core `Email` class.
- Provides its own **system settings** (reset page, sender name/email, subject, body template).
- Supports placeholders in the email body:
  - `##firstname##`
  - `##lastname##`
  - `##username##`
  - `##reset_link##`

---

## 📦 Installation

### Via Composer
```bash
composer require bright-cloud-studio/contao-member-reset-email
