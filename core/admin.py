from django.contrib import admin
from django.utils.html import format_html
from .models import (
    ProductLogo, BlogCategory, BlogPost, Testimonial,
    ContactMessage, ClientPortalUser, ClientProject,
    WaitlistEntry, NewsletterSubscriber
)

# ==================== PRODUCT LOGOS ADMIN ====================

@admin.register(ProductLogo)
class ProductLogoAdmin(admin.ModelAdmin):
    list_display = ['name', 'category', 'display_order', 'is_active', 'created_at']
    list_filter = ['category', 'is_active', 'created_at']
    search_fields = ['name', 'description']
    list_editable = ['display_order', 'is_active']
    list_per_page = 20
    fieldsets = (
        ('Basic Information', {
            'fields': ('name', 'description', 'category')
        }),
        ('Media & Links', {
            'fields': ('logo_url', 'website_url')
        }),
        ('Display Settings', {
            'fields': ('display_order', 'is_active')
        }),
    )

# ==================== BLOG ADMIN ====================

@admin.register(BlogCategory)
class BlogCategoryAdmin(admin.ModelAdmin):
    list_display = ['name', 'slug']
    prepopulated_fields = {'slug': ('name',)}
    search_fields = ['name']

@admin.register(BlogPost)
class BlogPostAdmin(admin.ModelAdmin):
    list_display = ['title', 'category', 'status', 'is_featured', 'views', 'published_at']
    list_filter = ['status', 'category', 'is_featured', 'published_at']
    search_fields = ['title', 'content', 'excerpt']
    prepopulated_fields = {'slug': ('title',)}
    list_editable = ['status', 'is_featured']
    list_per_page = 20
    readonly_fields = ['views', 'created_at', 'updated_at']
    fieldsets = (
        ('Post Information', {
            'fields': ('title', 'slug', 'category', 'status')
        }),
        ('Content', {
            'fields': ('excerpt', 'content', 'featured_image')
        }),
        ('Author & Metadata', {
            'fields': ('author_name', 'author_image', 'read_time', 'is_featured', 'views')
        }),
        ('Publication', {
            'fields': ('published_at',)
        }),
        ('Timestamps', {
            'fields': ('created_at', 'updated_at'),
            'classes': ('collapse',)
        }),
    )
    
    def save_model(self, request, obj, form, change):
        if not obj.pk:
            obj.author_name = request.user.get_full_name() or request.user.username
        super().save_model(request, obj, form, change)

# ==================== TESTIMONIAL ADMIN ====================

@admin.register(Testimonial)
class TestimonialAdmin(admin.ModelAdmin):
    list_display = ['client_name', 'client_company', 'rating_display', 'project_type', 'display_order', 'is_active']
    list_filter = ['rating', 'is_active', 'project_type']
    search_fields = ['client_name', 'client_company', 'testimonial_text']
    list_editable = ['display_order', 'is_active']
    list_per_page = 20
    fieldsets = (
        ('Client Information', {
            'fields': ('client_name', 'client_designation', 'client_company', 'client_image')
        }),
        ('Testimonial Details', {
            'fields': ('testimonial_text', 'rating', 'project_type')
        }),
        ('Display Settings', {
            'fields': ('display_order', 'is_active')
        }),
    )
    
    def rating_display(self, obj):
        return '★' * obj.rating + '☆' * (5 - obj.rating)
    rating_display.short_description = 'Rating'

# ==================== CONTACT MESSAGE ADMIN ====================

@admin.register(ContactMessage)
class ContactMessageAdmin(admin.ModelAdmin):
    list_display = ['name', 'email', 'project_type', 'status', 'created_at']
    list_filter = ['status', 'project_type', 'created_at']
    search_fields = ['name', 'email', 'message', 'phone']
    list_editable = ['status']
    list_per_page = 20
    readonly_fields = ['created_at', 'updated_at']
    fieldsets = (
        ('Contact Information', {
            'fields': ('name', 'email', 'phone')
        }),
        ('Project Details', {
            'fields': ('project_type', 'budget', 'message')
        }),
        ('Admin Management', {
            'fields': ('status', 'admin_notes')
        }),
        ('Timestamps', {
            'fields': ('created_at', 'updated_at'),
            'classes': ('collapse',)
        }),
    )
    
    actions = ['mark_as_read', 'mark_as_replied']
    
    def mark_as_read(self, request, queryset):
        queryset.update(status='read')
    mark_as_read.short_description = "Mark selected messages as read"
    
    def mark_as_replied(self, request, queryset):
        queryset.update(status='replied')
    mark_as_replied.short_description = "Mark selected messages as replied"

# ==================== CLIENT PORTAL ADMIN ====================

@admin.register(ClientPortalUser)
class ClientPortalUserAdmin(admin.ModelAdmin):
    list_display = ['company_name', 'contact_person', 'email', 'is_active', 'last_login', 'created_at']
    list_filter = ['is_active', 'created_at']
    search_fields = ['company_name', 'contact_person', 'email']
    list_editable = ['is_active']
    list_per_page = 20
    readonly_fields = ['created_at', 'updated_at']
    fieldsets = (
        ('Company Information', {
            'fields': ('company_name', 'company_logo')
        }),
        ('Contact Details', {
            'fields': ('contact_person', 'email', 'phone')
        }),
        ('Portal Access', {
            'fields': ('portal_access_key', 'is_active', 'last_login')
        }),
        ('Projects & Documents', {
            'fields': ('projects', 'documents')
        }),
        ('Internal Notes', {
            'fields': ('notes',)
        }),
        ('Timestamps', {
            'fields': ('created_at', 'updated_at'),
            'classes': ('collapse',)
        }),
    )
    
    def save_model(self, request, obj, form, change):
        if not obj.portal_access_key:
            import uuid
            obj.portal_access_key = str(uuid.uuid4())[:8]
        super().save_model(request, obj, form, change)

@admin.register(ClientProject)
class ClientProjectAdmin(admin.ModelAdmin):
    list_display = ['project_name', 'client', 'status', 'progress', 'start_date', 'end_date']
    list_filter = ['status', 'client']
    search_fields = ['project_name', 'description']
    list_editable = ['status', 'progress']
    list_per_page = 20

# ==================== WAITLIST ADMIN ====================

@admin.register(WaitlistEntry)
class WaitlistEntryAdmin(admin.ModelAdmin):
    list_display = ['email', 'project', 'created_at']
    list_filter = ['project', 'created_at']
    search_fields = ['email', 'name', 'project']
    list_per_page = 20

# ==================== NEWSLETTER ADMIN ====================

@admin.register(NewsletterSubscriber)
class NewsletterSubscriberAdmin(admin.ModelAdmin):
    list_display = ['email', 'subscribed_at', 'is_active']
    list_filter = ['is_active', 'subscribed_at']
    search_fields = ['email']
    list_editable = ['is_active']
    list_per_page = 20

# ==================== CUSTOM ADMIN SITE CONFIGURATION ====================

admin.site.site_header = 'AY Technology Admin Panel'
admin.site.site_title = 'AY Technology Admin'
admin.site.index_title = 'Welcome to AY Technology Administration'