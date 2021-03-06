# Kinsey Roberts Resume and Portfolio
This project is an HTML-based resume and portfolio for Kinsey Roberts.

## Features

### Technology
* Built on Twitter Bootstrap for responsive UI
* Developed in PHP with MySQL database for quick and easy changes
* Served via AWS S3 as static HTML pages generated by a script
* Aims for compliance with WCAG 2.0 AA accessibility guidelines

### Content
* Aims for 7-9 grade reading level
* Project stories use STAR (Situation, Task, Action, Response) structure
* Acronyms clarified using `abbr` tags

### Privacy
* Google Tag Manager not injected if Do Not Track (DNT) is set
* Local fallbacks used for all CDN assets if DNT is set

## [Build Process](tasks/build.cmd)

 1. Database is backed up to [`/sql/`](sql/) using [`mysqldump` and `sed`](tasks/db_backup.cmd)
 2. Assets are built using a [Ruby script](tasks/compile_assets.rb)
    1. CSS is compiled from Sass and minified
    2. JavaScript files are concatenated and minified
    3. [PHP configuration](src/classes/Config.php) and [`humans.txt`](humans.txt) are updated to reflect build time
 3. Each page is saved to a static HTML file using a [PHP script](tasks/static_pages.php)
    1. Build time is included as a query string parameter on all links for cache busting
    2. Page's contents are minified and saved under [`/static/`](static/)
    3. [`sitemap.xml`](sitemap.xml) is built as each page is processed
 4. Critical CSS is inlined into each page using a [`gulp` task](tasks/gulpfile.js)
    1. The [`critical` npm package](https://www.npmjs.com/package/critical) analyzes all 4 Bootstrap breakpoints to inline above-the-fold styles
    2. Pages were split into 6 parallel queues to reduce processing time

This seems like an absurd number of technologies for one build script. The Ruby Sass/JS pipeline was reused from a previous project. The static pages script needed database access, and doing it in PHP let me reuse the data objects I'd written. I couldn't find a Ruby critical CSS gem that considered more than one breakpoint; enter Node.js and gulp. Add some batch scripting to tie it all together and it became a tidy build process.

## [Upload Process](tasks/s3_upload.php)

At first, I just used the AWS CLI's `aws s3 sync` command to push the `/static/` folder to an S3 bucket. Later, I ran the site through [PageSpeed Insights](https://developers.google.com/speed/pagespeed/insights/) and [sonarwhal](https://sonarwhal.com/scanner) and found plenty of room for optimization. 

Thankfully, the `aws s3 cp` command accepts arguments to set HTTP headers. Since I was using cache busting, I set the `cache-control` and `expires` headers to their maximum values. I tweaked the `content-type` header and set the `charset`. S3 doesn't offer server-side compression, so I gziped text-based files before uploading and set the `content-encoding` header.

Once all of the files are uploaded, the script pings Google and Bing to notify them that an updated sitemap is available.
