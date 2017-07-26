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


def affiliate_product_ids():
    products = db.db_result_name('SELECT identifier FROM product')
    return [product['identifier'] for product in products]


def affiliate_update_products(formated_amazon_products):
    for id, product in formated_amazon_products.iteritems():
        query = "UPDATE product SET price={} WHERE identifier='{}'".format(product['price'], id)
        db.db_execute(query)
        print query


def amazon_products(items):
    amazon = AmazonAPI(config.get('AMAZON_APP_ID'), config.get('AMAZON_APP_SECRET'), config.get('AMAZON_USER'), region='DE')
    return amazon.lookup_bulk(ItemId='B072QX5LGH, B001GOPRC0')


def format_amazon_products(amazon_products):
    ret = {}
    for amazon_product in amazon_products:
        ret[amazon_product.asin] = {
            'price': amazon_product.simple_price
        }
    return ret


product_ids = affiliate_product_ids()
amazon_products = amazon_products(','.join(product_ids))
formated_amazon_products = format_amazon_products(amazon_products)
affiliate_update_products(formated_amazon_products)
