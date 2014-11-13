#!/bin/bash

chmod a+w mustache/cache/mustache.php
chmod a+w mustache/cache/lightncandy
chmod a+w smarty/cache
chmod a+w twig/cache

rm -rf mustache/cache/mustache.php/*
rm -rf mustache/cache/lightncandy/*
rm -rf smarty/compiles/*
rm -rf twig/cache/*

echo "=== Native PHP ==="
php native/native.php
echo -e "\n"

echo "=== Mustache.php ==="
php mustache/mustache.php
echo -e "\n"

echo "=== LightnCandy ==="
php mustache/lightncandy.php
echo -e "\n"

echo "=== Twig ==="
php twig/twig.php
echo -e "\n"

echo "=== Smarty ==="
php smarty/smarty.php
echo -e "\n"
