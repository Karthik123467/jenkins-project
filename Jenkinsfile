pipeline {
    agent any
    environment {
        IMAGE_NAME = "project-app"
        CONTAINER_NAME = "project-container"
    }
    stages {
        stage('Checkout') {
            steps {
                git url: 'https://github.com/Karthik123467/php-docker-stack-demo.git'
            }
        }
        stage('Build Docker Image') {
            steps {
                script {
                    // Build the Docker image
                    isUnix() ? sh("docker build -t ${IMAGE_NAME} .") : bat("docker build -t ${IMAGE_NAME} .")
                }
            }
        }
        stage('Stop and Remove Old Container') {
            steps {
                script {
                    if (isUnix()) {
                        // Stop and remove the old container
                        sh """
                        docker stop ${CONTAINER_NAME} || echo "No container to stop"
                        docker rm ${CONTAINER_NAME} || echo "No container to remove"
                        """
                    } else {
                        bat """
                        docker stop ${CONTAINER_NAME} || echo "No container to stop"
                        docker rm ${CONTAINER_NAME} || echo "No container to remove"
                        """
                    }
                }
            }
        }
        stage('Run App with Docker Compose') {
            steps {
                script {
                    // Run the app with Docker Compose
                    isUnix() ? sh("docker-compose up -d") : bat("docker-compose up -d")
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
