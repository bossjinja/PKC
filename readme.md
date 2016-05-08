## Petz Kennel Club

#Installation

In the server's php.ini file, uncomment the following extension so mime type prediction will work for picture validation:

extension=php_fileinfo.dll

#Set up picture file system

../public/images/petz

#htaccess

Add the following:

Options -Indexes