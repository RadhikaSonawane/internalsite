#!/bin/bash

echo "# Fetching assets from from prod"
rsync -rzav user@server:/path/to/uploads/folder/* ./web/app/uploads
