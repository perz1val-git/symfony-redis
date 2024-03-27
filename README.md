# Dockerized php Symfony app with Redis as DB

To run the app:
1. Start docker stack with: `docker compose up -d`
2. Run composer in the app container: `docker exec -it app /bin/sh -c "composer install"`

The app will be available on `localhost:8080`.
Go to `/redis` for Redis example.
