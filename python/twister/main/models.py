from django.db import models
from django.contrib.auth import get_user_model

User = get_user_model()


class Persona(models.Model):
    user = models.OneToOneField(
        User, related_name='twister', on_delete=models.CASCADE)
    handle = models.CharField(max_length=32)
    pubkey = models.TextField()

    def __str__(self):
        return '<Persona "%s">' % self.handle
