FROM phpdockerio/php74-cli:latest

# Make a directory to house our application code in.
RUN mkdir /app

# Copy our code into our /app directory
COPY . /app

# Set the WORKDIR to our app directory
WORKDIR /app

# We don't need to install Composer as it's already installed in the base image (phpdockerio/php74-cli)

# We will now install our composer dependencies:
RUN cd /app && composer install --no-progress

# Set some permissions...
RUN touch /app/.phpunit.result.cache && chmod 755 /app/.phpunit.result.cache
RUN chmod 755 -R /app/storage/

# Expose TCP 8000 so we can access our application externally.
EXPOSE 8000

# We'll run the default PHP web server to serve our application (just for demo purposes!!)
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]

# We could do it with Artisan Serve too in theory...
#CMD ["php", "artisan", "serve"]
