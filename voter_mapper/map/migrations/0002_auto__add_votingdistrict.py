# -*- coding: utf-8 -*-
import datetime
from south.db import db
from south.v2 import SchemaMigration
from django.db import models


class Migration(SchemaMigration):

    def forwards(self, orm):
        # Adding model 'VotingDistrict'
        db.create_table(u'map_votingdistrict', (
            (u'id', self.gf('django.db.models.fields.AutoField')(primary_key=True)),
            ('state_fp_10', self.gf('django.db.models.fields.CharField')(max_length=2)),
            ('county_fp_10', self.gf('django.db.models.fields.CharField')(max_length=3)),
            ('vtd_st_10', self.gf('django.db.models.fields.CharField')(max_length=6)),
            ('geoid_10', self.gf('django.db.models.fields.CharField')(max_length=11)),
            ('vtdi_10', self.gf('django.db.models.fields.CharField')(max_length=1)),
            ('name_10', self.gf('django.db.models.fields.CharField')(max_length=100)),
            ('name_lsad_10', self.gf('django.db.models.fields.CharField')(max_length=100)),
            ('lsad_10', self.gf('django.db.models.fields.CharField')(max_length=2)),
            ('mtfcc_10', self.gf('django.db.models.fields.CharField')(max_length=5)),
            ('funcstat_10', self.gf('django.db.models.fields.CharField')(max_length=1)),
            ('a_land_10', self.gf('django.db.models.fields.FloatField')()),
            ('a_water_10', self.gf('django.db.models.fields.FloatField')()),
            ('intpt_lat_10', self.gf('django.db.models.fields.DecimalField')(max_digits=13, decimal_places=10)),
            ('intpt_lon_10', self.gf('django.db.models.fields.DecimalField')(max_digits=13, decimal_places=10)),
        ))
        db.send_create_signal(u'map', ['VotingDistrict'])


    def backwards(self, orm):
        # Deleting model 'VotingDistrict'
        db.delete_table(u'map_votingdistrict')


    models = {
        u'map.votingdistrict': {
            'Meta': {'object_name': 'VotingDistrict'},
            'a_land_10': ('django.db.models.fields.FloatField', [], {}),
            'a_water_10': ('django.db.models.fields.FloatField', [], {}),
            'county_fp_10': ('django.db.models.fields.CharField', [], {'max_length': '3'}),
            'funcstat_10': ('django.db.models.fields.CharField', [], {'max_length': '1'}),
            'geoid_10': ('django.db.models.fields.CharField', [], {'max_length': '11'}),
            u'id': ('django.db.models.fields.AutoField', [], {'primary_key': 'True'}),
            'intpt_lat_10': ('django.db.models.fields.DecimalField', [], {'max_digits': '13', 'decimal_places': '10'}),
            'intpt_lon_10': ('django.db.models.fields.DecimalField', [], {'max_digits': '13', 'decimal_places': '10'}),
            'lsad_10': ('django.db.models.fields.CharField', [], {'max_length': '2'}),
            'mtfcc_10': ('django.db.models.fields.CharField', [], {'max_length': '5'}),
            'name_10': ('django.db.models.fields.CharField', [], {'max_length': '100'}),
            'name_lsad_10': ('django.db.models.fields.CharField', [], {'max_length': '100'}),
            'state_fp_10': ('django.db.models.fields.CharField', [], {'max_length': '2'}),
            'vtd_st_10': ('django.db.models.fields.CharField', [], {'max_length': '6'}),
            'vtdi_10': ('django.db.models.fields.CharField', [], {'max_length': '1'})
        }
    }

    complete_apps = ['map']