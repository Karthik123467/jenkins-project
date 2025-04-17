pipeline {
    agent any

    environment {
        COMPOSE_PROJECT_NAME = "php-docker-stack-demo"
    }

    stages {
        stage('Clone Repository') {
            steps {
                git 'https://github.com/Karthik123467/php-docker-stack-demo.git'
            }
        }

        stage('Stop & Remove Containers') {
            steps {
                sh 'docker-compose down || true'
            }
        }

        stage('Build & Deploy') {
            steps {
                sh 'docker-compose up -d --build'
            }
        }
    }

    post {
        failure {
            echo "Deployment failed!"
        }
        success {
            echo "Deployment successful!"
        }
    }
}

