docker_php = otus_hw_7_01_nginx_1
docker_nginx = otus_hw_7_01_nginx_1

start:
	@sudo docker-compose up -d

stop:
	@sudo docker-compose stop

ps:
	@sudo docker ps

php:
	@sudo docker exec -it $(docker_php) bash

nginx:
	@sudo docker exec -it $(docker_nginx) bash
