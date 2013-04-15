# Waschi v1.0-alpha
### (or Waschi Waschmaschinenverbund)

##Changes done:
- included a giveaway.php
- changed some things in the original files
- made my own "save-files"
- create a 'users.php' and 'pwds.php'
- put a `<?php' on the first line of those files - to make them unreadable for others.

All other changes *should* be found in source. 

##TO-DO:


##Future-Plans:
- Get a pwds/users/found transfer betweet servers (like the current object transfer) (should work with this)
- Put wash.php & giveaway.php together (nope!)
- Same for index.php & getback.php (done!)
- Write client-files (echowash.php like) to help coders by making work easier
- Implement a function to send every success giveaway (just usernames) to waschi.org - For a cool high-score list!

A "hide and seek of your laundry" network game over the whole webservers!

## Requirements
For hosting:
- A webserver!
- PHP5
- Some water to drink.

For playing:
- A browser

Or a client like:
- washi.lisp (https://gist.github.com/codepony/4994410) written in CommonLisp
- waschi-cs-client (https://github.com/pixeldesu/waschi-cs-client) written in C#
- waschi-cli (https://github.com/fliiiix/waschi-cli/) written in ruby
- washi-cli (https://github.com/vanita5/washi-cli) written in python

## Installation

Extract the files to your becoming waschi webfolder.
Register your waschi at http://waschi.org
Get your key via mail.

Make a file named key.php with following content 
```php
	<?php
		$key1="KEY1_IN_EMAIL";
		$key2="KEY2_IN_EMAIL";
	?>
```
...and save it in your waschi webfolder.

### Rights
It's important, that your *webserver has a read/write access* on your Waschi folder.
For me that works using an apache webserver:

```bash
	chown root:www-data /path/to/your/waschi/webfolder
	chmod 775 /path/to/your/waschi/webfolder
	chmod -R 664 /path/to/your/waschi/webfolder/*
```


**This may differs from your necessary access configuration.*


### Clean the list
I recommend to clear the list every week. You can do it via cronjob. I'm doing it every sunday in the noon.
You can do it on your server through typing 

```bash
	echo "00 12 * * 0 www-data /bin/rm /YOUR/WASCHI/DIR/found 2> /dev/null" >> /etc/cron.d/waschi
	echo "00 12 * * 0 www-data /bin/rm /YOUR/WASCHI/DIR/users.php 2> /dev/null" >> /etc/cron.d/waschi
	echo "00 12 * * 0 www-data /bin/rm /YOUR/WASCHI/DIR/pwds.php 2> /dev/null" >> /etc/cron.d/waschi
	chmod +x /etc/cron.d/waschi
```

### Register your Waschi!
Go to http://waschi.org/register/ to register your Waschi. After registering you'll get two keys via mail which you have to put into a "key.php", or you will receive the whole key-file.



## License
Waschi (Waschi Waschmaschinenverbund) is licensed under GNU-AGPL v3+.


See more at http://waschi.org/



##FAQ thing

### Scripts - What's that file?
- index.php - Your visible webpage. You can customize it (except the copyright part).
- list.php - Here you can change the look of the list.
- echowash.php - For client reasons. ( see washi.lisp for example )
- found - Your list of found laundry. 

