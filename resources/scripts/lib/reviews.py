#!/usr/bin/python
# -*- coding: utf-8 -*-

import requests
import codecs
import re
import traceback

from bs4 import BeautifulSoup


class AmazonReviews:

    REVIEW_SUMMARY_CLASS = 'crIFrameNumCustReviews'

    def __init__(self, url):
        self.url = url
        html = self._read_data(url)
        # with codecs.open('reviews.html', 'r', encoding='utf8') as f:
        #     html = f.read()
        self.data = BeautifulSoup(html, 'html.parser')

    def _read_data(self, url):
        headers = {'User-Agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36'}
        r = requests.get(url, headers=headers)
        return r.text

    @property
    def review_count(self):
        try:
            entry = self.data.select_one('.' + self.REVIEW_SUMMARY_CLASS)
            text = entry.get_text(strip=True)
            search = re.search(r'([0-9]+)', text)
            return search.group(1)
        except Exception:
            traceback.print_exc()
        return None

    @property
    def review_value(self):
        try:
            entry = self.data.select_one('.' + self.REVIEW_SUMMARY_CLASS)
            link = entry.find('img')
            value = link.get('title')
            return value.split('von')[0].strip().replace('.', '')
        except Exception:
            traceback.print_exc()
        return None

