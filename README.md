# Waschi v0.6-0002
### (or Waschi Waschmaschinenverbund)
This is Waschi.
A "hide and seek of your laundry" network game over the whole webservers!

## Requirements

For hosting:
- A webserver!
- PHP5
- Some water to drink.

For playing:
- A browser
or
- washi.lisp ( see: https://gist.github.com/codepony/4994410 )
- waschi-cs-client ( see: https://github.com/pixeldesu/waschi-cs-client )
- waschi-cli (Ruby) ( see: https://github.com/fliiiix/waschi-cli/ )
- waschi-cli (Python) ( see: https://github.com/vanita5/washi-cli/ )

## Scripts - What's that file?

- index.php - Your visible webpage. You can customize it (except the copyright part).
- list.php - Here you can change the look of the list.
- echowash.php - For client reasons. ( see washi.lisp for example )
- found - Your list of found laundry. 



## Rights
It's important, that your *webserver has a read/write access* on your Waschi folder.
For me that works using an apache webserver:


- chown root:www-data /path/to/your/waschi/webfolder
- chmod 775 /path/to/your/waschi/webfolder
- chmod -R 664 /path/to/your/waschi/webfolder/*


**This may differs from your necessary access configuration.*


## Clean list
I recommend to clear the list every week. You can do it via cronjob. I'm doing it every sunday in the noon.
You can do it on your server through typing 
- echo "00 12 * * 0 www-data /bin/rm /YOUR/WASCHI/DIR/found 2> /dev/null" >> /etc/cron.d/waschi
- chmod +x /etc/cron.d/waschi


## License
Waschi (Waschi Waschmaschinenverbund) is licensed under GNU-AGPL v3+.


See more at http://waschi.org/
