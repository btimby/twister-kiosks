from django.http import JsonResponse
from django.shortcuts import render
from django.conf import settings

from main.models import Persona
from main.serializers import PersonaSerializer


def home(request):
    return render(
        request, 'twister.html', context={ 'url': settings.TWISTER_URL})


# TODO: good cantidate for caching; use signals to purge.
def persona_list(request):
    personas = Persona.objects.all()
    handle = request.GET.get('handle')
    if handle:
        personas = personas.filter(handle=handle)
    serializer = PersonaSerializer(personas, many=True)
    return JsonResponse(serializer.data, safe=False)
