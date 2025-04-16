

pipeline {
    agent any

    environment {
        IMAGE_PHP = "php:apache"
        IMAGE_DB = "mysql:latest"
        IMAGE_PHPMYADMIN = "phpmyadmin/phpmyadmin"
    }

    stages {
        stage('Clean Workspace') {
            steps {
                cleanWs()
            }
        }

        stage('Checkout Code') {
            steps {
                git branch: 'main', url: 'https://github.com/Karthik123467/jenkins-project.git'
            }
        }

        stage('Stop and Remove Old Containers and Volumes') {
            steps {
                script {
                    bat """
                    docker-compose down -v || echo "Nothing to stop"
                    """
                }
            }
        }

        stage('Build and Run Containers') {
            steps {
                script {
                    bat "docker-compose up -d --build"
                }
            }
        }
    }

    post {
        failure {
            echo '❌ Build or deployment failed!'
        }
        success {
            echo '✅ PHP App deployed successfully with Docker Compose.'
        }
    }
}
