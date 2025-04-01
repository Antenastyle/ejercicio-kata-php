.PHONY : main build-image build-container start test shell stop clean
main: build-image build-container

build-image:
	docker build -t ejercicio-kata-php .

build-container:
	docker run -dt --name ejercicio-kata-php -v .:/540/Boilerplate ejercicio-kata-php
	docker exec ejercicio-kata-php composer install

start:
	docker start ejercicio-kata-php

test: start
	docker exec ejercicio-kata-php ./vendor/bin/phpunit tests/$(target)

shell: start
	docker exec -it ejercicio-kata-php /bin/bash

stop:
	docker stop ejercicio-kata-php

clean: stop
	docker rm ejercicio-kata-php
	rm -rf vendor
