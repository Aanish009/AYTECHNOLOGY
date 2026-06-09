from django.core.management.base import BaseCommand
from core.models import ClientPortalUser

class Command(BaseCommand):
    help = 'Generate missing portal access keys for existing clients'

    def handle(self, *args, **options):
        clients = ClientPortalUser.objects.filter(portal_access_key__isnull=True)
        count = 0
        for client in clients:
            import uuid
            client.portal_access_key = str(uuid.uuid4())[:8]
            client.save()
            count += 1
        self.stdout.write(self.style.SUCCESS(f'Generated {count} portal access keys'))