# Building, testing and deploying containerised application with Docker and Kubernetes.

This repository exists as a working demo to accompany a [blog series](https://blog.bobbyallen.me/2020/02/24/building-testing-and-pushing-container-images-to-a-docker-registry-using-jenkins-pipelines/) about building, testing, and deploying containerised apps to Kubernetes.

This repository contains a simple containerised API service (built using Laravel) with a set of PHPUnit tests for demonstration purposes on how to automatically build, test, push (to a public or private Docker registry) and finally trigger a deployment to a Kubernetes cluster using Jenkins Pipelines.

The blog post can be found and [read here](https://blog.bobbyallen.me/2020/02/24/building-testing-and-pushing-container-images-to-a-docker-registry-using-jenkins-pipelines/), please refer to that if you wish for more info ;)

## Build and test the container locally first?

**You should first clone this repository to your own GitHub repository if you plan to follow along with the blog post as you will need to make changes to the included *Jenkinsfile*.**

If you want to test building and running the before we automate this with Jenkins, you can build the container locally using the following commands:

```shell script
git clone {your-cloned-repository} jenkkube-demo
cd jenkkube-demo
docker build . -t jenkkube-test
```

We can then start it on our local machine by executing the following command (notice that I'm passing through a common Laravel environment variables (APP_KEY) as it is required for our application to run):

```shell script
docker container run --publish 8011:8000 --env APP_KEY=base64:nsd2ZdnWmbb/coW6qGQMEE5aupd52tTY4h6jcVedSZY= --detach --name jenkkube-demo jenkkube-test:latest
```

*Our Laravel application is served on port 8000 (as per our Dockerfile) so we need to expose a port on our container - for demo purposes we will bind this to our local port of 8011 (lets assume we have something else hosted locally on 8000 and do not want to use 80).*

The output of running ``docker ps`` should show that our container is up and running!

You should be able to access it in your browser by navigating to: http://localhost:8011

You can also execute the unit tests inside the running container like so:

```shell script
docker exec jenkkube-demo ./vendor/bin/phpunit
```

When we want to stop and remove the container we can do so by using:

```shell script
docker container rm jenkkube-demo -f
```
