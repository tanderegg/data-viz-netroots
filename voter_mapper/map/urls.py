from django.conf.urls.defaults import *

from views import *

urlpatterns = patterns('',
    url(r'^/?$', InterfaceView.as_view(), name="interface_url"),
)