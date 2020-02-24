pipeline {
  agent any
  stages {

    stage('Build') {
      steps {
        echo 'Building container image...'
        script {
          dockerInstance = docker.build(imageName)
        }

      }
    }

    stage('Test') {
      environment {
        APP_ENV = 'testing'
        APP_KEY = 'base64:nsd2ZdnWmbb/coW6qGQMEE5aupd52tTY4h6jcVedSZY='
      }
      steps {
        echo 'Running tests inside the container...'
        script {
          dockerInstance.inside('-u root'){
            sh 'cd /app && vendor/bin/phpunit --log-junit $WORKSPACE/report/junit.xml'
            sh 'chmod -R a+w $WORKSPACE/report'
          }
        }
        echo 'Publishing test report data...'
        junit 'report/*.xml'
      }
    }

    stage('Publish') {
      steps {
        echo 'Publishing container image to the registry...'
        script {
          docker.withRegistry('', registryCredentialSet) {
            dockerInstance.push("${env.BUILD_NUMBER}")
            dockerInstance.push("latest")
          }
        }

      }
    }

    stage('Deploy') {
      steps {
        echo 'Sending deployment request to Kubernetes...'
      }
    }

  }
  environment {
    imageName = 'allebb/jenkkube-demo'
    registryCredentialSet = 'dockerhub'
    registryUri = ''
    dockerInstance = ''
  }
}
