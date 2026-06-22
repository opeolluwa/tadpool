# Tadpool

Managing Customers data over PHP yii framework

## Description

The project uses Docker driven development + local install of Composer and PHP which means most dependencies are installed via Docker except for PHP itself and Composer

## Getting Started

### Dependencies

- [Docker](https://docker.com)
- [PHP](https://php.net)
- [Yii](https://www.yiiframework.com)
- [Composer](getcomposer.org)

### Installing

```sh
git clone https://github.com/opeolluwa/tadool
just cfg
```

### Executing program

- `just dev` to start the application
- `just kill` to stop
- just `rebuild` to clean up volumes and start afresh

## Help

- Dev server URL live at <http://localhost:8080/index.php?r=requests%2Findex>
- Database UI live at <http://localhost:8087>
