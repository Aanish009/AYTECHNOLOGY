from django.shortcuts import render
from django.http import JsonResponse
from django.views.decorators.csrf import csrf_exempt
import json
import logging

logger = logging.getLogger(__name__)

# ==================== MAIN PAGE VIEWS ====================

def home(request):
    """Home page view"""
    context = {
        'title': 'AY Technology - Digital Maturity Accelerator',
        'active_page': 'home',
    }
    return render(request, 'pages/home.html', context)

def about(request):
    """About page view"""
    context = {
        'title': 'About AY Technology - Our Story, Mission & Vision',
        'active_page': 'about',
    }
    return render(request, 'pages/about.html', context)

def contact(request):
    """Contact page view"""
    context = {
        'title': 'Contact AY Technology - Get in Touch',
        'active_page': 'contact',
    }
    return render(request, 'pages/contact.html', context)

def services(request):
    """Services overview page"""
    context = {
        'title': 'Our Services - AY Technology',
        'active_page': 'services',
    }
    return render(request, 'pages/services.html', context)

def innovation_lab(request):
    """Innovation Lab page"""
    context = {
        'title': 'Innovation Lab - AY Technology R&D',
        'active_page': 'innovation',
    }
    return render(request, 'pages/innovation_lab.html', context)

def case_studies(request):
    """Case studies page"""
    context = {
        'title': 'Case Studies - Client Success Stories',
        'active_page': 'case_studies',
    }
    return render(request, 'pages/case_studies.html', context)

# ==================== SERVICE DETAIL PAGES ====================

def web_development(request):
    context = {
        'service_name': 'Web Development',
        'service_tagline': 'Modern, scalable web applications that drive business growth',
        'active_page': 'services'
    }
    return render(request, 'pages/web_development.html', context)

def mobile_development(request):
    context = {
        'service_name': 'Mobile App Development',
        'service_tagline': 'Native and cross-platform mobile experiences',
        'active_page': 'services'
    }
    return render(request, 'pages/mobile_development.html', context)

def ai_ml(request):
    context = {
        'service_name': 'AI & Machine Learning',
        'service_tagline': 'Intelligent solutions powered by cutting-edge AI',
        'active_page': 'services'
    }
    return render(request, 'pages/ai_ml.html', context)

def cloud_devops(request):
    context = {
        'service_name': 'Cloud & DevOps',
        'service_tagline': 'Scale your infrastructure with expert cloud solutions',
        'active_page': 'services'
    }
    return render(request, 'pages/cloud_devops.html', context)

def ui_ux(request):
    context = {
        'service_name': 'UI/UX Design',
        'service_tagline': 'Create exceptional digital experiences',
        'active_page': 'services'
    }
    return render(request, 'pages/ui_ux.html', context)

def it_consulting(request):
    context = {
        'service_name': 'IT Consulting',
        'service_tagline': 'Strategic technology guidance for business growth',
        'active_page': 'services'
    }
    return render(request, 'pages/it_consulting.html', context)

# ==================== INNOVATION LAB SUB-PAGES ====================

def research_lab(request):
    """Research Lab page"""
    context = {
        'title': 'Research Lab - AY Technology',
        'active_page': 'innovation'
    }
    return render(request, 'pages/research_lab.html', context)

def gen_ai(request):
    """Gen AI Accelerator page"""
    context = {
        'title': 'Gen AI Accelerator - AY Technology',
        'active_page': 'innovation'
    }
    return render(request, 'pages/gen_ai.html', context)

def web3(request):
    """Web3 & Blockchain page"""
    context = {
        'title': 'Web3 & Blockchain - AY Technology',
        'active_page': 'innovation'
    }
    return render(request, 'pages/web3.html', context)

def iot_edge(request):
    """IoT & Edge Computing page"""
    context = {
        'title': 'IoT & Edge Computing - AY Technology',
        'active_page': 'innovation'
    }
    return render(request, 'pages/iot_edge.html', context)

# ==================== FOOTER PAGES ====================

def blog(request):
    context = {'title': 'Blog - AY Technology', 'active_page': 'blog'}
    return render(request, 'pages/blog.html', context)

def guides(request):
    context = {'title': 'Guides & Resources', 'active_page': 'guides'}
    return render(request, 'pages/guides.html', context)

