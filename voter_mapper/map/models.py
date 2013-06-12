from django.db import models

class VotingDistrict(models.Model):
    '''
    Model that represents a voting district from the Census's
    TIGER/Line dataset.
    '''
    state_fp_10     = models.CharField(max_length=2)
    county_fp_10    = models.CharField(max_length=3)
    vtd_st_10       = models.CharField(max_length=6)
    geoid_10        = models.CharField(max_length=11)
    vtdi_10         = models.CharField(max_length=1)
    name_10         = models.CharField(max_length=100)
    name_lsad_10    = models.CharField(max_length=100)
    lsad_10         = models.CharField(max_length=2)
    mtfcc_10        = models.CharField(max_length=5)
    funcstat_10     = models.CharField(max_length=1)
    a_land_10       = models.FloatField()
    a_water_10      = models.FloatField()
    intpt_lat_10    = models.DecimalField(max_digits=13, decimal_places=10)
    intpt_lon_10    = models.DecimalField(max_digits=13, decimal_places=10)
