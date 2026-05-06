from django.db import models
from django.utils import timezone
from django.urls import reverse

# ==================== PRODUCTS / LOGOS MODELS ====================

class ProductLogo(models.Model):
    """Manage project logos displayed on homepage"""
    CATEGORY_CHOICES = [
        ('ai', 'AI & Machine Learning'),
        ('cloud', 'Cloud Computing'),
        ('devops', 'DevOps'),
        ('web', 'Web Development'),
        ('mobile', 'Mobile Development'),
        ('security', 'Cybersecurity'),
        ('blockchain', 'Blockchain'),
        ('other', 'Other'),
    ]
    
    name = models.CharField(max_length=100, help_text="Product/Project name")
    description = models.TextField(blank=True, help_text="Short description")
    logo_url = models.URLField(max_length=500, help_text="URL to logo image")
    website_url = models.URLField(max_length=500, blank=True, help_text="Link to product website")
    category = models.CharField(max_length=50, choices=CATEGORY_CHOICES, default='other')
    display_order = models.IntegerField(default=0, help_text="Order of display (lower = higher priority)")
    is_active = models.BooleanField(default=True, help_text="Show on homepage")
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)
    
    class Meta:
        ordering = ['display_order', '-created_at']
        verbose_name = 'Product Logo'
        verbose_name_plural = 'Product Logos'
    
    def __str__(self):
        return self.name

# ==================== BLOG MODELS ====================

class BlogCategory(models.Model):
    """Blog categories"""
    name = models.CharField(max_length=100)
    slug = models.SlugField(unique=True)
    description = models.TextField(blank=True)
    
    class Meta:
        verbose_name_plural = 'Blog Categories'
        ordering = ['name']
    
    def __str__(self):
        return self.name

class BlogPost(models.Model):
    """Blog posts management"""
    STATUS_CHOICES = [
        ('draft', 'Draft'),
        ('published', 'Published'),
        ('archived', 'Archived'),
    ]
    
    title = models.CharField(max_length=200)
    slug = models.SlugField(unique=True)
    category = models.ForeignKey(BlogCategory, on_delete=models.SET_NULL, null=True, related_name='posts')
    excerpt = models.TextField(help_text="Short summary displayed in blog listing")
    content = models.TextField(help_text="Full blog content (supports HTML)")
    featured_image = models.URLField(max_length=500, blank=True, help_text="URL to featured image")
    author_name = models.CharField(max_length=100, default='AY Technology Team')
    author_image = models.URLField(max_length=500, blank=True)
    read_time = models.IntegerField(default=5, help_text="Estimated read time in minutes")
    views = models.IntegerField(default=0)
    status = models.CharField(max_length=20, choices=STATUS_CHOICES, default='draft')
    is_featured = models.BooleanField(default=False, help_text="Show as featured post on blog page")
    published_at = models.DateTimeField(default=timezone.now)
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)
    
    class Meta:
        ordering = ['-published_at']
        verbose_name = 'Blog Post'
        verbose_name_plural = 'Blog Posts'
    
    def __str__(self):
        return self.title
    
    def get_absolute_url(self):
        return reverse('core:blog_detail', args=[self.slug])

# ==================== TESTIMONIAL MODELS ====================

class Testimonial(models.Model):
    """Client testimonials"""
    RATING_CHOICES = [
        (5, '★★★★★ (5 Stars)'),
        (4, '★★★★☆ (4 Stars)'),
        (3, '★★★☆☆ (3 Stars)'),
        (2, '★★☆☆☆ (2 Stars)'),
        (1, '★☆☆☆☆ (1 Star)'),
    ]
    
    client_name = models.CharField(max_length=100)
    client_designation = models.CharField(max_length=200, blank=True, help_text="e.g., CTO, CEO, Director")
    client_company = models.CharField(max_length=200, blank=True)
    client_image = models.URLField(max_length=500, blank=True, help_text="Client photo URL")
    testimonial_text = models.TextField()
    rating = models.IntegerField(choices=RATING_CHOICES, default=5)
    project_type = models.CharField(max_length=100, blank=True, help_text="e.g., Web Development, AI Solutions")
    display_order = models.IntegerField(default=0)
    is_active = models.BooleanField(default=True)
    created_at = models.DateTimeField(auto_now_add=True)
    
    class Meta:
        ordering = ['display_order', '-created_at']
        verbose_name = 'Testimonial'
        verbose_name_plural = 'Testimonials'
    
    def __str__(self):
        return f"{self.client_name} - {self.rating} stars"

