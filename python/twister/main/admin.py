from django.contrib import admin

from main.models import Persona


@admin.register(Persona)
class PersonaAdmin(admin.ModelAdmin):
    pass
