pipeline {
    agent any

    environment {
        IMAGE_NAME = "project-app"
        CONTAINER_NAME = "project-container"
    }

    stages {
        stage('Checkout Code') {
            steps {
                git branch: 'main', url: 'https://github.com/Karthik123467/php-docker-stack-demo'
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    sh "docker build . -t ${IMAGE_NAME}"
                }
            }
        }

        stage('Run App with Docker Compose') {
            steps {
                script {
                    sh "docker-compose up -d"
                }
            }
        }
    }

    post {
        failure {
            echo '❌ Build or deployment failed!'
        }
        success {
            echo '✅ App deployed successfully.'
        }
    }
}


