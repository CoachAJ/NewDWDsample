# Daily with Doc — Complete Joomla 5.x & 6.0 Installation & Customization Guide

This guide walks you step-by-step through installing the **Daily with Doc** template, configuring it, and making adjustments or corrections (text, photos, phone numbers, links, and styling).

---

## 📑 Table of Contents
1. [Quick Install via Joomla Administrator](#1-quick-install-via-joomla-administrator-recommended)
2. [Alternative Install via Direct Folder / FTP](#2-alternative-install-via-direct-folder--ftp-for-developers)
3. [Activating the Template](#3-activating-the-template)
4. [Making Adjustments & Corrections (No Code Required)](#4-making-adjustments--corrections-no-code-required)
5. [Replacing or Adjusting Images & Photos](#5-replacing-or-adjusting-images--photos)
6. [Creating Custom Joomla Modules (Optional)](#6-creating-custom-joomla-modules-optional)
7. [Custom CSS Tweaks](#7-custom-css-tweaks)
8. [Joomla Recommended System Settings](#8-joomla-recommended-system-settings)

---

## 1. Quick Install via Joomla Administrator (Recommended)

1. Open your web browser and log into your **Joomla Administrator** dashboard (usually `https://yourdomain.com/administrator`).
2. In the left navigation menu, go to:
   **System** &rarr; under the **Install** heading, click **Extensions**
   *(In older Joomla layouts: **Extensions** &rarr; **Manage** &rarr; **Install**)*.
3. On the **Upload Package File** tab:
   - Click **Browse for file** (or drag and drop).
   - Select the file: **`dailywithdoc-joomla6-template.zip`** located in this folder.
4. Joomla will upload and extract the template. You will see a green success message:  
   *`Installation of the template was successful.`*

---

## 2. Alternative Install via Direct Folder / FTP (For Developers)

If you are developing locally (XAMPP, WampServer, MAMP, Docker) or prefer FTP:

1. Copy the entire template folder contents directly into your Joomla site’s templates directory:  
   `YOUR_JOOMLA_ROOT/templates/dailywithdoc/`
2. Log into the Joomla Administrator.
3. Go to **System** &rarr; **Install** &rarr; **Discover**.
4. Click the **Discover** button in the toolbar.
5. Check the box next to **Daily with Doc**, then click **Install**.

---

## 3. Activating the Template

1. In the Joomla Administrator, go to:  
   **System** &rarr; under **Templates**, click **Site Template Styles**.
2. Locate **Daily with Doc - Default** in the list.
3. Click the **Star icon** (under the "Default" column) to set it as the default template for all public pages.
4. Click **DailywithDoc.com** at the top right to open your live frontend site.  
   *The template will automatically display the complete design layout with Dr. Joel Wallach's photo, the 4 badges, newsletter, food diary, and bottom feature cards!*

---

## 4. Making Adjustments & Corrections (No Code Required)

You can easily adjust the site’s text, phone numbers, doctor name, and colors straight from the Joomla Administrator:

1. Go to **System** &rarr; **Site Template Styles** &rarr; click on **Daily with Doc - Default**.
2. Click the **Basic Configuration** tab:
   - **Phone Number**: Change `855-949-3377` to any number (it automatically updates the click-to-call links).
   - **Social Media URLs**: Paste your official URLs for **Facebook**, **YouTube**, **Rumble**, **Apple Podcasts**, and **X (Twitter)**. Leaving any field blank automatically hides that icon.
   - **Hero Tagline Kicker**: Edit *"Your Health. Your Journey. Your Life."*.
   - **Hero Title Intro**: Edit *"Discover the Power of"*.
   - **Hero Script Text**: Edit *"90 for Life!"*.
   - **Hero Description**: Edit *"Your trusted resource for empowering healthier lives through the nutritional teachings of Dr. Joel D. Wallach, BS, DVM, ND."*.
   - **Hero Action Callout**: Edit *"Get Educated. Get Empowered. Get Started!"*.
   - **Custom Logo**: Upload or select a different logo file from Joomla Media Manager.
   - **Demo Fallback Content**: Set to **Yes** to keep sample cards visible, or **No** once you create your own custom modules.
3. Click the **Theme Colors** tab:
   - Customize the **Primary Navy**, **Accent Gold/Yellow**, and **Blue Accent** using the built-in color pickers.
4. Click **Save & Close** at the top.

---

## 5. Replacing or Adjusting Images & Photos

All images used by the template are stored in:  
📁 `YOUR_JOOMLA_ROOT/templates/dailywithdoc/images/`

| File Name | Purpose | Dimensions |
| :--- | :--- | :--- |
| **`logo.png`** | Header navigation logo with stethoscope & sunflower | ~420 × 80 px (transparent PNG) |
| **`hero-people.png`** | Dr. Joel Wallach & Co-host photo (feathered left edge) | ~865 × 750 px (transparent PNG) |
| **`hero-bg.jpg`** | Warm golden bokeh hero background | 1600 × 650 px (JPG) |
| **`food-diary-notebook.png`** | Spiral notebook with sunflower for the sidebar module | ~64 × 110 px (transparent PNG) |
| **`card-news.jpg`** | Feature Card 1 background (Health News) | 600 × 450 px (JPG) |
| **`card-store.jpg`** | Feature Card 2 background (Store / Supplements) | 600 × 450 px (JPG) |
| **`card-coach.jpg`** | Feature Card 3 background (Find a Coach) | 600 × 450 px (JPG) |
| **`card-about.jpg`** | Feature Card 4 background (About Us) | 600 × 450 px (JPG) |

> **Tip:** To update Dr. Wallach's photo or any card graphic, simply replace the image file with the same file name, or edit [`css/template.css`](file:///c:/Users/atifj/OneDrive/Desktop/NEW%20DWD%20Sample/css/template.css).

---

## 6. Creating Custom Joomla Modules (Optional)

The template works out of the box with built-in fallbacks. When you are ready to publish real dynamic Joomla modules, use these module positions:

### Position Reference Map
- **`menu`**: Main navigation menu
- **`search`**: Smart Search input
- **`sidebar-left`**: Newsletter, Food Diary, Quick Links
- **`bottom-1`**: Health News card
- **`bottom-2`**: Store card
- **`bottom-3`**: Find a Coach card
- **`bottom-4`**: About Us card
- **`footer-1`** to **`footer-4`**: Footer columns

---

### Module 1: Main Menu
1. Go to **Content** &rarr; **Site Modules** &rarr; click **New** &rarr; choose **Menu**.
2. Title: `Main Menu`.
3. Select Menu: Choose your `Main Menu`.
4. Position: Select **`menu`** (under Daily with Doc).
5. Module Chrome: In the **Advanced** tab, set **Module Style** to `clean`.
6. Click **Save & Close**.

---

### Module 2: Join Our Newsletter (`sidebar-left`)
1. Go to **Content** &rarr; **Site Modules** &rarr; click **New** &rarr; choose **Custom** (Custom HTML).
2. Title: `Join Our Newsletter`.
3. Position: Select **`sidebar-left`**.
4. Show Title: **Hide** (the HTML has its own styled title).
5. Toggle the editor to **Code view** (`<>`) and paste:

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
6. Click **Save & Close**.

---

### Module 3: Start Your Food Diary (`sidebar-left`)
1. Go to **Content** &rarr; **Site Modules** &rarr; click **New** &rarr; choose **Custom**.
2. Title: `Start Your Food Diary`.
3. Position: Select **`sidebar-left`**.
4. Show Title: **Hide**.
5. Switch to **Code view** (`<>`) and paste:

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
6. Click **Save & Close**.

---

### Module 4: Quick Links (`sidebar-left`)
1. Go to **Content** &rarr; **Site Modules** &rarr; click **New** &rarr; choose **Custom**.
2. Title: `Quick Links`.
3. Position: Select **`sidebar-left`**.
4. Show Title: **Hide**.
5. Switch to **Code view** (`<>`) and paste:

```html
<div class="dwd-sidebar-box dwd-quicklinks-box">
    <h3 class="dwd-sidebar-title">Quick Links</h3>
    <ul class="dwd-quick-links-list">
        <li><a href="#watch-live"><span class="dwd-link-icon"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg></span>Watch Live</a></li>
        <li><a href="#schedule"><span class="dwd-link-icon"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 14c1.66 0 3-1.34 3-3V5c0-1.66-1.34-3-3-3S9 3.34 9 5v6c0 1.66 1.34 3 3 3z"/><path d="M17 11c0 2.76-2.24 5-5 5s-5-2.24-5-5H5c0 3.53 2.61 6.43 6 6.92V21h2v-3.08c3.39-.49 6-3.39 6-6.92h-2z"/></svg></span>Show Schedule</a></li>
        <li><a href="#store"><span class="dwd-link-icon"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg></span>Our Store</a></li>
        <li><a href="#find-coach"><span class="dwd-link-icon"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg></span>Find a Coach for You</a></li>
        <li><a href="#become-coach"><span class="dwd-link-icon"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z"/></svg></span>Become a Coach</a></li>
        <li><a href="#health-news"><span class="dwd-link-icon"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M20 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-1 16H5c-.55 0-1-.45-1-1V6c0-.55.45-1 1-1h14c.55 0 1 .45 1 1v12c0 .55-.45 1-1 1zm-8-3H6v-2h5v2zm7 0h-5v-2h5v2zm0-4H6v-2h11v2z"/></svg></span>Health News</a></li>
        <li><a href="#evaluation"><span class="dwd-link-icon"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3.02 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg></span>Evaluation</a></li>
    </ul>
</div>
```
6. Click **Save & Close**.

---

### Module 5 to 8: Bottom Feature Cards (`bottom-1` to `bottom-4`)
Create a **Custom** module for each position (`bottom-1`, `bottom-2`, `bottom-3`, `bottom-4`):

**Card 1 (`bottom-1`): Health News**
```html
<a href="/health-news" class="dwd-feature-card-link" title="Health News">
    <img src="templates/dailywithdoc/images/card-news.jpg" alt="Health News - The latest on nutrition, supplements and holistic wellness" class="dwd-card-graphic" loading="lazy">
</a>
```

**Card 2 (`bottom-2`): Store**
```html
<a href="/store" class="dwd-feature-card-link" title="Store">
    <img src="templates/dailywithdoc/images/card-store.jpg" alt="Store - Quality products to support your health journey" class="dwd-card-graphic" loading="lazy">
</a>
```

**Card 3 (`bottom-3`): Find a Coach for You**
```html
<a href="/find-a-coach" class="dwd-feature-card-link" title="Find a Coach for You">
    <img src="templates/dailywithdoc/images/card-coach.jpg" alt="Find a Coach for You - Work with a certified Wholistic Health Coach" class="dwd-card-graphic" loading="lazy">
</a>
```

**Card 4 (`bottom-4`): About Us**
```html
<a href="/about" class="dwd-feature-card-link" title="About Us">
    <img src="templates/dailywithdoc/images/card-about.jpg" alt="About Us - Our mission, story and vision for healthier lives" class="dwd-card-graphic" loading="lazy">
</a>
```

---

## 7. Custom CSS Tweaks

If you need to make design or font adjustments, **do not edit `css/template.css` directly**. Instead, use the custom CSS file:  
📁 `YOUR_JOOMLA_ROOT/templates/dailywithdoc/css/custom.css`

This file is loaded after the template styles and will never be overwritten if the core template is updated.

Example tweaks you can add to `custom.css`:
```css
/* Example: Increase font size of hero doctor name */
.dwd-hero-docname {
    font-size: 1.8rem;
}

/* Example: Change the yellow button border radius */
.btn-yellow {
    border-radius: 20px;
}
```

---

## 8. Joomla Recommended System Settings

To ensure your URLs, search features, and AEO/SEO structured data work at peak performance:

1. **Enable Search Engine Friendly URLs**:
   - Go to **System** &rarr; **Global Configuration** &rarr; **Site** tab.
   - Set **Search Engine Friendly URLs** to **Yes**.
   - Set **Use URL Rewriting** to **Yes** *(make sure `htaccess.txt` in your Joomla root is renamed to `.htaccess`)*.
2. **Set Site Name & Meta Description**:
   - In the same **Site** tab, enter:
     - **Site Name**: `Daily with Doc`
     - **Site Meta Description**: `Empowering healthier lives through the 90 for Life nutritional teachings of Dr. Joel D. Wallach BS, DVM, ND.`
3. **Smart Search Index**:
   - Go to **Smart Search** &rarr; **Index** and click **Index** so your site’s articles and products are searchable from the template’s search bar.

