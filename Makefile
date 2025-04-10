#Variables
COMPOSE_FILE=.docker/docker-compose.yml
PROJECT_NAME=dbzretro
DOCKER_COMPOSE=docker-compose -f $(COMPOSE_FILE) -p $(PROJECT_NAME)
APACHE_CONTAINER=$(DOCKER_COMPOSE) exec -u $(CURRENT_USER) apache
export CURRENT_USER=$(shell id -u):$(shell id -g)

# Commands
up:
	$(DOCKER_COMPOSE) up -d

down:
	$(DOCKER_COMPOSE) down --remove-orphans

up_rebuild:
	$(DOCKER_COMPOSE) up -d --build --force-recreate

logs:
	$(DOCKER_COMPOSE) logs -f

ssh:
	$(APACHE_CONTAINER) bash

rector:
	$(APACHE_CONTAINER) ./vendor/bin/rector process