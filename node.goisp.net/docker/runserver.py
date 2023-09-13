#coding: utf-8
# +-------------------------------------------------------------------
# | GOISP Linux Panel
# +-------------------------------------------------------------------
# | Copyright (c) 2015-2099 Goisp software(http://goisp.net) All rights reserved.
# +-------------------------------------------------------------------
# | Author: ronibd0 <info@goisp.net>
# +-------------------------------------------------------------------
from os import environ
from gopanel import app,sys

if __name__ == '__main__':
    f = open('data/port.pl')
    PORT = int(f.read())
    HOST = '0.0.0.0'
    f.close()
    app.run(host=HOST,port=PORT)
