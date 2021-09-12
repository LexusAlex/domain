build:
	docker-compose build
phpunit:
	docker-compose run --rm php-cli composer phpunit
phpunit-authentication:
	docker-compose run --rm php-cli composer phpunit-authentication
php-cs-fixer:
	docker-compose run --rm php-cli composer php-cs-fixer
php-cs-fixer-dry-run:
	docker-compose run --rm php-cli composer php-cs-fixer-dry-run
outdated:
	docker-compose run --rm php-cli composer outdated --direct
autoload:
	docker-compose run --rm php-cli composer dump-autoload