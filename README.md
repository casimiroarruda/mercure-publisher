# Mercure Publisher

> Este projeto, juntamente com o [mercure-subscriber](https://github.com/duodraco/mercure-subscriber), faz parte da demonstração da apresentação [Mercure - atualização em tempo real para sua aplicação](https://www.slideshare.net/duodraco/mercure-atualizao-em-tempo-real-para-sua-aplicao), onde apresento o [Mercure](https://mercure.rocks), protocolo de comunicação em tempo real para aplicações web.

Os passos a seguir pressupõe que você tenha clonado este repositório.

## Pré requisito: JWT

Tanto o HUB como a configuração do Symfony utilizam um JWT (JSON Web Token), que pode ser gerado no [jwt.io](https://jwt.io). Use ou gere uma **Chave** (guarde-a, pois precisaremos adiante); O Algoritmo é `HS256`; Em `payload` insira o seguinte:
```json
{
    "mercure": {
        "publish": []
    }
}
```
Guarde o **JWT** gerado pois já o utilizaremos.

## Instalação


### HUB

Também precisa instalar o hub do **Mercure** que pode ser baixado na [Página de releases](https://github.com/dunglas/mercure/releases) ou instalado via [Docker](https://github.com/dunglas/mercure#docker-image) ou [Kubernetes](https://github.com/dunglas/mercure#kubernetes). 

Em todo caso este projeto já contém o binário no diretório `/bin`; Para acioná-lo use o comando a seguir:

```bash
JWT_KEY='INSIRA AQUI A CHAVE QUE USOU PARA GERAR O JWT' \
ADDR=':3000' ALLOW_ANONYMOUS=1 CORS_ALLOWED_ORIGINS=* PUBLISH_ALLOWED_ORIGINS='https://localhost:8000' \
./bin/mercure
```

### Publisher

Aqui já é bem mais fácil:

```bash
composer install
```

Crie um arquivo `.env.local` e modifique as seguintes chaves: 
```ini
APP_SECRET=NormalmenteOSymfonyCriaParaVoce
MERCURE_JWT_SECRET="INSIRA AQUI O JWT QUE VOCE GEROU"
#Deixe assim para criar e manipular um BD SQLite
DATABASE_URL=sqlite:///%kernel.project_dir%/var/data.db
```

Após isso, criamos nosso banco de dados:

```bash
./bin/console doctrine:migrations:migrate
```

Entao, populamos o Banco de Dados:

```bash
symfony console doctrine:fixtures:load
```

Com isso, já podemos ver nossa API. Caso esteja usando o Symfony Client *, pode levantar o servidor com:

```bash
symfony serve
```
* Para instalar, basta seguir as orientações [nesta página](https://symfony.com/download)
* Caso não esteja usando, acredito que saiba como levantar um servidor http, lembrando que o diretório a ser usado é o `public` e estamos usando `https` ;).

Agora, com o [mercure-subscriber](https://github.com/duodraco/mercure-subscriber), o [hub](#hub) e a API rodando, vamos fazer o `estalar de dedos`:
```zsh
./bin/console app:thanos-snap
```

### Client (Subscriber)

Para fazer essa demonstração você mesmo, você precisa instalar o [mercure-subscriber](https://github.com/duodraco/mercure-subscriber) em outro diretório que não este.