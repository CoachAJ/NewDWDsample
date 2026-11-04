# Daily with Doc - Joomla 6.0 & 5.x Template

A modern, mobile-responsive Joomla 6.0 and 5.x site template crafted for **DailywithDoc.com**, featuring the nutritional education and **90 for Life** teachings of **Dr. Joel D. Wallach BS, DVM, ND**.

The template faithfully reproduces the design mockup, incorporating the high-resolution feathered visual of Dr. Wallach and his co-host seamlessly into the warm glowing hero banner.

> 📖 **Need step-by-step help installing or customizing this template?**  
> Check out the complete [**Detailed Installation & Customization Guide (INSTALLATION_GUIDE.md)**](INSTALLATION_GUIDE.md).

---

## 🌟 Key Features

- **Joomla 6.0 & 5.x Native Architecture**:
  - Full compliance with modern Joomla standards (`joomla.asset.json`, PHP 8.1+, XML manifest).
  - Modern namespaces (`Joomla\CMS\Factory`, `Joomla\CMS\HTML\HTMLHelper`, `Joomla\CMS\Uri\Uri`).
  - Native overrides (`html/mod_menu`, `html/modules.php`) for accessible, responsive dropdown menus.
- **Hero Section with Dr. Joel Wallach**:
  - Integrated with the actual high-resolution photo of Dr. Wallach and his co-host (`hero-people.png`), softly feathered into the warm golden bokeh atmosphere.
  - The 4 core health pillars: **EDUCATE**, **EVALUATE**, **EQUIP**, and **EMPOWER** with custom vector badge styling.
- **Side Column Modules**:
  - **Join Our Newsletter** form module.
  - **Start Your Food Diary** promo card with spiral sunflower notebook icon.
  - **Quick Links** with custom icons for Live Streams, Show Schedule, Store, Coaches, and Evaluation.
- **4 Feature Bottom Cards**:
  - **Health News** (vintage newspaper & sunflower backdrop).
  - **Store** (nutritional supplements & mineral bottles).
  - **Find a Coach for You** (sunrise mountain active silhouette).
  - **About Us** (golden hour sunflower field).
- **Out-of-the-Box Fallbacks**:
  - Displays the complete mockup design immediately upon installation when positions are empty.
  - As soon as you publish your own Joomla modules to any position, the template smoothly switches to your custom modules.
- **Template Parameters**:
  - Custom toll-free phone number (default: `855-949-3377`).
  - Social media channel links (Facebook, YouTube, Rumble / Video, Apple Podcasts, X / Twitter).
  - Custom logo upload.
  - Hero headline, script text, and doctor title customization.
  - Theme color overrides.

---

## 📦 Directory Structure

```text
NEW DWD Sample/
├── templateDetails.xml             # Joomla template manifest & positions
├── joomla.asset.json               # Modern Web Asset Manager registry
├── index.php                       # Main template entry file
├── component.php                   # Modal and print view
├── error.php                       # Custom 404 / 500 error page
├── offline.php                     # Branded maintenance mode page
├── template_preview.png            # Preview image in Template Manager
├── template_thumbnail.png          # Thumbnail in Template Manager
├── preview.html                    # Standalone interactive live preview
├── dailywithdoc-joomla6-template.zip # Ready-to-install Joomla package
├── css/
│   ├── template.css                # Core responsive stylesheet
│   └── custom.css                  # User customization stylesheet
├── js/
│   └── template.js                 # Mobile navigation, dropdowns & search
├── images/
│   ├── logo.png                    # Daily with Doc logo
│   ├── hero-people.png             # Feathered Dr. Wallach & co-host image
│   ├── hero-bg.jpg                 # Warm golden bokeh backdrop
│   ├── food-diary-notebook.png     # Notebook with sunflower illustration
│   ├── card-news.jpg               # Card 1 background
│   ├── card-store.jpg              # Card 2 background
│   ├── card-coach.jpg              # Card 3 background
│   └── card-about.jpg              # Card 4 background
├── html/
│   ├── modules.php                 # Module chrome ('card', 'sidebar', 'clean')
│   └── mod_menu/                   # Accessible dropdown menu overrides
│       ├── default.php
│       ├── default_component.php
│       ├── default_url.php
│       ├── default_heading.php
│       └── default_separator.php
└── language/en-GB/
    ├── tpl_dailywithdoc.ini        # Frontend language constants
    └── tpl_dailywithdoc.sys.ini    # System language constants
```

