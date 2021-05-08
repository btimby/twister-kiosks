from django.http import JsonResponse


def user_list(request):
    data = []
    return JsonResponse(data, safe=False)