# ==================== CONTACT MESSAGE MODELS ====================

class ContactMessage(models.Model):
    """Store contact form submissions"""
    STATUS_CHOICES = [
        ('new', 'New'),
        ('read', 'Read'),
        ('replied', 'Replied'),
        ('archived', 'Archived'),
    ]
    
    name = models.CharField(max_length=100)
    email = models.EmailField()
    phone = models.CharField(max_length=20, blank=True)
    project_type = models.CharField(max_length=100, blank=True)
    budget = models.CharField(max_length=100, blank=True)
    message = models.TextField()
    status = models.CharField(max_length=20, choices=STATUS_CHOICES, default='new')
    admin_notes = models.TextField(blank=True, help_text="Internal notes for admin")
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)
    
    class Meta:
        ordering = ['-created_at']
        verbose_name = 'Contact Message'
        verbose_name_plural = 'Contact Messages'
    
    def __str__(self):
        return f"{self.name} - {self.created_at.strftime('%Y-%m-%d')}"

# ==================== CLIENT PORTAL MODELS ====================

class ClientPortalUser(models.Model):
    """Client portal access management"""
    company_name = models.CharField(max_length=200)
    contact_person = models.CharField(max_length=100)
    email = models.EmailField(unique=True)
    phone = models.CharField(max_length=20, blank=True)
    company_logo = models.URLField(max_length=500, blank=True)
    portal_access_key = models.CharField(max_length=100, unique=True)
    is_active = models.BooleanField(default=True)
    projects = models.TextField(blank=True, help_text="JSON field for project data or comma-separated project names")
    documents = models.TextField(blank=True, help_text="JSON field for documents URLs")
    notes = models.TextField(blank=True, help_text="Internal notes about the client")
    last_login = models.DateTimeField(null=True, blank=True)
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)
    
    class Meta:
        verbose_name = 'Client Portal User'
        verbose_name_plural = 'Client Portal Users'
    
    def __str__(self):
        return f"{self.company_name} - {self.contact_person}"

class ClientProject(models.Model):
    """Projects associated with client portal"""
    STATUS_CHOICES = [
        ('planning', 'Planning'),
        ('development', 'Development'),
        ('testing', 'Testing'),
        ('deployment', 'Deployment'),
        ('completed', 'Completed'),
        ('maintenance', 'Maintenance'),
    ]
    
    client = models.ForeignKey(ClientPortalUser, on_delete=models.CASCADE, related_name='client_projects')
    project_name = models.CharField(max_length=200)
    description = models.TextField(blank=True)
    status = models.CharField(max_length=20, choices=STATUS_CHOICES, default='planning')
    start_date = models.DateField(null=True, blank=True)
    end_date = models.DateField(null=True, blank=True)
    budget = models.DecimalField(max_digits=12, decimal_places=2, null=True, blank=True)
    progress = models.IntegerField(default=0, help_text="Progress percentage (0-100)")
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)
    
    class Meta:
        ordering = ['-created_at']
    
    def __str__(self):
        return f"{self.client.company_name} - {self.project_name}"

# ==================== WAITLIST MODEL ====================

class WaitlistEntry(models.Model):
    """Store innovation lab waitlist entries"""
    PROJECT_CHOICES = [
        ('Nexus AI', 'Nexus AI'),
        ('PredictFlow', 'PredictFlow'),
        ('OmniChat', 'OmniChat'),
        ('SecurAI', 'SecurAI'),
        ('InsightEngine', 'InsightEngine'),
        ('TeamSync AI', 'TeamSync AI'),
    ]
    
    project = models.CharField(max_length=100, choices=PROJECT_CHOICES)
    name = models.CharField(max_length=100, blank=True)
    email = models.EmailField()
    created_at = models.DateTimeField(auto_now_add=True)
    
    class Meta:
        ordering = ['-created_at']
        verbose_name = 'Waitlist Entry'
        verbose_name_plural = 'Waitlist Entries'
    
    def __str__(self):
        return f"{self.email} - {self.project}"

# ==================== NEWSLETTER SUBSCRIBER MODEL ====================

class NewsletterSubscriber(models.Model):
    """Store newsletter subscribers"""
    email = models.EmailField(unique=True)
    subscribed_at = models.DateTimeField(auto_now_add=True)
    is_active = models.BooleanField(default=True)
    
    class Meta:
        verbose_name = 'Newsletter Subscriber'
        verbose_name_plural = 'Newsletter Subscribers'
    
    def __str__(self):
        return self.email