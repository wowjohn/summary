docker run -d --name kong-database -p 5432:5432 -e "POSTGRES_USER=kong" -e "POSTGRES_DB=kong" postgres:9.6


docker run --rm --link kong-database:kong-database -e "KONG_DATABASE=postgres" -e "KONG_PG_HOST=kong-database" -e "KONG_CASSANDRA_CONTACT_POINTS=kong-database" kong kong migrations bootstrap