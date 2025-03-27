# DriveInCinema

## Telepítés

### Előfeltételek

A projekt futtatásához szükséges eszközök:
- [Git](https://git-scm.com/downloads)
- [Docker](https://www.docker.com/products/docker-desktop)
- [Docker Compose](https://docs.docker.com/compose/)

### Telepítési lépések

1. **Projekt klónozása**

   ```bash
   git clone https://github.com/mark00hun/DriveInCinema.git
   cd DriveInCinema

2. **Környezeti változók beállítása**

   ```bash
   cp .env.example .env
   
3. **Docker konténerek indítása**

   ```bash
   docker-compose up -d --build
   
4. **Alkalmazás kulcs generálása**

   ```bash
   docker compose run --rm app php artisan key:generate
   
5. **Adatbázis migrálása**

   ```bash
   docker compose run --rm app php artisan migrate

6. **Végül a migráció ami létrehozza az adatbázis szerkezetet, valamint a seed ami feltölti pár dummy adattal az adatbázist**

   ```bash
   docker compose run --rm app php artisan db:seed

### Alkalmazás elérése
- A backend API elérhető a http://localhost:9000 címen.
- A Swagger UI elérhető a http://localhost:9000/api/documentation címen.
