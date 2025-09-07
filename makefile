.PHONY: build run test migrate

build:
	docker-compose build

run:
	docker-compose up -d

test:
	go test ./... -v

migrate:
	docker-compose exec app go run ./cmd/migrate

logs:
	docker-compose logs -f app

down:
	docker-compose down

clean:
	docker-compose down -v