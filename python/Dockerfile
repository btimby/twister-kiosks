FROM python:3.9-alpine

#RUN apt-get update \
#    && apt-get install -y --no-install-recommends \
#        postgresql-client \
#    && rm -rf /var/lib/apt/lists/*

WORKDIR /usr/src/app
COPY Pipfile* ./
RUN pip3 install pipenv
RUN pipenv install --system
COPY twister/* ./

EXPOSE 8000
CMD ["python", "manage.py", "runserver", "0.0.0.0:8000"]

