#!/usr/bin/python
# -*- coding: utf-8 -*-

import MySQLdb


class MySQLDatabase:

    def __init__(self, user, password, schema):
        self.db = MySQLdb.connect("localhost", user, password, schema)
        self.db.autocommit = True
        self.db.set_character_set('utf8')

    def db_result(self, query):
        # prepare a cursor object using cursor() method
        cursor = self.db.cursor()

        # execute SQL query using execute() method.
        cursor.execute(query)

        # Fetch a single row using fetchone() method.
        data = cursor.fetchall()

        return data

    def db_result_name(self, query):
        # prepare a cursor object using cursor() method
        cursor = self.db.cursor(MySQLdb.cursors.SSDictCursor)

        # execute SQL query using execute() method.
        cursor.execute(query)

        # Fetch a single row using fetchone() method.
        data = cursor.fetchall()

        return data

    def db_execute(self, query):
        # prepare a cursor object using cursor() method
        cursor = self.db.cursor()
        # execute SQL query using execute() method.
        cursor.execute(query)
        self.db.commit()
        ret = cursor.lastrowid
        cursor.close()
        return ret

    def __del__(self):
        self.db.close()
