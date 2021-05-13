from rest_framework import serializers

from main.models import Persona


class PersonaSerializer(serializers.ModelSerializer):
    class Meta:
        model = Persona
        fields = ['handle', 'pubkey']
