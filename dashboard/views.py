from django.shortcuts import render
from django.contrib.auth.decorators import login_required

@login_required
def dashboard_home(request):
    return render(request, 'dashboard/home.html')

@login_required
def my_projects(request):
    return render(request, 'dashboard/projects.html')

@login_required
def my_messages(request):
    return render(request, 'dashboard/messages.html')

@login_required
def settings(request):
    return render(request, 'dashboard/settings.html')