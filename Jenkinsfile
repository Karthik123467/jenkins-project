pipeline {
    agent any

    environment {
        IMAGE_NAME = "php:apache"
        CONTAINER_NAME = "php-docker-stack-demo"
    }

    stages {
        stage('Checkout Code') {
            steps {
                git branch: 'main', url: 'https://github.com/Karthik123467/jenkins-project.git'
            }
        }

        stage('Clean Up Old Containers & Volumes') {
            steps {
                script {
                    echo "Cleaning up old containers and volumes..."
                    bat "docker-compose down -v"
                }
            }
        }

        stage('Rebuild Docker Images & Start Containers') {
            steps {
                script {
                    echo "Building and starting fresh containers..."
                    bat "docker-compose up -d --build"
                }
            }
        }

        stage('Check App Status') {
            steps {
                script {
                    echo "Showing container status..."
                    bat "docker-compose ps"
                    echo "Showing latest logs..."
                    bat "docker-compose logs --tail=10"
                }
            }
        }
    }

    post {
        success {
            echo '✅ App deployed with latest GitHub code.'
        }
        failure {
            echo '❌ Deployment failed. Check the logs!'
        }
    }
}
