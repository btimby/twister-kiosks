from django.urls import path

from main import views


urlpatterns = [
    path('.twister/users.json', views.user_list),
]
