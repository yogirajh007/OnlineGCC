This folder contains some test-data to help developers create a database.

The entry of data from the graphical interface takes lot of time. The
developers can save this time by running the 'insert_data.php' in the browser on
any platform OR 'runall.sh' script if you want to run a shell script on Linux
platform, with a CSV data directory as an argument.

insert_data.php works on all platforms and requires only a browser. Example:
http:\\localhost\taasika\test-data\insert_data.php

Multiple CSV data directories, as different datasets, are already given in the 
'csv' folder.

Note: If using runall.sh, you need to change the username/password for mysql in
'runall.sh'. By default it uses 'root' as login-id and 'root' as password.