---

## 🚀 Installation Guide

### Option 1: Install via Joomla Administrator (Recommended)

1. Log into your Joomla 5 or Joomla 6 Administrator dashboard (`/administrator`).
2. Navigate to **System** &rarr; **Install** &rarr; **Extensions** (or **Extensions** &rarr; **Manage** &rarr; **Install**).
3. Under the **Upload Package File** tab, drag and drop the `dailywithdoc-joomla6-template.zip` package located in this folder.
4. Once installed, go to **System** &rarr; **Site Template Styles**.
5. Find **Daily with Doc - Default** and click the golden star to set it as the **Default** site template.
6. Open your site's frontend to see the live template!

### Option 2: Manual Directory Copy (Developer Mode)

1. Copy the contents of this folder into your Joomla installation under `/templates/dailywithdoc/`.
2. In the Joomla Administrator, go to **System** &rarr; **Install** &rarr; **Discover**.
3. Click **Discover**, select `dailywithdoc`, and click **Install**.

---

## 📌 Module Positions Reference

| Position | Description | Suggested Module |
| :--- | :--- | :--- |
| `logo` | Header logo area | Custom HTML or Media module |
| `topbar-phone` | Phone number in header | Custom HTML or parameter fallback |
| `topbar-social`| Header social icons | Custom HTML or parameter fallback |
| `menu` | Main navigation bar | **Menu Module** (`mod_menu`) |
| `search` | Header search popup | **Smart Search** (`mod_finder`) |
| `hero` | Main banner area | Custom HTML (replaces default hero) |
| `sidebar-left` | Left column | Newsletter, Food Diary, Quick Links |
| `content-top` | Above main component | Breadcrumbs, announcements |
| `mainbody` | Component area | Joomla Articles / Component Output |
| `content-bottom`| Below main component | Author bio, related articles |
| `bottom-1` | Feature Card 1 | Health News module |
| `bottom-2` | Feature Card 2 | Store / Product showcase |
| `bottom-3` | Feature Card 3 | Find a Coach module |
| `bottom-4` | Feature Card 4 | About Us module |
| `footer-1` | Footer Column 1 | About & Health disclaimer |
| `footer-2` | Footer Column 2 | Quick links menu |
| `footer-3` | Footer Column 3 | 90 for Life resources |
| `footer-4` | Footer Column 4 | Contact support info |
| `copyright` | Bottom bar | Copyright statement |
| `debug` | Diagnostics | Debug system output |

---

## 💻 Sample Module Code Snippets

### 1. Newsletter Module (`sidebar-left`)
```html
<div class="dwd-sidebar-box dwd-newsletter-box">
    <h3 class="dwd-sidebar-title">Join Our Newsletter</h3>
    <p class="dwd-sidebar-desc">Get the latest health news, show updates and exclusive resources.</p>
    <form action="#" method="post" class="dwd-newsletter-form">
        <div class="form-group">
            <input type="text" name="first_name" class="dwd-input" placeholder="First Name" required>
        </div>
        <div class="form-group">
            <input type="email" name="email" class="dwd-input" placeholder="Email Address" required>
        </div>
        <button type="submit" class="btn-yellow">SUBSCRIBE</button>
    </form>
</div>
```

### 2. Start Your Food Diary (`sidebar-left`)
```html
<div class="dwd-sidebar-box dwd-diary-box">
    <h3 class="dwd-sidebar-title">Start Your Food Diary</h3>
    <div class="dwd-diary-body">
        <img src="templates/dailywithdoc/images/food-diary-notebook.png" alt="Food Diary" class="dwd-diary-img">
        <p class="dwd-diary-text">Track your meals, improve your health and feel your best!</p>
    </div>
    <a href="/food-diary" class="btn-yellow">GET STARTED</a>
</div>
```

---

## 🌐 Instant Local Preview

To immediately inspect the responsive layout, menu dropdowns, search trigger, and visual design in your web browser:
- Double-click **`preview.html`** in this folder to open it in Chrome, Edge, or Firefox.

