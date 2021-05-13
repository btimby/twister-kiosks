from django.urls import path, include

from main import views


urlpatterns = [
    path('', views.home),
    path('personas.json', views.persona_list),
]
