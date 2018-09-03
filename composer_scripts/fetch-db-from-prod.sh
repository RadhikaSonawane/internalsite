#!/bin/bash

echo "# Fetching nightly backup from prod"
scp user@server:/path/to/backup/file.sql.bak latest_db_dump.sql.bak

echo "# Import via wp cli in docker"
docker exec wp_starter_web wp db import latest_db_dump.sql.bak

echo "# Replace domain names"
docker exec wp_starter_web wp search-replace production.domain localhost:8888 --all-tables --url=production.domain