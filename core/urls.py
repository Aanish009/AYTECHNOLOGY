from django.urls import path
from . import views

app_name = 'core'

urlpatterns = [
    # Main pages
    path('', views.home, name='home'),
    path('about/', views.about, name='about'),
    path('contact/', views.contact, name='contact'),
    path('services/', views.services, name='services'),
    path('innovation-lab/', views.innovation_lab, name='innovation_lab'),
    path('case-studies/', views.case_studies, name='case_studies'),

    path('innovation-lab/research-lab/', views.research_lab, name='research_lab'),
    path('innovation-lab/gen-ai/', views.gen_ai, name='gen_ai'),
    path('innovation-lab/web3/', views.web3, name='web3'),
    path('innovation-lab/iot-edge/', views.iot_edge, name='iot_edge'),
    
    # Service detail pages
    path('services/web-development/', views.web_development, name='web_development'),
    path('services/mobile-development/', views.mobile_development, name='mobile_development'),
    path('services/ai-ml/', views.ai_ml, name='ai_ml'),
    path('services/cloud-devops/', views.cloud_devops, name='cloud_devops'),
    path('services/ui-ux/', views.ui_ux, name='ui_ux'),
    path('services/it-consulting/', views.it_consulting, name='it_consulting'),
    
    # Footer pages (simple placeholders)
    path('blog/', views.blog, name='blog'),
    path('guides/', views.guides, name='guides'),
    path('faq/', views.faq, name='faq'),
    path('privacy/', views.privacy_policy, name='privacy'),
    path('terms/', views.terms_service, name='terms'),
    path('sitemap/', views.sitemap, name='sitemap'),
    
    # API endpoints
    path('api/contact/', views.contact_api, name='contact_api'),
    path('api/waitlist/', views.waitlist_api, name='waitlist_api'),
    path('api/chat/', views.chat_api, name='chat_api'),
]