#!/usr/bin/python

from lib.amazon import AmazonAPI
from lib.config import Config
from lib.database import MySQLDatabase

import sys


# config
config_file = sys.argv[1]
config = Config(config_file)

# database
db = MySQLDatabase(config.get('DB_USERNAME'), config.get('DB_PASSWORD'), config.get('DB_DATABASE'))
amazon = AmazonAPI(config.get('AMAZON_APP_ID'), config.get('AMAZON_APP_SECRET'), config.get('AMAZON_USER'), region='DE')


def affiliate_product_ids():
    products = db.db_result_name('SELECT identifier FROM product')
    return [product['identifier'] for product in products]


def affiliate_update_product(product):
    query = "UPDATE product SET price={} WHERE identifier='{}'".format(product['price'], product['asni'])
    db.db_execute(query)
    print query


def amazon_product(product_id):
    return amazon.lookup_bulk(ItemId=product_id)


def format_amazon_product(amazon_product):
    return {
        'price': amazon_product.simple_price,
        'asni': amazon_product.asin
    }


for product_id in affiliate_product_ids():
    amazon_product = amazon_product(product_id)
    formated_amazon_product = format_amazon_product(amazon_product)
    affiliate_update_product(formated_amazon_product)
