# jb-crab
Copyright (C) 2019-2020 Jeffrey Bostoen

[![License](https://img.shields.io/github/license/jbostoen/iTop-custom-extensions)](https://github.com/jbostoen/iTop-custom-extensions/blob/master/license.md)
[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.me/jbostoen)
🍻 ☕


Need assistance with iTop or one of its extensions?  
Need custom development?  
Please get in touch to discuss the terms: **jbostoen.itop@outlook.com**

## What?
CRAB is official Flemish open data. It is a dataset which contains all official addresses in Flanders (Belgium).

This extension brings new classes:
* CrabAddress
* CrabStreet
* CrabCity

There's also a scheduled process to import that data into iTop, so you can link Crab Addresses to certain classes.

## Requirements

* iTop extensions
  * [jb-framework](https://github.com/jbostoen/itop-jb-framework) Framework
  * [jb-map](https://github.com/jbostoen/itop-jb-pro-extensions) Map extension
  
* OGR2OGR
  * In Linux environments: install ogr2ogr
  * In Windows environments: add the folder where ogr2ogr.exe is located to the system environment variable named 'path'

* needs write permissions: env-production/jb-crab/app/common/download . The data set will be downloaded here.

## Cookbook

XML:
* create new classes

PHP:
* implementing a scheduled process

## Configuration

* A custom query can be chosen to filter the dataset: shapefile_query (iTop configuration file)