def faq(request):
    context = {'title': 'Frequently Asked Questions', 'active_page': 'faq'}
    return render(request, 'pages/faq.html', context)

def privacy_policy(request):
    context = {'title': 'Privacy Policy', 'active_page': 'privacy'}
    return render(request, 'pages/privacy.html', context)

def terms_service(request):
    context = {'title': 'Terms of Service', 'active_page': 'terms'}
    return render(request, 'pages/terms.html', context)

def sitemap(request):
    context = {'title': 'Sitemap', 'active_page': 'sitemap'}
    return render(request, 'pages/sitemap.html', context)

# ==================== API ENDPOINTS ====================

@csrf_exempt
def contact_api(request):
    """Handle contact form submissions"""
    if request.method == 'POST':
        try:
            data = json.loads(request.body)
            name = data.get('name', '')
            email = data.get('email', '')
            phone = data.get('phone', '')
            project_type = data.get('project_type', '')
            budget = data.get('budget', '')
            message = data.get('message', '')
            
            logger.info(f"Contact form submission from {name} ({email})")
            
            return JsonResponse({
                'status': 'success',
                'message': 'Thank you! We will contact you shortly.'
            })
        except Exception as e:
            logger.error(f"Contact API error: {str(e)}")
            return JsonResponse({
                'status': 'error',
                'message': 'Something went wrong. Please try again.'
            }, status=400)
    
    return JsonResponse({'error': 'Invalid request'}, status=400)

@csrf_exempt
def waitlist_api(request):
    """Handle waitlist signups for innovation lab"""
    if request.method == 'POST':
        try:
            data = json.loads(request.body)
            project = data.get('project', '')
            email = data.get('email', '')
            name = data.get('name', '')
            
            logger.info(f"Waitlist signup for {project} from {email}")
            
            return JsonResponse({
                'status': 'success',
                'message': f"You've joined the waitlist for {project}!"
            })
        except Exception as e:
            logger.error(f"Waitlist API error: {str(e)}")
            return JsonResponse({
                'status': 'error',
                'message': 'Something went wrong. Please try again.'
            }, status=400)
    
    return JsonResponse({'error': 'Invalid request'}, status=400)

@csrf_exempt
def chat_api(request):
    """Handle chatbot API requests"""
    if request.method == 'POST':
        try:
            data = json.loads(request.body)
            message = data.get('message', '').lower()
            
            # Smart response logic
            if any(word in message for word in ['service', 'offer', 'provide']):
                reply = "We offer Web Development, Mobile Apps, AI/ML, Cloud & DevOps, UI/UX Design, and IT Consulting services!"
            elif any(word in message for word in ['price', 'cost', 'quote', 'pricing']):
                reply = "For custom pricing, please fill out our contact form or call us at +1 (800) 456-7890."
            elif any(word in message for word in ['soc2', 'security', 'certified']):
                reply = "Yes, AY Technology is SOC2 Type II certified and ISO 27001 compliant, ensuring top security standards."
            elif any(word in message for word in ['career', 'job', 'hiring']):
                reply = "We're always looking for talented individuals! Send your resume to careers@aytechnology.com"
            elif any(word in message for word in ['about', 'company', 'founded']):
                reply = "AY Technology was founded in 2016 and has grown to serve 250+ enterprises across 4 continents."
            elif any(word in message for word in ['contact', 'reach', 'call']):
                reply = "You can reach us at hello@aytechnology.com or call +1 (800) 456-7890. Visit our contact page for more details."
            elif any(word in message for word in ['hello', 'hi', 'hey', 'greetings']):
                reply = "Hello! Welcome to AY Technology. How can I help you today?"
            elif any(word in message for word in ['help', 'support']):
                reply = "I can help you with information about our services, pricing, company background, or connect you with our team. What would you like to know?"
            else:
                reply = "Thanks for your message! I'm here to help. You can ask about our services, pricing, company background, or request a callback."
            
            return JsonResponse({'reply': reply})
        except Exception as e:
            logger.error(f"Chat API error: {str(e)}")
            return JsonResponse({'reply': "I'm having trouble processing your request. Please try again or contact us directly."})
    
    return JsonResponse({'error': 'Invalid request'}, status=400)