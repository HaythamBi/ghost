ROOT=$(shell pwd)
SOURCE=./source
DIST=./dist

install:
	chmod 777 ${SOURCE}/storage/views
	git submodule init && git submodule update
	cd ${SOURCE}; php artisan bundle:publish

test:
	cd ${SOURCE}; php artisan test:core
	cd ${SOURCE}; php artisan test

lint:
	recess ${SOURCE}/public/css/*.css
	jshint ${SOURCE}/public/js/*.js --config ./jshintrc
