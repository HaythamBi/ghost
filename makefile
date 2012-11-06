ROOT=$(shell pwd)
SOURCE=./source
DIST=./dist

install:
	chmod 777 ${SOURCE}/storage/views
	chmod 777 ${SOURCE}/storage/logs
	git submodule init && git submodule update
	cd ${SOURCE}; php artisan bundle:publish

test:
	cd ${SOURCE}; php artisan test:core
	cd ${SOURCE}; php artisan test
