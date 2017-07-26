#!/usr/bin/python
# -*- coding: utf-8 -*-

import re


class Config:

    def __init__(self, config_file):
        self.config_file = config_file
        self.config = self._read_config(config_file)

    def _read_config(self, config_file):
        config = {}
        # read data
        with open(config_file, 'r') as f:
            lines = [line for line in f.readlines() if line.strip() != '']
        # build hash
        for line in lines:
            match = re.match(r'(\w+)=([^\"]+)', line)
            if match:
                config[match.group(1)] = match.group(2).strip()
        return config

    def get(self, name):
        if name in self.config:
            return self.config[name]
        return None
