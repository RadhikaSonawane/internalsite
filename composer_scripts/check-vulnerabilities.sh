#!/bin/bash

echo "# Checking for vulnerable plugins/themes/core"
php composer_scripts/check-vulnerabilities/check-vulnerabilities.php
