from django.views.generic import TemplateView

__all__ = ('InterfaceView',)

class InterfaceView(TemplateView):
    template_name = "map/interface.html"

    def get(self, request, *args, **kwargs):
        context = self.get_context_data(*args, **kwargs)

        return self.render_to_response(context)