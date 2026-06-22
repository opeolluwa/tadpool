# Alias
alias config:= configure
alias d := dev
alias rs := restart
alias rb := rebuild
alias l := logs
alias s := stop

set dotenv-required := false

# constants
DOCKER_CMD := "docker compose -f docker-compose.yml"


# Default Shows the default commands
@default:
    @just --list --list-heading $'Available commands\n'


@dev:
    {{ DOCKER_CMD }} up -d
    php yii serve 

# see docker logs, this is called internally when you run just dev
@logs:
    {{ DOCKER_CMD }} logs -f --tail='30' app


# destroy the running docker instance and clean the cache
@kill:
    {{ DOCKER_CMD }} down -v

# stop the running docker instance without cleaning the cache, called internally when you restart the project
@stop:
    {{ DOCKER_CMD }} down

# stop and start the project without removing cache and local data
restart:
    @just stop
    @just dev

# delete the project, the cached data, target dir and restart
@rebuild:
    @just kill
    @just clean
    {{ DOCKER_CMD }} up --build  -d
    @just logs


#execute all initial setup after cloning the project
@configure:
    @just install-deps
    cp .env.example .env

