from django.urls import path
from . import views

urlpatterns = [
    path('', views.dashboard_home, name='dashboard_home'),
    path('projects/', views.my_projects, name='my_projects'),
    path('messages/', views.my_messages, name='my_messages'),
    path('settings/', views.settings, name='dashboard_settings'),
]