# Part A

#### One of the client websites is down both on FE and BE, because of some error on one of the plugins or themes. You only have access to the DB and Files. What would you do?

* Access the WP and change the theme to Child theme and check if the error is still exists or download the wp database and also the website and try it on local machine for further investigation.
* Check the error logs on `public_html` or `error_logs`
* Check all the plugins manually by disabling and see if there's an error.
* After checking the plugins try clear cache and refresh the site then enable the plugin one by one to trace what plugin causing the issue.
* Last option is to restore backup if the website installed a backup plugin one of the best option for rollback if there's an issue with the website.
