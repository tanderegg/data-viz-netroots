#!/usr/bin/env python
# encoding: utf-8
"""
jsFileNameGenerator.py

This is because I am extraordinarily lazy and want to generate a whole lot of blank JavaScript files at once.


Created by Dheeraj Chand on 2013-06-21.
Copyright (c) 2013 Clarity and Rigour, LLC. All rights reserved.
"""

import sys
import os

question_names = ["SCREEN1","GENDER","AREA","PHTYPE","WILLVOTE","DIRECT","THERM2A","THERM2B","THERM2C","THERM2D","JOBA","JOBB","REELECT","IDEO1","EDUC","OWN","MANUFACT","REGIS","GC1","GOVVOTE","VOTE1","VOTEBIO"]


for name in question_names :

    filename = "./graphics/" + name.lower() + ".html"

    output = open(filename,'w')

    template = """<!DOCTYPE html>
        <html lang='en'>
            <html>
            <meta charset = 'utf-8'>
            <script type='text/javascript' src='../js/d3/d3.v3.js'>
            <style type='text/css'>
			text {
				font-family: sans-serif;
				font-size: 12px;
				fill: white;
			}
            </style>
            </head>
            <body>
                <script type="text/javascript">

                    // Basic parameters for object

                    // width, height and padding

                    var w = ;
                    var h = ;
                    var xPadding = ;
                    var yPadding = ;
                
                    // dataset things
                
                    var dataset = [];

                    var qName =  '';

                    var qSummary = ''
                
                    // specifics of visualisation
                
                </script>
            </body>
        </html>"""

    output.write(template)


def main():
	pass


if __name__ == '__main__':
	main()

