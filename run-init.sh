#!/bin/bash

echo "Running init-db.sh to generate init-db.sql..."
./init-db.sh

echo "Starting containers with Docker Compose..."
docker-compose -p webserver up -d

echo "Success: Containers are up and running."
