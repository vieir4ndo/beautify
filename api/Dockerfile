FROM node:latest

WORKDIR /usr/src/app

COPY package*.json ./

RUN npm i

COPY . .

ENV DB_HOST='db_beautify'

EXPOSE $API_PORT

CMD ["npm", "run", "dev"]