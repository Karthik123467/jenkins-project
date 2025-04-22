pipeline {
    agent any

    environment {
        IMAGE_NAME = "Project-app"
        CONTAINER_NAME = "Project-container"
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
                    sh "docker build -t ${IMAGE_NAME} ."
                }
            }
        }

        stage('Stop and Remove Old Container') {
            steps {
                script {
                    sh """
                    docker stop ${CONTAINER_NAME} || echo "No container to stop"
                    docker rm ${CONTAINER_NAME} || echo "No container to remove"
                    """
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


