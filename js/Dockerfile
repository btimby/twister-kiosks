FROM node:16-alpine

#RUN apt-get update \
#    && apt-get install -y --no-install-recommends \
#        postgresql-client \
#    && rm -rf /var/lib/apt/lists/*

WORKDIR /usr/src/app
COPY package.json ./
RUN npm i -g
COPY . .

EXPOSE 3000
CMD ["npm", "run", "serve"]
