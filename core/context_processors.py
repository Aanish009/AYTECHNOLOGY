from django.conf import settings

def site_context(request):
    """Add site-wide context variables to all templates"""
    return {
        'site_name': settings.SITE_NAME,
        'site_tagline': settings.SITE_TAGLINE,
        'current_year': 2026,
        'is_debug': settings.DEBUG,
    }