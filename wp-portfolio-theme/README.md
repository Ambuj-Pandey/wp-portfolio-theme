# DesignFly
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Tan-007/DesignFly/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Tan-007/DesignFly/?branch=master)

A fully responsive and highly customizable WordPress theme. This theme was developed during the WordPress training program provided by [rtCamp](https://rtcamp.com/). Requirements for the theme were provided by rtCamp which can be found [here](https://learn.rtcamp.com/topic/task-theme-development-assignment/).

- [For Developers](https://github.com/Tan-007/DesignFly#for-developers)
- [For Users](https://github.com/Tan-007/DesignFly#for-users)
- [Screenshot(s)](https://github.com/Tan-007/DesignFly#screenshots)

## For developers: 
### Here are the main directories/files:
- `assets`: contains images used by the site
- `inc`: contains files for the theme customizer, template-tags(functions) and widgets.php file(contains custom widget class)
- `js`: contains theme scripts
- `languages`: contains pot template for localization
- `layouts`: contains styles for the theme
  - `css/main.css`(file): **contains all the core theme css**
  - `css/media-queries.css`(file): contains media queries for the theme
- `lib`: contains all the third party libraries/plugins
- `page-templates`: contains page templates provided by the theme
- `template-parts`: conains template parts used by the theme
- `home.php`: Your home page template

### Third party plugins or libraries: 
The theme uses only one third party UI library called [Bootstrap](https://getbootstrap.com/)

**Demo link for the theme can be found [here](https://rahicodes.000webhostapp.com/)**

## For users:
### Activation: 
This theme is not available on WordPress marketplace hence you will have to manually upload this theme to your website's directory.
1. Click on `Clone or download` button at top right in this directory to download a zip file of this entire directory on your computer.
2. From your FTP client or your cpanel go to your WordPress website's root directory and navigate to the `themes` folder at `wp-content`>`themes`
3. Create a new folder named `designfly` inside `themes` folder and copy all content of the zip file that you downloaded from github
4. Log in to your WordPress admin panel and navigate to `Appearance`>`theme`
5. There should be a new theme available named `DesignFly`. Click on active to activate it. 

### Getting started with the theme:
- The theme comes with three page templates for you to use, Home page, Portfolio page and Blog page
- Make sure your home page is set to display dynamic posts to automatically setup the home page by the theme.
- First thing you will want to do is setup your navigation bar if this is your very first theme.
- Go to `pages` in your admin panel and add two new pages named `Blog` and `Portfolio`(you can name them anything you want)
- Now in bottom right section in the page editor, select `Blog Page` and `Portfolio page` page templates for your pages respectively.
- Now you can add these pages to your navigation menu from `Appearance`>`Menus`
- Now you can start adding new portfolio items in `Portfolio` section in your admin panel and your blog page is already setup. All your posts will appear in that page.

### Customizations:
- On home page you should see mainly four sections, Navigation bar(contains logo and menu), Services bar(shows three services provided), Header section(contains header image), Portfolio section(displays recent portfolio items), Footer section(contains contact and other info).
- The Navigation bar's logo can be changed from `Appearance`>`Customize`>`Site Identity`
- You can add all three of your services' title, description and image from `Appearance`>`Customize`>`Services Bar`
- You can also choose to select if you want to display the header section and/or portfolio section on your homepage or not from `Appearance`>`Customize`>`Home Page Settings`
- You get to decide to which page the `view all` button on home page's portfolio section points. You can select the desired page from a dropdown from `Appearance`>`Customize`>`Home page Settings`>`Portfolio 'view all' button url`.
- You can add your footer section information like your adderess, email, phone and your social media links from `Appearance`>`Customize`>`Footer Settings`
- Number of posts displayed in the blog page can be managed through `Settings`>`Reading`>`Blog pages show at most`
- You are also provided with a widget to display your recent portfolio items in your site

> **Note:** *In future updates you can expect many more customizations like fonts, background image, theme primary and secondary colors, portfolio grid customizations, site icon and more. Stay tuned!*

## Screenshot(s):
Home page:

![Home page](https://i.imgur.com/m1rwzHM.png)

`Portfolio page` template in use:

![Portfolio page](https://i.imgur.com/W3hpQZW.png)

`Blog page` template in use:

![blog page](https://i.imgur.com/AxtUXYm.png)

This is how a single post will be displayed:

![Single post page](https://i.imgur.com/f3vMMFy.png)
