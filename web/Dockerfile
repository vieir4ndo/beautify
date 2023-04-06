# Base image
FROM node:18.15.0-alpine3.17

# Adding python to compile sass
RUN apk add g++ make py3-pip

# Set the working directory
WORKDIR /web

# Copy the package.json and package-lock.json files
COPY package*.json ./

# Install dependencies
RUN npm i

# Copy the rest of the application code
COPY . .

# Build the app
RUN npm run build

# Expose the port
EXPOSE $PORT

# Start the server
CMD ["npm", "start"]