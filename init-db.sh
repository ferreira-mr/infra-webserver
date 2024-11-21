#!/bin/bash

if [ -f ".env" ]; then
  source .env
else
  echo "Error: .env file not found!"
  exit 1
fi

if [ -z "$STUDENTS" ] || [ -z "$TEACHERS" ]; then
  echo "Error: STUDENTS or TEACHERS variables are not defined in the .env file."
  exit 1
fi

echo "SELECT User, Host FROM mysql.user;" > init-db.sql

for student in $STUDENTS; do
  echo "Creating database and user for student: $student"
  echo "CREATE DATABASE IF NOT EXISTS \`$student\`;" >> init-db.sql
  echo "CREATE USER IF NOT EXISTS '$student'@'%' IDENTIFIED BY '$student';" >> init-db.sql
  echo "GRANT ALL PRIVILEGES ON \`$student\`.* TO '$student'@'%';" >> init-db.sql
  echo "" >> init-db.sql
done

for teacher in $TEACHERS; do
  echo "Creating user with global privileges for teacher: $teacher"
  echo "CREATE USER IF NOT EXISTS '$teacher'@'%' IDENTIFIED BY '$teacher';" >> init-db.sql
  echo "GRANT ALL PRIVILEGES ON *.* TO '$teacher'@'%' WITH GRANT OPTION;" >> init-db.sql
  echo "" >> init-db.sql
done

echo "FLUSH PRIVILEGES;" >> init-db.sql

echo "Success: SQL script generated as init-db.sql"
