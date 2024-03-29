#!/usr/bin/python

from lib.amazon import AmazonAPI
from lib.config import Config
from lib.database import MySQLDatabase
from lib.reviews import AmazonReviews

import sys
import time

# config
config_file = sys.argv[1]
config = Config(config_file)

# database
db = MySQLDatabase(config.get('DB_USERNAME'), config.get('DB_PASSWORD'), config.get('DB_DATABASE'))
amazon = AmazonAPI(config.get('AMAZON_APP_ID'), config.get('AMAZON_APP_SECRET'), config.get('AMAZON_USER'), region='DE')


def affiliate_product_ids():
    products = db.db_result_name('SELECT identifier FROM product')
    return [product['identifier'] for product in products]


def generate_update_product_set_query_part(product, fields):
    entries = []
    for field in fields:
        if product[field] is not None:
            entries.append("{}='{}'".format(field, product[field]))
    return ','.join(entries)


def affiliate_update_product(product):
    query_set_part = generate_update_product_set_query_part(product, ['price', 'review_count', 'review_value'])
    query = "UPDATE product SET " + query_set_part + " WHERE identifier='{}'".format(product['asni'])
    db.db_execute(query)


def amazon_product(product_id):
    return amazon.lookup(ItemId=product_id)


def format_amazon_product(amazon_product):
    ret = {
        'price': amazon_product.simple_price,
        'asni': amazon_product.asin
    }

    # find review sfrom review data iframe
    (reviews_exists, review_url) = amazon_product.reviews
    if reviews_exists:
        reviews = AmazonReviews(review_url)
        ret['review_count'] = reviews.review_count
        ret['review_value'] = reviews.review_value

    return ret


for product_id in affiliate_product_ids():
    aproduct = amazon_product(product_id)
    formated_amazon_product = format_amazon_product(aproduct)
    affiliate_update_product(formated_amazon_product)
