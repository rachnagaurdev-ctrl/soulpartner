#!/bin/bash
php -d upload_max_filesize=128M -d post_max_size=128M artisan serve
